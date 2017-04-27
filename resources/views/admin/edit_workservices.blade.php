@extends('layouts.app2')

<html>

<head>
	<title>เเก้ไขข้อมูลในตารางวันเวลาทำการ</title>
	
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
		<center><h3><b>เเก้ไขข้อมูลในตารางวันเวลาทำการ</b></h3></center>
		<hr>

		 {!! Form::open(['action' => ['AdminController@update_workservices', $works->id],'files'=>true]) !!}

		<div class="col-md-6" style="height: auto;">
			 <div class="form-group">
			        <label for="">วันภาษาอังกฤษ</label>
			        <input type="text" class="form-control input-sm" name="day_ename" value="{{$works->day_ename}}" >
			      </div>

			      <div class="form-group">
			        <label for="">วันภาษาไทย</label>
			        <input type="text" class="form-control input-sm" name="day_tname" value="{{$works->day_tname}}" >
			      </div>
		</div>
		<div class="col-md-6" style="height: auto;">
			      <div class="form-group">
			        <label for="">เวลาเปิด</label>
			        <input type="time" class="form-control input-sm" name="opentime" value="{{$works->opentime}}">
			      </div>

			      <div class="form-group">
			        <label for="">เวลาปิด</label>
			        <input type="time" class="form-control input-sm" name="closetime" value="{{$works->closetime}}">
			      </div>
			      <div class="form-group">
			       	<center><button class="btn btn-sm btn-danger">บันทึก</button></center>
			      </div>
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



	