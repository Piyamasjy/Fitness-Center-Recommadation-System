<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Fitness;

use App\Typesport;

use App\Workservice;

use App\Classes;

use App\Factor;

use App\Comment;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\DB;

use Session;

use App\User;

use App\Admin;

use App\Fitness_class;

use App\Fitness_workservices;

class AdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

   
    public function index()
    {
        return view('admin.index');
    }


    public function show_add_admins()
    {
        return view('admin.add_admins');

    }

    public function show_add_members()
    {
        return view('admin.add_members');

    }

    public function create_add_members(Request $request)
    {
        $member = new User;
        $member->fname= $request ->fname;
        $member->lname = $request ->lname;
        $member->gender = $request ->gender;
        $member->email = $request ->email;
        $member->username = $request ->username;
        $member->password= $request ->password;
        $member->group = $request ->group;
        
        $member->save();
        Session::flash('message', 'คุณได้เพิ่มข้อมูลในตารางสมาิกเรียบร้อยเเล้ว'); 
    
        return redirect('admin/manage_members');
    }

    public function show_add_fitness()
    {
        $classes = DB::table('class')->orderBy('class_tname','asc')->get();
        $typesports = DB::table('typesports')->orderBy('type_tname','asc')->get();
        $workservices = DB::table('workservices')->orderBy('day_tname','asc')->get();
        return view('admin.add_fitness',compact('classes','typesports','workservices'));

    }

    public function create_add_fitness(Request $request)
    {
        $Fitness = new Fitness;
        $Fitness->fitness_ename= $request ->fitness_ename;
        $Fitness->fitness_tname = $request ->fitness_tname;
        $Fitness->addresses = $request ->addresses;
        $Fitness->website = $request ->website;
        $Fitness->contact_number = $request ->contact_number;
        $Fitness->lat= $request ->lat;
        $Fitness->lng = $request ->lng;
        $Fitness->fitness_description = $request ->fitness_description;
        

        if($request->hasFile('image')){
            $path = '/images/fitnesses/';
            $fileName = time().'.'.$request->file('image')->getClientOriginalExtension(); 
            $request->file('image')->move(public_path() . $path, $fileName);
            $Fitness->image = $fileName;
        }
        $Fitness->save();

        $Fitness->classes()->attach($request->classes);
        $Fitness->typesports()->attach($request->typesports);
        $Fitness->workservices()->attach($request->workservices);
// ;    
        Session::flash('message', 'คุณได้เพิ่มข้อมูลในตารางฟิตเนสเรียบร้อยเเล้ว'); 
    
        return redirect('admin/manage_fitness');
    }


    public function show_add_class()
    {
         $typesports = DB::table('typesports')->orderBy('type_tname','asc')->get();
        return view('admin.add_class',compact('typesports'));
    }

    public function create_add_class(Request $request)
    {

        $classes = new Classes;
        $classes->class_ename= $request ->class_ename;
        $classes->class_tname = $request ->class_tname;
        $classes->class_description = $request ->class_description;
        $classes->type_id = $request ->type_id;
     
        if($request->hasFile('images')){
            $path = '/images/classes/';
            $fileName = time().'.'.$request->file('images')->getClientOriginalExtension(); 
            $request->file('images')->move(public_path() . $path, $fileName);
            $classes->images = $fileName;
        }
        
        $classes->save();
        Session::flash('message', 'คุณได้เพิ่มข้อมูลในตารางคลาสเรียบร้อยเเล้ว'); 
    
        return redirect('admin/manage_class');
        
    }
    public function show_add_typesports()
    {
        return view('admin.add_typesports');
    }

    public function create_add_typesports(Request $request)
    {

        $types = new Typesport;
        $types->type_ename= $request ->type_ename;
        $types->type_tname = $request ->type_tname;
        $types->save();

        Session::flash('message', 'คุณได้เพิ่มข้อมูลในตารางประเภทของสถานที่ออกกำลังกายเรียบร้อยเเล้ว'); 
        
        return redirect('/admin/manage_typesports');
    }
    public function show_add_workservices()
    {
        return view('admin.add_workservices');
    }

    public function create_add_workservices(Request $request)
    {

        $work = new Workservice;
        $work->day_ename= $request ->day_ename;
        $work->day_tname = $request ->day_tname;
        $work->opentime = $request ->opentime;
        $work->closetime = $request ->closetime;
        
        $work->save();
        Session::flash('message', 'คุณได้เพิ่มข้อมูลในตารางวันเวลาทำการเรียบร้อยเเล้ว'); 
        return redirect('/admin/manage_workservices');
    }

    public function show_add_comments()
    {
        $fitness = DB::table('fitness')->orderBy('fitness_tname','asc')->get();
        $members = DB::table('members')->orderBy('id','asc')->get();
        return view('admin.add_comments',compact('fitness','members'));
    }

    public function create_add_comments(Request $request)
    {
        $comments =  new Comment;
        $comments->rating = $request->rating;
        $comments->fitness_id = $request->fitness_id;
        $comments->user_id = $request->user_id;
        $comments->save();
        Session::flash('message', 'คุณได้เพิ่มข้อมูลในตารางการเเสดงความคิดเห็นเรียบร้อยเเล้ว'); 
        return redirect('/admin/manage_comments');
        
    }
    public function show_add_factors()
    {
        return view('admin.add_factors');
    }

    public function create_add_factors(Request $request)
    {

        $Factors = new Factor;
        $Factors->score_product= $request ->score_product;
        $Factors->score_place= $request ->score_place;
        $Factors->score_physical= $request ->score_physical;
        $Factors->score_price= $request ->score_price;
        $Factors->score_process= $request ->score_process;
        $Factors->score_promotion= $request ->score_promotion;
        $Factors->score_people= $request ->score_people;
        $Factors->user_id = $request ->user_id;
        $Factors->save();
        
       Session::flash('message', 'คุณได้เพิ่มข้อมูลในตารางปัจจัยเรียบร้อยเเล้ว'); 
        return redirect('/admin/manage_factors');
        
    }

    //show
    
    // }
    public function show_manage_admins()
    {
        $admin = DB::table('admins')->orderBy('id','asc')->get();
        return view('admin.manage_admins',compact('admin'));
    }

    public function show_manage_members()
    {
        $member = DB::table('members')->orderBy('id','asc')->get();
        return view('admin.manage_members',compact('member'));
    }

    public function show_manage_factors()
    {
        $factors = DB::table('factors')->orderBy('id','asc')->get();
        return view('admin.manage_factors',compact('factors'));
    }

    public function show_manage_fitness()
    {
        $fitness = DB::table('fitness')->orderBy('id','asc')->get();
        return view('admin.manage_fitness',compact('fitness'));
    }

    public function show_manage_class()
    {
        $classes = DB::table('class')->orderBy('id','asc')->get();
        return view('admin.manage_class',compact('classes'));
    }
    public function show_manage_typesports()
    {
        $typesports = DB::table('typesports')->orderBy('id','asc')->get();
        return view('admin.manage_typesports',compact('typesports'));
    }
    public function show_manage_workservices()
    {
        $workservices = DB::table('workservices')->orderBy('id','asc')->get();
        return view('admin.manage_workservices',compact('workservices'));
    }

    public function show_manage_comments()
    {
        $comments = DB::table('comments')->orderBy('id','asc')->get();
        return view('admin.manage_comments',compact('comments'));
    }

    //edit

    
    public function edit_admins_table($id)
    {
        $admin = Admin::find($id);
        return view('/admin/edit_admins',compact('admin'));
        
    }

    public function edit_members_table($id)
    {
        $member = User::find($id);
        return view('/admin/edit_members',compact('member'));
        
    }
    public function edit_class_table($id)
    {
        $classes = Classes::find($id);
        $typesports = DB::table('typesports')->orderBy('type_tname','asc')->get();
        return view('/admin/edit_class',compact('classes','typesports'));
        
    }
    public function edit_typesports_table($id)
    {
        $types = Typesport::find($id);
        return view('/admin/edit_typesports',compact('types'));
    }
    public function edit_workservices_table($id)
    {
       $works = Workservice::find($id);
       return view('/admin/edit_workservices',compact('works'));
       
    }

    public function edit_comments_table($id)
    {
        $comments = Comment::find($id);
        $fitness = DB::table('fitness')->orderBy('fitness_tname','asc')->get();
        $members = DB::table('members')->orderBy('id','asc')->get();
        return view('/admin/edit_comments',compact('comments','fitness','members'));
        
    }
     public function edit_factors_table($id)
    {
       $factors = Factor::find($id);
       return view('/admin/edit_factors',compact('factors'));
    }

    public function edit_fitness_table($id)
    {
        $fitness = Fitness::find($id);
        $classes = DB::table('class')->orderBy('class_tname','asc')->get();
        $typesports = DB::table('typesports')->orderBy('type_tname','asc')->get();
        $workservices = DB::table('workservices')->orderBy('day_tname','asc')->get();
        $classes_fitness= DB::table('fitness_class')->where('fitness_id','=',$id)->get();
        $fitness_typesports= DB::table('fitness_typesports')->where('fitness_id','=',$id)->get();
        $fitness_workservices= DB::table('fitness_workservices')->where('fitness_id','=',$id)->get();

        $arrayOfClassesId = array();
        foreach ($classes_fitness as $value) {
            array_push($arrayOfClassesId , $value->classes_id);
        }

        $arrayOfTypesportsId = array();
        foreach ($fitness_typesports as $value) {
            array_push($arrayOfTypesportsId , $value->typesport_id);
        }

        $arrayOfWorkservicesId = array();
        foreach ($fitness_workservices as $value) {
            array_push($arrayOfWorkservicesId , $value->workservice_id);
        }

        
        return view('/admin/edit_fitness',compact('fitness','classes','arrayOfClassesId','typesports','arrayOfTypesportsId','arrayOfWorkservicesId','workservices'));
    }

    public function show()
    {
        $fitness = Fitness::all();
        return view('admin.manage_fitness',compact('fitness'));
    }


    //update

   

    public function update_admins(Request $request, $id)
    {
        $admin = Admin::find($id);
        $admin->fname= $request ->fname;
        $admin->lname = $request ->lname;
       
        $admin->email = $request ->email;
        $admin->username = $request ->username;
        $admin->password= $request ->password;
       
        $admin->save();
        Session::flash('message', 'คุณได้เเเก้ไขข้อมูลในตารางผู้ดูเเลระบบเรียบร้อยเเล้ว'); 
    
        return redirect('admin/manage_admins');
    }

    public function update_members(Request $request, $id)
    {
        $member = User::find($id);
        $member->fname= $request ->fname;
        $member->lname = $request ->lname;
        $member->gender = $request ->gender;
        $member->email = $request ->email;
        $member->username = $request ->username;
        $member->password= $request ->password;
        $member->group = $request ->group;
        
        $member->save();
        Session::flash('message', 'คุณได้เเเก้ไขข้อมูลในตารางสมาิกเรียบร้อยเเล้ว'); 
    
        return redirect('admin/manage_members');
    }

    public function update_fitness(Request $request, $id)
    {
        $Fitness = Fitness::find($id);
        $Fitness->fitness_ename= $request ->fitness_ename;
        $Fitness->fitness_tname = $request ->fitness_tname;
        $Fitness->addresses = $request ->addresses;
        $Fitness->website = $request ->website;
        $Fitness->contact_number = $request ->contact_number;
        $Fitness->lat= $request ->lat;
        $Fitness->lng = $request ->lng;
        $Fitness->fitness_description = $request ->fitness_description;
        

        if($request->hasFile('image')){
            $path = '/images/fitnesses/';
            $fileName = time().'.'.$request->file('image')->getClientOriginalExtension(); 
            $request->file('image')->move(public_path() . $path, $fileName);
            $Fitness->image = $fileName;
        }
        
       
        $Fitness->update();
        $Fitness->classes()->sync($request->classes);
        $Fitness->typesports()->sync($request->typesports);
        $Fitness->workservices()->sync($request->workservices);
// ;    

        Session::flash('message', 'คุณได้เเก้ไขข้อมูลในตารางฟิตเนสเรียบร้อยเเล้ว'); 
        return redirect('/admin/manage_fitness');
    }

    public function update_typesports(Request $request, $id)
    {
        
        $types = Typesport::find($id);
    
        $types->type_ename= $request ->type_ename;
        $types->type_tname = $request ->type_tname;
        $types->save();
        Session::flash('message', 'คุณได้เเก้ไขข้อมูลในตารางประเภทของสถานที่ออกกำลังกายเรียบร้อยเเล้ว'); 
        return redirect('/admin/manage_typesports');
    }

    public function update_workservices(Request $request, $id)
    {
        
        $works = Workservice::find($id);
    
        $works->day_ename= $request ->day_ename;
        $works->day_tname = $request ->day_tname;
        $works->opentime = $request ->opentime;
        $works->closetime = $request ->closetime;
        
        $works->save();
         Session::flash('message', 'คุณได้เเก้ไขข้อมูลในตารางวันเวลาเปิดปิดเเล้ว'); 
        return redirect('/admin/manage_workservices');
    }


    public function update_class(Request $request, $id)
    {
        
        $classes = Classes::find($id);
    
        $classes->class_ename= $request ->class_ename;
        $classes->class_tname = $request ->class_tname;
        $classes->class_description = $request ->class_description;
        $classes->type_id = $request ->type_id;
        if($request->hasFile('images')){
            $path = '/images/classes/';
            $fileName = time().'.'.$request->file('images')->getClientOriginalExtension(); 
            $request->file('images')->move(public_path() . $path, $fileName);
            $classes->images = $fileName;
        }
        
        $classes->save();
         Session::flash('message', 'คุณได้เเก้ไขข้อมูลในตารางคลาสเรียบร้อยเเล้ว'); 
    
        return redirect('admin/manage_class');
       
    }

    public function update_comments(Request $request, $id)
    {
        
        $comments = Comment::find($id);
    
        
        $comments->rating = $request ->rating;
        $comments->fitness_id = $request ->fitness_id;
        $comments->user_id = $request ->user_id;
        
        
        $comments->save();
         Session::flash('message', 'คุณได้เเก้ไขข้อมูลในตารางการเเสดงความคิดเห็นเรียบร้อยเเล้ว'); 
        return redirect('/admin/manage_comments');
    }

    public function update_factors(Request $request, $id)
    {
        
        $factors = Factor::find($id);
    
        $factors->score_product= $request ->score_product;
        $factors->score_place= $request ->score_place;
        $factors->score_physical= $request ->score_physical;
        $factors->score_price= $request ->score_price;
        $factors->score_process= $request ->score_process;
        $factors->score_promotion= $request ->score_promotion;
        $factors->score_people= $request ->score_people;
        $factors->save();
         Session::flash('message', 'คุณได้เเก้ไขข้อมูลในตารางปัจจัยเรียบร้อยเเล้ว'); 
       
        return redirect('/admin/manage_factors');
    }



    //delete
    public function delete_fitness_workservices_table($fitness_id,$work_id)
    {
        DB::table('fitness_workservices')->where('fitness_id', $fitness_id)
                                  ->where('work_id', $work_id)
                                  ->delete();
        
        Session::flash('message', 'คุณได้ลบข้อมูลในตารางฟิตเนสเเละวันเวลาทำการเรียบร้อยเเล้ว'); 
    
        return redirect('admin/manage_fitness_workservices');
    }
    public function delete_fitness_class_table($fitness_id,$class_id)
    {
        DB::table('fitness_class')->where('fitness_id', $fitness_id)
                                  ->where('class_id', $class_id)
                                  ->delete();
        
        Session::flash('message', 'คุณได้ลบข้อมูลในตารางฟิตเนสเเละคลาสเรียบร้อยเเล้ว'); 
    
        return redirect('admin/manage_fitness_class');
    }
    public function delete_admins_table($id)
    {
        Admin::find($id)->delete();
        return redirect('/admin/manage_admins');
    }

    public function delete_typesports_table($id)
    {
        Typesport::find($id)->delete();
        return redirect('/admin/manage_typesports');
    }

    public function delete_fitness_table($id)
    {
        Fitness::find($id)->delete();
        return redirect('/admin/manage_fitness');
    }

    public function delete_class_table($id)
    {
        Classes::find($id)->delete();
        return redirect('/admin/manage_class');
    }

    public function delete_factors_table($id)
    {
        Factor::find($id)->delete();
        return redirect('/admin/manage_factors');
    }

    public function delete_workservices_table($id)
    {
        Workservice::find($id)->delete();
        return redirect('/admin/manage_workservices');
    }

    public function delete_comments_table($id)
    {
        Comment::find($id)->delete();
        return redirect('/admin/manage_comments');
    }

    public function delete_members_table($id)
    {
        User::find($id)->delete();
        return redirect('/admin/manage_members');
    }

}
