@extends('layouts.app2')

<html>

<head>
	<title>จัดการข้อมูลในตารางผู้ดูเเลระบบ</title>
	
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

		<div class="col-md-12" style="background-color : #FFFFCC; height: 510px; width: 1366px;">
    
		<center><h3><b>จัดการข้อมูลในตารางผู้ดูเเลระบบ</b></h3></center>
        <a class="btn btn-primary" href="/admin/add_admins" align="right">เพิ่มข้อมูลในตารางผู้ดูเเลระบบ</a>
		<hr>
            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ชื่อจริง</th>
                        <th>นามสกุล</th>
                        <th>อีเมล์</th>
                        <th>ชื่อผู้ใช้</th>
                        <th>รหัสผ่าน</th>
                        
                        <th colspan="2">จัดการ</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($admin as $value)
                    <tr>
                        <td>{{$value->fname}}</td>
                        <td>{{$value->lname}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->username}}</td>
                        <td>{{$value->password}}</td>
                       
                        <td><a class="btn btn-primary" href="{{ url('/admin/edit_admins/'.$value->id) }}">เเก้ไข</a></td>
                        <td><a class="btn btn-danger" href="{{ url('/admin/delete_admins/'.$value->id) }}" 
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
      $window.alert('ลบข้อมูลเรียบร้อย');
    }
  }
}
</script>
	

</body>
@endsection
</html>



	