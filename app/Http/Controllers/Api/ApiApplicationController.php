<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\CreateAplicationRequest;
use App\Http\Requests\Application\UpdateApplicationRequest;
use App\Http\Services\ApplicationService;
use App\Models\Application;

use function Livewire\store;

class ApiApplicationController extends Controller
{
    private $service;

    public function __construct(ApplicationService $service)
    {
        $this->service = $service;
    }

    public function show(string $id)
    {
        return $this->service->show($id);
    }
    public function store(CreateAplicationRequest $request)
    {
        $data = $request->validated();
        $data['candidate_id'] = auth()->user()->id;
        return $this->service->storeApplication($data);
    }

    public function update(UpdateApplicationRequest $request, Application $application)
    {
        $data = $request->validated();
        $data['candidate_id'] = auth()->user()->id;
        return $this->service->updateApplication($application, $data);
    }

    public function destroy($object)
    {
        return $this->service->destroy($object);
    }
}
