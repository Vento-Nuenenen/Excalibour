<?php

namespace App\Http\ViewComposers;

use App\Models\Theme;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ThemeComposer
{
    protected $user;
    protected $theme;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $theme = Theme::find(1);
        $view->with('theme', $theme);
    }
}
