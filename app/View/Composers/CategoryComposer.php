<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Category;

class CategoryComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $categories = Category::where('is_active', true)->orderBy('name')->get();
        $view->with('categories', $categories);
    }
}
