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
        $country = Country::find($id);

        if (!$country) {
            return response([
                'error' => true,
                'message' => 'Country with that ID is not found.'
            ], 404);
        }

        return response([
            'error' => false,
            'country' => $country
        ], 200);
    }
}
