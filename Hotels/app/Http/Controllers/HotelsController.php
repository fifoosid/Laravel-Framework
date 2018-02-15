<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Hotel;
use App\Mail\newHotel;

class HotelsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('create');
    }

    public function index()
    {
        return view('layouts.welcome');
    }

    public function all(Request $request)
    {
        $hotels = Hotel::orderBy('created_at', 'desc')->paginate(10);
        
        $places = Hotel::randomPlaces();//setting $places to array of arrays


        $price = 'default';
        $stars = 'default';
        $place = 'default';

        return view('hotel.hotels', compact(['hotels', 'place', 'places', 'price', 'stars']));
    }

    public function create()
    {
        $user = \Auth::user();
        
        if($user->profile_type != 'sell')
        {
            return view('layouts.mustBeSellAccount');
        }
        else
        {
            return view('hotel.create');
        }
    }

    public function random()
    {
        $from = Hotel::whereRaw('id = (select min(id) from hotels)')->get()[0]->id;//gets the minimum id of the hotels in db
        $to = Hotel::whereRaw('id = (select max(id) from hotels)')->get()[0]->id;//gets the maximum id of the hotels in db
        
        $randomHotel = Hotel::find(rand($from, $to));

        return redirect('hotels/'.$randomHotel->id);
    }

    public function search()
    {
        $hotels = new Hotel;
        $hotels = $hotels->newQuery();
        $places = Hotel::randomPlaces();//setting $places to array of arrays

        $price = Input::get('price');
        $stars = Input::get('stars');
        $place = Input::get('place');
        // dd($price . " " .$stars . " " .$place);

        if($price === 'default' && $stars === 'default' && $place === 'default') {//Check if not fake request(with no set parameters)
            return redirect()->route('allHotels');
        }

        if($price != 'default'){
            $hotels->where('price', '<', $price);
        }

        if($stars != 'default'){
            $hotels->where('stars', '=', $stars);
        }

        if($place != 'default'){
            $hotels->where('location', '=', $place);
        }
        
        $hotels = $hotels->paginate(10);//Get all the events matching the criteria

        return view('hotel.hotels', compact(['hotels', 'places', 'price', 'stars', 'place']));
    }

    public function show(Hotel $hotel)
    {
        $comments = $hotel->comments;
        return view('hotel.hotel', compact(['hotel', 'comments']));
    }

    public function store(Request $request)
    {
        $user = \Auth::user();

        $request->validate([
            'name' => 'required|min:3',
            'stars' => 'required',
            'location' => 'required',
            'owner' => 'required',
            'description' => 'required',
            'price' => 'required',
            'imageurl' => 'required|active_url',
        ]);

        $hotel = new Hotel;

        $hotel->name = $request->input('name');
        $hotel->stars = $request->input('stars');
        $hotel->location = $request->input('location');
        $hotel->owner = $request->input('owner');
        $hotel->description = $request->input('description');
        $hotel->price = $request->input('price');
        $hotel->imageurl = $request->input('imageurl');

        $hotel->save();

        \Mail::to($user)->send(new newHotel($user));


        return redirect('/');
    }
}
