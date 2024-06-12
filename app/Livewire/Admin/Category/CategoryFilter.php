<?php

namespace App\Livewire\Admin\Category;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Http\Request;
class CategoryFilter extends Component
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
    #[Layout('components.layouts.laid-back')]
    public function render()
    {
        $categories = Category::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orderBy('id', $this->orderBy)
            ->paginate(10);

        return view('livewire.admin.category.category-filter', [
            'categories' => $categories,
        ]);
    }
    
}
