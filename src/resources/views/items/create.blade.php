@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endpush

@section('content')
<div class="container">
    <h2 class="title">商品の出品</h2>

    <form method="POST" action="{{ route('items.store') }}" enctype="multipart/form-data">
    @csrf

    {{-- 商品画像 --}}
    <div class="form-section">
        <label class="section-title">商品画像</label>
        <div class="image-upload-box">
            <input type="file" name="image" id="image" hidden>
            <label for="image" class="image-label">画像を選択する</label>
        </div>
    </div>

    {{-- 商品の詳細 --}}
    <div class="form-section">
        <label class="section-title">商品の詳細</label>
        <div class="category-box">
            @foreach ($categories as $category)
                <span class="category-tag">{{ $category->name }}</span>
            @endforeach
        </div>
    </div>

    {{-- 商品の状態 --}}
    <div class="form-section">
        <label class="section-title">商品の状態</label>
        <select name="condition_name" class="input-select">
            <option value="">選択してください</option>
            @foreach ($conditions as $condition)
                <option value="{{ $condition->name }}">{{ $condition->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- 商品名・説明 --}}
    <div class="form-section">
        <label class="section-title">商品名と説明</label>

        <input type="text" name="name" placeholder="商品名" class="input-text">
        <input type="text" name="brand" placeholder="ブランド名" class="input-text">
        <textarea name="description" class="input-textarea" placeholder="商品の説明"></textarea>
        <input type="text" name="price" placeholder="¥" class="input-text">
    </div>

    <button type="submit" class="submit-button">出品する</button>
</div>
@endsection
