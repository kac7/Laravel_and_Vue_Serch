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
            $querybilder = House::query();
            if (isset($request->name)){
                $querybilder->where('name', 'LIKE', '%'.$request->name.'%');
            }
            if (isset($request->bedrooms)){
                $querybilder->where('bedrooms', $request->bedrooms);
            }
            if (isset($request->bathrooms)){
                $querybilder->where('bathrooms', $request->bathrooms);
            }
            if (isset($request->storeys)){
                $querybilder->where('storeys', $request->storeys);
            }
            if (isset($request->garages)){
                $querybilder->where('garages', $request->garages);
            }
            if (isset($request->price_from)){
                $querybilder->where('price','>=', $request->price_from);
            }
            if (isset($request->price_up)){
                $querybilder->where('price','<=', $request->price_up);
            }
            $houses = $querybilder->get();
            return response()->json($houses);

        }
    }
}
