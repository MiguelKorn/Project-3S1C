<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Project;
use App\ProjectTranslation;
use App\TabTranslation;
use function foo\func;
use Illuminate\Http\Request;
use App\Page;
use App\Tab;
use Illuminate\Support\Facades\App;

class CmsController extends Controller
{
    protected $allowedPages = ['portfolio', 'bnb', 'cv'];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.home');
    }

    public function checkPage($currentPage)
    {
        return in_array($currentPage, $this->allowedPages);
    }
}
