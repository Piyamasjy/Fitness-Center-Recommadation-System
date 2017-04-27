@extends('layouts.app')
<html>
<head>
<title>ระบบกำลังจัดกลุ่ม</title>
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
                    	 
						<?php

								
								if ((int)Auth::user()->group == 0) {
									header("Refresh: 7; url='/member/profile'");
						            echo "<div align='center'><h2>ระบบกำลังจัดกลุ่มให้ท่าน</h2><h3>...กรุณารอสักครู่...</h3>
						                 <p><img src='../icons/loader2.gif' width='150px' ></p></div> ";
								}
								elseif ((int)Auth::user()->group == 1) {
									
						            echo "<div align='center'><h2>คุณอยู่กลุ่มที่ 1 </h2>";
						            echo "<center><a href='index' class='btn btn-info' role='button'>เข้าสู่หน้าหลัก</a></center>";
						                 
								}
								elseif ((int)Auth::user()->group == 2) {
									
						            echo "<div align='center'><h2>คุณอยู่กลุ่มที่ 2 </h2>";
						            echo "<center><a href='index' class='btn btn-info' role='button'>เข้าสู่หน้าหลัก</a></center>";
						                 
								}
								elseif ((int)Auth::user()->group == 3) {
									
						            echo "<div align='center'><h2>คุณอยู่กลุ่มที่ 3 </h2>";
						            echo "<center><a href='index' class='btn btn-info' role='button'>เข้าสู่หน้าหลัก</a></center>";
						                 
								}

									
						?>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

