<?php
// Like Controller
namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Products - Buy or Die')]

class ProductPage extends Component
{
    use WithPagination;

    public function render()
    {
        $productQuery = Product::query()->where('is_active',1);
        return view('livewire.product-page',[
            'products' => $productQuery->paginate(4),
            'brands' => Brand::where('is_active',1)->get(['id','name','slug']),
            'categories' => Category::where('is_active',1)->get(['id','name','slug'])
        ]);
    }
}
