@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <title>คำอธิบายคลาส</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    
    <script src="{{asset('js/jquery.min.js')}}"></script>
    
    
</head>
@section('content')
<body>

    <div class="col-md-12"  style="height: auto;" >
        <h2><img src="{{asset("images/schedule.png")}}" width="80px" height="70px">  คำอธิบายคลาส (Class Description)</h2>

       <div class="col-md-6">
        <table class="table table-bordered-aerobics">
          <thead>
            <tr>
              <th colspan="5">เเอโรบิก (Aerobics)</th>
            </tr>
          </thead>
          <tbody id="click-aerobics">
            <tr>
              <td scope="row">
               
                <button role="button" class="btn btn-aerobics" data-toggle="modal" data-target="#myModal1">เเอโรบิก</button>
                <?php 
                   $i = 1;
                   foreach ($description as $key) 
                   {           
                ?>
                <div class="modal fade" id="myModal<?php echo $key->id++; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h2 class="modal-title" id="myModalLabel"><?php echo $key->class_tname; ?> [
                          <?php echo $key->class_ename; ?> ]</h2>
                      </div>
                      <div class="modal-body">
                        <img src="..\images\classes\<?php echo $key->images; ?>" style="width:400px;height:200px;" alt="picture"><hr>
                        <p><?php echo $key->class_description; ?></p> 
                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                      </div>
                   </div>
                  </div>
                </div>
                <?php } ?>
              </td>
              <td>
                <button role="button" class="btn btn-aerobics" data-toggle="modal" data-target="#myModal2">
                  บอดี้คอมเเบท</button> 

              </td>
              <td>
                <button role="button" class="btn btn-aerobics" data-toggle="modal" data-target="#myModal3">
                  บอดี้บั้มพ์</button> 
                  
                 
            </td>
              <td>
                  <button role="button" class="btn btn-aerobics" data-toggle="modal" data-target="#myModal4">ยิมบอล</button>
              </td>
              
            </tr>
            <tr>
              <td colspan="2">
                <button role="button" class="btn btn-aerobics" data-toggle="modal" data-target="#myModal6">สเต็ปเเอโรบิก</button>
              </td>
              <td colspan="2">
                <button role="button" class="btn btn-aerobics" data-toggle="modal" data-target="#myModal7">สตรีชชิง</button>
            </td>
            </tr>
          </tbody>
        </table>

        <table class="table table-bordered-dances">
          <thead>
            <tr>
              <th colspan="6">การเต้น (Dance)</th>
            </tr>
          </thead>
          <tbody>
            <tr> 
            <td scope="row">
              <button role="button" class="btn btn-dances" data-toggle="modal" data-target="#myModal8">ฮิพฮอพ</button>
            </td>
              <td>
              <button role="button" class="btn btn-dances" data-toggle="modal" data-target="#myModal9">ลาตินเเดนซ์</button>
            </td>
            <td >
              <button role="button" class="btn btn-dances" data-toggle="modal" data-target="#myModal10">เเจ๊ซ</button>
            </td>
              <td >
              <button role="button" class="btn btn-dances" data-toggle="modal" data-target="#myModal11">ไพล็อกซิง</button>
            </td>
            </tr>
            <tr>
            <td >
              <button role="button" class="btn btn-dances" data-toggle="modal" data-target="#myModal12">สตรีทเเดนซ์</button>
            </td>
            <td>
              <button role="button" class="btn btn-dances" data-toggle="modal" data-target="#myModal14">รีบาวน์</button>
            </td>
            <td>
              <button role="button" class="btn btn-dances" data-toggle="modal" data-target="#myModal13">ซุมบ้า</button>
            </td>
            <td>
              <button role="button" class="btn btn-dances" data-toggle="modal" data-target="#myModal53">การเต้นเเบบง่าย</button>
            </td>
            
            </tr>
          </tbody>
        </table>

        <table class="table table-bordered-fitness">
          <thead>
            <tr>
              <th colspan="5">ฟิตเนส (Fitness)</th>
            </tr>
          </thead>
          <tbody>
              <td scope="row">
              <button role="button" class="btn btn-fitness" data-toggle="modal" data-target="#myModal37">การออกกำลังกายครบวงจร</button>
            </td>
              <td >
              <button role="button" class="btn btn-fitness" data-toggle="modal" data-target="#myModal38">การบริหารกล้ามเนื้อหน้าท้อง</button>
            </td>
              <td>
              <button role="button" class="btn btn-fitness" data-toggle="modal" data-target="#myModal39">ฟิตเนส</button>
            </td>
             
            </tr>
            <tr>
               <td>
              <button role="button" class="btn btn-fitness" data-toggle="modal" data-target="#myModal40">ริป60</button>
            </td>
              <td>
              <button role="button" class="btn btn-fitness" data-toggle="modal" data-target="#myModal41">การเสริมสร้างกล้ามเนื้อ</button>
            </td>
            <td  scope="row">
              <button role="button" class="btn btn-fitness" data-toggle="modal" data-target="#myModal42">ทาบาตะ</button>
            </td>
            </tr> 
            <tr>
              
              <td>
              <button role="button" class="btn btn-fitness" data-toggle="modal" data-target="#myModal43">ทีอาร์เอ็กซ์</button>
            </td> 
              <td>
              <button role="button" class="btn btn-fitness" data-toggle="modal" data-target="#myModal44">ไวเปอร์</button>
            </td>
              <td colspan="2">
              <button role="button" class="btn btn-fitness" data-toggle="modal" data-target="#myModal45">เอบีที</button>
            </td>
             
            </tr>
          </tbody>
        </table>

        <table class="table table-bordered-spinning">
          <thead>
            <tr>
              <th colspan="5">การปั่นจักรยาน (Spinning)</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row">
              <button role="button" class="btn btn-spinning" data-toggle="modal" data-target="#myModal15">การปั่นจักรยาน</button>
            </td>
              <td>
              <button role="button" class="btn btn-spinning" data-toggle="modal" data-target="#myModal16">อาร์พีเอ็ม</button>
            </td>
            </tr>
            
          </tbody>
        </table><br>
        
  </div>

    <div class="col-md-6" style="height: auto;">
        <table class="table table-bordered-yoga">
          <thead>
            <tr>
              <th colspan="5">โยคะเเละพิลาทีส (Yoga and Pilates Matwork)</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row">
              <button role="button" class="btn btn-yoga" data-toggle="modal" data-target="#myModal23">หยินโยคะ</button>
            </td>
              <td>
              <button role="button" class="btn btn-yoga" data-toggle="modal" data-target="#myModal24">วินยาสะโยคะ</button>
            </td>
            <td >
              <button role="button" class="btn btn-yoga" data-toggle="modal" data-target="#myModal25">สุริยนมัสการ</button>
            </td>
             
            </tr>
            <tr>
              <td>
              <button role="button" class="btn btn-yoga" data-toggle="modal" data-target="#myModal26">อินเทอร์เกรทีฟโยคะเทราพี</button>
            </td>
              
            <td>
              <button role="button" class="btn btn-yoga" data-toggle="modal" data-target="#myModal28">พีลาทีสบอล</button>
            </td>
             <td>
              <button role="button" class="btn btn-yoga" data-toggle="modal" data-target="#myModal29">พีลาทีส</button>
            </td>
             
              
            </tr>
            <tr>
              <td>
              <button role="button" class="btn btn-yoga" data-toggle="modal" data-target="#myModal31">โยคะร้อน</button>
            </td> 
              <td>
              <button role="button" class="btn btn-yoga" data-toggle="modal" data-target="#myModal32">หัตถาโยคะ</button>
            </td>
              <td>
              <button role="button" class="btn btn-yoga" data-toggle="modal" data-target="#myModal33">เจนเทิลโยคะ</button>
            </td>
            </tr>
             <tr>
               <td>
               <button role="button" class="btn btn-yoga" data-toggle="modal" data-target="#myModal54">โยคะ</button>
             </td>
               <td scope="row">
              <button role="button" class="btn btn-yoga" data-toggle="modal" data-target="#myModal27">พาวเวอร์โยคะ</button>
            </td>
             <td>
              <button role="button" class="btn btn-yoga" data-toggle="modal" data-target="#myModal30">โยคะหัวเราะ</button>
            </td>

            </tr>
             <tr>
              <td colspan="2">
               <button role="button" class="btn btn-yoga" data-toggle="modal" data-target="#myModal35">อัษฎางค์โยคะ</button>
             </td>
             <td>
              <button role="button" class="btn btn-yoga" data-toggle="modal" data-target="#myModal34">บอดี้บาลานซ์</button>
            </td>

            </tr>
            <tr>
              <td colspan="2">
               <button role="button" class="btn btn-yoga" data-toggle="modal" data-target="#myModal36">เเอเรียลบอดี้ฟิต</button>
             </td>
             
              <td>
               <button role="button" class="btn btn-yoga" data-toggle="modal" data-target="#myModal5">โยคะบนผ้า</button>
             </td>
              
            </tr>
          </tbody>
        </table>

        <table class="table table-bordered-martial">
          <thead>
            <tr>
              <th colspan="6">ศิลปะการต่อสู้ (Martial Arts)</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row">
               <button role="button" class="btn btn-matial" data-toggle="modal" data-target="#myModal17">บราซิลเลี่ยน ยูยิสสู</button>
             </td>
              <td>
               <button role="button" class="btn btn-matial" data-toggle="modal" data-target="#myModal18">ยูโด</button>
             </td>
              <td>
              <button role="button" class="btn btn-matial" data-toggle="modal" data-target="#myModal19">ศิลปะการต่อสู้แบบผสม</button>
            </td>
          </tr>
            <tr>
            <td scope="row">
              <button role="button" class="btn btn-matial" data-toggle="modal" data-target="#myModal20">มวยไทย</button>
            </td>
              <td>
              <button role="button" class="btn btn-matial" data-toggle="modal" data-target="#myModal21">โนกิ</button>
            </td>
              <td>
              <button role="button" class="btn btn-matial" data-toggle="modal" data-target="#myModal22">มวยปล้ำ</button>
            </td>
            </tr>
           
          </tbody>
        </table>


        <table class="table table-bordered-sports">
          <thead>
            <tr>
              <th colspan="5">กีฬา (Sports)</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row">
              <button role="button" class="btn btn-sports" data-toggle="modal" data-target="#myModal46">บาสเกตบอล</button>
            </td>
              <td>
              <button role="button" class="btn btn-sports" data-toggle="modal" data-target="#myModal47">เเบดมินตัน</button>
            </td>
              <td>
              <button role="button" class="btn btn-sports" data-toggle="modal" data-target="#myModal48">ฟุตบอล</button>
            </td>
              <td>
              <button role="button" class="btn btn-sports" data-toggle="modal" data-target="#myModal49">การวิ่ง / การเดิน</button>
            </td>
            </tr>
            <tr>
              <td scope="row">
              <button role="button" class="btn btn-sports" data-toggle="modal" data-target="#myModal50">เซปักตะกร้อ</button>
            </td>
              <td>
              <button role="button" class="btn btn-sports" data-toggle="modal" data-target="#myModal51">ว่ายน้ำ</button>
            </td>
              <td colspan="2">
              <button role="button" class="btn btn-sports" data-toggle="modal" data-target="#myModal52">เทนนิส</button>
            </td>
            </tr>
          </tbody>
        </table>

        

      
    </div>
    
     
</div>


</body>
@endsection
