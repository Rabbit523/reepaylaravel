<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserPaymentMethods;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AjaxGetCards extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function execute()
    {
        return View::make('dashboard.ajax.cards')
            ->with('cards', UserPaymentMethods::where('user_id', Auth::id())->get())
            ->render();
    }
}
