@extends('layouts.app2')

<html>

<head>
	<title>เเก้ไขข้อมูลในตารางปัจจัย</title>
	
	  <link rel="stylesheet" href="{{asset('css/mycss.css')}}">
	  
	  <script src="{{asset('js/gmaps.js')}}"></script>
	  <script src="{{asset('js/bootstrap.min.js')}}"></script>
	  <script src="{{asset('js/bootbox.min.js')}}"></script>
	  <script src="{{asset('js/jquery.min.js')}}"></script>
	  <script src="{{asset('js/bootstrap-select.js')}}"></script>
</head>	

@section('content')
<body>

	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
               
                <div class="panel-body">
		<center><h3><b>เเก้ไขข้อมูลในตารางปัจจัย</b></h3></center>
		<hr>

		{!! Form::open(['action' => ['AdminController@update_factors', $factors->id],'files'=>true]) !!}

              <div class="col-md-12" style="height: auto;">
                <div class="row">

                  <div class="col-xs-12">
                    <div class="col-xs-4">
                        <input type="text" class="form-control" value ="Product" readonly>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" value ="ด้านอุปกรณ์ [ทันสมัย ได้มาตรฐาน ปลอดภัย]" readonly >
                    </div>
                    <div class="col-xs-2">
                        <input type="text" class="form-control" name="score_product" value="{{$factors->score_product}}" placeholder="Score 1 - 7" >
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
                        <input type="text" class="form-control" name="score_place" value="{{$factors->score_place}}" placeholder="Score 1 - 7"  >
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
                         <input type="text" class="form-control" name="score_physical" value="{{$factors->score_physical}}" placeholder="Score 1 - 7"  >
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
                        <input type="text" class="form-control" name="score_price" value="{{$factors->score_price}}" placeholder="Score 1 - 7"  >
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
                        <input type="text" class="form-control" name="score_process" value="{{$factors->score_process}}" placeholder="Score 1 - 7"  >
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
                        <input type="text" class="form-control" name="score_promotion" value="{{$factors->score_promotion}}" placeholder="Score 1 - 7"  >
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
                        <input type="text" class="form-control" name="score_people" value="{{$factors->score_people}}"placeholder="Score 1 - 7"  >
                    </div><br>
                  </div><br>
                

                   <div class="col-xs-12">
                   <div class="col-xs-8">
                
                  รหัสสมาชิก<input type="text" class="form-control" name="user_id" value="{{$factors->user_id}}">
                </div>
                </div>
                </div><br>
                

                <center><button class="btn btn-sm btn-danger">บันทึก</button></center>
            </div>
        {{Form::close()}}
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	

</body>
@endsection
</html>



	