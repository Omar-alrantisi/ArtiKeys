<?php

namespace App\Http\Controllers\Frontend;

use App\Domains\Page\Models\Page;

/**
 * Class TermsController.
 */
class TermsController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $terms=Page::query()->where('slug','terms-conditions')->first();
        return view('frontend.pages.terms',compact('terms'));
    }
}
