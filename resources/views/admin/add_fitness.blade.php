@extends('layouts.app2')

<html>

<head>
	<title>เพิ่มข้อมูลในตารางฟิตเนส</title>
	<link rel="stylesheet" href="{{asset('css/mycss.css')}}">
	 
	 
	  <script src="{{asset('js/jquery.min.js')}}"></script>
	
	  <script src="{{asset('js/gmaps.js')}}"></script>
	 
	  <script src="{{asset('js/bootbox.min.js')}}"></script>
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
		<center><h3><b>เพิ่มข้อมูลในตารางฟิตเนส</b></h3></center>
		<hr>

		{{Form::open(array('url'=>'admin/add_fitness', 'files'=>true))}}

		<div class="col-md-6" style="height: auto;" >
			 	 
			      <div class="form-group">
			        <label for="">ชื่อฟิตเนสภาษาอังกฤษ</label>
			        <input type="text" class="form-control input-sm" name="fitness_ename">
			      </div>

			      <div class="form-group">
			        <label for="">ชื่อฟิตเนสภาษาไทย</label>
			        <input type="text" class="form-control input-sm" name="fitness_tname">
			      </div>

			      <div class="form-group">
			        <label for="">ที่อยู่</label>
			        <textarea type="text" class="form-control input-sm" name="addresses"></textarea>
			      </div>

			      <div class="form-group">
			        <label for="">เว็บไซต์</label>
			        <input type="text" class="form-control input-sm" name="website">
			      </div>

			      <div class="form-group">
			        <label for="">เบอร์โทร</label>
			        <input type="text" class="form-control input-sm" name="contact_number">
			      </div>
			      
			      <div class="form-group">
			        <label for="">คำอธิบาย</label>
			        <textarea class="form-control input-sm" name="fitness_description"></textarea>
			      </div>
			      <div class="form-group">
			        <label for="">ละติจูด</label>
			        <input type="text" class="form-control input-sm" name="lat" id="lat">
			      </div>

			      <div class="form-group">
			        <label for="">ลองจิจูด</label>
			        <input type="text" class="form-control input-sm" name="lng" id="lng">
			      </div>

			      <div class="form-group">
			        <label for="">รูปภาพ</label>
			        <?=Form::file('image',null,['class'=> 'form-control input-sm'])?>
			      </div>
			       <div class="form-group">
			        <label for="">คลาส</label>
			       <div class="checkbox">
					  @foreach($classes as $value)
					  	<label><input type="checkbox"  name="classes[]" value="{{$value->id}}">{{$value->class_tname}}</label>
					  @endforeach
					</div>
			      </div>
			      <div class="form-group">
			        <label for="">ประเภทของสถานที่ออกกำลังกาย</label>
			       <div class="checkbox">
					  @foreach($typesports as $value)
					  	<label><input type="checkbox"  name="typesports[]" value="{{$value->id}}">{{$value->type_tname}}</label>
					  @endforeach
					</div>
			      </div>
			      
			       

		</div>
		<div class="col-md-6" style="height: auto;" >
			
				<div class="form-group">
			        <label for="">วันเวลาทำการ</label>
			       <div class="checkbox">
					  @foreach($workservices as $value)
					  	<label><input type="checkbox"  name="workservices[]" value="{{$value->id}}">{{$value->day_tname}} เปิด {{$value->opentime}} ปิด {{$value->closetime}}</label>
					  @endforeach
					</div>
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



	