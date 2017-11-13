@extends('layouts.layout')
@section('content')
    <div class="flex">
        <div>
            <h1 class="margin-bottom-big">Hotel {{ $hotel->name }}</h1>
            <div class="margin-bottom-big">
                @for($i = 0; $i < $hotel->stars; $i++)
                    <i class="fa fa-star fa-3x"></i>
                @endfor
            </div>
            <h3>Owner: {{ $hotel->owner }}</h3>
        </div>

        <div class="image-wrapper big flex">
            <img src="{{ $hotel->imageurl }}" alt="{{ $hotel->name }}">
        </div>
    </div>
    
    <hr>

    <p class="paragraph margin-bottom">
        <b>Location:</b> <br>
        <p class="paragraph margin-bottom-big">
            {{ $hotel->location }} 
        </p>
    </p>
    
    <p class="paragraph margin-bottom text-description">
        <b>Description:</b> <br>
        <p class="paragraph margin-bottom-big">    
            {{ $hotel->description }}
        </p>
    </p>
    
    <p class="paragraph margin-bottom">
        <b>Price for one night per person:</b> <br>
        <p class="paragraph margin-bottom-big">
            {{ $hotel->price }}$        
        </p>
    </p>
    <hr>

    <div class="container-fluid">
        <h2>Comments:</h2>
        <br>

        @foreach($comments as $comment)
            @include('layouts.comments')
        @endforeach

        @if(Auth::check())
            <form method="POST" action="/comment">
                <div class="form-group">
                    <div class="flex align-items">
                        <label for="body">Comment:</label>
                        <textarea class="margin-left" name="body" cols="40" rows="2"></textarea>
                        
                        <button class="btn default margin-left">Submit Comment</button>

                        {{ csrf_field() }}
                    </div>
                    
                </div>

            </form>
            @else
            <p>Only logged in users can leave comments.</p>
            @endif

    </div>



@endsection