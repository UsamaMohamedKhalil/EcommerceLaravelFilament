<?php
// Like Controller & filters Concept
namespace App\Livewire;

use App\Helpers\cartManagement;
use App\Livewire\Partials\Navbar;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('Products - Buy or Die')]

class ProductPage extends Component
{
    use WithPagination;
    use LivewireAlert;
    #[Url]
    public $selected_categories = [];
    #[Url]
    public $selected_brands = [];
    #[Url]
    public $featured = [];
    #[Url]
    public $sale = [];
    #[Url]
    public $price_range = 30000;
    #[Url]
    public $sort = 'latest';

    // add product to cart
    public function addToCart($product_id){
        $total_count = cartManagement::addItemToCart($product_id);
        
        $this->dispatch('update-cart-count', total_count: $total_count)->to(Navbar::class);

        $this->alert('success', 'Product Added', [
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }
  

    public function render()
    {
        $productQuery = Product::query()->where('is_active',1);

        if(!empty($this->selected_categories)){
            $productQuery->whereIn('category_id', $this->selected_categories);
        }

        if(!empty($this->selected_brands)){
            $productQuery->whereIn('brand_id', $this->selected_brands);
        }

        if(!empty($this->featured)){
            $productQuery->where('is_featured', 1);
        }

        if(!empty($this->sale)){
            $productQuery->where('on_sale', 1);
        }

        if(!empty($this->price_range)){
            $productQuery->whereBetween('price', [0,$this->price_range]);
        }

        if(!empty($this->sort == 'latest')){
            $productQuery->latest();
        }

        if(!empty($this->sort == 'price')){
            $productQuery->orderBy('price');
        }
        return view('livewire.product-page',[
            'products' => $productQuery->paginate(9),
            'brands' => Brand::where('is_active',1)->get(['id','name','slug']),
            'categories' => Category::where('is_active',1)->get(['id','name','slug'])
        ]);
    }
}
