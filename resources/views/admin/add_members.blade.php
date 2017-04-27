@extends('layouts.app2')

<html>

<head>
	<title>เพิ่มข้อมูลในตารางสมาชิก</title>
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
		<center><h3><b>เพิ่มข้อมูลในตารางสมาชิก</b></h3></center>
		<hr>

		{{Form::open(array('url'=>'admin/add_members', 'files'=>true))}}

		
			 <div class="col-md-12" style="height: auto;" >	 
			      <div class="form-group">
			        <label for="">ชื่อจริง</label>
			        <input type="text" class="form-control input-sm" name="fname">
			      </div>

			      <div class="form-group">
			        <label for="">นามสกุล</label>
			        <input type="text" class="form-control input-sm" name="lname">
			      </div>

			      <div class="form-group">
			        <label for="">เพศ</label>
			        <select class="form-control input-sm" name="gender">
			        	<option value="Male">ชาย</option>
			        	<option value="Female">หญิง</option>

			        </select>
			       
			      </div>

			      <div class="form-group">
			        <label for="">อีเมล์</label>
			        <input type="text" class="form-control input-sm" name="email">
			      </div>
			      <div class="form-group">
			        <label for="">ชื่อผู้ใช้</label>
			        <input type="text" class="form-control input-sm" name="username">
			      </div>

			      <div class="form-group">
			        <label for="">รหัสผ่าน</label>
			        <input type="password" class="form-control input-sm" name="password">
			      </div>

			      <div class="form-group">
			        <label for="">กลุ่ม</label>
			        <input type="text" class="form-control input-sm" name="group" value="0" readonly>
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



	