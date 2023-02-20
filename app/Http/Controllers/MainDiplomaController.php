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
//        dd(phpinfo());

//        $good_cord_arr=[];
//        $img_array=[];
//        $all_user_addresses = Post::where('active', 1)->get();
//        foreach ($all_user_addresses as $address){
//            $response = Http::get('https://geocode-maps.yandex.ru/1.x/?apikey=c12c269b-9fc8-41b7-871a-8864673cb03e&format=json&geocode=' . urlencode($address->address));
//            $cord = json_decode($response, 'associative')['response']['GeoObjectCollection']['featureMember']['0']['GeoObject']['Point']['pos'];
//            $bad_cord_array = explode(' ', $cord);
//            $good_arr = array_reverse($bad_cord_array);
//            $good_arr[]=$address->title;
//            $good_arr[]=$address->content;
//            $good_arr[]=$address->address;
//            $good_arr[]=$address->place;
//            foreach ($address->images as $image){
//                $img_array[]=$image->image;
//            }
//            $good_arr[]=$img_array;
//            $good_cord_arr[]=$good_arr;
//        }
//
//        dd($good_cord_arr);

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
        $all_user_addresses = Post::where('active', 1)->get();
        $places = new CordinatsHelper($all_user_addresses);
        return $places->getCordinats();
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
