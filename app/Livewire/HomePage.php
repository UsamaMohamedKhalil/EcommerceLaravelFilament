<?php

// Like Controller (Business Logic)

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Home Page - Buy or Die')]

class HomePage extends Component
{
    public function render()
    {
        $brands = Brand::where('is_active',1)->get();
        $categories = Category::where('is_active',1)->get();
        return view('livewire.home-page', [
            'brands' => $brands , 
            'categories' => $categories,
        ]);
    }
}
