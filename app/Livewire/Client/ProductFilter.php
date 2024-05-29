<?php

namespace App\Livewire\Client;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use App\Models\Product;

class ProductFilter extends Component
{
    use WithPagination;

    public $selectedCategories = [];
    public $perPage = 6;

    public $byColumn = 'id';
    public $orderBy = 'desc';
    public $search;

    // Reset pagination when the selected categories change
    public function updatingSelectedCategories()
    {
        $this->resetPage();
    }

    // Reset pagination when the search term changes
    public function updatingSearch()
    {
        $this->resetPage();
    }

    // Reset pagination when the sort by field changes
    public function updatingSortBy()
    {
        $this->resetPage();
    }


    public function render()
    {
        $categories = Category::all();
        $products = Product::when($this->selectedCategories, function ($query) {
            $query->whereIn('category_id', $this->selectedCategories);
        })->search(trim($this->search))
            ->orderBy($this->byColumn, $this->orderBy)
            ->paginate($this->perPage, pageName: 'productPage');
        return view('livewire.client.product-filter', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }
}
