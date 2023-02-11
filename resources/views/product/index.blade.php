@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5">
                @if(session('info'))
                    <div class="alert alert-info">
                        {{ session("info")}}
                    </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session("error")}}
                </div>
                @endif

                <h1 class="display-one m-5">PHP Laravel Project - CRUD</h1>
                @auth
                    <div class="text-left">
                        <a href="product/add" class="btn btn-outline-primary">Add new product</a>
                    </div>
                @endauth

                <table class="table mt-3 text-left">
                    <thead>
                        <tr>
                            <th scope="col">Product Title</th>
                            <th scope="col" class="pr-5">Price(USD)</th>
                            <th scope="col">Short Notes</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse( $products as $product )
                            <tr>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->short_notes }}</td>
                                <td>{{ $product->user->name }}</td>
                                <td>
                                    <a href="{{ url("/product/edit/$product->id") }}"class="btn btn-outline-primary">Edit</a>
                                    <button type="button" class="btn btn-outline-danger ml-1" onclick='showModel({{ $product->id }})'>Delete</button>
                                </td >
					        </tr>
					        @empty
					        <tr>
						        <td colspan="3">No products found</td>
					        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteConfirmationModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">Are you sure to delete this record?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" onClick="dismissModel()">Cancel</button>
                    <form id="delete-form" class="" action="" method="POST">
                        @csrf
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showModel(id) {
            var formDelete = document.getElementById("delete-form");
            formDelete.action = 'product/delete/'+id;
            var confirmationModal = document.getElementById("deleteConfirmationModel");
            confirmationModal.style.display = 'block';
            confirmationModal.classList.remove('fade');
            confirmationModal.classList.add('show');
        }

        function dismissModel() {
            var confirmationModal = document.getElementById("deleteConfirmationModel");
            confirmationModal.style.display = 'none';
            confirmationModal.classList.remove('show');
            confirmationModal.classList.add('fade');
        }
        </script>

@endsection
