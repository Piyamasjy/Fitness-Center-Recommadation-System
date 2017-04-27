@extends('layouts.app2')

<html>

<head>
	<title>จัดการข้อมูลในตารางคลาส</title>
	
	  <link rel="stylesheet" href="{{asset('css/mycss.css')}}">
	  
	  <script src="{{asset('js/gmaps.js')}}"></script>
	  <script src="{{asset('js/bootstrap.min.js')}}"></script>
	  <script src="{{asset('js/bootbox.min.js')}}"></script>
	  <script src="{{asset('js/jquery.min.js')}}"></script>
	  <script src="{{asset('js/bootstrap-select.js')}}"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
</head>	

@section('content')
<body ng-app ng-controller="FooController">
     @if(Session::has('message'))
            <script type="text/javascript">
                alert("{{ Session::get('message') }}")
            </script>
                  
        @endif
         <script type="text/javascript">
            myFunction();
        </script>


	<div class="col-md-12" style="background-color : #FFFFCC; height: auto;">
    
		<center><h3><b>จัดการข้อมูลในตารางคลาส</b></h3></center>
        <a class="btn btn-primary" href="/admin/add_class" align="right">เพิ่มข้อมูลในตารางคลาส</a>
		<hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ชื่อคลาสภาษาอังกฤษ</th>
                        <th>ชื่อคลาสภาษาไทย</th>
                        <th>คำอธิบาย</th>
                        <th>รูปภาพ</th>
                        <th>รหัสประเภท</th>
                        <th colspan="2">จัดการ</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($classes as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->class_ename}}</td>
                        <td>{{$value->class_tname}}</td>
                        <td>{{$value->class_description}}</td>
                        {{-- <td>{{$value->images}}</td> --}}
                         <td><img src="{{asset('images/classes/'.$value->images)}}" style="width:200px; height:100px;" /></td>
                        <td>{{$value->type_id}}</td>
                        <td><a class="btn btn-primary" href="{{ url('/admin/edit_class/'.$value->id) }}">เเก้ไข</a></td>
                        <td><a class="btn btn-danger" href="{{ url('/admin/delete_class/'.$value->id) }}" 
                            onClick="return confirm('คุณต้องการลบข้อมูลนี้ใช่หรือไม่?')" ng-click="remove_user()">ลบ</a></td>
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
		
		
       
	</div>
	
<script>
function FooController($scope, $window) {
  $scope.removeUser = function() {
    var deleteUser = $window.confirm('คุณต้องการลบข้อมูลนี้ใช่หรือไม่?');

    if (deleteUser) {
      $window.alert('ลบข้อมูลเรียบร้อยเเล้ว');
    }
  }
}
</script>
</body>
@endsection
</html>



	