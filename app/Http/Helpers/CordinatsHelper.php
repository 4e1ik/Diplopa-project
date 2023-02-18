<?php


namespace App\Http\Helpers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CordinatsHelper
{
//    protected $response;

//    public function __construct($response)
//    {
//        $this->response = $response;
//    }

    public function getCordinats()
    {
//        $addresses = Post::where('active', 1)->get();
//        $address_arr=[];
//        foreach ($addresses as $address){
//            $address->address;
//        }
//        $array = explode(' ', $this->response);
//        $new_arr = [];
//        foreach ($array as $elem){
//            $new_arr[]= (float)$elem;
//        }
//        if (Auth::user())

//        if (\Illuminate\Support\Facades\Route::currentRouteName() == 'account'){
//            $addresses = Post::where('user_id', Auth::id())->where('active', 1)->get();
//        } else {
//            $addresses = Post::where('active', 1)->get();
//        }

        $addresses = Post::where('active', 1)->get();
        $good_cord_arr=[];
        foreach ($addresses as $address){
            $response = Http::get('https://geocode-maps.yandex.ru/1.x/?apikey=c12c269b-9fc8-41b7-871a-8864673cb03e&format=json&geocode=' . urlencode($address->address));
            $cord = json_decode($response, 'associative')['response']['GeoObjectCollection']['featureMember']['0']['GeoObject']['Point']['pos'];
            $bad_cord_array = explode(' ', $cord);
            $good_cord_arr[]=array_reverse($bad_cord_array);
        }

        return $good_cord_arr;
    }

//    public function getUserCoordinats()
//    {
//        $addresses = Post::where('user_id', Auth::id())->where('active', 1)->get();
//        $good_cord_arr=[];
//        foreach ($addresses as $address){
//            $response = Http::get('https://geocode-maps.yandex.ru/1.x/?apikey=c12c269b-9fc8-41b7-871a-8864673cb03e&format=json&geocode=' . urlencode($address->address));
//            $cord = json_decode($response, 'associative')['response']['GeoObjectCollection']['featureMember']['0']['GeoObject']['Point']['pos'];
//            $bad_cord_array = explode(' ', $cord);
//            $good_cord_arr[]=array_reverse($bad_cord_array);
//        }
//
//        return $good_cord_arr;
//    }
}
