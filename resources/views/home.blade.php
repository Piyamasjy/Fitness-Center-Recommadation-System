@extends('layouts.app')
<!DOCTYPE html>
<html>
<head>
  <title>Fitness Center Mapping</title>
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <!--<script src="http://maps.google.com/maps/api/js?sensor=false"></script> -->
  <script src="{{asset('js/gmaps.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>

</head>

@section('content')
    <div class="col-md-2">
      <h3>Search Location</h3>
      <form action="/layouts/index3" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="q"
                    placeholder="Search...."> <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
      <p>col2</p>
      <p>col2</p>
      <p>col2</p>
      <p>col2</p>
      <p>col2</p>
      <p>col2</p>
      <p>col2</p>
      <p>col2</p>
      <p>col2</p>
      <p>col2</p>

    </div>
    <div class="col-md-9">
       <div id="map"></div>
    </div>

 
<script type="text/javascript">


    var map;
    $(document).ready(function()
    {
      var map = new GMaps({
        el: '#map',
        lat: 18.7060641,
        lng: 98.9817163000000,
        zoom: 14//Chiang Mai
      });

      GMaps.geolocate({
        success: function(position){
          map.setCenter(position.coords.latitude, position.coords.longitude);
          map.addMarker({
                  lat: position.coords.latitude,
                  lng: position.coords.longitude,
                  animation: google.maps.Animation.BOUNCE,
                  title: 'You location !!',
                  // click: function(e) {
                  //   alert('You clicked in this marker');
                  // },
                  infoWindow: {
                      content: '<p>You are here!</p>'
                    },
                  icon: '{{asset("icons/pin_blue.png")}}'
            });
         //  $.each( Fitness, function( index, value ){
         //    map.addMarker({
         //      lat: value.lat,
         //      lng: value.lng,
         //      // click: function(e) {
         //      //   alert('This is '+value.title+', Fitness from Chiang Mai.');
         //      // },
         //      title: value.fitness_ename,
         //      infoWindow: {
         //              content: '<p><b>'+value.fitness_ename+'</b></p>'
         //            }
         //    });
         // });
        //   $('#geocoding_form').submit(function(e){
        //   e.preventDefault();
        //   GMaps.geocode({
        //     address: $('#address').val().trim(),
        //     callback: function(results, status){
        //       if(status=='OK'){
        //         var latlng = results[0].geometry.location;
        //         map.setCenter(latlng.lat(), latlng.lng());
        //         map.addMarker({
        //           lat: latlng.lat(),
        //           lng: latlng.lng(),
        //           draggable: true,
        //            icon: '{{asset("icons/pin_green.png")}}'
        //         });
        //       }
        //     }
        //   });
        // });
        },
        error: function(error){
          alert('Geolocation failed: '+error.message);
        },
        not_supported: function(){
          alert("Your browser does not support geolocation");
        },
        always: function(){
          alert("Go to current location is Done!!!!");
        }
      });

    });

    
   
   
  
</script>

@endsection
