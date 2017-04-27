@extends('layouts.app2')

<html>

<head>
	<title>เพิ่มข้อมูลตารางคลาส</title>
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
		<center><h3><b>เพิ่มข้อมูลตารางคลาส</b></h3></center>
		<hr>

		{{Form::open(array('url'=>'admin/add_class', 'files'=>true))}}

			<div class="col-md-6" style="height: auto;">
				
			 <div class="form-group">
			        <label for="">ชื่อคลาสภาษาอังกฤษ</label>
			        <input type="text" class="form-control input-sm" name="class_ename" id="class_ename">
			      </div>

			      <div class="form-group">
			        <label for="">ชื่อคลาสภาษาไทย</label>
			        <input type="text" class="form-control input-sm" name="class_tname" id="class_tname">
			      </div>
			      <div class="form-group">
			        <label for="">รูปภาพ</label>
			        <?=Form::file('images',null,['class'=> 'form-control input-sm'])?>
			      </div>
			   </div>
			<div class="col-md-6" style="height: auto;">
			      <div class="form-group">
			        <label for="">คำอธิบาย</label>
			        <textarea class="form-control input-sm" name="class_description"></textarea>
			      </div>

			      <div class="form-group">
			        <label for="">ประเภทของสถานที่ออกกำลังกาย</label>
			       <div class="radio" >
					  @foreach($typesports as $value)
					  	<label><input type="radio" name="type_id" id="type_id" value="{{$value->id}}">{{$value->type_tname}}</label>
					  @endforeach
					</div>
			      </div>


			      
			      <div class="form-group">
			       	<center><button class="btn btn-sm btn-danger">บันทึก</button></center>
			      </div>
{{Form::close()}}
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
       
	</div>
	

</body>
@endsection
</html>



	