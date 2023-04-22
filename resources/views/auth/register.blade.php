@extends("layouts.auth")
@section("title")
    Регистрация
@endsection
@section("content")
<div class="form-wrap">
    <link rel="stylesheet" href="/css/register.css">

    <div class="profile">
        <h1>Регистрация</h1>
    </div>

    <form method="post" action="{{ route("registerSubmit") }}">
        @csrf

        <div>
            <label for="name">Ваше имя</label>
            <x-forms.text-input
                name="name"
                type="text"
                required="true"
                value="{{ old('name') }}"
                :isError="$errors->has('email')"
            />
        </div>

        @error("name")
        <x-forms.error>
            {{ $message }}
        </x-forms.error>
        @enderror

        <div>
            <label for="email">Ваша почта</label>
            <x-forms.text-input
                name="email"
                type="email"
                required="true"
                value="{{ old('email') }}"
                :isError="$errors->has('email')"
            />
        </div>

        @error("email")
        <x-forms.error>
            {{ $message }}
        </x-forms.error>
        @enderror

        <div>
            <label for="password">Пароль</label>
            <x-forms.text-input
                type="password"
                name="password"
                required="true"
                :isError="$errors->has('password')"
            />
        </div>

        @error("password")
        <x-forms.error>
            {{ $message }}
        </x-forms.error>
        @enderror

        <div>
            <label for="password_confirmation">Повторите пароль</label>
            <x-forms.text-input
                type="password"
                name="password_confirmation"
                required="true"
                :isError="$errors->has('password_confirmation')"
            />
        </div>

        @error("password_confirmation")
        <x-forms.error>
            {{ $message }}
        </x-forms.error>
        @enderror

        <div class="radio">
            <span>Кто вы</span>
            <label>
                <input
                    type="radio"
                    name="role"
                    value="продавец"
                    required>продавец
                <div class="radio-control male"></div>
            </label>

            <label>
                <input type="radio" name="role" value="покупатель">покупатель
                <div class="radio-control female"></div>
            </label>
        </div>


        <x-forms.primary-button>Зарегаться</x-forms.primary-button>
    </form>
</div>

    <div class="text-xxs md:text-xs">
        <a href="{{ route("login") }}" class="text-white hover:text-white/70 font-bold">Войти в аккаунт</a>
    </div>
@endsection
