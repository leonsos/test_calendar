@extends('layouts.app')
@section('scripts')
   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
@endsection
@section('content')
    <div class="container">
        <div id="calendar"></div>
    </div>
    <!-- Button trigger modal -->
    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#event">
        Launch demo modal
    </button>   --}}
    <!-- Modal -->
    <div class="modal fade" id="event" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Datos del evento</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="formEvents">
                    {!!csrf_field()!!}
                    <div class="mb-3 d-none">
                        <label for="id" class="form-label">id</label>
                        <input type="text" class="form-control" id="id" placeholder="id" name="id">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">title</label>
                        <input type="text" class="form-control" id="title" placeholder="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="description" required>
                    </div>
                    <div class="mb-3">
                        <label for="start" class="form-label">start</label>
                        <input type="date" class="form-control" id="start" name="start" placeholder="description" required>
                    </div>
                    <div class="mb-3">
                        <label for="end" class="form-label">End</label>
                        <input type="date" class="form-control" id="end" name="end" placeholder="description" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" id="edit">Edit</button>
                <button type="button" class="btn btn-danger" id="delete">Delete</button>
                <button type="button" class="btn btn-info" id="save">Save</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
@endsection