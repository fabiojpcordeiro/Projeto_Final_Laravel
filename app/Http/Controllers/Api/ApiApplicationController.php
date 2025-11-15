<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\CreateAplicationRequest;
use App\Http\Requests\Application\UpdateApplicationRequest;
use App\Http\Services\ApplicationService;
use App\Models\Application;

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
        $this->service->storeApplication($data);
        return response()->json(['message'=>'Candidatura criada com sucesso.']);
    }

    public function update(UpdateApplicationRequest $request, Application $application)
    {
        $data = $request->validated();
        $data['candidate_id'] = auth()->user()->id;
        return $this->service->updateApplication($application, $data);
    }

    public function destroy($id)
    {
        $this->service->destroy($id);
        return response()->json(['message'=>'Candidatura apagada com sucesso.']);
    }
}
