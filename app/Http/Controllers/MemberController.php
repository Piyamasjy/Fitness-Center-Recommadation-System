<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Fitness;

use App\Typesport;

use App\Factor;

use App\User;

use Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Input;

use Session;


class MemberController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index_route()
    {
      // $fit_comment = DB::table('comments')->get();
        $fit_comment = DB::table('comments')->select('fitness.*','comments.*','members.*')
                                            ->join('members','members.id','=','comments.user_id')
                                            ->join('fitness','fitness.id','=','comments.fitness_id')
                                            ->get();
        $fitness = DB::table('fitness')->get();
        
      return view('member.route',compact('fit_comment','fitness'));
     
    }

    public function show_class()
    {
      return view('member.class_type');
    }

    public function description_class()
    {
      $description = DB::table('class')->get();
      // print_r($description);
      return view('member.class_type',compact('description'));

    }


    public function searchType()
    {
        //by name
        $name = Input::get ( 'name' );
        //by work
        $nameDay = Input::get ( 'nameDay' );
        // $nameOpen = Input::get ( 'nameOpen' );
        // $nameClose = Input::get ( 'nameClose' );
        $nameOpenFirst = Input::get ( 'nameOpenFirst' );
        $nameOpenLast = Input::get ( 'nameOpenLast' );
        $nameCloseFirst = Input::get ( 'nameCloseFirst' );
        $nameCloseLast = Input::get ( 'nameCloseLast' );
        //by type
        $listType = Input::get ( 'listType' );
        $listClass = Input::get ( 'listClass' );
        //check empty
        $details = [];
        $types = DB::table('typesports')->orderBy('type_ename','asc')->get();
       $classes = DB::table('class')->orderBy('class_ename','asc')->get();
       $R1 = DB::table('comments')->select('fitness.*', DB::raw('avg(comments.rating) as avg_fitness'))
                                  ->join('fitness','comments.fitness_id','=','fitness.id')
                                  ->join('members','members.id','=','comments.user_id')
                                  ->where('members.group','=','1')
                                  ->groupBy('fitness.id')
                                  ->get();
        $R2 = DB::table('comments')->select('fitness.*', DB::raw('avg(comments.rating) as avg_fitness'))
                                  ->join('fitness','comments.fitness_id','=','fitness.id')
                                  ->join('members','members.id','=','comments.user_id')
                                  ->where('members.group','=','2')
                                  ->groupBy('fitness.id')
                                  ->get();
        $R3 = DB::table('comments')->select('fitness.*', DB::raw('avg(comments.rating) as avg_fitness'))
                                  ->join('fitness','comments.fitness_id','=','fitness.id')
                                  ->join('members','members.id','=','comments.user_id')
                                  ->where('members.group','=','3')
                                  ->groupBy('fitness.id')
                                  ->get();
        
        $V1 = DB::table('comments')->select('fitness.*', DB::raw('count(comments.rating) as count_fitness'))
                                  ->join('fitness','comments.fitness_id','=','fitness.id')
                                  ->join('members','members.id','=','comments.user_id')
                                  ->where('members.group','=','1')
                                  ->groupBy('fitness.id')
                                  ->get();
        $V2 = DB::table('comments')->select('fitness.*', DB::raw('count(comments.rating) as count_fitness'))
                                  ->join('fitness','comments.fitness_id','=','fitness.id')
                                  ->join('members','members.id','=','comments.user_id')
                                  ->where('members.group','=','2')
                                  ->groupBy('fitness.id')
                                  ->get();
        $V3 = DB::table('comments')->select('fitness.*', DB::raw('count(comments.rating) as count_fitness'))
                                  ->join('fitness','comments.fitness_id','=','fitness.id')
                                  ->join('members','members.id','=','comments.user_id')
                                  ->where('members.group','=','3')
                                  ->groupBy('fitness.id')
                                  ->get();
        
        $C1 = DB::table('comments')->select(DB::raw('avg(rating) as avg_allfitness'))
                                  ->join('members','members.id','=','comments.user_id')
                                  ->where('members.group','=','1')
                                  ->get();
        $C2 = DB::table('comments')->select(DB::raw('avg(rating) as avg_allfitness'))
                                  ->join('members','members.id','=','comments.user_id')
                                  ->where('members.group','=','2')
                                  ->get();
        $C3 = DB::table('comments')->select(DB::raw('avg(rating) as avg_allfitness'))
                                  ->join('members','members.id','=','comments.user_id')
                                  ->where('members.group','=','3')
                                  ->get();
        
        $M1 = DB::select("SELECT MIN(count_r) as minc
                        from (SELECT fitness.id,COUNT(comments.rating) as count_r
                              from comments
                              INNER JOIN fitness,members
                              where comments.fitness_id = fitness.id
                              and members.id = comments.user_id
                              and members.group = 1
                              GROUP BY fitness.id)
                        comments");  
        $M2 = DB::select("SELECT MIN(count_r) as minc
                        from (SELECT fitness.id,COUNT(comments.rating) as count_r
                              from comments
                              INNER JOIN fitness,members
                              where comments.fitness_id = fitness.id
                              and members.id = comments.user_id
                              and members.group = 1
                              GROUP BY fitness.id)
                        comments");  
        $M3 = DB::select("SELECT MIN(count_r) as minc
                        from (SELECT fitness.id,COUNT(comments.rating) as count_r
                              from comments
                              INNER JOIN fitness,members
                              where comments.fitness_id = fitness.id
                              and members.id = comments.user_id
                              and members.group = 1
                              GROUP BY fitness.id)
                        comments");  

        //group1
        $wr = array();
        $avg = $C1[0]->avg_allfitness;
        for($i=0;$i<count($R1);$i++){
            $a = ($R1[$i]->avg_fitness*$V1[$i]->count_fitness+$avg*$M1[0]->minc)/($V1[$i]->count_fitness+$M1[0]->minc);
            array_push($wr, array($R1[$i]->fitness_tname,$a));
        }
        asort($wr);
        $max = 0;$pos=0;
        $baye_rating1 = array();$j=0;
        while($j<5){
            for($i=0;$i<count($wr);$i++){
                if($wr[$i][1]>=$max){
                    $max = $wr[$i][1];
                    $pos=$i;
                }

            }
            array_push($baye_rating1,array($wr[$pos][0],$wr[$pos][1]));
                $wr[$pos][0]=-1;
                $wr[$pos][1]=-1;
                $max = 0;
                $pos = 0;
                if($j==4)break;
                $j++;

        }
        //group2
        $wr2 = array();
        $avg2 = $C2[0]->avg_allfitness;
        for($i=0;$i<count($R2);$i++){
            $a2 = ($R2[$i]->avg_fitness*$V2[$i]->count_fitness+$avg*$M2[0]->minc)/($V2[$i]->count_fitness+$M2[0]->minc);
            array_push($wr2, array($R2[$i]->fitness_tname,$a2));
        }
        asort($wr2);
        $max2 = 0;$pos2=0;
        $baye_rating2 = array();$j=0;
        while($j<5){
            for($i=0;$i<count($wr2);$i++){
                if($wr2[$i][1]>=$max2){
                    $max2 = $wr2[$i][1];
                    $pos2=$i;
                }

            }
            array_push($baye_rating2,array($wr2[$pos2][0],$wr2[$pos2][1]));
                $wr2[$pos2][0]=-1;
                $wr2[$pos2][1]=-1;
                $max2 = 0;
                $pos2 = 0;
                if($j==4)break;
                $j++;

        }
        //group3
        $wr3 = array();
        $avg3 = $C3[0]->avg_allfitness;
        for($i=0;$i<count($R3);$i++){
            $a3 = ($R3[$i]->avg_fitness*$V3[$i]->count_fitness+$avg*$M3[0]->minc)/($V3[$i]->count_fitness+$M3[0]->minc);
            array_push($wr3, array($R3[$i]->fitness_tname,$a3));
        }
        asort($wr3);
        $max3 = 0;$pos3=0;
        $baye_rating3 = array();$j=0;
        while($j<5){
            for($i=0;$i<count($wr3);$i++){
                if($wr3[$i][1]>=$max3){
                    $max3 = $wr3[$i][1];
                    $pos3=$i;
                }

            }
            array_push($baye_rating3,array($wr3[$pos3][0],$wr3[$pos3][1]));
                $wr3[$pos3][0]=-1;
                $wr3[$pos3][1]=-1;
                $max3 = 0;
                $pos3 = 0;
                if($j==4)break;
                $j++;

        }
        
        if (!empty($listType)) 
        {
            $a = DB::table('fitness_typesports')->select('fitness.*','typesports.*','fitness_typesports.*')
                                                ->join('fitness','fitness_typesports.fitness_id','=','fitness.id')
                                                ->join('typesports','fitness_typesports.typesport_id','=','typesports.id')
                                                ->where('fitness_typesports.typesport_id', '=' , $listType)
                                                ->get();
             foreach ($a as $key) {
                  $b = DB::table('fitness')->select('fitness.*','workservices.*','class.*','typesports.*')
                                           ->join('fitness_workservices','fitness_workservices.fitness_id','=','fitness.id')
                                           ->join('workservices','fitness_workservices.workservice_id','=','workservices.id')
                                           ->join('fitness_class','fitness_class.fitness_id','=','fitness.id')
                                           ->join('class','fitness_class.classes_id','=','class.id')
                                           ->join('fitness_typesports','fitness_typesports.fitness_id','=','fitness.id')
                                           ->join('typesports','fitness_typesports.typesport_id','=','typesports.id')
                                           ->where('fitness.id', '=' , $key->fitness_id)
                                           ->get();
              foreach($b as $key)  
              {
                array_push($details, $key);
              }
            }     
        }
        
        elseif (!empty($listClass)) 
        {
            $a = DB::table('fitness_class')->select('fitness.*','class.*','fitness_class.*')
                                           ->join('fitness','fitness_class.fitness_id','=','fitness.id')
                                           ->join('class','fitness_class.classes_id','=','class.id')
                                           ->where('class.id', '=' , $listClass)
                                           ->get();
            
            foreach ($a as $key) {
                  $b = DB::table('fitness')->select('fitness.*','workservices.*','class.*','typesports.*')
                                           ->join('fitness_workservices','fitness_workservices.fitness_id','=','fitness.id')
                                           ->join('workservices','fitness_workservices.workservice_id','=','workservices.id')
                                           ->join('fitness_class','fitness_class.fitness_id','=','fitness.id')
                                           ->join('class','fitness_class.classes_id','=','class.id')
                                           ->join('fitness_typesports','fitness_typesports.fitness_id','=','fitness.id')
                                           ->join('typesports','fitness_typesports.typesport_id','=','typesports.id')
                                           ->where('fitness.id', '=' , $key->fitness_id)
                                           ->get();
              foreach($b as $key)  
              {
                array_push($details, $key);
              }
            }      

        }
        
        elseif (!empty($name)) 
        {
            $details = DB::table('fitness')->select('fitness.*','workservices.*','typesports.*','class.*')
                                           ->join('fitness_workservices','fitness_workservices.fitness_id','=','fitness.id')
                                           ->join('workservices','fitness_workservices.workservice_id','=','workservices.id')
                                           ->join('fitness_typesports','fitness_typesports.fitness_id','=','fitness.id')
                                           ->join('typesports','fitness_typesports.typesport_id','=','typesports.id')
                                           ->join('fitness_class','fitness_class.fitness_id','=','fitness.id')
                                           ->join('class','fitness_class.classes_id','=','class.id')
                                           ->where('fitness_ename','LIKE','%'.$name.'%')
                                           ->orwhere('fitness_tname','LIKE','%'.$name.'%')
                                           ->orderBy('workservices.day_tname','asc')
                                           ->get();

        }
        // 
        elseif (!empty($nameDay) && !empty($nameOpenFirst) && !empty($nameOpenLast)) 
        {
          $a = DB::table('fitness_workservices')->select('fitness.*','workservices.*','fitness_workservices.*')
                                                  ->join('fitness','fitness_workservices.fitness_id','=','fitness.id')
                                                  ->join('workservices','fitness_workservices.workservice_id','=','workservices.id')
                                                  ->where('workservices.day_ename','LIKE','%'.$nameDay.'%')
                                                  ->where('workservices.opentime','<=',$nameOpenFirst.':'.$nameOpenLast.':00')
                                                  ->get();
            
            foreach ($a as $key) {
                  $b = DB::table('fitness')->select('fitness.*','workservices.*','class.*','typesports.*')
                                           ->join('fitness_workservices','fitness_workservices.fitness_id','=','fitness.id')
                                           ->join('workservices','fitness_workservices.workservice_id','=','workservices.id')
                                           ->join('fitness_class','fitness_class.fitness_id','=','fitness.id')
                                           ->join('class','fitness_class.classes_id','=','class.id')
                                           ->join('fitness_typesports','fitness_typesports.fitness_id','=','fitness.id')
                                           ->join('typesports','fitness_typesports.typesport_id','=','typesports.id')
                                           ->where('fitness.id', '=' , $key->fitness_id)
                                           ->get();
              foreach($b as $key)  
              {
                array_push($details, $key);
              }
            } 
             
        }
        elseif (!empty($nameDay) && !empty($nameOpenFirst) && !empty($nameOpenLast) && !empty($nameCloseFirst) && !empty($nameCloseLast)) 
        {
            $a = DB::table('fitness_workservices')->select('fitness.*','workservices.*','fitness_workservices.*')
                                                  ->join('fitness','fitness_workservices.fitness_id','=','fitness.id')
                                                  ->join('workservices','fitness_workservices.workservice_id','=','workservices.id')
                                                  ->where('workservices.day_ename','LIKE','%'.$nameDay.'%')
                                                  ->where('workservices.opentime','<=',$nameOpenFirst.':'.$nameOpenLast.':00')
                                                  ->where('workservices.closetime','<=',$nameCloseFirst.':'.$nameCloseLast.':00')
                                                  ->get();
            
            foreach ($a as $key) {
                  $b = DB::table('fitness')->select('fitness.*','workservices.*','class.*','typesports.*')
                                           ->join('fitness_workservices','fitness_workservices.fitness_id','=','fitness.id')
                                           ->join('workservices','fitness_workservices.workservice_id','=','workservices.id')
                                           ->join('fitness_class','fitness_class.fitness_id','=','fitness.id')
                                           ->join('class','fitness_class.classes_id','=','class.id')
                                           ->join('fitness_typesports','fitness_typesports.fitness_id','=','fitness.id')
                                           ->join('typesports','fitness_typesports.typesport_id','=','typesports.id')
                                           ->where('fitness.id', '=' , $key->fitness_id)
                                           ->get();
              foreach($b as $key)  
              {
                array_push($details, $key);
              }
            }     
            
        }
        elseif (!empty($nameDay)) 
        {
            
            $a = DB::table('fitness_workservices')->select('fitness.*','workservices.*','fitness_workservices.*')
                                                  ->join('fitness','fitness_workservices.fitness_id','=','fitness.id')
                                                  ->join('workservices','fitness_workservices.workservice_id','=','workservices.id')
                                                  ->where('workservices.day_ename','LIKE','%'.$nameDay.'%')
                                                  ->get();
            
            foreach ($a as $key) {
                  $b = DB::table('fitness')->select('fitness.*','workservices.*','class.*','typesports.*')
                                           ->join('fitness_workservices','fitness_workservices.fitness_id','=','fitness.id')
                                           ->join('workservices','fitness_workservices.workservice_id','=','workservices.id')
                                           ->join('fitness_class','fitness_class.fitness_id','=','fitness.id')
                                           ->join('class','fitness_class.classes_id','=','class.id')
                                           ->join('fitness_typesports','fitness_typesports.fitness_id','=','fitness.id')
                                           ->join('typesports','fitness_typesports.typesport_id','=','typesports.id')
                                           ->where('fitness.id', '=' , $key->fitness_id)
                                           ->get();
              foreach($b as $key)  
              {
                array_push($details, $key);
              }
            }      
             
        }

        elseif (!empty($nameDay) && !empty($nameCloseFirst) && !empty($nameCloseLast)) 
        {

            $a = DB::table('fitness_workservices')->select('fitness.*','workservices.*','fitness_workservices.*')
                                                  ->join('fitness','fitness_workservices.fitness_id','=','fitness.id')
                                                  ->join('workservices','fitness_workservices.workservice_id','=','workservices.id')
                                                  ->where('workservices.day_ename','LIKE','%'.$nameDay.'%')
                                                  ->where('workservices.closetime','<=',$nameCloseFirst.':'.$nameCloseLast.':00')
                                                  ->get();
            
            foreach ($a as $key) {
                  $b = DB::table('fitness')->select('fitness.*','workservices.*','class.*','typesports.*')
                                           ->join('fitness_workservices','fitness_workservices.fitness_id','=','fitness.id')
                                           ->join('workservices','fitness_workservices.workservice_id','=','workservices.id')
                                           ->join('fitness_class','fitness_class.fitness_id','=','fitness.id')
                                           ->join('class','fitness_class.classes_id','=','class.id')
                                           ->join('fitness_typesports','fitness_typesports.fitness_id','=','fitness.id')
                                           ->join('typesports','fitness_typesports.typesport_id','=','typesports.id')
                                           ->where('fitness.id', '=' , $key->fitness_id)
                                           ->get();
              foreach($b as $key)  
              {
                array_push($details, $key);
              }
            }     
        }
        // var_dump($typeInfo);                 
        if( count($details) > 0){
        // if( !empty($details)){
            return view('member/index',compact('details','baye_rating1','baye_rating2','baye_rating3','classes','types','name','listType','listClass','nameDay','nameOpenFirst','nameOpenLast','nameCloseFirst','nameCloseLast'));
        }
            
        else{
            return view ('member/index',compact('baye_rating1','baye_rating2','baye_rating3','classes','types'))->withMessage('ไม่พบข้อมูลที่คุณค้นหา กรุณาค้นหาใหม่ค่ะ');
        }
            
    }

    public function index()
    {
        
       $types = DB::table('typesports')->orderBy('type_ename','asc')->get();
       $classes = DB::table('class')->orderBy('class_ename','asc')->get();
       $R1 = DB::table('comments')->select('fitness.*', DB::raw('avg(comments.rating) as avg_fitness'))
                                  ->join('fitness','comments.fitness_id','=','fitness.id')
                                  ->join('members','members.id','=','comments.user_id')
                                  ->where('members.group','=','1')
                                  ->groupBy('fitness.id')
                                  ->get();
        $R2 = DB::table('comments')->select('fitness.*', DB::raw('avg(comments.rating) as avg_fitness'))
                                  ->join('fitness','comments.fitness_id','=','fitness.id')
                                  ->join('members','members.id','=','comments.user_id')
                                  ->where('members.group','=','2')
                                  ->groupBy('fitness.id')
                                  ->get();
        $R3 = DB::table('comments')->select('fitness.*', DB::raw('avg(comments.rating) as avg_fitness'))
                                  ->join('fitness','comments.fitness_id','=','fitness.id')
                                  ->join('members','members.id','=','comments.user_id')
                                  ->where('members.group','=','3')
                                  ->groupBy('fitness.id')
                                  ->get();
        
        $V1 = DB::table('comments')->select('fitness.*', DB::raw('count(comments.rating) as count_fitness'))
                                  ->join('fitness','comments.fitness_id','=','fitness.id')
                                  ->join('members','members.id','=','comments.user_id')
                                  ->where('members.group','=','1')
                                  ->groupBy('fitness.id')
                                  ->get();
        $V2 = DB::table('comments')->select('fitness.*', DB::raw('count(comments.rating) as count_fitness'))
                                  ->join('fitness','comments.fitness_id','=','fitness.id')
                                  ->join('members','members.id','=','comments.user_id')
                                  ->where('members.group','=','2')
                                  ->groupBy('fitness.id')
                                  ->get();
        $V3 = DB::table('comments')->select('fitness.*', DB::raw('count(comments.rating) as count_fitness'))
                                  ->join('fitness','comments.fitness_id','=','fitness.id')
                                  ->join('members','members.id','=','comments.user_id')
                                  ->where('members.group','=','3')
                                  ->groupBy('fitness.id')
                                  ->get();
        
        $C1 = DB::table('comments')->select(DB::raw('avg(rating) as avg_allfitness'))
                                  ->join('members','members.id','=','comments.user_id')
                                  ->where('members.group','=','1')
                                  ->get();
        $C2 = DB::table('comments')->select(DB::raw('avg(rating) as avg_allfitness'))
                                  ->join('members','members.id','=','comments.user_id')
                                  ->where('members.group','=','2')
                                  ->get();
        $C3 = DB::table('comments')->select(DB::raw('avg(rating) as avg_allfitness'))
                                  ->join('members','members.id','=','comments.user_id')
                                  ->where('members.group','=','3')
                                  ->get();
        
        $M1 = DB::select("SELECT MIN(count_r) as minc
                        from (SELECT fitness.id,COUNT(comments.rating) as count_r
                              from comments
                              INNER JOIN fitness,members
                              where comments.fitness_id = fitness.id
                              and members.id = comments.user_id
                              and members.group = 1
                              GROUP BY fitness.id)
                        comments");  
        $M2 = DB::select("SELECT MIN(count_r) as minc
                        from (SELECT fitness.id,COUNT(comments.rating) as count_r
                              from comments
                              INNER JOIN fitness,members
                              where comments.fitness_id = fitness.id
                              and members.id = comments.user_id
                              and members.group = 1
                              GROUP BY fitness.id)
                        comments");  
        $M3 = DB::select("SELECT MIN(count_r) as minc
                        from (SELECT fitness.id,COUNT(comments.rating) as count_r
                              from comments
                              INNER JOIN fitness,members
                              where comments.fitness_id = fitness.id
                              and members.id = comments.user_id
                              and members.group = 1
                              GROUP BY fitness.id)
                        comments");
        // $user = Auth::user();  
        //group1
        $wr = array();
        $avg = $C1[0]->avg_allfitness;
        for($i=0;$i<count($R1);$i++){
            $a = ($R1[$i]->avg_fitness*$V1[$i]->count_fitness+$avg*$M1[0]->minc)/($V1[$i]->count_fitness+$M1[0]->minc);
            array_push($wr, array($R1[$i]->fitness_tname,$a));
        }
        asort($wr);
        $max = 0;$pos=0;
        $baye_rating1 = array();$j=0;
        while($j<5){
            for($i=0;$i<count($wr);$i++){
                if($wr[$i][1]>=$max){
                    $max = $wr[$i][1];
                    $pos=$i;
                }

            }
            
            array_push($baye_rating1,array($wr[$pos][0],$wr[$pos][1]));
                $wr[$pos][0]=-1;
                $wr[$pos][1]=-1;
                $max = 0;
                $pos = 0;
                if($j==4)break;
                $j++;

        }
        //group2
        $wr2 = array();
        $avg2 = $C2[0]->avg_allfitness;
        for($i=0;$i<count($R2);$i++){
            $a2 = ($R2[$i]->avg_fitness*$V2[$i]->count_fitness+$avg*$M2[0]->minc)/($V2[$i]->count_fitness+$M2[0]->minc);
            array_push($wr2, array($R2[$i]->fitness_tname,$a2));
        }
        asort($wr2);
        $max2 = 0;$pos2=0;
        $baye_rating2 = array();$j=0;
        while($j<5){
            for($i=0;$i<count($wr2);$i++){
                if($wr2[$i][1]>=$max2){
                    $max2 = $wr2[$i][1];
                    $pos2=$i;
                }

            }
            array_push($baye_rating2,array($wr2[$pos2][0],$wr2[$pos2][1]));
                $wr2[$pos2][0]=-1;
                $wr2[$pos2][1]=-1;
                $max2 = 0;
                $pos2 = 0;
                if($j==4)break;
                $j++;

        }
        //group3
        $wr3 = array();
        $avg3 = $C3[0]->avg_allfitness;
        for($i=0;$i<count($R3);$i++){
            $a3 = ($R3[$i]->avg_fitness*$V3[$i]->count_fitness+$avg*$M3[0]->minc)/($V3[$i]->count_fitness+$M3[0]->minc);
            array_push($wr3, array($R3[$i]->fitness_tname,$a3));
        }
        asort($wr3);
        $max3 = 0;$pos3=0;
        $baye_rating3 = array();$j=0;
        while($j<5){
            for($i=0;$i<count($wr3);$i++){
                if($wr3[$i][1]>=$max3){
                    $max3 = $wr3[$i][1];
                    $pos3=$i;
                }

            }
            array_push($baye_rating3,array($wr3[$pos3][0],$wr3[$pos3][1]));
                $wr3[$pos3][0]=-1;
                $wr3[$pos3][1]=-1;
                $max3 = 0;
                $pos3 = 0;
                if($j==4)break;
                $j++;

        }
            // $user = Auth::user();
            // print_r($user);
            return view('member/index',compact('baye_rating1','baye_rating2','baye_rating3','types','classes'));
           
    }

    public function show_factors()
    {

    	$Factors = DB::table('factors')->get();
    	$All = DB::table('factors')->orderBy('id','asc')->get();
      $GroupMem = DB::table('members')->get(); 
        

        if ((int)Auth::user()->group == 1) 
        {
            return view('member/profile');
        }

        elseif ((int)Auth::user()->group == 2)
        {
            return view('member/profile');
  
        }

        elseif ((int)Auth::user()->group == 3)
        {
            return view('member/profile');
        }

        elseif ((int)Auth::user()->group == 0) {

            

            return view('/member/profile');
            

        }
    }

    public function index_group()
    {
      $Factors = DB::table('factors')->get();
      
      $All = DB::table('factors')->orderBy('id','asc')->get();
        $GroupMem = DB::table('members')->get(); 
    


        if ((int)Auth::user()->group == 0) 
        {

            $data = 0;
            $i = 0;
            $TempArray = array();
            $NewArray = array();
            $MemData = array();

            foreach ($All as $value) {

             $TempArray = array($value->score_product,
                               $value->score_place,$value->score_physical,
                               $value->score_price,$value->score_process,
                               $value->score_promotion,$value->score_people);
             //score by array//
             // echo $value->score_product." ". $value->score_place." ".$value->score_physical." ". $value->score_price." ".$value->score_process." ".  $value->score_promotion." ".$value->score_people."<br>";
             foreach ($GroupMem as $key) {
                 if($key->id == $value->user_id){
                     $temp = array($key->group,$value->user_id);
                     array_push($MemData, $key->group);
                     // echo " == ".$TempArray[0][0]."$value->user_id";
                     break;
                 }
             }

             array_push($NewArray ,$TempArray);
             $i++;
            }

            $arrayData = $NewArray[count($NewArray)-1];
            $value = array();
            //echo count($TempArray)-1;
            //echo "data is " .$NewArray[0][0];
            foreach($NewArray as $a){
             $score = 0;$j = 1;
             foreach ($a as $b) {

                 if($j <= count($a)){
                     //calculator 
                     // echo "|".$b."-".$arrayData[$j-1]."|^2 ";
                     $score=$score+pow($b-$arrayData[$j-1],2) ;//กำลังสอง
                        
                     //echo $b." ";
                 }
                 $j++;
                 //echo $b." - ";
             }
             // echo "<br>";
             $score = sqrt($score);//ติดรูท 
             array_push($value,array($score,$j-2) );
             //score cal
             // echo $score." -- <br>";
            }
            $max = 0;
            foreach ($value as $key) {
             if($key[0]>=$max){
                 $max = $key[0];
             }
            }
            $minPos = array();
            $pos = 0;
            $min=0;
            $k =3;
            // echo "min order : ";
            $G1=0;$G2=0;$G3=0;
            for($i=0;$i<$k;$i++){
             $j = 0;
             $min = $value[0][0];
            foreach ($value as $key) {
             if($j==count($value)-1)break;
             //echo $key[0]." <--> ";
             if($key[0]<=$min){
                 $min = $key[0];
                 $pos = $j;
                    
                 //echo $min;
             }
             $j++;
             //echo "<br>";
            }
             $value[$pos][0] = $max;
             array_push($minPos, $pos) ;
             // echo $min."($pos)(".$MemData[$pos].") || ";
             if($MemData[$pos]=="1")$G1++;
             else if($MemData[$pos]=="2")$G2++;
             else if($MemData[$pos]=="3")$G3++;
            }
            // echo "<br> ============================== <br>";
            $max = "";
            $G = array($G1,$G2,$G3);
            $n = max($G);
            // echo "You is Group 1"
            if($G1==$n){ $max = "1";}
            else if($G2==$n){ $max = "2";}
            else if($G3==$n){ $max = "3";}

            //update new group
            DB::table('members')->where('id', (int)Auth::user()->id)->update(['group' => (int)$max]);

            return view('/member/group');
            

        }
        elseif ((int)Auth::user()->group == 1) 
        {
            return view('member/group');
        }

        elseif ((int)Auth::user()->group == 2)
        {
            return view('member/group');
  
        }

        elseif ((int)Auth::user()->group == 3)
        {
            return view('member/group');
        }
    }

    public function create_factors(Request $request)
    {

        $Factors = new Factor;
        $Factors->score_product= $request ->score_product;
        $Factors->score_place= $request ->score_place;
        $Factors->score_physical= $request ->score_physical;
        $Factors->score_price= $request ->score_price;
        $Factors->score_process= $request ->score_process;
        $Factors->score_promotion= $request ->score_promotion;
        $Factors->score_people= $request ->score_people;
        $Factors->user_id = Auth::user()->id;
        $Factors->save();
        Session::flash('message', 'คุณได้กรอกลำดับความสำคัญในการพิจารณาสถานที่ออกกำลังกายเรียบร้อยเเล้ว');
        return redirect('/member/group');
    }

    public function index_factors()
    {
        $factors = DB::table('factors')->get();
        $member = DB::table('members')->get();                             
        return view('member/fill_factors',compact('factors','member'));
        
    }

    public function edit_profile($id)
    {
      $member = User::find($id);
      return view('/member/edit_profile',compact('member'));
    }

   

    public function update_profile(Request $request, $id)
    {
        
        $member = User::find($id);
    
        $member->fname= $request ->fname;
        $member->lname = $request ->lname;
        $member->gender = $request ->gender;
        $member->email = $request ->email;
        $member->password = $request ->password;
        
        
        $member->save();
        Session::flash('message', 'คุณได้เเก้ไขข้อมูลส่วนตัวเรียบร้อยเเล้ว'); 
        return redirect('/member/profile');
    }
}
