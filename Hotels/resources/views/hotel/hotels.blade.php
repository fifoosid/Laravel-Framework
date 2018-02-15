@extends('layouts.layout')
@section('content')
    <h1>All Hotels</h1>
    <hr>
        <form method="GET" action="/hotels/search">
    <div class="flex-wrap filter-div">
            <div class="margin-auto">
                <div class="form-group">
                    <label for="sel1">Select By Stars:</label>
                    <select class="form-control" name="stars" value="Choose stars..">
                    <option value="default" selected>Choose</option>                        
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>

            <div class="margin-auto">
                <div class="form-group">
                <label for="sel1">Select By Price Per Night (up to):</label>
                <select class="form-control" name="price">
                    <option value="default" selected>Choose</option>                 
                    <option>40</option>
                    <option>70</option>
                    <option>100</option>
                    <option>200</option>
                    <option>500</option>                    
                </select>
                </div>
            </div>

            <div class="margin-auto">
                <div class="margin-bottom">
                    <div class="form-group">
                    <label for="place">Find a random place to visit</label>
                    <select class="form-control" name="place">
                        <option value="default" selected>Choose</option>                                  
                        @foreach($places as $temp)
                            <option>{{$temp}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-basic filters-button ">Apply filters</button>
            <a class="margin-auto" id="show-all-button" href="/hotels/all">
                <button type="submit" class="btn btn-basic">Clear filters</button>
            </a>
    </div>

            {{ csrf_field() }}
        </form>


    <hr>
    
    @if($price != 'default' || $stars != 'default' || $place != 'default')
        <div class="filters">
            <h3>Here are listed hotels matching the following criteria:</h3>
            <ul class="list-group">
                @if($price != 'default')
                    <li class="list-group-item item">Price(up to): {{ $price}}$</li>
                @endif
                @if($stars != 'default')
                    <li class="list-group-item">Stars: {{ $stars }}</li>
                @endif
                @if($place != 'default')
                    <li class="list-group-item item">Location: {{ $place }}</li>
                @endif
            </ul>
        </div>
        <hr>
    @endif


    <div class="container">
        @foreach($hotels as $hotel)
            <div class="margin-bottom">
                @include('hotel.hotel-thumbnail')
            </div>
        @endforeach
    </div>

    <div class="container-fluid">{{ $hotels->appends(Request::except('page'))->links()}}</div>

@endsection