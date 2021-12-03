<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Get welcome page
     *
     * @return void
     */
    public function index()
    {
        return view('frontend.welcome');
    }
}
