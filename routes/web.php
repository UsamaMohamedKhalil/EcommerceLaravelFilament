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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomePage::class);

Route::get('/categories', CategoriesPage::class);

Route::get('/products', ProductPage::class);

Route::get('/cart', CartPage::class);

Route::get('/products/{product}', ProductDetailPage::class);

Route::get('/checkout', CheckoutPage::class);

Route::get('/my-orders', MyOrdersPage::class);

Route::get('/my-orders/{order}', OrderDetailPage::class);

Route::get('/success', SuccessPage::class);

Route::get('/cancel', Cancelpage::class);


//AUTH Routes
Route::get('/login', Login::class);
Route::get('/register', Register::class);
Route::get('/forgot', ForgotPassword::class);
Route::get('/reset', ResetPassword::class);




