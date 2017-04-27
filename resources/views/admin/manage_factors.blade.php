@extends('layouts.app2')

<html>

<head>
	<title>จัดการข้อมูลในตารางปัจจัย</title>
	
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
    
		<center><h3><b>จัดการข้อมูลในตารางปัจจัย</b></h3></center>
        <a class="btn btn-primary" href="/admin/add_factors" align="right">เพิ่มข้อมูลในตารางปัจจัย</a>
		<hr>
            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>คะเเนนด้านผลิตภัณฑ์</th>
                        <th>คะเเนนด้านสถานที่</th>
                        <th>คะเเนนด้านกายภาพ</th>
                        <th>คะเเนนด้านราคา</th>
                        <th>คะเเนนด้านรูปเเบบการบริการ</th>
                        <th>คะเเนนด้านโปรโมชัน</th>
                        <th>คะเเนนด้านพนักงาน</th>
                        <th>รหัสสมาชิก</th>
                        <th colspan="2">การจัดการฐานข้อมูล</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($factors as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->score_product}}</td>
                        <td>{{$value->score_place}}</td>
                        <td>{{$value->score_physical}}</td>
                        <td>{{$value->score_price}}</td>
                        <td>{{$value->score_process}}</td>
                        <td>{{$value->score_promotion}}</td>
                        <td>{{$value->score_people}}</td>
                        <td>{{$value->user_id}}</td>
                         <td><a class="btn btn-primary" href="{{ url('/admin/edit_factors/'.$value->id) }}">เเก้ไข</a></td>
                          <td><a class="btn btn-danger" href="{{ url('/admin/delete_factors/'.$value->id) }}" 
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



	