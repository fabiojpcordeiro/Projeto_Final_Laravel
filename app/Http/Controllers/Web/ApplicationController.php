<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function updateStatus(Request $request,  $job_candidate_id)
    {
        $validated = $request->validate([
            'status' => 'required|in:approved,rejected,applied,interview',
            'company_message' => 'nullable|string|max:2000'
        ]);
        $application = Application::find($job_candidate_id);
        $application->status = $validated['status'];
        $application->company_message = $validated['company_message'] ?? null;
        $application->save();

        return back()->with('success', 'Status atualizado!');
    }
}
