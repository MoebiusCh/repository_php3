<?php

namespace App\Livewire\Admin\Product;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class addProduct extends Component
{
    use WithFileUploads;
    // create variable with this array
    #[Validate('required|string|max:255')]
    public $title = '';
    #[Validate('nullable|sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048')]
    public $image;
    #[Validate('required|numeric')]
    public $price = '';
    #[Validate('required|numeric')]
    public $sale = '';
    #[Validate('nullable|string|max:255')]
    public $description = '';
    #[Validate('nullable|string|max:255')]
    public $detail = '';
    #[Validate('required|numeric')]
    public $status = '';
    #[Validate('required|numeric')]
    public $is_hot = '';
    #[Validate('required|numeric')]
    public $sale_rate = '';
    #[Validate('required|numeric')]
    public $category_id = '';
    public $created_at = '';
    public $updated_at = '';

    #[Layout('components.layouts.laid-back')]
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.product.add', compact('categories'));
    }

    public function mount()
    {
        $this->created_at =  date('Y-m-d');
        $this->updated_at =  date('Y-m-d');
    }
    public function storeProduct()
    {

        // Gọi validate để kiểm tra dữ liệu
        $validated = $this->validate();

        $name = '';
        if ($this->image) {
            $name = md5($this->image . microtime()) . '.' . $this->image->extension();
            $this->image->storeAs('public/img/product', $name);
            $validated['image'] =  $name;
        }

        // Kiểm tra và gán giá trị mặc định nếu cần thiết
        $this->price = $this->price ?? 0;
        $this->sale = $this->sale ?? 0;
        $this->status = $this->status ?? 0;
        $this->is_hot = $this->is_hot ?? 0;
        $this->sale_rate = $this->sale_rate ?? 0;

        Product::create([
            'title' => $this->title,
            'image' => 'img/product/' . $validated['image'] ?? null,
            'price' => $this->price,
            'sale' => $this->sale,
            'description' => $this->description,
            'detail' => $this->detail,
            'status' => $this->status,
            'is_hot' => $this->is_hot,
            'sale_rate' => $this->sale_rate,
            'category_id' => $this->category_id ?? 1,
        ]);

        return redirect()->route('admin.product');
    }
}
