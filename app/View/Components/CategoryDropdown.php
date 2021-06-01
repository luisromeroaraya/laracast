<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category;

class CategoryDropdown extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $categories = Category::all(); //Gets all the categories
        return view('components.category-dropdown', ['categories' => $categories, 'currentCategory' => Category::firstWhere('slug', request('category'))]);
    }
}
