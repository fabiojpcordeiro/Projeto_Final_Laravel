<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $userCityId = $user->company?->city_id ?? null;
        $candidates = Candidate::query()
            ->with(['state', 'city'])
            ->when($userCityId, function ($query) use ($userCityId) {
                $query->orderByRaw("CASE WHEN city_id = ? THEN 0 ELSE 1 END", [$userCityId]);
            })
            ->orderBy('name', 'asc')
            ->paginate(10);
        return view('home.index', compact('candidates'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $user = Auth::user();
        $userCityId = $user->company?->city_id ?? null;

        $candidates = Candidate::query()
            ->with(['state', 'city'])
            ->when($query, function ($q) use ($query) {
                $q->where(function ($sub) use ($query) {
                    $sub->where('name', 'like', "%{$query}%")
                        ->orWhere('bio', 'like', "%{$query}%")
                        ->orWhereHas('city', function($cityQuery) use ($query){
                            $cityQuery->where('name', 'LIKE', "%{$query}%");
                        });
                });
            })
            ->when($userCityId, function ($q) use ($userCityId) {
                $q->orderByRaw("CASE WHEN city_id = ? THEN 0 ELSE 1 END", [$userCityId]);
            })
            ->orderBy('name', 'asc')
            ->paginate(10);

        return view('home.index', compact('candidates', 'query'));
    }
}
