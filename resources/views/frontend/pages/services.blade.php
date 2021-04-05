@extends('templates/main')

@section('content')
    @include('frontend/partials/header')
    @include('frontend/partials/services/pSS1')
    @include('frontend/partials/services/pSS2')
    @include('frontend/partials/services/pSS3')
    @include('frontend/partials/newsLetter')
    @include('frontend/partials/contact')
    
@endsection