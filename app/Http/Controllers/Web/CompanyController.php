<?php

namespace App\Http\Controllers\Web;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests as AccessAuthorizesRequests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CreateCompanyRequest;
use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Http\Services\CompanyService;
use App\Models\Company;
use Auth;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    use AccessAuthorizesRequests;
    private $service;
    public function __construct(CompanyService $service)
    {
        $this->service = $service;
    }

    public function index(){
        return redirect()->route('home');
    }

    public function create()
    {
        //$this->authorize('create', Company::class);
        return view('company.create');
    }

    public function storeCompany(CreateCompanyRequest $request)
    {
        $this->authorize('create', Company::class);
        $data = $request->validated();
        $this->service->storeCompany($data, Auth::user());
        return redirect()->route('home')->with('success', 'Empresa criada com sucesso.');
    }

    public function show(string $id)
    {
        $company = $this->service->show($id);
        $this->authorize('view', $company);
        return view('company.show', compact('company'));
    }

    public function edit(string $id)
    {
        $company = $this->service->show($id);
        $this->authorize('update', $company);
        return view('company.show', compact('company'));
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $this->authorize('update', $company);
        $this->service->update($company, $request->validated());
        return redirect()->back()->with('success', 'Empresa atualizada com sucesso.');
    }

    public function destroy(string $id)
    {
        $company = $this->service->show($id);
        $this->authorize('delete', $company);
        $this->service->destroy($id);
        return redirect()->route('home')->with('success', 'A empresa foi deletada com sucesso.');
    }
}
