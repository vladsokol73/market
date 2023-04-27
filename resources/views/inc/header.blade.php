
<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg
                    class="bi me-2"
                    width="40"
                    height="32"
                    role="img"
                    aria-label="Bootstrap">
                    <use xlink:href="#bootstrap">
                    </use>
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route("home") }}" class="nav-link px-2 text-secondary">Главная</a></li>
                @auth()
                @if(auth()->user()->role == "покупатель")
                <li><a href="{{ route('catalog') }}" class="nav-link px-2 text-white">Каталог товаров</a></li>
                @else
                    <li><a href="{{ route('sellerCatalog') }}" class="nav-link px-2 text-white">Просмотр товаров</a></li>
                @endif
                @endauth
                @guest()
                    <li><a href="{{ route('catalog') }}" class="nav-link px-2 text-white">Каталог товаров</a></li>
                @endguest
            </ul>

            <div class="header-actions flex items-center gap-3 md:gap-5">
                @auth()
                    @if(auth()->user()->role == "покупатель")
                    <button
                        onclick="window.location.href = '{{ route('basket') }}'"
                        type="button"
                        class="btn btn-warning">
                        Корзина
                    </button>

                    <button
                        onclick="window.location.href = '{{ route('userOrders') }}'"
                        type="button"
                        class="btn btn-outline-light me-2">
                        Профиль
                    </button>
                    @else
                        <button
                            onclick="window.location.href = '{{ route('sellerProfile') }}'"
                            type="button"
                            class="btn btn-outline-light me-2">
                            Профиль
                        </button>
                    @endif
                    <form method="post" action="{{ route("logout") }}" class="button-logout">
                        @csrf

                    <button type="submit" class="btn btn-outline-light me-2">
                        Выйти
                    </button>
                    </form>
                @elseguest()
                    <div class="text-end">
                        <button
                            onclick="window.location.href = '{{ route("login") }}'"
                            type="button"
                            class="btn btn-outline-light me-2">
                            Авторизация
                        </button>
                        <button
                            onclick="window.location.href = '{{route("register")}}'"
                            type="button"
                            class="btn btn-warning">
                            Регистрация
                        </button>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</header>
