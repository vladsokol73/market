<div class="container">
<a href="{{ route('product', $item) }}">
    <img src="{{ $item->image }}" width="400" alt="{{ $item->title }}">
</a>
<div class="grow flex flex-col py-8 px-6">
    <h3 class="text-sm lg:text-md font-black">
        <a href="{{ route('product') }}" class="inline-block text-white hover:text-pink">{{ $item->title }}</a>

        <div>{{ $item->price }}₽</div>
    @auth()
        @if(auth()->user()->role == 'продавец')
            <form method="post" action="{{ route('removeProduct', $item->id) }}">
                @csrf
                <button type="submit" class="btn btn-success">Удалить товар</button>
            </form>

                <button
                    onclick="window.location.href = '{{ route('editProduct', $item->id) }}'"
                    type="button"
                    class="btn btn-warning">
                    Редактировать товар
                </button>
        @endif
    @endauth
    </h3>
</div>
</div>



