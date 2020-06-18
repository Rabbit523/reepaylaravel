<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;

class IndexController extends Controller
{
    public function index()
    {
        return view('pages.index')->with('featured_apartments', Apartment::all()->take(6));
    }
}
