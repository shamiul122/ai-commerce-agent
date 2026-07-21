<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public / Storefront Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/shop', function () {
    return view('storefront.shop');
})->name('shop');

Route::get('/about', function () {
    return view('storefront.about');
})->name('about');

Route::get('/contact', function () {
    return view('storefront.contact');
})->name('contact');

Route::get('/wishlist', function () {
    return view('storefront.wishlist');
})->name('wishlist');

Route::get('/cart', function () {
    return view('storefront.cart');
})->name('cart');

Route::get('/checkout', function () {
    return view('storefront.checkout');
})->name('checkout');

Route::get('/checkout/success', function () {
    return view('storefront.success');
})->name('checkout.success');

/*
|--------------------------------------------------------------------------
| Admin Routes — protected by "admin" role
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/orders', function () {
        return view('admin.crud', ['viewName' => 'orders']);
    })->name('orders');

    Route::get('/products', function () {
        return view('admin.crud', ['viewName' => 'products']);
    })->name('products');

    Route::get('/categories', function () {
        return view('admin.crud', ['viewName' => 'categories']);
    })->name('categories');

    Route::get('/brands', function () {
        return view('admin.crud', ['viewName' => 'brands']);
    })->name('brands');

    Route::get('/users', function () {
        return view('admin.crud', ['viewName' => 'users']);
    })->name('users');

    Route::get('/media', function () {
        return view('admin.crud', ['viewName' => 'media']);
    })->name('media');

    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('settings');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Customer Routes — protected by "customer" role
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:customer'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/dashboard', function () {
        return view('customer.dashboard');
    })->name('dashboard');

    Route::get('/orders', function () {
        return view('customer.orders');
    })->name('orders');

    Route::get('/wishlist', function () {
        return view('customer.wishlist');
    })->name('wishlist');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
