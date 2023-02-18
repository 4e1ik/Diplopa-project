<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Helpers\CordinatsHelper;
use Illuminate\Support\Facades\Http;

class MainDiplomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
//        $address = 'Москва, Тверская, д.7';
//        $address = 'Минск, Жудро, д.6';
//        $address = 'Гродно, ул.Фомичёво, д.8';
//        $address = 'Минск, Жудро, д.22';
//        $response = Http::get('https://geocode-maps.yandex.ru/1.x/?apikey=c12c269b-9fc8-41b7-871a-8864673cb03e&format=json&geocode=' . urlencode($address));
//        $a = [53.90988484530737, 27.48204069752266];
//        $cord = new CordinatsHelper($response->collect()->keyBy('response')['']['GeoObjectCollection']['featureMember']['0']['GeoObject']['Point']['pos']);
//        $cord = new CordinatsHelper(json_decode($response, 'associative')['response']['GeoObjectCollection']['featureMember']['0']['GeoObject']['Point']['pos']);
//        flatten
//        keyBy
//        dd($response->collect());
//        implode(', ',array_reverse(explode(' ', $this->response))
//        $array = explode(' ', $cord->getCordinats());
//        dd($array);
//        $new_arr = [];
//        foreach ($array as $elem){
//            $new_arr[]= (float)$elem;
//        }
//        $cords = [$new_arr['0'], $new_arr['1']];
//        dd($cords);
//        dd(implode(',',array_reverse(explode(' ', $a))));


        $addresses = Post::where('active', 1)->get();
        $good_cord_arr=[];
        foreach ($addresses as $address){
            $response = Http::get('https://geocode-maps.yandex.ru/1.x/?apikey=c12c269b-9fc8-41b7-871a-8864673cb03e&format=json&geocode=' . urlencode($address->address));
            $cord = json_decode($response, 'associative')['response']['GeoObjectCollection']['featureMember']['0']['GeoObject']['Point']['pos'];
            $bad_cord_array = explode(' ', $cord);
            $good_cord_arr[]=array_reverse($bad_cord_array);
        }
//        dd($good_cord_arr);
//        if (\Illuminate\Support\Facades\Route::currentRouteName() == 'account'){
//            dd(1);
//        } else {
//            dd(0);
//        }
//        $addresses = Post::where('user_id', Auth::id())->where('active', 1)->get();
//        dd($addresses);
        return view('diploma.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
//     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

//        $address = 'Гродно, ул.Фомичёво, д.8';
//        $response = Http::get('https://geocode-maps.yandex.ru/1.x/?apikey=c12c269b-9fc8-41b7-871a-8864673cb03e&format=json&geocode=' . urlencode($address));
//        $cord = new CordinatsHelper(json_decode($response, 'associative')['response']['GeoObjectCollection']['featureMember']['0']['GeoObject']['Point']['pos']);
//        return $cord->getCordinats();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

    }
}
