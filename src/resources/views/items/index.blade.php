@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/items.css') }}">
@endsection

@section('content')
<div class="items-container">
    <div class="tab-menu">
        <div class="{{ $tab === 'recommend' ? 'active' : '' }}">
            <a href="{{ route('items.index', ['tab' => 'recommend']) }}">おすすめ</a>
        </div>
        <div class="{{ $tab === 'mylist' ? 'active' : '' }}">
            <a href="{{ route('items.index', ['tab' => 'mylist']) }}">マイリスト</a>
        </div>
    </div>

    <div class="item-list">
        @forelse ($items as $item)
            <div class="item-box">
                {{-- 商品画像 --}}
                <div class="item-image">
                    <img src="{{ $item->image_path }}" alt="{{ $item->name }}" width="150" height="150">
                </div>

                {{-- 商品名 --}}
                <div>{{ $item->name }}</div>

                {{-- 商品価格 --}}
                <div>¥{{ number_format($item->price) }}</div>

                {{-- 商品状態 --}}
                <div>{{ $item->condition ?? '状態未登録' }}</div>

                {{-- Sold表示 --}}
                @if ($item->is_sold)
                <div class="sold-label">Sold</div>
                @endif
            </div>
        @empty
        
        @endforelse
    </div>
</div>
@endsection
