<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Services\FileService;
use App\Models\Candidate;
use App\Models\JobOffer;
use Illuminate\Http\Request;

class FileController extends Controller
{
    private $service;
    public function __construct(FileService $service)
    {
        $this->service = $service;
    }
    public function getPhoto($path)
    {
        $result = $this->service->getPhoto($path);
        if (isset($result['error'])) {
            return response()->json(['error' => $result['error']], $result['status']);
        }
        return response()->file($result['file_path']);
    }
    public function setPhoto(Request $request)
    {
        $user_id = auth()->user()->id;
        $file = $request->file('profile_photo');
        $result = $this->service->setPhoto($file, $user_id);

        if ($result) {
            return response()->json(['message' => 'Foto atualizada com sucesso'], 200);
        }
        return response()->json(['message' => 'Ocorreu algum erro.'], 500);
    }
    public function setResume(Request $request)
    {
        $user = auth()->user();
        $file = $request->file('resume');
        if ($file) {
            $result = $this->service->setResume($user, $file);
            if ($result) {
                return response()->json(['message' => 'Currículo enviado com sucesso'], 200);
            } else {
                return response()->json(['message' => 'Ocorreu um erro.'], 500);
            }
        }
        return response()->json(['message' => 'Ocorreu um erro.'], 500);
    }

    public function getLogo($path)
    {
        if (!Storage::disk('public')->exists($path)) {
            return response()->json(['error' => 'Logo não encontrado.'], 404);
        }

        $file = Storage::disk('public')->get($path);
        $mime = Storage::disk('public')->mimeType($path);

        return response($file, 200)
            ->header('Content-Type', $mime)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Accept');
    }

    public function downloadResume($job_offer_id, $candidate_id)
    {
        $companyUser = auth()->user();

        $job = JobOffer::findOrFail($job_offer_id);

        if ($job->company_id != $companyUser->company->id) {
            abort(403, 'Você não tem permissão para acessar este arquivo.');
        }

        $candidate = Candidate::findOrFail($candidate_id);

        $applied = $candidate->jobs()->where('job_offer_id', $job_offer_id)->exists();
        if (!$applied) {
            abort(403, 'Este candidato não se inscreveu nesta vaga.');
        }

        if (!$candidate->resume || !Storage::disk('private')->exists($candidate->resume)) {
            abort(404, 'Currículo não encontrado.');
        }

        $extension = pathinfo($candidate->resume, PATHINFO_EXTENSION);
        $downloadName = "curriculo_{$candidate->name}.{$extension}";

        return Storage::disk('private')->download($candidate->resume, $downloadName);
    }

    public function viewResume($candidate_id)
    {
        $candidate = Candidate::findOrFail($candidate_id);
        if (!$candidate->resume || !Storage::disk('private')->exists($candidate->resume)) {
            abort(404, 'Currículo não encontrado.');
        }
        $extension = pathinfo($candidate->resume, PATHINFO_EXTENSION);
        $downloadName = "curriculo_{$candidate->name}.{$extension}";
        return Storage::disk('private')->download($candidate->resume, $downloadName);
    }
}
