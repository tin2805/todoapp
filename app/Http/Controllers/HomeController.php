<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Collection;
// use App\Http\Request;
use Session;
session_start();
// class HomeController extends Controller
// {
//     public function Authlogin(){
//         $valid_id = Session::get('people_id');
//         if(!$valid_id){
//             return redirect::to('/show-login')->send();
//         }
//     }
//     //
//     public function index(){
//         return view('layout');
//     }
//     public function dashboard(){
//         $this->Authlogin();
//         //red
//         $red = count(DB::table('tbl_jobs')->where('job_status',1)->where('job_deadline', date('Y-m-d'))->get());
//         //green
//         $day = DB::table('tbl_jobs')->where('job_status',0)->get();
//         for($i = 0; $i < count($day); $i++){ 
//             if($day[$i]);
//         }
//         // $green = DB::table('tbl_jobs')->where('job_status',0)->get();
//         return view('pages.dashboard')->with(compact('red'));
//     }
//     public function show_login(){
//         return view('pages.login');
//     }
//     public function login(Request $request){
//         $people_email = $request->people_email;
//         $people_password = md5($request->people_password);
//         $valid_people = DB::table('tbl_people')->where('people_email',$people_email)->where('people_password',$people_password)->first();

//         if($valid_people){
//             Session::put('people_id',$valid_people->people_id);
//             Session::put('people_name',$valid_people->people_name);
//             return Redirect::to('/');
//         }
//         else{
//             return Redirect::to('/login');        
//         }

//     }
//     public function logout(){
//         Session::put('people_name', null);
//         Session::put('people_id', null);
//         return view('pages.login');
//     }
//     public function show_register(){
//         return view('pages.register');
//     }
//     public function register(Request $request){
//         $data = [];
//         $data['people_name'] = $request->people_name;
//         $data['people_email'] = $request->people_email;
//         $data['people_password'] = md5($request->people_password);
//         $data['people_phone'] = $request->people_phone;

//         DB::table('tbl_people')->insertGetId($data);
//         return view('pages.login');
//     }
//     //today-job
//     public function today_complete(){
//         $complete_status = DB::table('tbl_jobs')->where('job_status','0')->get();
//         return view('pages.show_job')->with('all_jobs',$complete_status);
//     }
//     public function today_uncomplete(){
//         $uncomplete_status = DB::table('tbl_jobs')->where('job_status','1')->get();
//         // foreach($uncomplete_status as $value){
//         //     if(date('Y-m-d') < $value->job_deadline){
//         //         $job = DB::table('tbl_jobs')->where('job_id',$value->job_id)->get();
//         //         return view('pages.show_job')->with('all_jobs',$job);
//         //     }
//         //     else{
//         //         return view('pages.show_job')->with('all_jobs','');
//         //     }
//         // }
//         return view('pages.show_job')->with('all_jobs',$uncomplete_status);

//     }
//     //add-job
//     public function add_job(){
//         $this->Authlogin();
//         return view('pages.add_job');
//     }
//     public function save_job(Request $request){
//         $data = [];
//         $data['job_title'] = $request->job_title;
//         $data['job_desc'] = $request->job_desc;
//         $data['job_deadline'] = $request->job_deadline;
//         $data['job_status'] = $request->job_status;
//         $data['people_id'] = Session::get('people_id');
//         DB::table('tbl_jobs')->insert($data);
//         return Redirect('/add-job');
//     }
//     public function show_job(){
//         $this->Authlogin();
//         $all_jobs = DB::table('tbl_jobs')->where('people_id', Session::get('people_id'))->get();
//         return view('pages.show_job')->with('all_jobs', $all_jobs);
//     }

//     //update-status
//     public function update_status($job_id){
//         $status = DB::table('tbl_jobs')->where('job_id', $job_id)->first();
//         $data = [];
//         if($status->job_status == 0){
//             $data['job_status'] = 1;
//             DB::table('tbl_jobs')->where('job_id', $job_id)->update($data);
//             Session::put('message','Cập nhật trạng thái thành công');
//             return Redirect::to('show-job');
//         }
//         else{
//             $data['job_status'] = 0;
//             DB::table('tbl_jobs')->where('job_id', $job_id)->update($data);
//             Session::put('message','Cập nhật trạng thái thành công');
//             return Redirect::to('show-job');
//         }
//     }

//     //edit-job
//     public function edit_job($job_id){
//         $old_data = DB::table('tbl_jobs')->where('job_id', $job_id)->first();
//         return view('pages.edit_job')->with('old_data',$old_data);
//     }
//     public function update_job(Request $request,$job_id){
//         $new_data = [];
//         $new_data['job_title'] = $request->job_title;
//         $new_data['job_desc'] = $request->job_desc;
//         $new_data['job_deadline'] = $request->job_deadline;
//         DB::table('tbl_jobs')->where('job_id', $job_id)->update($new_data);
//         return Redirect::to('show-job');
//     }

//     //delete-job
//     public function delete_job($job_id){
//         DB::table('tbl_jobs')->where('job_id', $job_id)->delete();
//         return Redirect::to('show-job');
//     }

//     //calendar
//     public function calendar(){
//         $jobs = DB::table('tbl_jobs')->get();

//         return view('pages.calendar')->with('jobs', $jobs);
//     }
// }
class HomeController extends Controller
{
    public function Authlogin(){
        $valid_id = Session::get('people_id');
        if(!$valid_id){
            return redirect::to('/show-login')->send();
        }
    }
    //
    public function index(){
        return view('layout');
    }
    public function dashboard(){
        $this->Authlogin();
        // $green = DB::table('tbl_jobs')->where('job_status',0)->get();
        return view('pages.dashboard');
    }
    public function show_login(){
        return view('pages.login');
    }
    public function login(Request $request){
        $this->Authlogin();
        $people_email = $request->people_email;
        $people_password = md5($request->people_password);
        $valid_email = Session::get('people_email');
        $valid_password = Session::get('people_password');
        if($people_email == $valid_email && $people_password == $valid_password){
            Session::put('people_id',Session::get('people_id'));
            Session::put('people_name',Session::get('people_name'));
            return Redirect::to('/');
        }
        else{
            return Redirect::to('/show-login');        
        }

    }
    public function logout(){
        Session::put('people_name', null);
        Session::put('people_id', null);
        return view('pages.login');
    }
    public function show_register(){
        return view('pages.register');
    }
    public function register(Request $request){
        $data = [];
        $data['people_name'] = $request->people_name;
        $data['people_email'] = $request->people_email;
        $data['people_password'] = md5($request->people_password);
        $data['people_phone'] = $request->people_phone;

        Session::put('people_name', $data['people_name']);
        Session::put('people_email', $data['people_email']);
        Session::put('people_password', $data['people_password']);
        Session::put('people_phone', $data['people_phone']);
        Session::put('people_id', '1');
        return view('pages.login');
    }
    //today-job
    public function today_complete(){
        $complete_status = DB::table('tbl_jobs')->where('job_status','0')->get();
        return view('pages.show_job')->with('all_jobs',$complete_status);
    }
    public function today_uncomplete(){
        $uncomplete_status = DB::table('tbl_jobs')->where('job_status','1')->get();
        // foreach($uncomplete_status as $value){
        //     if(date('Y-m-d') < $value->job_deadline){
        //         $job = DB::table('tbl_jobs')->where('job_id',$value->job_id)->get();
        //         return view('pages.show_job')->with('all_jobs',$job);
        //     }
        //     else{
        //         return view('pages.show_job')->with('all_jobs','');
        //     }
        // }
        return($uncomplete_status);
        return view('pages.show_job')->with('all_jobs',$uncomplete_status);

    }
    //add-job
    public function add_job(){
        $this->Authlogin();
        return view('pages.add_job');
    }
    public function save_job(Request $request){
        $data = [];
        $data['job_title'] = $request->job_title;
        $data['job_desc'] = $request->job_desc;
        $data['job_deadline'] = $request->job_deadline;
        $data['job_status'] = $request->job_status;
        Session::push('data',$data);

        // $data['job_title'] = $request->job_title;
        // $data['job_desc'] = $request->job_desc;
        // $data['job_deadline'] = $request->job_deadline;
        // $data['job_status'] = $request->job_status;
        // Session::put('job_title', $request->job_title);
        // Session::put('job_desc', $request->job_desc);
        // Session::put('job_deadline', $request->job_deadline);
        // Session::put('job_status', $request->job_status);
        return Redirect('/add-job');
    }
    public function show_job(){
        $this->Authlogin();
        // $all_jobs['job_title'] = Session::get('job_title');
        // $all_jobs['job_desc'] = Session::get('job_desc');
        // $all_jobs['job_deadline'] = Session::get('job_deadline');
        // $all_jobs['job_status'] = Session::get('job_status');
        // $all_jobs = DB::table('tbl_jobs')->get();
        $all_jobs = Session::get('data');
        if($all_jobs){
            return view('pages.show_job')->with('all_jobs', $all_jobs);    
        }
        else{
            $all_jobs = 0;
            return view('pages.show_job')->with('all_jobs', $all_jobs);
        }
        // return $all_jobs[1]['job_title'];

    }

    //update-status
    public function update_status($job_title){
        // $status = DB::table('tbl_jobs')->where('job_id', $job_id)->first();
        // $data = session('data');
        $data = session::get('data');
        // return $data[2];
        $status = 0;
        for($i = 0;$i<10;$i++){
            if(isset($data[$i])){
                if($data[$i]['job_title'] == $job_title){
                    $status = $data[$i];
                    // return $status;
                    if($status['job_status'] == 0){
                        // Session::put('data[$i]'.'job_status',1);
                        $status['job_status'] = 1;
                        Session::push('data',$status);
                        Session::forget('data.'.$i);
                        // return $status;
                        return Redirect::to('show-job');
                    }
                    else{
                        $status['job_status'] = 0;
                        Session::push('data',$status);
                        Session::forget('data.'.$i);
                        return Redirect::to('show-job');
                    }
                }
            }

        }
    }

    //edit-job
    public function edit_job($job_title){
        // $old_data = DB::table('tbl_jobs')->where('job_id', $job_id)->first();
        $data = session::get('data');
        for($i = 0;$i<10;$i++){
            if(isset($data[$i])){
                if($data[$i]['job_title'] == $job_title){
                    $old_data = Session::get('data.'.$i);
                }
            }
        }
        return view('pages.edit_job')->with('old_data',$old_data);
    }
    public function update_job(Request $request,$job_title){
        $new_data = 0;

        $data = session::get('data');
        for($i = 0;$i<10;$i++){
            if(isset($data[$i])){
                $new_data = $data[$i];
                if($data[$i]['job_title'] == $job_title){
                    $new_data['job_title'] = $request->job_title;
                    $new_data['job_desc'] = $request->job_desc;
                    $new_data['job_deadline'] = $request->job_deadline;
                    $new_data['job_status'] = 1;
                    Session::push('data',$new_data);
                    Session::forget('data.'.$i);
                }
            }
        }
        return Redirect::to('show-job');
    }

    //delete-job
    public function delete_job($job_title){
        $data = session::get('data');
        for($i = 0;$i<10;$i++){
            if(isset($data[$i])){
                if($data[$i]['job_title'] == $job_title){
                    Session::forget('data.'.$i);
                }
            }
        }
        return Redirect::to('show-job');
    }

    //calendar
    public function calendar(){
        $data = session::get('data');
        return view('pages.calendar')->with('jobs', $data);
    }
}
