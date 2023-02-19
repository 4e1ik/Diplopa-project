@extends('layouts.diploma.diploma')
@section('content')
<div class="section-space80">
    <!-- top location -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title mb60 text-center">
                    <h1>Интересные и красивые места Беларуси</h1>
                    <p>На этой карте отображены места, где побывали пользователи нашего сайта и поделились с вами своими впечатлениями.</p>
                    <div id="map" class="map-test col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 location-block">
                <!-- location block -->
                <div class="vendor-image">
                    <a href="#"><img src="images/location-pic.jpg" alt="" class="img-responsive"></a> <a href="#" class="venue-lable"><span class="label label-default">New York City</span></a> </div>
            </div>
            <!-- /.location block -->
            <div class="col-md-4 location-block">
                <!-- location block -->
                <div class="vendor-image">
                    <a href="#"><img src="images/location-pic-2.jpg" alt="" class="img-responsive"></a> <a href="#" class="venue-lable"><span class="label label-default">Sydney</span></a> </div>
            </div>
            <!-- /.location block -->
            <div class="col-md-4 location-block">
                <!-- location block -->
                <div class="vendor-image">
                    <a href="#"><img src="images/location-pic-3.jpg" alt="" class="img-responsive"></a> <a href="#" class="venue-lable"><span class="label label-default">Russia</span></a> </div>
            </div>
            <!-- /.location block -->
            <div class="col-md-8 location-block">
                <!-- location block -->
                <div class="vendor-image">
                    <a href="#"><img src="images/location-pic-4.jpg" alt="" class="img-responsive"></a> <a href="#" class="venue-lable"><span class="label label-default">Germany</span></a> </div>
            </div>
            <!-- /.location block -->
            <div class="col-md-4 location-block">
                <!-- location block -->
                <div class="vendor-image">
                    <a href="#"><img src="images/location-pic-5.jpg" alt="" class="img-responsive"></a> <a href="#" class="venue-lable"><span class="label label-default">Paris</span></a> </div>
            </div>
            <!-- /.location block -->
        </div>
    </div>
</div>
@endsection
