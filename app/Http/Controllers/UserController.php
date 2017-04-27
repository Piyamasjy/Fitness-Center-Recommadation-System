<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Fitness;

use App\Typesport;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function index()
    {
        $types = DB::table('typesports')->orderBy('type_ename','asc')->get();
        $classes = DB::table('class')->orderBy('class_ename','asc')->get();
        $R = DB::table('comments')->select('fitness.*', DB::raw('avg(comments.rating) as avg_fitness'))
                                  ->join('fitness','comments.fitness_id','=','fitness.id')
                                  ->groupBy('fitness.id')
                                  ->get();
        $V = DB::table('comments')->select('fitness.*', DB::raw('count(comments.rating) as count_fitness'))
                                  ->join('fitness','comments.fitness_id','=','fitness.id')
                                  ->groupBy('fitness.id')
                                  ->get();
        $C = DB::table('comments')->select(DB::raw('avg(rating) as avg_allfitness'))
                                  ->get();
        $M = DB::select("SELECT MIN(count_r) as minc
                        from (SELECT fitness.id,COUNT(comments.rating) as count_r
                              from comments
                              INNER JOIN fitness
                              where comments.fitness_id = fitness.id
                              GROUP BY fitness.id)
                        comments");  
        $wr = array();
        $avg = $C[0]->avg_allfitness;
        for($i=0;$i<count($R);$i++){
            $a = ($R[$i]->avg_fitness*$V[$i]->count_fitness+$avg*$M[0]->minc)/($V[$i]->count_fitness+$M[0]->minc);
            array_push($wr, array($R[$i]->fitness_tname,$a));
        }
        asort($wr);
        $max = 0;$pos=0;
        $baye_rating = array();$j=0;
        while($j<5){
            for($i=0;$i<count($wr);$i++){
                if($wr[$i][1]>=$max){
                    $max = $wr[$i][1];
                    $pos=$i;
                }

            }
            array_push($baye_rating,array($wr[$pos][0],$wr[$pos][1]));
                $wr[$pos][0]=-1;
                $wr[$pos][1]=-1;
                $max = 0;
                $pos = 0;
                if($j==4)break;
                $j++;

        }
        
		  return view('/user/index', compact('baye_rating','classes','types'));
	}
	
	public function searchType()
    {
        $name = Input::get ( 'name' );
        $nameDay = Input::get ( 'nameDay' );
        $nameOpenFirst = Input::get ( 'nameOpenFirst' );
        $nameOpenLast = Input::get ( 'nameOpenLast' );
        $nameCloseFirst = Input::get ( 'nameCloseFirst' );
        $nameCloseLast = Input::get ( 'nameCloseLast' );
        $listType = Input::get ( 'listType' );
        $listClass = Input::get ( 'listClass' );
        //check empty
        $details = [];

        $classes = DB::table('class')->orderBy('class_ename','asc')->get();
        $types = DB::table('typesports')->orderBy('type_ename','asc')->get();

        $R = DB::table('comments')->select('fitness.*', DB::raw('avg(comments.rating) as avg_fitness'))
                                  ->join('fitness','comments.fitness_id','=','fitness.id')
                                  ->groupBy('fitness.id')
                                  ->get();
        $V = DB::table('comments')->select('fitness.*', DB::raw('count(comments.rating) as count_fitness'))
                                  ->join('fitness','comments.fitness_id','=','fitness.id')
                                  ->groupBy('fitness.id')
                                  ->get();
        $C = DB::table('comments')->select(DB::raw('avg(rating) as avg_allfitness'))
                                  ->get();
        $M = DB::select("SELECT MIN(count_r) as minc
                        from (SELECT fitness.id,COUNT(comments.rating) as count_r
                              from comments
                              INNER JOIN fitness
                              where comments.fitness_id = fitness.id
                              GROUP BY fitness.id)
                        comments");  
        $wr = array();
        $avg = $C[0]->avg_allfitness;
            for($i=0;$i<count($R);$i++)
            {
                $a = ($R[$i]->avg_fitness*$V[$i]->count_fitness+$avg*$M[0]->minc)/($V[$i]->count_fitness+$M[0]->minc);
                array_push($wr, array($R[$i]->fitness_tname,$a));
            }
        asort($wr);
        $max = 0;$pos=0;
        $baye_rating = array();$j=0;
            while($j<5)
            {
                for($i=0;$i<count($wr);$i++)
                {
                    if($wr[$i][1]>=$max)
                    {
                        $max = $wr[$i][1];
                        $pos=$i;
                    }

                }
                array_push($baye_rating,array($wr[$pos][0],$wr[$pos][1]));
                    $wr[$pos][0]=-1;
                    $wr[$pos][1]=-1;
                    $max = 0;
                    $pos = 0;
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
            return view('user/index',compact('details','baye_rating','classes','types','name','listType','listClass','nameDay','nameOpenFirst','nameOpenLast','nameCloseFirst','nameCloseLast'));
        }
            
        else{
            $name = "";
            return view ('user/index',compact('baye_rating','classes','types'))->withMessage('ไม่พบข้อมูลที่คุณค้นหา กรุณาค้นหาใหม่ค่ะ');
        }
            
    }

    public function show_class()
    {
      return view('user/class_type');
    }

    public function description_class()
    {
      // $class_button = Input::get ( 'class_button' );
      $description = DB::table('class')
                ->get();
      
      return view('user/class_type',compact('description'));

    }

    public function index_route()
    {
       // $fit_comment = DB::table('comments')->get();
        $fit_comment = DB::table('comments')->select('fitness.*','comments.*','members.*')
                                            ->join('members','members.id','=','comments.user_id')
                                            ->join('fitness','fitness.id','=','comments.fitness_id')
                                            ->get();
        $fitness = DB::table('fitness')->get();
        
      return view('user.route',compact('fit_comment','fitness'));
    }

}
