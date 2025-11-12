<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ApiLocationController extends Controller
{
    public function states(Request $request){
        $query = $request->query('query', '');
        $states = DB::table('states')
        ->select(['id','name', 'abbr'])
        ->where('name', 'LIKE', "%$query%")
        ->limit(10)
        ->get();
        return response()->json($states);
    }
    public function  cities(Request $request){
        $state_id = $request->query('state_id');
        $query = $request->query('query', '');
        $cities = DB::table('cities')
        ->select(['id','name'])
        ->where('state_id', $state_id)
        ->where('name', 'LIKE', "%$query%")
        ->limit(10)
        ->get();
        return response()->json($cities);
    }
}
