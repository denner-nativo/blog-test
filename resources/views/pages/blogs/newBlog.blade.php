@extends('pages.layout')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-12 col-md-2">
                <a href="/blogs" class="btn btn-primary w-100">Go back</a>
            </div>
            <div class="col-12" style="margin-top: 50px;">
                <h3>New blog</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                {{-- Template --}}
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 col-lg-6" id="blogs-container">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <form id="blogForm" class="w-100">
                                    <input style="margin-bottom: 25px;" class="form-control w-100" type="text"
                                        placeholder="Title" id="blogTitle">
                                    <div class="form-floating" style="margin-bottom: 25px;">
                                        <textarea id="descriptionBlog" class="form-control" style="height: 100px;" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                        <label for="floatingTextarea">Description</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Create blog</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('js/pages/newBlog.js') }}"></script>
@endsection
