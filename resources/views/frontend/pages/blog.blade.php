@extends('templates/main')
@section('content')
    @include('frontend/partials/blog/pBS1')
<div class="page-section spad">
    <div class="container">
        <div class="row">
            @include('frontend/partials/blog/pBS2')
            @include('frontend/partials/blog/pBS3')
        </div>
    </div>
</div>
    @include('frontend/partials/newsLetter')
    
@endsection