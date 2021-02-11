<?php


namespace App\Http\Controllers;


class CountryController extends Controller
{
    public function index()
    {
        dd('hit');
    }

    public function get(int $id)
    {
        dd('hit get', $id);
    }
}
