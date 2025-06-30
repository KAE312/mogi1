@extends('layouts.app')

@section('content')
<div class="verify-body">
    <div class="verify-container">
        <p class="verify-message">
            登録していただいたメールアドレスに認証メールを送付しました。<br>
            メール認証を完了してください。
        </p>

        <div class="verify-button-wrapper">
            <form method="POST" action="{{ route('verification.notice') }}">
                @csrf
                <button type="submit" class="verify-button">認証はこちらから</button>
            </form>
        </div>

        <div class="verify-resend-link">
            <a href="{{ route('verification.send') }}">認証メールを再送する</a>
        </div>
    </div>
</div>
@endsection
