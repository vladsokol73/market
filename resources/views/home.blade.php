@extends("layouts.app")

@section("title")
    Главная
@endsection

@section("content")
    <div style="margin-top: 10px">Добро пожаловать на Market place</div>
    <div style="margin-top: 30px">Наши продавцы</div>

    <div class="container mt-5">
        <div class="row">
            @each('components.sellers', $users, 'item')
        </div>
    </div>
    @auth()
        @if(auth()->user()->role == 'покупатель')
            <div style="margin-top: 30px">Пример товаров</div>
            <div class="container mt-5">
                <div class="row">
                    @each('components.product', $products, 'item')
                </div>
            </div>
        @endif
    @endauth

    @guest()
        <div style="margin-top: 30px">Пример товаров</div>
        <div class="container mt-5">
            <div class="row">
                    @each('components.product', $products, 'item')
            </div>
        </div>
    @endguest
@endsection
