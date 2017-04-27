@extends('layouts.app')
<html>
<head>
    <title>เเก้ไขข้อมูลส่วนตัว</title>
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">เเก้ไขข้อมูลส่วนตัว</div>
                <div class="panel-body">

                    
        {!! Form::open(['action' => ['MemberController@update_profile', $member->id],'files'=>true]) !!}

                       
                 
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

                  {{-- <div class="form-group">
                    <label for="">ยืนยันรหัสผ่านอีกครั้ง</label>
                    <input type="password" class="form-control input-sm" name="password" value="{{$member->password}}">
                  </div> --}}
                  
                  <div class="form-group">
                    <label for="">กลุ่ม</label>
                    <input type="text" class="form-control input-sm" name="group" value="{{$member->group}}" readonly>
                  </div>


                   <div class="form-group">
                    <center><button class="btn btn-sm btn-danger">บันทึก</button></center>
                  </div>

        </div>

                        {{-- <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                         

                            <label for="name" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-4">
                                <input id="fname" type="text" class="form-control" name="fname" value="{{ $member->fname}}" required autofocus>

                                @if ($errors->has('fname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                            <label for="lname" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-4">
                                <input id="lname" type="text" class="form-control" name="lname" value="{{ $member->lname}}" required autofocus>

                                @if ($errors->has('lname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-4">
                                <select name="gender" id="gender" class="form-control" required autofocus> 

                                    if({{$member->gender}} == "Male"){
                                        <option value="Male">Male</option>
                                    }
                                    else{
                                        <option value="Female">Female</option>
                                    }
                                     
                                     
                                </select> 
                               
                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-mail</label>

                            <div class="col-md-4">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $member->email}}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-4">
                                <input id="username" type="username" class="form-control" name="username" value="{{ $member->username}}" required>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-4">
                                <input id="password" type="password" class="form-control" name="password" required >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-4">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('group') ? ' has-error' : '' }}">
                            <label for="group" class="col-md-4 control-label">Group</label>

                            <div class="col-md-4">
                                <input id="group" type="group" class="form-control" name="group" value="{{ $member->group}}" readonly>

                                @if ($errors->has('group'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('group') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit
                                </button>
                            </div>
                        </div> --}}
                   {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
