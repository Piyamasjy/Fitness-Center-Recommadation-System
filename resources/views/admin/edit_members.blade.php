@extends('layouts.app2')

<html>

<head>
	<title>เเก้ไขข้อมูลตารางสมาชิก</title>
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
		<center><h3><b>เเก้ไขข้อมูลในตารางสมาชิก</b></h3></center>
		<hr>
		
		 {!! Form::open(['action' => ['AdminController@update_members', $member->id],'files'=>true]) !!}
		  <div class="col-md-12" style="height: auto;" >	
		  <div class="form-group">
			        <label for="">ชื่อจริง</label>
			        <input type="text" class="form-control input-sm" name="fname" value="{{$member->fname}}">
			      </div>

			      <div class="form-group">
			        <label for="">นามสกุล</label>
			        <input type="text" class="form-control input-sm" name="lname" value="{{$member->lname}}">
			      </div>

			      <div class="form-group">
			        <label for="">เพศ</label>
			        <select class="form-control input-sm" name="gender" >
                        <?php   if($member->gender == "Male"){ ?>
                            <option value="Male">ชาย</option>
                            <option value="Female">หญิง</option>
                      <?php  }
                        
                        else{ ?>
                            <option value="Female">หญิง</option>
                            <option value="Male">ชาย</option>
                      <?php  } ?>
                        
                    </select>
			       
			      </div>

			      <div class="form-group">
			        <label for="">อีเมล์</label>
			        <input type="text" class="form-control input-sm" name="email" value="{{$member->email}}">
			      </div>
			      <div class="form-group">
			        <label for="">ชื่อผู้ใช้</label>
			        <input type="text" class="form-control input-sm" name="username" value="{{$member->username}}">
			      </div>

			      <div class="form-group">
			        <label for="">รหัสผ่าน</label>
			        <input type="password" class="form-control input-sm" name="password" value="{{$member->password}}">
			      </div>

			      <div class="form-group">
			        <label for="">กลุ่ม</label>
			        <input type="text" class="form-control input-sm" name="group" value="{{$member->group}}">
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



	