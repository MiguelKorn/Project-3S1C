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
        if ($this->checkPage($pageName)) {
            $tabs = Page::where('name', $pageName)->first()->tabs()->get();
            foreach ($tabs as $tab) {
                $tab['translations'] = Tab::find($tab->id)->translations()->orderBy('locale')->get();
            }

            return view('cms.tabs', compact('pageName', 'tabs'));
        } else {
            return redirect()->back();
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
