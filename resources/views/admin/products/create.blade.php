@extends('admin.layout')

@section('title', 'Add Product')

@section('content')
<div class="admin-card">
  <form method="POST" action="{{ route('admin.products.store') }}">
    @csrf
    @include('admin.products._form')
  </form>
</div>
@endsection