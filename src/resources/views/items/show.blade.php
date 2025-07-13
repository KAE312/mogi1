@extends('layouts.app')

@section('content')
< class="item-show-container">
    < class="item-show-left">
        <div class="item-image-box">
           {{-- 商品画像を表示 --}}
           @if($item->image_path)
                <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->name }}" />
            @else
                <p>商品画像がありません</p>
            @endif
        </div>

    <div class="item-show-right">
        <h2 class="item-title">{{$item->name }}</h2>
        <p class="brand-name">{{ $item->brand_name ?? 'ブランド名なし' }}</p>
        <p class="item-price">¥{{ number_format($item->price) }} <span class="tax-in">(税込)</span></p>

        <div class="favorite-box">
            <span>☆</span>
            <span class="favorite-count">{{ $item->favorite_count ?? 0 }}</span>
            <span>💬</span>
            <span class="comment-count">{{ $item->comment_count ?? 0 }}</span>
        </div>

        <button class="buy-button">購入手続きへ</button>

        <div class="item-description">
            <h3>商品説明</h3>
            <p>カラー：{{ $item->color ?? '未設定' }}</p>
            <p>{!! nl2br(e($item->condition ?? '商品の状態は未設定です。')) !!}</p>
            <p>購入後、即発送いたします。</p>
        </div>

        <div class="item-info">
            <h3>商品の情報</h3>
            <p>カテゴリー
            @foreach($item->categories ?? [] as $category)
                    <span class="tag">{{ $category->name }}</span>
                @endforeach
            </p>
            <p>商品の状態 {{ $item->condition ?? '未設定' }}</p>
        </div>

        <div class="comment-section">
            <h3>コメント ({{ $item->comments->count() ?? 0 }})</h3>
            <div class="comment">
                <div class="avatar"></div>
                <div class="comment-body">
                    <p class="username">{{ $comment->user->name ?? '匿名' }}</p>
                    <p class="comment-text">{{ $comment->content }}</p>
                </div>
            </div>
        </div>

        <div class="comment-form">
            <h4>商品へのコメント</h4>
            <form method="POST" action="{{ route('comments.store', $item->id) }}">
                @csrf
                <textarea name="comment" rows="4">{{ old('comment') }}</textarea>
                <button type="submit" class="send-comment">コメントを送信する</button>
            </form>
        </div>
    </div>
</div>
@endsection
