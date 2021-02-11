<?php


namespace App\Http\Controllers;

use App\Models\Country;

class CountryController extends Controller
{
    public function index()
    {
        return Country::all();
    }

    public function get(int $id)
    {
        $country = Country::findOrFail($id);

        return response([
            'error' => false,
            'country' => $country
        ], 200);
    }
}
