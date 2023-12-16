<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Class DashboardController.
 */
class DashboardController
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('backend.dashboard');
    }
}
