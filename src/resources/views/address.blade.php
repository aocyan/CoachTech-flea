@extends('layouts.app')

@section('css')
	<link rel="stylesheet" href="{{ asset('css/address.css') }}">
@endsection

@section('content')

<nav>
    <div class="header-nav">
        <div class="nav__search">
            <input class="nav__search--text" type="text" name="search" placeholder="なにをお探しですか？" />
        </div>
        <form class="form-log" action="/logout" method="post">
        @csrf
            <button class="logout-link">ログアウト</button>         
        </form>
        <a class="mypage-link" href="/mypage">マイページ</a>
        <a class="sell-link" href="/sell">出品</a>
    </div>
</nav>      
<div class="profile-header">
    <div class="profile-header__logo">
        <h2>住所の変更</h2>
    </div>
</div>
<form class="register-form" action=" method="">
@csrf
    <div class="form__group">
        <div class="form__group-title">
            <p>郵便番号</p>
        </div>
        <input class="form__input" type="text" name="postal-number" value="{{ old('email') }}"/>
        <div class="form__error">
            @error('postal-number')
                {{ $message }}
            @enderror
        </div>
        <div class="form__group-title">
            <p>住所</p>
        </div>
        <input class="form__input" type="address" name="address"/>
        <div class="form__error">
            @error('password')
                {{ $message }}
            @enderror
        </div>
        <div class="form__group-title">
            <p>建物名</p>
        </div>
        <input class="form__input" type="text" name="building"/>
        <div class="form__error">
            @error('password')
                {{ $message }}
            @enderror
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit" name="update" value="update">更新する</button>
        </div>
    </div>
</form>

@endsection