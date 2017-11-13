<?php

namespace App\Http\Controllers\Cms;

use App\Page;
use Illuminate\Http\Request;

class PageController extends CmsController
{
    public function showPageEditable($pageName)
    {
        $page = Page::select(['id', 'name', 'updated_at'])->where('name', $pageName)->first();
        if ($page !== null) {
            return view('cms.page', compact('page'));
        } else {
            return redirect()->route('cms.pages');
        }
    }

    public function getPages()
    {
        $pages = Page::select(['id', 'name', 'updated_at'])->get();

        return view('cms.pages', compact('pages'));
    }
}
