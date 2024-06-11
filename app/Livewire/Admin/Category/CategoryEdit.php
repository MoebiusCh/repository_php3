<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Layout;
class CategoryEdit extends Component
{
    public $categoryId;
    public $name;

    public function mount(Category $category)
    {
        $this->categoryId = $category->id;
        $this->name = $category->name;
    }

    public function updateCategory()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($this->categoryId);
        $category->name = $this->name;
        $category->save();

        session()->flash('success', 'Category updated successfully.');

        return redirect()->route('admin.categories.index');
    }
    #[Layout('components.layouts.laid-back')]
    public function render()
    {
        return view('livewire.admin.category.category-edit');
    }
}
