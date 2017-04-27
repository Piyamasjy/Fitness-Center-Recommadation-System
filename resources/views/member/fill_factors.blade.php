@extends('layouts.app')
<head>
<title>กรอกคะเเนนลำดับความสำคัญในการพิจารณาเลือกสถานที่ออกกำลังกาย</title>
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
  {{-- <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"> --}}
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/bootstrap-select.css')}}">
 
  <script src="{{asset('js/jquery.min.js')}}"></script>

  <script src="{{asset('js/gmaps.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/bootbox.min.js')}}"></script>
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/bootstrap-select.js')}}"></script>

</head>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              @foreach($factors as $value)
                @if(Auth::user()->id == $value->user_id)
                  <center><h3>ลำดับความสำคัญของปัจจัยในการพิจารณาเลือกสถานที่ออกกำลังกาย</h3></center>
                  <hr style="margin-bottom: 5px; margin-top: 5px;">
                  {{Form::open(array('url'=>'/member/fill_factors', 'files'=>true))}}


                <div class="row" style="margin-top: 20px;">

                  <div class="col-xs-12">
                    <div class="col-xs-4">
                        <p align="center"><b>หลักส่วนประสมทางการตลาด</b></p>
                    </div>
                    <div class="col-xs-6">
                        <p align="center"><b>ตัวอย่างคำอธิบาย</b></p>
                    </div>
                    <div class="col-xs-2">
                        <p align="center"><b>กรอกคะเเนน</b></p>
                    </div>
                  </div><br><br>

                  <div class="col-xs-12">
                    <div class="col-xs-4">
                        <input type="text" class="form-control" value ="Product" readonly>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" value ="ด้านอุปกรณ์ [ทันสมัย ได้มาตรฐาน ปลอดภัย]" readonly >
                    </div>
                    <div class="col-xs-2">
                        <input type="text" class="form-control" name="score_product" id="score_product" placeholder="คะเเนน 1-7" value="{{$value->score_product}}" readonly>
                    </div>
                  </div><br><br>

                  <div class="col-xs-12">
                    <div class="col-xs-4">
                        <input type="text" class="form-control" value ="Place" readonly>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" value ="ด้านทำเล / สถานที่ [การเดินทางสะดวก ขนาด]" readonly >
                    </div>
                    <div class="col-xs-2">
                       <input type="text" class="form-control" name="score_place" id="score_place" placeholder="คะเเนน 1-7" value="{{$value->score_place}}" readonly>
                    </div>
                  </div><br><br>

                  <div class="col-xs-12">
                    <div class="col-xs-4">
                        <input type="text" class="form-control" value ="Physical and Presentation" readonly >
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" value ="ด้านกายภาพ [เป็นที่รู้จัก ผู้คนนิยม]" readonly >
                    </div>
                    <div class="col-xs-2">
                          <input type="text" class="form-control" name="score_physical" id="score_physical" placeholder="คะเเนน 1-7" value="{{$value->score_physical}}" readonly>
                     
                    </div>
                  </div><br><br>

                  <div class="col-xs-12">
                    <div class="col-xs-4">
                        <input type="text" class="form-control" value ="Price" readonly>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" value ="ด้านราคา / ค่าบริการ [ราคาเหมาะสม คุ้มค่า]" readonly >
                    </div>
                    <div class="col-xs-2">
                        <input type="text" class="form-control" name="score_price" id="score_price" value="{{$value->score_price}}" readonly>
                     
                    </div>
                  </div><br><br>

                  <div class="col-xs-12">
                    <div class="col-xs-4">
                        <input type="text" class="form-control" value ="Process" readonly>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" value ="ด้านรูปเเบบการให้บริการ [รับฟังความคิดเห็น แจ้งข่าวสาร] " readonly >
                    </div>
                    <div class="col-xs-2">
                        {{-- <input type="text" class="form-control" name="score_process" id="score_process" placeholder="คะเเนน 1-7"  > --}}
                       <input type="text" class="form-control" name="score_process" id="score_process" value="{{$value->score_process}}" readonly>
                     
                    </div>
                  </div><br><br>

                  <div class="col-xs-12">
                    <div class="col-xs-4">
                        <input type="text" class="form-control" value ="Promotion" readonly>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" value ="ด้านโปรโมชัน [ของสมนาคุณ จัดกิจกรรมพิเศษ]" readonly >
                    </div>
                    <div class="col-xs-2">
                        {{-- <input type="text" class="form-control" name="score_promotion" id="score_promotion" placeholder="คะเเนน 1-7"  > --}}
                       <input type="text" class="form-control" name="score_promotion" id="score_promotion" value="{{$value->score_promotion}}" readonly>
                    </div>
                  </div><br><br>

                  <div class="col-xs-12">
                    <div class="col-xs-4">
                        <input type="text" class="form-control" value ="People" readonly>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" value ="ด้านพนักงาน / เทนเนอร์ [มีทักษะความรู้ ทักษะ เป็นมิตร]" readonly >
                    </div>
                    <div class="col-xs-2">
                        {{-- <input type="text" class="form-control" name="score_people" id="score_people"placeholder="คะเเนน 1-7"  > --}}
                      <input type="text" class="form-control" name="score_people" id="score_people" value="{{$value->score_people}}" readonly>
                    </div>
                  </div><br>
            
                </div><br>
        

            {{Form::close()}}
                  @break
                @endif
              
              @if($value->user_id == $factors[count($factors)-1]->user_id)
              <div align = "center">
                    <h3>กรอกลำดับความสำคัญของปัจจัยในการพิจารณาเลือกสถานที่ออกกำลังกาย</h3>
                    <hr style="margin-bottom: 5px; margin-top: 5px;">
                    <p>ให้สมาชิกทำการเรียงลำดับคะเเนนปัจจัยในการพิจารณาเลือกสถานที่ออกกำลังกายของคุณ</p>
                    <p>โดยระบบจะทำการอ้างอิงตามหลักส่วนประสมทางการตลาด 7 หลัก  (Marketing Mix 7P's) </p>
                    <p>โดยให้คะเเนนตั้งเเต่ 1 - 7 คะเเนน</p>
                    <p>1 คือ คุณให้ความสำคัญกับปัจจัยนี้เป็นอันดับเเรก</p>
                    <p>7 คือ คุณให้ความสำคัญกับปัจจัยนี้เป็นอันดับสุดท้าย</p> 
                    <p style="color: red;">*หมายเหตุ ห้ามกรอกคะเเนนลำดับความสำคัญซ้ำ*</p>
                    <hr style="margin-bottom: 5px;">   
                </div>

              {{Form::open(array('url'=>'/member/fill_factors', 'files'=>true))}}


                <div class="row" style="margin-top: 20px;">

                  <div class="col-xs-12">
                    <div class="col-xs-4">
                        <p align="center"><b>หลักส่วนประสมทางการตลาด</b></p>
                    </div>
                    <div class="col-xs-6">
                        <p align="center"><b>ตัวอย่างคำอธิบาย</b></p>
                    </div>
                    <div class="col-xs-2">
                        <p align="center"><b>กรอกคะเเนน</b></p>
                    </div>
                  </div><br><br>

                  <div class="col-xs-12">
                    <div class="col-xs-4">
                        <input type="text" class="form-control" value ="Product" readonly>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" value ="ด้านอุปกรณ์ [ทันสมัย ได้มาตรฐาน ปลอดภัย]" readonly >
                    </div>
                    <div class="col-xs-2">
                      <select class="form-control" name="score_product" id="score_product" onchange="getval(this);">
                        <option value="" selected></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                      </select>
                        {{-- <input type="text" class="form-control" name="score_product" id="score_product" placeholder="คะเเนน 1-7" > --}}
                    </div>
                  </div><br><br>

                  <div class="col-xs-12">
                    <div class="col-xs-4">
                        <input type="text" class="form-control" value ="Place" readonly>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" value ="ด้านทำเล / สถานที่ [การเดินทางสะดวก ขนาด]" readonly >
                    </div>
                    <div class="col-xs-2">
                        {{-- <input type="text" class="form-control" name="score_place" id="score_place" placeholder="คะเเนน 1-7"  > --}}
                        
                      <select class="form-control" name="score_place" id="score_place">
                        <option value="" selected></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                      </select>
                    </div>
                  </div><br><br>

                  <div class="col-xs-12">
                    <div class="col-xs-4">
                        <input type="text" class="form-control" value ="Physical and Presentation" readonly >
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" value ="ด้านกายภาพ [เป็นที่รู้จัก ผู้คนนิยม]" readonly >
                    </div>
                    <div class="col-xs-2">
                      <select class="form-control" name="score_physical" id="score_physical">
                        <option value="" selected></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                      </select>
                    </div>
                  </div><br><br>

                  <div class="col-xs-12">
                    <div class="col-xs-4">
                        <input type="text" class="form-control" value ="Price" readonly>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" value ="ด้านราคา / ค่าบริการ [ราคาเหมาะสม คุ้มค่า]" readonly >
                    </div>
                    <div class="col-xs-2">
                      <select class="form-control" name="score_price" id="score_price">
                        <option value="" selected></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                      </select>
                    </div>
                  </div><br><br>

                  <div class="col-xs-12">
                    <div class="col-xs-4">
                        <input type="text" class="form-control" value ="Process" readonly>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" value ="ด้านรูปเเบบการให้บริการ [รับฟังความคิดเห็น แจ้งข่าวสาร] " readonly >
                    </div>
                    <div class="col-xs-2">
                        {{-- <input type="text" class="form-control" name="score_process" id="score_process" placeholder="คะเเนน 1-7"  > --}}
                      <select class="form-control" name="score_process" id="score_process">
                        <option value="" selected></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                      </select>
                    </div>
                  </div><br><br>

                  <div class="col-xs-12">
                    <div class="col-xs-4">
                        <input type="text" class="form-control" value ="Promotion" readonly>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" value ="ด้านโปรโมชัน [ของสมนาคุณ จัดกิจกรรมพิเศษ]" readonly >
                    </div>
                    <div class="col-xs-2">
                        {{-- <input type="text" class="form-control" name="score_promotion" id="score_promotion" placeholder="คะเเนน 1-7"  > --}}
                      <select class="form-control" name="score_promotion" id="score_promotion">
                        <option value="" selected></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                      </select>
                    </div>
                  </div><br><br>

                  <div class="col-xs-12">
                    <div class="col-xs-4">
                        <input type="text" class="form-control" value ="People" readonly>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" value ="ด้านพนักงาน / เทนเนอร์ [มีทักษะความรู้ ทักษะ เป็นมิตร]" readonly >
                    </div>
                    <div class="col-xs-2">
                        {{-- <input type="text" class="form-control" name="score_people" id="score_people"placeholder="คะเเนน 1-7"  > --}}
                      <select class="form-control" name="score_people" id="score_people" >
                        <option value="" selected></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                      </select>
                    </div>
                  </div><br>
            
                </div><br>
        
                <center><button class="btn btn-sm btn-danger" onClick="return myFunction()">บันทึก</button></center>

        {{Form::close()}}
<script language="javascript">

function myFunction() 
{
   
    var score_product = document.getElementById('score_product');
    var score_price = document.getElementById('score_price');
    var score_promotion = document.getElementById('score_promotion');
    var score_process = document.getElementById('score_process');
    var score_place = document.getElementById('score_place');
    var score_people = document.getElementById('score_people');
    var score_physical = document.getElementById('score_physical');

    var sum = parseInt(score_product.value) +parseInt(score_price.value)+parseInt(score_promotion.value)+parseInt(score_process.value)+parseInt(score_place.value)+parseInt(score_people.value)+parseInt(score_physical.value);

    var a = !(parseInt(score_price.value) > 0 && parseInt(score_price.value)<8);
    var b = !(parseInt(score_promotion.value) > 0 && parseInt(score_promotion.value)<8);
    var c = !(parseInt(score_place.value) > 0 && parseInt(score_place.value)<8);
    var d = !(parseInt(score_people.value) > 0 && parseInt(score_people.value)<8) ;
    var e = !(parseInt(score_process.value) > 0 && parseInt(score_process.value)<8);
    var f = !(parseInt(score_physical.value) > 0 && parseInt(score_physical.value)<8);
    var g = !(parseInt(score_product.value) > 0 && parseInt(score_product.value)<8);


    if( a || b || c || e || f || g)
    {
      alert("กรุณากรอกลำดับความสำคัญให้ครบ");
      return false;
    }
    //alert(sum);
    if(sum != 28)
    {
      alert('ห้ามกรอกคะเเนนลำดับความสำคัญซ้ำ');
      return false;
    }

    return true;

}
</script>
        @endif
       @endforeach      
               
            </div>
            
        </div>
    </div>
</div>

@endsection
