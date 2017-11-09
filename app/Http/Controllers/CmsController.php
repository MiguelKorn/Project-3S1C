<?php

namespace App\Http\Controllers;

use App\TabTranslation;
use function foo\func;
use Illuminate\Http\Request;
use App\Page;
use App\Tab;
use Illuminate\Support\Facades\App;

class CmsController extends Controller
{
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
        return view('cms.home', compact('pages'));
    }

    public function getPages()
    {
        $pages = Page::select(['id', 'name', 'updated_at'])->get();

        return view('cms.pages', compact('pages'));
    }

    public function getTabs($pageName)
    {
        $page = Page::where('name', $pageName)->first();
        if($page !== null) {
            $tabs = $page->tabs()->get();

            foreach ($tabs as $tab) {
                $tab['translations'] = Tab::find($tab->id)->translations()->get();
            }

            return view('cms.tabs', compact('page', 'tabs'));
        } else {
            return redirect()->route('cms.home');
        }
    }

    public function editPage($pageName)
    {
        $data = request()->all();
        $tab = TabTranslation::where([['tab_id', '=', $data['tab']], ['locale', '=' , $data['lang']]])->first();
        $tab->title = $data['title'];
        $tab->text = $data['desc'];
        $tab->save();

        return redirect()->route('cms.page', $pageName);
    }
}
