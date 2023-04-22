@extends("layouts.app")

@section("title")
    Главная
@endsection

@section("content")
    <div style="margin-top: 10px">Добро пожаловать на Market place</div>
    <div style="margin-top: 100px">Наши продавцы</div>

    <div class="card-columns" style="margin-top: 30px">
    <section class="mt-16 lg:mg-24">
        <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-5 gap-3 sm:gap-4 md:gap-5 mt-8">
            @each('components.sellers', $users, 'item')
        </div>
    </section>
    </div>
    @auth()
        @if(auth()->user()->role == 'покупатель')
<div style="margin-top: 30px">Пример товаров</div>
    <div class="card-columns" style="margin-top: 30px">
    <section class="mt-16 lg:mg-24">
        <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-5 gap-3 sm:gap-4 md:gap-5 mt-8">
            @each('components.product', $products, 'item')
        </div>
    </section>
    </div>
        @endif
    @endauth

    @guest()
        <div style="margin-top: 30px">Пример товаров</div>
        <div class="card-columns" style="margin-top: 30px">
            <section class="mt-16 lg:mg-24">
                <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-5 gap-3 sm:gap-4 md:gap-5 mt-8">
                    @each('components.product', $products, 'item')
                </div>
            </section>
        </div>
    @endguest
@endsection
