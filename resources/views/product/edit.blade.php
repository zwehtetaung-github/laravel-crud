@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @if(session("info"))
                    <div class="alert alert-info">
                        {{ session("info")}}
                    </div>
            @endif

            @if(session("error"))
                <div class="alert alert-danger">
                    {{ session("error")}}
                </div>
            @endif

            <div class="text-left"><a href="/product" class="btn btn-outline-primary">Product List</a></div>

                <form action="{{ url("/product/edit/$product->id") }}" method="post" id="add-form" class="border p-3 mt-2">
                    @csrf
                    <div class="control-group col-6 text-left">
                        <label for="title">Title</label>
                        <div>
                            <input type="text" id="title" class="form-control mb-4" value="{{ $product->title}}" name="title" placeholder="Enter Title" required>
                        </div>
                    </div>

                    <div class="control-group col-6 text-left">
                        <label for="body">Short Notes</label>
                        <div>
                            <textarea type="text" id="short_notes" class="form-control mb-4" name="short_notes" placeholder="Enter Short Notes" rows="" required>{{ $product->short_notes}}</textarea>
                        </div>
                    </div>

                    <div class="control-group col-6 text-left">
                        <label for="body">Price</label>
                        <div>
                            <input type="text" id="price" class="form-control mb-4" value="{{ $product->price}}" name="price" placeholder="Enter Price" required>
                        </div>
                    </div>

                    <div class="control-group col-6 text-left mt-2"><button class="btn btn-primary">Add New</button></div>
                </form>
        </div>
    </div>
@endsection
