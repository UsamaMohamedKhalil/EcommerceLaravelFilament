<?php

use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Cancelpage;
use App\Livewire\CartPage;
use App\Livewire\CategoriesPage;
use App\Livewire\CheckoutPage;
use App\Livewire\HomePage;
use App\Livewire\MyOrdersPage;
use App\Livewire\OrderDetailPage;
use App\Livewire\ProductDetailPage;
use App\Livewire\ProductPage;
use App\Livewire\SuccessPage;
use Illuminate\Support\Facades\Route;


Route::get('/', HomePage::class);

Route::get('/categories', CategoriesPage::class);

Route::get('/products', ProductPage::class);

Route::get('/cart', CartPage::class);

Route::get('/products/{slug}', ProductDetailPage::class);








//middleware for guest user
Route::middleware('guest')->group(function(){
    //AUTH Routes
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class);
    Route::get('/forgot', ForgotPassword::class);
    Route::get('/reset', ResetPassword::class);
});


//Middleware For login user
Route::middleware('auth')->group(function() {
    Route::get('/logout', function(){
        auth()->logout();
        return redirect('/');
    });

    Route::get('/checkout', CheckoutPage::class);

    Route::get('/my-orders', MyOrdersPage::class);
    
    Route::get('/my-orders/{order}', OrderDetailPage::class);

    Route::get('/success', SuccessPage::class);

    Route::get('/cancel', Cancelpage::class);
});




