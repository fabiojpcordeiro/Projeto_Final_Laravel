<?php

namespace App\Http\Services;

use App\Http\Repositories\CandidateRepository;
use App\Models\Candidate;
use Illuminate\Http\UploadedFile;
use Storage;

class CandidateService extends BaseService
{
    protected CandidateRepository $candidate_repository;

    public function __construct(CandidateRepository $repository)
    {
        parent::__construct($repository);
        $this->candidate_repository = $repository;
    }

    public function updateCandidate(Candidate $candidate, array $data, ?UploadedFile $resume = null)
    {
        if (isset($resume)) {
            $old_resume = $candidate->resume;
            if ($old_resume && Storage::disk('public')->exists($old_resume)) {
                Storage::disk('public')->delete($old_resume);
            }
            $data['resume'] = $resume->store('resumes', 'public');
        }
        return $this->repository->update($candidate, $data);
    }

    public function destroyCandidate(Candidate $candidate)
    {
        $old_resume = $candidate->resume;
        if ($old_resume && Storage::disk('public')->exists($old_resume)) {
            Storage::disk('public')->delete($old_resume);
        }
        return $this->repository->destroy($candidate->id);
    }

    public function me(string $user_id){
        $candidate = $this->candidate_repository->me($user_id);
        return [
            'id' => $candidate->id,
            'name' => $candidate->name,
            'email' => $candidate->email,
            'phone' => $candidate->phone,
            'state_id' => $candidate->state_id,
            'state_name' => $candidate->state?->name,
            'city_id' => $candidate->city_id,
            'city_name' => $candidate->city?->name,
            'bio' => $candidate->bio,
            'profile_photo' => $candidate->profile_photo,
            'birthdate' => $candidate->birthdate,
        ];
    }
}
