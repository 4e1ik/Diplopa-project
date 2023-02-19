<?php


namespace App\Http\Helpers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CordinatsHelper
{
    public function __construct($addresses)
    {
        $this->addresses = $addresses;
    }

    public function getCordinats()
    {
        $good_cord_arr=[];
        foreach ($this->addresses as $address){
            $response = Http::get('https://geocode-maps.yandex.ru/1.x/?apikey=c12c269b-9fc8-41b7-871a-8864673cb03e&format=json&geocode=' . urlencode($address->address));
            $cord = json_decode($response, 'associative')['response']['GeoObjectCollection']['featureMember']['0']['GeoObject']['Point']['pos'];
            $bad_cord_array = explode(' ', $cord);
            $good_cord_arr[]=array_reverse($bad_cord_array);
        }

        return $good_cord_arr;
    }
}
