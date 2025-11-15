<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Services\FileService;
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
}
