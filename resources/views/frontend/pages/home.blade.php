@extends('templates/main')

@section('content')
    @include('frontend/partials/home/pHS1')
    <div class="about-section">
        @include('frontend/partials/home/pHS2')
        @include('frontend/partials/home/pHS3')
    </div>
    @include('frontend/partials/home/pHS4')
    @include('frontend/partials/home/pHS5')
    @include('frontend/partials/home/pHS6')
    @include('frontend/partials/contact')
@endsection