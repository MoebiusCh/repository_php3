<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class ProductFilter extends Component
{
    use WithPagination;

    public $search = '';
    public $orderBy = 'asc';

    protected $updatesQueryString = [
        ['search' => ['except' => '']],
        ['orderBy' => ['except' => 'asc']],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingOrderBy()
    {
        $this->resetPage();
    }

    public function render()
    {
        $products = Product::query()
            ->where('title', 'like', '%' . $this->search . '%')
            ->orderBy('title', $this->orderBy)
            ->paginate(10);

        return view('livewire.admin.product.product-filter', compact('products'));
    }
}
