@extends('layouts.app2')

<html>

<head>
	<title>จัดการข้อมูลในตารางฟิตเนส</title>
	
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

		<div class="col-md-12" style="background-color : #FFFFCC; height: auto; width: auto;">
    
		<center><h3><b>จัดการข้อมูลในตารางฟิตเนส</b></h3></center>
        <a class="btn btn-primary" href="/admin/add_fitness" align="right">เพิ่มข้อมูลในตารางฟิตเนส</a>
		<hr>
            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ชื่อฟิตเนสภาษาอังกฤษ</th>
                        <th>ชื่อฟิตเนสภาษาไทย</th>
                        <th>ที่อยู่</th>
                        <th>เว็บไซต์</th>
                        <th>เบอร์โทร</th>
                        <th>ละติจูด</th>
                        <th>ลองจิจูด</th>
                        <th>คำอธิบาย</th>
                        <th>รูปภาพ</th>
                        <th colspan="2">จัดการ</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($fitness as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->fitness_ename}}</td>
                        <td>{{$value->fitness_tname}}</td>
                        <td>{{$value->addresses}}</td>
                        <td>{{$value->website}}</td>
                        <td>{{$value->contact_number}}</td>
                        <td>{{$value->lat}}</td>
                        <td>{{$value->lng}}</td>
                        <td>{{$value->fitness_description}}</td>

                        <td><img src="{{asset('images/fitnesses/'.$value->image)}}" style="width:200px; height:100px;" /></td>
                        <td><a class="btn btn-primary" href="{{ url('/admin/edit_fitness/'.$value->id) }}">เเก้ไข</a></td>
                         {{-- <td><a class="btn btn-primary" href="{{ url('/admin/delete_fitness/'.$value->id) }}">ลบ</a></td> --}}
                        <td><a class="btn btn-danger" href="{{ url('/admin/delete_fitness/'.$value->id) }}" 
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



	