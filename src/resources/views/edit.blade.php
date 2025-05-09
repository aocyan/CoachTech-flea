@extends('layouts.app')

@section('css')
	<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
     
<div class="profile-header">
    <div class="profile-header__logo">
        <h2>プロフィール設定</h2>
    </div>
</div>
<form class="register-form" action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
@method('PUT')
@csrf
    <div class="form__group">
        <div class="form__image">
            @if ($profile->image)
                <img class="user__image" src="{{ asset('storage/users/' . basename($profile->image)) }}" alt="{{ $user->name }}" />
            @endif
            <label class="form__image--button" for="image-upload">画像を選択する</label>
            <input class="form__image--item" type="file" id="image-upload" name="image" accept="image/*" />
            <div class="form__error">
            @error('image')
                {{ $message }}
            @enderror
        </div>
        </div>
        <div class="form__group-title">
            <p>ユーザ名</p>
        </div>
        <input class="form__input" type="text" name="name" value="{{ old('name') ?? session('user_name') ?? $user->name }}" placeholder="※フルネームで入力してください" />
        <div class="form__error">
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <div class="form__group-title">
            <p>郵便番号</p>
        </div>
        <div class="postal__container">
            <span class="postal--mark">〒</span>
            <input class="form__input-postal" type="text" name="postal" value="{{ $profile->postal }}" placeholder="例：111-2222" />
        </div>
        <div class="form__error">
            @error('postal')
                {{ $message }}
            @enderror
        </div>
        <div class="form__group-title">
            <p>住所</p>
        </div>
        <input class="form__input" type="address" name="address" value="{{ $profile->address }}" placeholder="例：東京都千代田区千代田1-1" />
        <div class="form__error">
            @error('address')
                {{ $message }}
            @enderror
        </div>
        <div class="form__group-title">
            <p>建物名</p>
        </div>
        <input class="form__input" type="text" name="building" value="{{ $profile->building }}" placeholder="例：皇居マンション101号室" />
        <div class="form__error">
            @error('building')
                {{ $message }}
            @enderror
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit" name="update">更新する</button>
        </div>
    </div>
</form>

@endsection