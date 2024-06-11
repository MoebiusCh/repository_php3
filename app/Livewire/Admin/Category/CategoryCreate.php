<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Layout;
class CategoryCreate extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|string|max:255|unique:categories,name',
    ];

    public function submit()
    {
        $this->validate();

        Category::create([
            'name' => $this->name,
        ]);

        session()->flash('message', 'Category created successfully.');

        return redirect()->route('admin.categories.index');
    }
    #[Layout('components.layouts.laid-back')]
    public function render()
    {
        return view('livewire.admin.category.category-create');
    }
}
