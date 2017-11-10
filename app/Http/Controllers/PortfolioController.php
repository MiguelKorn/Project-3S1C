<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $page = Page::where('name', 'portfolio')->first();

        return view('pages.portfolio', compact('page'));
    }
}
