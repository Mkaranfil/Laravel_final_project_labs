@extends('templates/main')
@section('content')
    @include('frontend/partials/header')
    @include('frontend/partials/allBlog/blogPost/article')
    
    @include('frontend/partials/newsLetter')
    
@endsection