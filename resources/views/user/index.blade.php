@extends('layouts.app')

<html>
<head>
  <title>หน้าหลักของผู้ใช้ทั่วไป</title>
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/bootstrap-select.css')}}">
 
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7YWOhxvvuzxTnhrqMHFJ4hCM9WG7ND-c"></script>
  <script src="{{asset('js/gmaps.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/bootbox.min.js')}}"></script>
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/bootstrap-select.js')}}"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>




</head>
@section('content')



<body ng-app="myApp" ng-controller="myCtrl">

  <script>


var app = angular.module('myApp', []);
app.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
  });
app.controller('myCtrl', function($scope) {
    
   $scope.reset = function() {
    $scope.nameInputBox = "";
    };
    
});



   
</script>
  <div class="col-md-3" >
   
      
      <h4 align="center"><img src="{{asset("icons/star1.png")}}"><b> สถานที่ออกกำลังกายเเนะนำ </b><img src="{{asset("icons/star1.png")}}"></h4>
        @foreach($baye_rating as $value)
          <p style="color:red; " class="flash" ><img src="{{asset("icons/thumbs-up-animated.gif")}}" width="37px" height="32px" >{{$value[0]}}</p>
        @endforeach
      <hr style="margin-top: 15px; margin-bottom:3px; ">

      <h4><b><img src="{{asset("images/search_world.png")}}" width="40px" height="35px" margin-bottom="1px">ค้นหาตามหมวดหมู่</b></h4>

      {!! Form::open(['action' => "UserController@searchType"]) !!}
            <div class="input-group">
                <label>ชื่อ<img src="{{asset("icons/right-arrow-blue.png")}}" width="20px" height="20px" ></label>
                <input type="search" class="form-control-name" name="name" id="name"  placeholder="ค้นหา...." value=@if (isset($name)){{$name}} @endif>
                
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default"><img src="{{asset("icons/search.png")}}" width="22px" height="22px"  ></button>
                    <button type="button" class="btn btn-default" onclick="resetName()">Clear</button>
                </span>
            </div>
      {!! Form::close() !!}

      
      {!! Form::open(['action' => "UserController@searchType"]) !!}
        <div class="input-group">
          <label>ประเภท<img src="{{asset("icons/right-arrow-blue.png")}}" width="20px" height="20px" ></label>
          <select class="form-control-type" name="listType"> 
            <option selected></option>
              @foreach($types as $value)
              <option value="{{$value->id}}"
                @if (isset($listType)){{ $value->id == $listType ? 'selected' : '' }} @endif>
                {{$value->type_tname}}
              </option>
            @endforeach
          </select><br>
          <span class="input-group-btn">
            <button type="submit" class="btn btn-default"><img src="{{asset("icons/search.png")}}" width="22px" height="22px"  ></button>
           <button type="reset" class="btn btn-default" onclick="resetForm(event, $(this));">Clear</button>
          </span>
        </div>
        {!! Form::close() !!}

      {!! Form::open(['action' => "UserController@searchType"]) !!}
        <div class="input-group">
          <label>คลาส<img src="{{asset("icons/right-arrow-blue.png")}}" width="20px" height="20px" ></label>
          <select class="form-control-class" name="listClass";>
            <option selected ></option> 
            @foreach($classes as $value)
              <option value="{{$value->id}}"
                @if (isset($listClass)){{ $value->id == $listClass ? 'selected' : '' }} @endif>
                {{$value->class_tname}}
              </option>
            @endforeach
          </select><br>
          <span class="input-group-btn">
            <button type="submit" class="btn btn-default"><img src="{{asset("icons/search.png")}}" width="22px" height="22px"  ></button>
            {{-- <button type="reset" class="btn btn-default"  ng-click="reset()">Clear</button> --}}
            <button type="reset" class="btn btn-default" onclick="resetForm(event, $(this));">Clear</button>
          </span>
        </div>
        
      {!! Form::close() !!}

      {!! Form::open(['action' => "UserController@searchType"]) !!}
        <div class="input-group">
          <label>วัน<img src="{{asset("icons/right-arrow-blue.png")}}" width="20px" height="20px" ></label>
          <select class="form-control-day" name="nameDay">
              <option selected></option>        
              <option value="Monday"
                @if (isset($nameDay)){{ "Monday" == $nameDay ? 'selected' : '' }} @endif>วันจันทร์
              </option>
              <option value="Tuesday"
                @if (isset($nameDay)){{ "Tuesday" == $nameDay ? 'selected' : '' }} @endif>วันอังคาร
              </option>
              <option value="Wednesday"
                @if (isset($nameDay)){{ "Wednesday" == $nameDay ? 'selected' : '' }} @endif>วันพุธ
              </option>
              <option value="Thursday"
                @if (isset($nameDay)){{ "Thursday" == $nameDay ? 'selected' : '' }} @endif>วันพฤหัสบดี
              </option>
              <option value="Friday"
                @if (isset($nameDay)){{ "Friday" == $nameDay ? 'selected' : '' }} @endif>วันศุกร์
              </option>
              <option value="Saturday"
                @if (isset($nameDay)){{ "Saturday" == $nameDay ? 'selected' : '' }} @endif>วันเสาร์
              </option>
              <option value="Sunday"
                @if (isset($nameDay)){{ "Sunday" == $nameDay ? 'selected' : '' }} @endif>วันอาทิตย์
              </option>
          </select><br>
          <span class="input-group-btn">
            <button type="submit" class="btn btn-default"><img src="{{asset("icons/search.png")}}" width="22px" height="22px"  ></button>
             <button type="reset" class="btn btn-default" onclick="resetForm(event, $(this));">Clear</button>
          </span>
        </div>
          <label>เวลาเปิด<img src="{{asset("icons/right-arrow-blue.png")}}" width="20px" height="20px" ></label>
           <select class="form-control-open-first" name="nameOpenFirst">
              <option value=""selected></option>        
              <option value="00" @if (isset($nameOpenFirst)){{ "00" == $nameOpenFirst ? 'selected' : '' }} @endif>00 นาฬิกา</option>
              <option value="01" @if (isset($nameOpenFirst)){{ "01" == $nameOpenFirst ? 'selected' : '' }} @endif>01 นาฬิกา</option>
              <option value="02" @if (isset($nameOpenFirst)){{ "02" == $nameOpenFirst ? 'selected' : '' }} @endif>02 นาฬิกา</option
              <option value="03" @if (isset($nameOpenFirst)){{ "03" == $nameOpenFirst ? 'selected' : '' }} @endif>03 นาฬิกา</option>
              <option value="04" @if (isset($nameOpenFirst)){{ "04" == $nameOpenFirst ? 'selected' : '' }} @endif>04 นาฬิกา</option>
              <option value="05" @if (isset($nameOpenFirst)){{ "05" == $nameOpenFirst ? 'selected' : '' }} @endif>05 นาฬิกา</option>
              <option value="06" @if (isset($nameOpenFirst)){{ "06" == $nameOpenFirst ? 'selected' : '' }} @endif>06 นาฬิกา</option>
              <option value="07" @if (isset($nameOpenFirst)){{ "07" == $nameOpenFirst ? 'selected' : '' }} @endif>07 นาฬิกา</option>
              <option value="08" @if (isset($nameOpenFirst)){{ "08" == $nameOpenFirst ? 'selected' : '' }} @endif>08 นาฬิกา</option>
              <option value="09" @if (isset($nameOpenFirst)){{ "09" == $nameOpenFirst ? 'selected' : '' }} @endif>09 นาฬิกา</option>
              <option value="10" @if (isset($nameOpenFirst)){{ "10" == $nameOpenFirst ? 'selected' : '' }} @endif>10 นาฬิกา</option>
              <option value="11" @if (isset($nameOpenFirst)){{ "11" == $nameOpenFirst ? 'selected' : '' }} @endif>11 นาฬิกา</option>
              <option value="12" @if (isset($nameOpenFirst)){{ "12" == $nameOpenFirst ? 'selected' : '' }} @endif>12 นาฬิกา</option>
              <option value="13" @if (isset($nameOpenFirst)){{ "13" == $nameOpenFirst ? 'selected' : '' }} @endif>13 นาฬิกา</option>
              <option value="14" @if (isset($nameOpenFirst)){{ "14" == $nameOpenFirst ? 'selected' : '' }} @endif>14 นาฬิกา</option>
              <option value="15" @if (isset($nameOpenFirst)){{ "15" == $nameOpenFirst ? 'selected' : '' }} @endif>15 นาฬิกา</option>
              <option value="16" @if (isset($nameOpenFirst)){{ "16" == $nameOpenFirst ? 'selected' : '' }} @endif>16 นาฬิกา</option>
              <option value="17" @if (isset($nameOpenFirst)){{ "17" == $nameOpenFirst ? 'selected' : '' }} @endif>17 นาฬิกา</option>
              <option value="18" @if (isset($nameOpenFirst)){{ "18" == $nameOpenFirst ? 'selected' : '' }} @endif>18 นาฬิกา</option>
              <option value="19" @if (isset($nameOpenFirst)){{ "19" == $nameOpenFirst ? 'selected' : '' }} @endif>19 นาฬิกา</option>
              <option value="20" @if (isset($nameOpenFirst)){{ "20" == $nameOpenFirst ? 'selected' : '' }} @endif>20 นาฬิกา</option>
              <option value="21" @if (isset($nameOpenFirst)){{ "21" == $nameOpenFirst ? 'selected' : '' }} @endif>21 นาฬิกา</option>
              <option value="22" @if (isset($nameOpenFirst)){{ "22" == $nameOpenFirst ? 'selected' : '' }} @endif>22 นาฬิกา</option>
              <option value="23" @if (isset($nameOpenFirst)){{ "23" == $nameOpenFirst ? 'selected' : '' }} @endif>23 นาฬิกา</option>
          </select><label>:</label>
          <select class="form-control-open" name="nameOpenLast">
              <option value="" selected></option>        
              <option value="00" @if (isset($nameOpenLast)){{ "00" == $nameOpenLast ? 'selected' : '' }} @endif>00 นาที</option>
              <option value="15" @if (isset($nameOpenLast)){{ "15" == $nameOpenLast ? 'selected' : '' }} @endif>15 นาที</option>
              <option value="30" @if (isset($nameOpenLast)){{ "30" == $nameOpenLast ? 'selected' : '' }} @endif>30 นาที</option>
              <option value="45" @if (isset($nameOpenLast)){{ "45" == $nameOpenLast ? 'selected' : '' }} @endif>45 นาที</option>
          </select><br>
         <label>เวลาปิด<img src="{{asset("icons/right-arrow-blue.png")}}" width="20px" height="20px" ></label>
          <select class="form-control-close-first" name="nameCloseFirst">
              <option value="" selected></option>        
              <option value="00" @if (isset($nameCloseFirst)){{ "00" == $nameCloseFirst ? 'selected' : '' }} @endif>00 นาฬิกา</option>
              <option value="01" @if (isset($nameCloseFirst)){{ "01" == $nameCloseFirst ? 'selected' : '' }} @endif>01 นาฬิกา</option>
              <option value="02" @if (isset($nameCloseFirst)){{ "02" == $nameCloseFirst ? 'selected' : '' }} @endif>02 นาฬิกา</option
              <option value="03" @if (isset($nameCloseFirst)){{ "03" == $nameCloseFirst ? 'selected' : '' }} @endif>03 นาฬิกา</option>
              <option value="04" @if (isset($nameCloseFirst)){{ "04" == $nameCloseFirst ? 'selected' : '' }} @endif>04 นาฬิกา</option>
              <option value="05" @if (isset($nameCloseFirst)){{ "05" == $nameCloseFirst ? 'selected' : '' }} @endif>05 นาฬิกา</option>
              <option value="06" @if (isset($nameCloseFirst)){{ "06" == $nameCloseFirst ? 'selected' : '' }} @endif>06 นาฬิกา</option>
              <option value="07" @if (isset($nameCloseFirst)){{ "07" == $nameCloseFirst ? 'selected' : '' }} @endif>07 นาฬิกา</option>
              <option value="08" @if (isset($nameCloseFirst)){{ "08" == $nameCloseFirst ? 'selected' : '' }} @endif>08 นาฬิกา</option>
              <option value="09" @if (isset($nameCloseFirst)){{ "09" == $nameCloseFirst ? 'selected' : '' }} @endif>09 นาฬิกา</option>
              <option value="10" @if (isset($nameCloseFirst)){{ "10" == $nameCloseFirst ? 'selected' : '' }} @endif>10 นาฬิกา</option>
              <option value="11" @if (isset($nameCloseFirst)){{ "11" == $nameCloseFirst ? 'selected' : '' }} @endif>11 นาฬิกา</option>
              <option value="12" @if (isset($nameCloseFirst)){{ "12" == $nameCloseFirst ? 'selected' : '' }} @endif>12 นาฬิกา</option>
              <option value="13" @if (isset($nameCloseFirst)){{ "13" == $nameCloseFirst ? 'selected' : '' }} @endif>13 นาฬิกา</option>
              <option value="14" @if (isset($nameCloseFirst)){{ "14" == $nameCloseFirst ? 'selected' : '' }} @endif>14 นาฬิกา</option>
              <option value="15" @if (isset($nameCloseFirst)){{ "15" == $nameCloseFirst ? 'selected' : '' }} @endif>15 นาฬิกา</option>
              <option value="16" @if (isset($nameCloseFirst)){{ "16" == $nameCloseFirst ? 'selected' : '' }} @endif>16 นาฬิกา</option>
              <option value="17" @if (isset($nameCloseFirst)){{ "17" == $nameCloseFirst ? 'selected' : '' }} @endif>17 นาฬิกา</option>
              <option value="18" @if (isset($nameCloseFirst)){{ "18" == $nameCloseFirst ? 'selected' : '' }} @endif>18 นาฬิกา</option>
              <option value="19" @if (isset($nameCloseFirst)){{ "19" == $nameCloseFirst ? 'selected' : '' }} @endif>19 นาฬิกา</option>
              <option value="20" @if (isset($nameCloseFirst)){{ "20" == $nameCloseFirst ? 'selected' : '' }} @endif>20 นาฬิกา</option>
              <option value="21" @if (isset($nameCloseFirst)){{ "21" == $nameCloseFirst ? 'selected' : '' }} @endif>21 นาฬิกา</option>
              <option value="22" @if (isset($nameCloseFirst)){{ "22" == $nameCloseFirst ? 'selected' : '' }} @endif>22 นาฬิกา</option>
              <option value="23" @if (isset($nameCloseFirst)){{ "23" == $nameCloseFirst ? 'selected' : '' }} @endif>23 นาฬิกา</option>
          </select><label>:</label>
          <select class="form-control-close" name="nameCloseLast">
              <option value="" selected></option>        
              <option value="00" @if (isset($nameCloseLast)){{ "00" == $nameCloseLast ? 'selected' : '' }} @endif>00 นาที</option>
              <option value="15" @if (isset($nameCloseLast)){{ "15" == $nameCloseLast ? 'selected' : '' }} @endif>15 นาที</option>
              <option value="30" @if (isset($nameCloseLast)){{ "30" == $nameCloseLast ? 'selected' : '' }} @endif>30 นาที</option>
              <option value="45" @if (isset($nameCloseLast)){{ "45" == $nameCloseLast ? 'selected' : '' }} @endif>45 นาที</option>
          </select>
     
      {!! Form::close() !!}


      @if(isset($details))
        <script type="text/javascript">
          var Fitness = <?php print_r(json_encode($details)) ?>
        </script>
      @elseif(isset($message))
        <script type="text/javascript">
          alert("{{$message}}")
        </script>;
      @endif

  </div>
  <div class="col-md-9" style="height: auto; background-color:#CDC9C9;">
    <div id="map"></div>
  </div>

 
<script type="text/javascript">
function resetForm(e, thisobj) {
    thisform = thisobj.closest('form');
    selectbox_in_form = thisform.find('select');
    // textbox_in_form = thisform.find('input');

    // completely remove selected when it has been assigned.
    selectbox_in_form.find('option:selected').removeAttr('selected');
    selectbox_in_form.val('');
    selectbox_in_form.change();

    delete selectbox_in_form;
    delete thisform;
}// resetForm

 function resetName()
   {  
   document.getElementById('name').value = "";
   }

$(function() {
    // activate Select2
    $('.selectbox-replacement-enabler').select2();
});

    
var map;
$(document).ready(function()
{
     
      var map = new GMaps
      ({
        el: '#map',
        lat: 18.789875,
        lng: 98.8847578,
        zoom: 12 //suthep center
      });

      GMaps.geolocate
      ({
        success: function(position)
        {
          map.setCenter(position.coords.latitude, position.coords.longitude);
          map.addMarker
          ({
            lat: position.coords.latitude,
            lng: position.coords.longitude,
            animation: google.maps.Animation.BOUNCE,
            title: 'ตำเเหน่งปัจจุบันของคุณ',
            infoWindow: {
              content: '<p style="height: 20px;">You are here!</p>'
            },
            icon: '{{asset("icons/pin_blue.png")}}'
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

      $.each(Fitness, function(index, value)
      {
        var work = "<br>";
        var arr = [];
        for(var i = 0; i < Fitness.length; i++){
          if(Fitness[i].fitness_ename == value.fitness_ename && jQuery.inArray(Fitness[i].day_tname+" : " + Fitness[i].opentime + " - " + Fitness[i].closetime,arr) < 0){
            work += Fitness[i].day_tname+" : " + Fitness[i].opentime + " น. - " + Fitness[i].closetime + " น. <br>";
            arr.push(Fitness[i].day_tname+" : " + Fitness[i].opentime + " - " + Fitness[i].closetime);
          }
            
        }
        var type = "";
        var arr = [];
        for(var i = 0; i < Fitness.length; i++){
          if(Fitness[i].fitness_ename == value.fitness_ename &&  jQuery.inArray(Fitness[i].type_tname,arr) < 0){
            type += Fitness[i].type_tname+" ";
            arr.push(Fitness[i].type_tname);
          }
            
        }

        var classes = "";
        var arr = [];
        for(var i = 0; i < Fitness.length; i++){
          if(Fitness[i].fitness_ename == value.fitness_ename &&  jQuery.inArray(Fitness[i].class_tname,arr) < 0){
            classes += Fitness[i].class_tname+" ";
            arr.push(Fitness[i].class_tname);
          }
            
        }
        // var web = "";
        // if(value.website.length > 0){
        //     web = value.website;
        // }

          map.addMarker
          ({
            lat: value.lat,
            lng: value.lng,
            icon: '{{asset("icons/red_3.png")}}',
            title: value.fitness_ename,
            infoWindow: 
            {

              content: '<span style="padding: 0px; text-align:left"  ><img src="../images/fitnesses/'
                       +value.image+'" width="600px" height="180px"><h4 align="center">' 
                       +value.fitness_ename+ '&nbsp; [' +value.fitness_tname+ ']</h4><p align="center">'+value.fitness_description+'</p><hr><h5><b>ที่อยู่ :: </b>' +value.addresses+ '<br /></h5><h5><b>ติดต่อ :: </b>'+value.contact_number+ '</h5>'+'<h5><b>เว็บไซต์ :: </b><a target="_blank" href="' +value.website+  '">'+value.website+'</a></h5><h5><b>วัน-เวลาเปิดทำการ :: </b>'+work+'</h5><h5><b>ประเภทของสถานที่ออกกำลังกาย :: </b>'+type+'</h5><h5><b>คลาสที่เปิดสอน :: </b>'+classes+'</h5><center><a href="/user/route?fitness=' +value.fitness_tname+ '&&lat=' +value.lat+ '&&lng='+value.lng+'" class="btn btn-info" role="button">เเสดงเส้นทางการเดินทาง</a></center></span>'
            }
          });
      });

       
});



</script>



</body>
@endsection
</html>