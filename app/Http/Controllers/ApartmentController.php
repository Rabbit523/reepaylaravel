<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;

class ApartmentController extends Controller
{
    public function show(Apartment $apartment)
    {
        return view('pages.apartment.show')->with('apartment', $apartment);
    }
}
