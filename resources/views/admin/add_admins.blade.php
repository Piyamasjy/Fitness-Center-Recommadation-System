@extends('layouts.app2')

<html>

<head>
	<title>เพิ่มข้อมูลในตารางผู้ดูเเลระบบ</title>
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
		<center><h3><b>เพิ่มข้อมูลในตารางผู้ดูเเลระบบ</b></h3></center>
		<hr>

		<h4><b>วิธีเพิ่มข้อมูลในตารางผู้ดูเเลระบบใน command line</b></h4>
		<p>=> php artisan tinker</p>
		<p>=> $admin = new App\Admin</p>
		<p>=> $admin->fname = "xxxxxxxxxx"</p>
		<p>=> $admin->lname = "xxxxxx"</p>
		<p>=> $admin->email = "xxxx@xxxx.com"</p>
		<p>=> $admin->username = "xxxxxxxxx"</p>
		<p>=> $admin->password = Hash::make("xxxxxxxxxx")</p>
		<p>=> $admin->save()</p>
		
		</div>
		</div>
		</div>
		</div>
		</div>
     
      

       
       
	</div>
	

</body>
@endsection
</html>



	