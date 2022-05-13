@extends('pages.layout')

@section('content')
    <ul id="info"></ul>
    <button type="button" id="editProfile" class="btn btn-primary"
    data-bs-toggle="modal" data-bs-target="#modalEdit">Edit my profile</button>


    <div class="modal" tabindex="-1" id="modalEdit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit user</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="registerForm" class="w-100">
                        <input class="form-control w-100" id="name" type="text" placeholder="Name">
                        <input class="form-control w-100" id="lastname" type="text" placeholder="Lastname">
                        <input class="form-control w-100" id="email" type="email" placeholder="Email">
                        <button type="submit" class="btn btn-primary w-100">Save</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('js/pages/dashboard.js') }}"></script>
@endsection
