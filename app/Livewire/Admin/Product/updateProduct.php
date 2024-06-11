<?php

namespace App\Livewire\Admin\Product;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;


class updateProduct extends Component
{
    use WithFileUploads;

    public $productId;
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

    public $data;
    public function mount(Product $product)
    {
        $this->data = $product;
        $this->productId = $product->id;
        $this->title = $product->title;
        $this->image = $product->image;
        $this->price = $product->price;
        $this->sale = $product->sale;
        $this->description = $product->description;
        $this->detail = $product->detail;
        $this->status = $product->status;
        $this->is_hot = $product->is_hot;
        $this->sale_rate = $product->sale_rate;
        $this->category_id = $product->category_id;
        $this->updated_at = $product->updated_at;
    }
    #[Layout('components.layouts.laid-back')]
    public function render()
    {
        $categories = Category::all();
        // dd($this->data);
        return view('livewire.admin.product.update', compact('categories'));
    }

    public function updateProduct()
    {
        $validated = $this->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric',
            'sale' => 'required|numeric',
            'description' => 'nullable|string|max:255',
            'detail' => 'nullable|string|max:255',
            'status' => 'required|numeric',
            'is_hot' => 'required|numeric',
            'sale_rate' => 'required|numeric',
            'category_id' => 'required|numeric',
        ]);

        if ($this->image) {
            $name = md5($this->image->getClientOriginalName() . microtime()) . '.' . $this->image->extension();
            $this->image->storeAs('public/img/product', $name);
            $validated['image'] = 'img/product/' . $name;
        }

        $product = Product::findOrFail($this->productId);
        $image_path = storage_path('app/public/' . $product->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $product->update($validated);

        return redirect()->route('admin.product')->with('success', 'Product updated successfully');
    }
}
