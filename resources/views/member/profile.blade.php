@extends('layouts.app')
<html>
<head>
<title>ข้อมูลส่วนตัว</title>
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
               
                    <div class="panel-body">
                    	 @if(Session::has('message'))
					            <script type="text/javascript">
					                alert("{{ Session::get('message') }}")
					            </script>
					                  
					        @endif
                    	<center><h3><b>ข้อมูลส่วนตัว</b></h3></center>
                    		<hr>
						<?php

								if ((int)Auth::user()->group == 1) 
								{
									echo "<h3><b>ชื่อจริง :: </b>".Auth::user()->fname."</h3>";
									echo "<h3><b>นามสกุล :: </b>".Auth::user()->lname."</h3>";
									if(Auth::user()->gender == "Male")
									{
										echo "<h3><b>เพศ :: </b>ชาย</h3>";
									}
									else if(Auth::user()->gender == "Female")
									{
										echo "<h3><b>เพศ :: </b>หญิง</h3>";
									}
									echo "<h3><b>อีเมล์ :: </b>".Auth::user()->email."</h3>";
									echo "<h3><b>กลุ่มของคุณ :: </b>".Auth::user()->group."</h3>";
									echo "<center><a href=/member/edit_profile/".Auth::user()->id." class='btn btn-info' role='button'>เเก้ไขข้อมูลส่วนตัว</a>&nbsp;<a href='index' class='btn btn-info' role='button'>เข้าสู่หน้าหลัก</a></center>";

								
								}
								elseif ((int)Auth::user()->group == 2)
								{
									echo "<h3><b>ชื่อจริง :: </b>".Auth::user()->fname."</h3>";
									echo "<h3><b>นามสกุล :: </b>".Auth::user()->lname."</h3>";
									if(Auth::user()->gender == "Male")
									{
										echo "<h3><b>เพศ :: </b>ชาย</h3>";
									}
									else if(Auth::user()->gender == "Female")
									{
										echo "<h3><b>เพศ :: </b>หญิง</h3>";
									}
									echo "<h3><b>อีเมล์ :: </b>".Auth::user()->email."</h3>";
									echo "<h3><b>กลุ่มของคุณ :: </b>".Auth::user()->group."</h3>";
									echo "<center><a href=/member/edit_profile/".Auth::user()->id." class='btn btn-info' role='button'>เเก้ไขข้อมูลส่วนตัว</a>&nbsp;<a href='index' class='btn btn-info' role='button'>เข้าสู่หน้าหลัก</a></center>";

									
								}
								elseif ((int)Auth::user()->group == 3)
								{
									echo "<h3><b>ชื่อจริง :: </b>".Auth::user()->fname."</h3>";
									echo "<h3><b>นามสกุล :: </b>".Auth::user()->lname."</h3>";
									if(Auth::user()->gender == "Male")
									{
										echo "<h3><b>เพศ :: </b>ชาย</h3>";
									}
									else if(Auth::user()->gender == "Female")
									{
										echo "<h3><b>เพศ :: </b>หญิง</h3>";
									}
									echo "<h3><b>อีเมล์ :: </b>".Auth::user()->email."</h3>";
									echo "<h3><b>กลุ่มของคุณ :: </b>".Auth::user()->group."</h3>";
									echo "<center><a href=/member/edit_profile/".Auth::user()->id." class='btn btn-info' role='button'>เเก้ไขข้อมูลส่วนตัว</a>&nbsp;<a href='index' class='btn btn-info' role='button'>เข้าสู่หน้าหลัก</a></center>";
									
								}
								elseif ((int)Auth::user()->group == 0) {
									echo "<h3><b>ชื่อจริง :: </b>".Auth::user()->fname."</h3>";
									echo "<h3><b>นามสกุล :: </b>".Auth::user()->lname."</h3>";
									if(Auth::user()->gender == "Male")
									{
										echo "<h3><b>เพศ :: </b>ชาย</h3>";
									}
									else if(Auth::user()->gender == "Female")
									{
										echo "<h3><b>เพศ :: </b>หญิง</h3>";
									}
									echo "<h3><b>อีเมล์ :: </b>".Auth::user()->email."</h3>";
									echo "<h3><b>กลุ่มของคุณ :: </b>".Auth::user()->group."</h3>";
									echo "<center><a href=/member/edit_profile/".Auth::user()->id." class='btn btn-info' role='button'>เเก้ไขข้อมูลส่วนตัว</a>&nbsp;<a href='index' class='btn btn-info' role='button'>เข้าสู่หน้าหลัก</a></center>";

								}

									
						?>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

