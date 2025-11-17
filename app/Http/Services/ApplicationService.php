<?php

namespace App\Http\Services;

use App\Http\Repositories\ApplicationRepository;
use Illuminate\Support\Facades\Storage;

class ApplicationService extends BaseService
{

    public function __construct(ApplicationRepository $repository)
    {
        parent::__construct($repository);
    }

    public function storeApplication(array $data)
    {
        $application = $this->repository->store(array_merge($data, ['resume'=> null]));

        if (!empty($data['file'])) {
            $resume_path = $data['file']->store('resumes', 'public');
            $application->update(['resume'=>$resume_path]);
            unset($data['file']);
        }
        return $application;
    }

    public function updateApplication($object, array $data)
    {
        $application = $this->repository->update($object, $data);

        if (!empty($data['file'])) {
            if ($application->resume) {
                Storage::disk('public')->delete($application->resume);
            }
            $resume_path = $data['file']->store('resumes', 'public');
            $application->update(['resume'=>$resume_path]);
        }
        return $application->fresh();
    }
}
