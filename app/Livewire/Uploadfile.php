<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

use Livewire\Attributes\Validate;

class Uploadfile extends Component
{
    use WithFileUploads;
    public $image;
    public function render()
    {
        return view('livewire.uploadfile');
    }
    #[On('storeProduct')]
    public function save()
    {
        $this->image->store(path: storage_path('app/public/img/product'));
    }
}
