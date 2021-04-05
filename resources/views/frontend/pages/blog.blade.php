@extends('templates/main')
@section('content')
    @include('frontend/partials/header')
<div class="page-section spad">
    <div class="container">
        <div class="row">
            @include('frontend/partials/blog/pBS1')
            @include('frontend/partials/blog/pBS2')
        </div>
    </div>
</div>
    @include('frontend/partials/newsLetter')
    
@endsection