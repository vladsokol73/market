<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class HomeController extends Controller
{
    //главная страница
    public function __invoke(): View|Application|Factory
    {

        $products = Product::query()
            ->homePage()
            ->get();

        $users = User::query()
            ->has('products')
            ->homePage()
            ->get();
        return view("home", compact('products', 'users'));
    }
}
