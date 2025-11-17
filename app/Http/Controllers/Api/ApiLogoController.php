<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApiLogoController extends Controller
{
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
