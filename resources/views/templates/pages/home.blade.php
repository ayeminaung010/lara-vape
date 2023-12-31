@extends('templates.layouts.app')
@section('content')
    <main>
        @include('templates.sections.banner')
        @include('templates.sections.recommend-products')
        @include('templates.sections.product-type')
        @include('templates.sections.product-brand')
        @include('templates.sections.reviews')
        @include('templates.sections.subscribe')
    </main>
@endsection

