<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CreateCompanyRequest;
use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Http\Services\CompanyService;
use Illuminate\Http\Request;

class ApiCompanyController extends Controller
{
    private CompanyService $service;
    public function __construct(CompanyService $service)
    {
        $this->service = $service;
    }
    public function index(Request $request)
    {
        return response()->json(['data'=>$this->service->index($request)], 200);
    }
    public function show(string $id){
        return response()->json(['data'=>$this->service->show($id)], 200);
    }
    public function store(CreateCompanyRequest $request){
        return response()->json(['data'=>$this->service->store($request->validated())], 201);
    }
    public function update(UpdateCompanyRequest $request, string $id){
        return response()->json(['data'=>$this->service->update($id, $request->validated())], 200);
    }
}
