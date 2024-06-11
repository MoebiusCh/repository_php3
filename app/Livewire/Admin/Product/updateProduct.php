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
    #[Validate('required|string|max:255', onUpdate: false)]
    public $title = '';
    // #[Validate('sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', onUpdate: false)]
    public $image;
    #[Validate('required|numeric', onUpdate: false)]
    public $price = '';
    #[Validate('required|numeric', onUpdate: false)]
    public $sale = '';
    #[Validate('nullable|string|max:255', onUpdate: false)]
    public $description = '';
    #[Validate('nullable|string|max:255', onUpdate: false)]
    public $detail = '';
    #[Validate('required|numeric', onUpdate: false)]
    public $status = '';
    #[Validate('required|numeric', onUpdate: false)]
    public $is_hot = '';
    #[Validate('required|numeric', onUpdate: false)]
    public $sale_rate = '';
    #[Validate('required|numeric', onUpdate: false)]
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
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function updateProduct()
    {
        $validatedData = $this->validate();
        $product = Product::findOrFail($this->productId);
        if ($this->image && !is_string($this->image)) {
            $this->validate([
                'image' => 'image|mimes:jpeg, png, jpg, gif, svg|max:2048',
            ]);
            $name = md5($this->image->getClientOriginalName() . microtime()) . '.' . $this->image->extension();
            $this->image->storeAs('public/img/product', $name);
            $validatedData['image'] = 'img/product/' . $name;

            // Xóa hình ảnh cũ nếu có
            if ($product->image) {
                $image_path = storage_path('app/public/' . $product->image);
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
        } else {
            $validatedData['image'] = $product->image;
        }
        $product->update($validatedData);

        return redirect()->route('admin.product')->with('success', 'Product updated successfully');
    }
}
