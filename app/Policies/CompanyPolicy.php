<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\User;

class CompanyPolicy
{
    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Company $company): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return is_null($user->company_id);
    }

    public function update(User $user, Company $company): bool
    {
        return $user->company_id === $company->id;
    }

    public function delete(User $user, Company $company): bool
    {
        return ($user->company_id === $company->id && $user->role ==='admin');
    }

    public function restore(User $user, Company $company): bool
    {
        return false;
    }

    public function forceDelete(User $user, Company $company): bool
    {
        return false;
    }
}
