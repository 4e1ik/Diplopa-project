<?php


namespace App\Http\Helpers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CordinatsHelper
{
    public function __construct($places)
    {
        $this->places = $places;
    }

    public function getCordinats()
    {
        $good_places_array=[];
        foreach ($this->places as $place) {
            $response = Http::get('https://geocode-maps.yandex.ru/1.x/?apikey=c12c269b-9fc8-41b7-871a-8864673cb03e&format=json&geocode=' . urlencode($place->address));
            $coordinates = json_decode($response, 'associative')['response']['GeoObjectCollection']['featureMember']['0']['GeoObject']['Point']['pos'];
            $bad_coordinates_array = explode(' ', $coordinates);
            $good_array = array_reverse($bad_coordinates_array);
            $good_array['title']=$place->title;
            $good_array['content']=$place->content;
            $good_array['address']=$place->address;
            $good_array['place']=$place->place;
            $img_array=[];
            foreach ($place->images as $image){
                $img_array[]=$image->image;
            }
            $good_array['images']=$img_array;
            $good_places_array[] = $good_array;
        }
        return $good_places_array;
    }
}
