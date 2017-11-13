@extends('layouts.layout')
@section('content')
    <h1>Create Hotel</h1>
    <hr>

    @include('layouts.errors')

    <form method="POST" action="/hotels">
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" >
        </div>

        <div class="form-group">
            <label for="stars">Stars</label>
            <select class="form-control" type="text" name="stars" selected="Choose">
            Stars
            <option value="0">Choose</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            </select>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input class="form-control" type="text" name="location" >
        </div>

        <div class="form-group">
            <label for="owner">Owner</label>
            <input class="form-control" type="text" name="owner" >
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" type="text" name="description" ></textarea>
        </div>

        <div class="form-group">
            <label for="price">Price per night</label>
            <input class="form-control" type="number" name="price" >
        </div>

        <div class="form-group">
            <label for="price">Image(Please enter valid URL)</label>
            <input class="form-control" type="text" name="imageurl" >
        </div>

        <div class="form-group">
            <button class="btn btn-warning" type="submit">Publish hotel</button>
        </div>

        {{ csrf_field() }}
    </form>
    
@endsection