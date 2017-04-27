@extends('layouts.app2')

<html>
<head>
  <title>หน้าหลักสำหรับผู้ดูเเลระบบ</title>
 
  <link rel="stylesheet" href="{{asset('css/mycss.css')}}">
 
  <script src="{{asset('js/gmaps.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/bootbox.min.js')}}"></script>
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/bootstrap-select.js')}}"></script>

</head>
@section('content')
<body>
    
    <div class="col-md-12"style="height: auto;">
        
        <center><h2><b>จัดการตารางฐานข้อมูล (Manage Database Table)</b></h2></center>
        <hr>
        <div class="col-md-6" style="height: auto;">
            <table class="table table-bordered-manage">
                <thead>
                    <tr>
                      <th colspan="2">ตารางฟิตเนส (Fitness)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <td><button><a href="/admin/manage_fitness">จัดการข้อมูลตาราง</a></button></td>
                      <td><button><a href="/admin/add_fitness">เพิ่มข้อมูลในตาราง</a></button></td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered-manage">
                <thead>
                    <tr>
                      <th colspan="2">ตารางประเภทสถานที่ออกกำลังกาย (Typesports)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <td><button><a href="/admin/manage_typesports">จัดการข้อมูลตาราง</a></button></td>
                      <td><button><a href="/admin/add_typesports">เพิ่มข้อมูลในตาราง</a></button></td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered-manage">
                <thead>
                    <tr>
                      <th colspan="2">ตารางคลาส (Class)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <td><button><a href="/admin/manage_class">จัดการข้อมูลตาราง</a></button></td>
                      <td><button><a href="/admin/add_class">เพิ่มข้อมูลในตาราง</a></button></td>
                    </tr>
                </tbody>
            </table>
             <table class="table table-bordered-manage">
                <thead>
                    <tr>
                      <th colspan="2">ตารางสมาชิก (Members)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <td><button><a href="/admin/manage_members">จัดการข้อมูลตาราง</a></button></td>
                      <td><button><a href="/admin/add_members">เพิ่มข้อมูลในตาราง</a></button></td>
                    </tr>
                </tbody>
            </table>
             
             
        </div>
        <div class="col-md-6" style="height: auto;">
            <table class="table table-bordered-manage">
                <thead>
                    <tr>
                      <th colspan="2">ตารางวันเวลาทำการ (Workservices)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <td><button><a href="/admin/manage_workservices">จัดการข้อมูลตาราง</a></button></td>
                      <td><button><a href="/admin/add_workservices">เพิ่มข้อมูลในตาราง</a></button></td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered-manage">
                <thead>
                    <tr>
                      <th colspan="2">ตารางปัจจัย (Factors)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <td><button><a href="/admin/manage_factors">จัดการข้อมูลตาราง</a></button></td>
                      <td><button><a href="/admin/add_factors">เพิ่มข้อมูลในตาราง</a></button></td>
                    </tr>
                </tbody>
            </table>
        
            
            <table class="table table-bordered-manage">
                <thead>
                    <tr>
                      <th colspan="2">ตารางการเเสดงความคิดเห็น (Comments)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <td><button><a href="/admin/manage_comments">จัดการข้อมูลตาราง</a></button></td>
                      <td><button><a href="/admin/add_comments">เพิ่มข้อมูลในตาราง</a></button></td>
                    </tr>
                </tbody>
            </table>
             <table class="table table-bordered-manage">
                <thead>
                    <tr>
                      <th colspan="2">ตารางผู้ดูเเลระบบ (Admins)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <td><button><a href="/admin/manage_admins">จัดการข้อมูลตาราง</a></button></td>
                      <td><button><a href="/admin/add_admins">เพิ่มข้อมูลในตาราง</a></button></td>
                    </tr>
                </tbody>
            </table>
             
             
        </div>

        
    </div>

    
    
</body>
@endsection
</html>
