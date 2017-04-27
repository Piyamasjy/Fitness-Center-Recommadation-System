@extends('layouts.app2')

<html>

<head>
	<title>เเก้ไขข้อมูลตารางฟิตเนส</title>
	<link rel="stylesheet" href="{{asset('css/mycss.css')}}">
	 
	 
	  <script src="{{asset('js/jquery.min.js')}}"></script>
	
	  <script src="{{asset('js/gmaps.js')}}"></script>
	 
	  <script src="{{asset('js/bootbox.min.js')}}"></script>
	  <script src="{{asset('js/jquery.min.js')}}"></script>
	  
</head>	

@section('content')
<body>

	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              
                <div class="panel-body">
		<center><h3><b>เเก้ไขข้อมูลในตารางฟิตเนส</b></h3></center>
		<hr>
		
		 {!! Form::open(['action' => ['AdminController@update_fitness', $fitness->id],'files'=>true]) !!}
		 

		<div class="col-md-6"  style="height: auto;">
			 	 
			      <div class="form-group">
			        <label for="">ชื่ฟิตเนสภาษาอังกฤษ</label>
			        <input type="text" class="form-control input-sm" name="fitness_ename" value="{{$fitness->fitness_ename}}">
			      </div>

			      <div class="form-group">
			        <label for="">ชื่อฟิตเนสภาษาไทย</label>
			        <input type="text" class="form-control input-sm" name="fitness_tname" value="{{$fitness->fitness_tname}}">
			      </div>

			      <div class="form-group">
			        <label for="">ที่อยู่</label>
			       <textarea class="form-control input-sm" name="addresses" >{{$fitness->addresses}}</textarea>
			      </div>

			      <div class="form-group">
			        <label for="">เว็บไซต์</label>
			        <input type="text" class="form-control input-sm" name="website" value="{{$fitness->website}}">
			      </div>

			      <div class="form-group">
			        <label for="">เบอร์โทร</label>
			        <input type="text" class="form-control input-sm" name="contact_number" value="{{$fitness->contact_number}}">
			      </div>

			      <div class="form-group">
			        <label for="">ประเภท</label>
			       <div class="checkbox">

					  @foreach($typesports as $value)
						@if (in_array($value->id, $arrayOfTypesportsId))			
						  	
						  		<label><input type="checkbox"  name="typesports[]" value="{{$value->id}}" checked>{{$value->type_tname}}</label>
						  	@else
						  	<label><input type="checkbox"  name="typesports[]" value="{{$value->id}}">{{$value->type_tname}}</label>
						  	@endif
					 
					   @endforeach
					</div>
			      </div>

			      <div class="form-group">
			        <label for="">คลาส</label>
			       <div class="checkbox">

					  @foreach($classes as $value)
						@if (in_array($value->id, $arrayOfClassesId))			
						  	
						  		<label><input type="checkbox"  name="classes[]" value="{{$value->id}}" checked>{{$value->class_tname}}</label>
						  	@else
						  	<label><input type="checkbox"  name="classes[]" value="{{$value->id}}">{{$value->class_tname}}</label>
						  	@endif
					 
					   @endforeach
					</div>
			      </div>
			      
			      

		</div>
		<div class="col-md-6" style="height: auto;">
			

			      <div class="form-group">
			        <label for="">คำอธิบาย</label>
			        <textarea class="form-control input-sm" name="fitness_description" >{{$fitness->fitness_description}}</textarea>
			        
			      </div>
			      <div class="form-group">
			        <label for="">ละติจูด</label>
			        <input type="text" class="form-control input-sm" name="lat" id="lat" value="{{$fitness->lat}}">
			      </div>

			      <div class="form-group">
			        <label for="">ลองจิจูด</label>
			        <input type="text" class="form-control input-sm" name="lng" id="lng" value="{{$fitness->lng}}">
			      </div>

			       <div class="form-group">
			        <label for="">รูปภาพ</label>
			        <?php   if(!($fitness->image)){ ?>
                            <?=Form::file('image',null,['class'=> 'form-control input-sm','value' => '{{$fitness->image}}'])?>
                      <?php  }
                        
                        else{ ?>
                        <img src="{{asset('images/fitnesses/'.$fitness->image)}}" style="width:250px; height:100px;" /><br><br>
                           <?=Form::file('image',null,['class'=> 'form-control input-sm','value' => '{{$fitness->image}}'])?>
                           
                      <?php  } ?>
			        
			      </div>
			      <div class="form-group">
			        <label for="">วันเวลาทำการ</label>
			       <div class="checkbox">

					  @foreach($workservices as $value)
						@if (in_array($value->id, $arrayOfWorkservicesId))			
						  	
						  		<label><input type="checkbox"  name="workservices[]" value="{{$value->id}}" checked>{{$value->day_tname}} เปิด {{$value->opentime}} ปิด {{$value->closetime}}</label>
						  	@else
						  	<label><input type="checkbox"  name="workservices[]" value="{{$value->id}}">{{$value->day_tname}} เปิด {{$value->opentime}} ปิด {{$value->closetime}}</label>
						  	@endif
					 
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



	