<?php

namespace App\Http\Controllers\Cms;

use App\Page;
use App\Tab;
use App\TabTranslation;
use Illuminate\Http\Request;

class TabController extends CmsController
{
    public function getTabs($pageName)
    {
        $page = Page::where('name', $pageName)->first();
        if ($page !== null) {
            $tabs = $page->tabs()->get();

            foreach ($tabs as $tab) {
                $tab['translations'] = Tab::find($tab->id)->translations()->get();
            }

            return view('cms.tabs', compact('page', 'tabs'));
        } else {
            return redirect()->route('cms.home');
        }
    }

    public function editTab($pageName)
    {
        $data = request()->all();
        $tab = TabTranslation::where([['tab_id', '=', $data['tab']], ['locale', '=', $data['lang']]])->first();
        $tab->title = $data['title'];
        $tab->text = $data['desc'];
        $tab->save();

        return redirect()->route('cms.pages.tabs', $pageName);
    }
}
