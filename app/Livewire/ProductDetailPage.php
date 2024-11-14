<?php

///Logic of Controller

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Product Detail - Buy or Die')]

class ProductDetailPage extends Component
{   
    public string $slug;
    public function mount($slug){
        $this->slug = $slug;
    }
    
    public function render()
    {
        return view('livewire.product-detail-page',[
            'product' => Product::where('slug', $this->slug)->firstOrFail(),
        ]);
    }
}
