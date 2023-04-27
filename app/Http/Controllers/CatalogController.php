<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Cookie;

class CatalogController extends Controller
{
    //каталог для покупателя
    public function __invoke(?User $user): View|Application|Factory
    {
        $users = User::query()
            ->has('products')
            ->get();

        $products = Product::query()
            ->CatalogPage()
            ->paginate(9);

        return view('catalog.catalog', [
            'products' => $products,
            'users' => $users,
            'user' => $user
        ]);
    }
}
