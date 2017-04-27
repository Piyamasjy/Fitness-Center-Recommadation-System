@extends('layouts.app2')

<html>

<head>
	<title>เพิ่มข้อมูลในตารางประเภทสถานที่ออกกำลังกาย</title>
	
	  <link rel="stylesheet" href="{{asset('css/mycss.css')}}">
	
	 
	  <script src="{{asset('js/jquery.min.js')}}"></script>

	  <script src="{{asset('js/bootstrap.min.js')}}"></script>
	 
	  <script src="{{asset('js/jquery.min.js')}}"></script>

	  {{-- angular.js --}}
	  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
	  
</head>	

@section('content')
<body>

	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                
                <div class="panel-body">
		
		<center><h3><b>เพิ่มข้อมูลในตารางประเภทสถานที่ออกกำลังกาย</b></h3></center>
		<hr>



		{{Form::open(array('url'=>'admin/add_typesports', 'files'=>true)) }}

		<div class="col-md-12" style="height: auto;">
			 <div class="form-group">
			        <label for="">ชื่อประเภทภาษาอังกฤษ</label>
			        <input type="text" class="form-control input-sm" name="type_ename" id="type_ename">
			      </div>

		
			      <div class="form-group">
			        <label for="">ชื่อประเภทภาษาไทย</label>
			        <input type="text" class="form-control input-sm" name="type_tname" id="type_tname" >
			      </div>




			      <div class="form-group">
			       	<center><button class="btn btn-sm btn-danger">บันทึก</button></center>
			      </div>

		<div>
		
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



	