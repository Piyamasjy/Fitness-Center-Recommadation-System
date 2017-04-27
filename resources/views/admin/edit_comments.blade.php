@extends('layouts.app2')

<html>

<head>
	<title>เเก้ไขข้อมูลในตารางการเเสดงความคิดเห็น</title>
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
		<center><h3><b>เเก้ไขข้อมูลในตารางการเเสดงความคิดเห็น</b></h3></center>
		<hr>

		{!! Form::open(['action' => ['AdminController@update_comments', $comments->id],'files'=>true]) !!}

			<div class="col-md-6" style="height: auto;">
				
			 <div class="form-group">
			   
			      <div class="form-group">
			        <label for="">คะเเนน</label>
			        <input type="text" class="form-control input-sm" name="rating" value="{{$comments->rating}}">
			      </div>

			     <div class="form-group">
			        <label for="">สมาชิก</label>
			       <div class="radio">

					  @foreach($members as $value)
						@if ($value->id == $comments->user_id)			
						  	
						  	<label><input type="radio" name="user_id" id="user_id" value="{{$value->id}}" checked>{{$value->fname}}</label>
						  		
						 @else
						  	<label><input type="radio" name="user_id" id="user_id" value="{{$value->id}}">{{$value->fname}}</label>
						  	
						 @endif
					 
					   @endforeach
					</div>
			      </div>
			   </div>
			  </div>
			<div class="col-md-6" style="height: auto;">
			      <div class="form-group">
			        <label for="">ฟิตเนส</label>
			       <div class="radio">

					  @foreach($fitness as $value)
						@if ($value->id == $comments->fitness_id)			
						  	
						  	<label><input type="radio" name="fitness_id" id="fitness_id" value="{{$value->id}}" checked>{{$value->fitness_tname}}</label>
						  		
						 @else
						  	<label><input type="radio" name="fitness_id" id="fitness_id" value="{{$value->id}}">{{$value->fitness_tname}}</label>
						  	
						 @endif
					 
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
       
	</div>
	

</body>
@endsection
</html>



	