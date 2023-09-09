<?php

namespace App\Http\Controllers\Frontend;

use App\Domains\Page\Models\Page;

/**
 * Class HelpController.
 */
class HelpController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $help=Page::query()->where('slug','help-support')->first();

        return view('frontend.pages.help',compact('help'));
    }
}
