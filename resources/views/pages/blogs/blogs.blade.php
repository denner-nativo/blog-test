@extends('pages.layout')

@section('content')
<div class="container">
    
    <div class="row">
        <div class="col-12 col-md-3">
            <a href="blogs/new" class="btn btn-primary">Add new blog</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            {{-- Template --}}
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-6" id="blogs-container">
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ url('js/pages/blogs.js') }}"></script>
@endsection