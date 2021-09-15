<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Returns the index page.
     * @return \Illuminate\View\View
     */
    public function __invoke()
    {
        return view('dashboard');
    }
}
