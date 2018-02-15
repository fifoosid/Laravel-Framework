<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use Searchable;


    //returns array of arrays
    public static function randomPlaces()
    {
        $randomLength = 5;//How many different locations to get

        //Definetely not optimized
        $flag = true;

        //Get the number of records in DB:
        $maximum = Hotel::count();
        $randomNumber = rand(1, $maximum);
        //Trying to escape FIND RAND, because it is slow
        //Old:
        // $places[0] = Hotel::orderByRaw('RAND()')->take(1)->get();
        //New:
        $places[0] = Hotel::find($randomNumber);
        $places[0] = $places[0]->location;

        while(count($places) < $randomLength) {
            // $tempPlace = Hotel::orderByRaw('RAND()')->take(1)->get();
            $randomNumber = rand(1, $maximum);    
            $tempPlace = Hotel::find($randomNumber);
            $tempPlace = $tempPlace->location;


            $flag = true;
            
            for($j = 0; $j < count($places); $j++){
                if($places[$j] === $tempPlace){
                    $flag = false;
                }
            }

            if($flag) $places[count($places)] = $tempPlace;
            else continue;
        }

        return $places;
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
