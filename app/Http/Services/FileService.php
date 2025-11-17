<?php

namespace App\Http\Services;

use Illuminate\Http\UploadedFile;
use App\Models\Candidate;
use Storage;

class FileService
{
    public function getPhoto(string $path)
    {
        $path = str_replace('storage', '', $path);
        if (str_contains($path, '..')) {
            return ['error' => 'Acesso inválido', 'status' => 400];
        }
        if (!Storage::disk('public')->exists($path)) {
            return ['error' => 'Imagem não encontrada', 'status' => 404];
        }
        $filePath = Storage::disk('public')->path($path);
        return ['file_path' => $filePath];
    }

    public function setPhoto(UploadedFile $photo, string $id)
    {
        $candidate = Candidate::findOrFail($id);
        if (!$candidate) return false;
        //delete older profile photo if it exists
        if ($candidate->profile_photo && Storage::disk('public')->exists($candidate->profile_photo)) {
            Storage::disk('public')->delete($candidate->profile_photo);
        }
        $path = $photo->store('profile', 'public');
        $candidate->profile_photo = $path;
        $candidate->save();
        return true;
    }

    public function setResume($user, $file)
    {
        //Delete old resume if it exists
        $old_resume = $user->resume;
        if (!empty($old_resume) && Storage::disk('private')->exists($old_resume)) {
            Storage::disk('private')->delete($old_resume);
        }
        $path = $file->store('resumes', 'private');
        if (!$path) {
            return false;
        }
        $user->resume = $path;
        $user->save();
        return true;
    }
}
