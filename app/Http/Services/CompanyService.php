<?php 
namespace App\Http\Services;

use App\Http\Repositories\CompanyRepository;
use App\Models\User;
use Auth;

class CompanyService extends BaseService{

    protected CompanyRepository $company_repository;

    public function __construct(CompanyRepository $repository){
        parent::__construct($repository);
        $this->company_repository = $repository;
    }

    public function storeCompany(array $data, User $user){
        $company = $this->repository->store($data);
        $user->company_id = $company->id;
        $user->role = 'admin';
        $user->save();
        return $company;
    }
}