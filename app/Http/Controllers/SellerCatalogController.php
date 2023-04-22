<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SellerCatalogController extends Controller
{
    //каталог продуктов продавца
    public function show(): View|Application|Factory
    {
        $user_id = auth()->check() ? auth()->user()->id : null;
        $products = Product::query()
            ->where('user_id', '=', $user_id)
            ->CatalogPage()
            ->paginate(9);

        return view('catalog.seller-catalog', [
            'products' => $products,
        ]);
    }

    //страница добавления продукта
    public function addProduct(Request $request) {
        return view('product.add');
    }

    //сохранение продукта
    public function saveProduct(Request $request) {
        $user_id = auth()->check() ? auth()->user()->id : null;
        //переносим фотку на сервер
        $name = 'images/' . Str::random(6) . '.jpg';
        $path = '/storage/' . $name;
        Storage::put(
            $name,
            file_get_contents($request->file('image'))
        );
        Product::query()->create(
            ['user_id' => $user_id, 'image' => $path] + $request->all()
        );
        return redirect()->route('sellerCatalog');
    }

    //удаление продукта
    public function removeProduct(Request $request, $id) {
        $format = str_replace('/storage/', '', Product::query()->findOrFail($id)->image);
        Storage::delete($format);
        $product = Product::query()->findOrFail($id)->delete();
        return redirect()->route('sellerCatalog');
    }

    //страница редактирования продукта
    public function editProduct(Request $request, $id) {
        $product = Product::query()->findOrFail($id);
        return view('product.edit', ['product' => $product]);
}

//редактирование продукта
public function editProductSubmit(Request $request, $id) {
    $data = $request->all();
    //если передали новую фотку-обновляем
        if ($request->hasFile('image')) {
            $name = 'images/' . Str::random(6) . '.jpg';
            $path = '/storage/' . $name;
            Storage::put(
                $name,
                file_get_contents($request->file('image'))
            );
            $data['image'] = $path;
        }
        Product::query()->findOrFail($id)->update($data);
        return redirect()->route('sellerCatalog');
}
}
