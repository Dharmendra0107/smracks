@extends('admin.layout')

@section('title', 'Edit Product')

@section('content')
<div class="admin-card">
  <form method="POST" action="{{ route('admin.products.update', $product) }}">
    @csrf
    @method('PUT')
    @include('admin.products._form')
  </form>
</div>
@endsection