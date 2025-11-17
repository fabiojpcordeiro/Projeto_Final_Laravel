<?php

namespace App\Http\Services;

use App\Models\Candidate;
use App\Models\Skill;

class SkillManagerService
{
    //public function __construct(Candidate $candidate, Skill $skill) {}

    public function search(string $query)
    {
        return Skill::where('name', 'like', "%$query%")
            ->limit(10)
            ->get();
    }
    public function index()
    {
        return Skill::paginate(10);
    }
}
