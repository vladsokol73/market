@extends("layouts.app")

@section("title", $user->name ?? 'Каталог')

@section("content")
    @if($user->exists)
        <li>
            <span class="text-body text-xs">
                {{ $user->name }}
            </span>
        </li>
    @endif
    @auth()
        @if(auth()->user()->role == "покупатель")
            <div class="container mt-5">
                <div class="row">
                        @each('components.product', $products, 'item')
                </div>
            </div>
        @endif
    @endauth

    @guest()
        <div class="container mt-5">
            <div class="row">
                    @each('components.product', $products, 'item')
            </div>
        </div>
    @endguest

    <div class="paginator">
        {{ $products->withQueryString()->links('pagination::bootstrap-4')}}
    </div>
@endsection
