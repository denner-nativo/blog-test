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
                <div class="row justify-content-end">
                    <div class="col-4">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination" id="paginator">

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="modalEditBlog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit user</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="blogForm" class="w-100">
                        <input style="margin-bottom: 25px;" class="form-control w-100" type="text"
                            placeholder="Title" id="blogTitle">
                        <div class="form-floating" style="margin-bottom: 25px;">
                            <textarea id="descriptionBlog" class="form-control" style="height: 100px;" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Description</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Update blog</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('js/pages/blogs.js') }}"></script>
@endsection
