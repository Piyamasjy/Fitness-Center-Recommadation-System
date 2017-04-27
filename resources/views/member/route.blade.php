@extends('layouts.app')

<html>
<head>
  <title>เเสดงเส้นทางการเดินทาง</title>
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
  {{-- <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"> --}}
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/bootstrap-select.css')}}">
 
  <script src="{{asset('js/jquery.min.js')}}"></script>
<!--   // <script src="http://maps.google.com/maps/api/js?sensor=set_to_true_or_false"></script> -->
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7YWOhxvvuzxTnhrqMHFJ4hCM9WG7ND-c"></script>
  <!--<script src="http://maps.google.com/maps/api/js?sensor=false"></script> -->
  <script src="{{asset('js/gmaps.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/bootbox.min.js')}}"></script>
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/bootstrap-select.js')}}"></script>

</head>
@section('content')
<body>
  <div class="col-md-12" style="height: auto;">
    <div class="col-md-3" style="height: auto;">
      <center><a href="/user/index" class="btn btn-info" role="button">กลับสู่หน้าหลัก</a>
          <button class="btn btn-info" role="button" data-toggle="modal" data-target="#myModal" >ดูรีวิว</button></center>
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h2 class="modal-title" id="myModalLabel" align="center">รีวิว</h2>
            </div>
            <div class="modal-body">
            <?php 
              $message = "";

           foreach ($fit_comment as $key ) {

            if($_GET["fitness"] == $key->fitness_tname)
            {
              // $message = $message."user : ".$key->user_id." rated : ".$key->rating." <br>";
              if($key->rating == 5)
              {
                $message = $message."ชื่อผู้ใช้ : ".$key->username."<img src='../images/five_star.png' width='150px' ><br>";
               
              }
              elseif ($key->rating == 4) 
              {
                $message = $message."ชื่อผู้ใช้ : ".$key->username."<img src='../images/four_star.png' width='150px' ><br>";
               
              }
              elseif ($key->rating == 3) 
              {
                $message = $message."ชื่อผู้ใช้ : ".$key->username."<img src='../images/three_star.png' width='150px' ><br>";
                
              }
              elseif ($key->rating == 2) 
              {
                $message = $message."ชื่อผู้ใช้ : ".$key->username."<img src='../images/two_star.png' width='150px' > <br>";
                
              }
              elseif ($key->rating == 1) 
              {
                $message = $message."ชื่อผู้ใช้ : ".$key->username."<img src='../images/one_star.png' width='150px' ><br>";
                
              }
              
            }
             
           }
           echo "$message";
           
            
          ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
            </div>
          </div>
        </div>
      </div>
      <hr style="margin-top: 15px; margin-bottom:3px; ">
      <?php 
        foreach ($fitness as $key ) 
        {
          if($_GET["fitness"] == $key->fitness_tname)
          {
            echo "<h5><img src='../icons/pin_A.png' >ตำเเหน่งปัจจุบันของคุณ 
            <img src='../icons/right-arrow-blue.png' width='20px' height='20px'>
            <img src='../icons/pin_B.png' >$key->fitness_tname</h5>";
           
          }
        }

      ?>
      <hr style="margin-top: 15px; margin-bottom:3px; ">
      
      <h3 align="center"><b>เเสดงเส้นทางการเดินทาง</b></h3>
      <div id="directions"></div>
       
    </div>
    <div class="col-md-9" style="height: auto;">
       <div id="map" style="height: 80%; width:115%;"><br></div>
    </div>
  </div>
 
<script type="text/javascript">
  var map;
  $(document).ready(function()
  {
      map = new GMaps
      ({
        el: '#map',
        lat: 18.789875,
        lng: 98.8847578
      });

      GMaps.geolocate
      ({
        success: function(position)
        {
          map.setCenter(position.coords.latitude, position.coords.longitude);
         //  map.addMarker
         //  ({
         //    lat: position.coords.latitude,
         //    lng: position.coords.longitude,
         //    animation: google.maps.Animation.BOUNCE,
         //    title: 'You location here!!',
         //    infoWindow: {
         //      content: '<p>You are here!</p>'
         //    },
         //    icon: '{{asset("icons/pin_blue.png")}}'
         // });
          map.renderRoute
          ({
            origin: [position.coords.latitude, position.coords.longitude],
            // destination: [latitude, longitude],
            destination :[<?php echo $_GET["lat"].",".$_GET["lng"]; ?>], 
            travelMode: 'driving',
            strokeColor: '#131540',
            strokeOpacity: 0.6,
            strokeWeight: 6,
          }, 
          {
            panel: '#directions',
            draggable: true,
            zoom: 15
          });
        },
        error: function(error)
        {
          // bootbox.alert('Geolocation failed: '+error.message);
          bootbox.alert({
              message: "การค้นหาตำเเหน่งของคุณผิดพลาด: "+error.message,
              size: 'small'
          });
        },
        not_supported: function()
        {
          // bootbox.alert("Your browser does not support geolocation");
          bootbox.alert({
              message: "เบราว์เซอร์ของคุณไม่สนับสนุนตำเเหน่งทางภูมิศาสตร์ (Geolocation)",
              size: 'small'
          });
        },
        always: function()
        {
          // bootbox.alert("Go to current location is Done !!");
          bootbox.alert({
              message: "ค้นหาตำเเหน่งของคุณเจอเเล้ว !!",
              size: 'small'
          });
        }
      });
      $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('การเเสดงความคิดเห็นเเละให้คะเเนน')
        modal.find('.modal-body input').val(recipient)
      })

  });


</script>

</body>
@endsection
</html>