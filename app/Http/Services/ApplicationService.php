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

    public function show($id){
        return $this->repository->show($id);
    }

    public function storeApplication(array $data)
    {   
        $application = $this->repository->store(array_merge($data, ['status'=> 'applied']));
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
