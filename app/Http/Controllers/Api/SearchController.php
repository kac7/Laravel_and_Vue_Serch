<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\House;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if  (sizeof($request->all()) == 0){
        $houses = $houses = House::all();
        return response()->json($houses);
        }
        else{
            $querybilder = new House();
            if (isset($request->name)){
                $querybilder->where('name', 'LIKE', '%'.$request->name.'%');
            }
            if (isset($request->bedrooms)){
                $querybilder->where('bedrooms', '=', $request->bedrooms);
            }

//        $houses = Houses::where('name', 'LIKE', '%'.$request->name.'%')->get();
        $houses = $querybilder->get();

        return response()->json($houses);

        }
    }
}
