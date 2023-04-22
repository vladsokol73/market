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

            <div class="card-columns">
                <section class="mt-16 lg:mg-24">
                    <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-5 gap-3 sm:gap-4 md:gap-5 mt-8">
                        @each('components.product', $products, 'item')
                    </div>
                </section>
            </div>
        @endif
    @endauth

    @guest()
        <div class="card-columns">
            <section class="mt-16 lg:mg-24">
                <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-5 gap-3 sm:gap-4 md:gap-5 mt-8">
                    @each('components.product', $products, 'item')
                </div>
            </section>
        </div>
    @endguest

    <div class="paginator">
        {{ $products->withQueryString()->links('pagination::bootstrap-4')}}
    </div>
@endsection
