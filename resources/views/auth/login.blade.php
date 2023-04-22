@extends("layouts.auth")
@section("title", "Авторизация")

@section("content")
    <div class="form-wrap">
        <link rel="stylesheet" href="/css/register.css">
        <div class="profile">
            <h1>Авторизация</h1>
        </div>

        <form class="space-y-3" method="post" action="{{ route("loginSubmit") }}">
            @csrf

            <label for="email">Ваша почта</label>
            <div class="form-group">
                <x-forms.text-input
                    name="email"
                    type="email"
                    required="true"
                    value="{{ old('email') }}"
                    :isError="$errors->has('email')"/>
            </div>

            @error("email")
            <x-forms.error>
                {{ $message }}
            </x-forms.error>
            @enderror

            <label for="email">Пароль</label>
            <div class="form-group">
                <x-forms.text-input
                    type="password"
                    name="password"
                    required="true"
                    :isError="$errors->has('email')"/>
            </div>

            @error("password")
            <x-forms.error>
                {{ $message }}
            </x-forms.error>
            @enderror

            <x-forms.primary-button>Войти</x-forms.primary-button>
        </form>
    </div>
    <div class="text-xxs md:text-xs">
        <a href="{{ route("register") }}" class="text-white hover:text-white/70 font-bold">Регистрация</a>
    </div>

@endsection

