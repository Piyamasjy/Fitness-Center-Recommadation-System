<!doctype html>
<html lang = "en">
<head>
  <meta charset="UTF-8">
  <title>ยินดีต้อนรับ</title>
  <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>

<body>
    <!-- Header -->
    <header id="top" class="header">
        <div class="text-vertical-center">
          <img src="{{asset('icons/logo.png')}}" width="200px"><br>
            <center><img src="{{asset('images/gotoWeb.png')}}" usemap ="#bg"></center>
            <map name="bg">
              <area shape="rect" coords="124,77,474,142" href="/user/index">
              <area shape="rect" coords="165,168,256,194" href="/login">
              <area shape="rect" coords="345,166,444,191" href="/register">
        </div>
    </header>
 
</body>
</html>