<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //

    public function search(Request $request)
    {
        $query = $request->input('query');

        $results = [];


        $countries = Country::where('name', 'like', "%$query%")->get();
        foreach ($countries as $country) {
            $results[] = [
                'country' => 'country',
                'name' => $country->name,
            ];
        }

        $cities = City::where('name', 'like', "%$query%")->get();
        foreach ($cities as $city) {
            $results[] = [
                'country' =>  $city->country->name,
                'name' => $city->name,
            ];
        }

        return response()->json($results);
    }
}
