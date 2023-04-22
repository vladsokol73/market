<body>
        <div class="col-md-4">
            <div class="product">
                <div class="image">
                    <a href="{{ route('product', $item) }}">
                        <img src="{{ $item->image }}" width="400" alt="{{ $item->title }}">
                    </a>
                </div>

                <div class="info">
                    <h3>{{ $item->title }}</h3>

                    <div class="info-price">
                    <span class="price">{{ $item->price }} <small>₽</small></span>
                        <form action="{{ route('basketAdd', ['id' => $item->id]) }}"
                              method="post" class="form-inline">
                            @csrf
                        <button type="submit" class="add-to-cart"><ion-icon name="cart-outline"></ion-icon></button>
                        </form>
                    </div>
                </div>
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
            </div>
        </div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
