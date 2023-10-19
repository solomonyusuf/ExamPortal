<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
   public function current_exam()
   {
       return view('student.exam');
   }
   public function admin_login()
   {
       return view('admin.login');
   }
   public function admin_dashboard()
   {
       return view('admin.dashboard');
   }


   //----------EXAMS- ----------------
   public function ongoing_exams()
   {
       return view('admin.exams.ongoing');
   }
   public function concluded_exams()
   {
       return view('admin.exams.concluded');
   }
   public function scheduled_exams()
   {
       return view('admin.exams.scheduled');
   }
   public function add_exams()
   {
       return view('admin.exams.add');
   }
   public function edit_exams($id)
   {
       return view('admin.exams.edit', ['id'=> $id]);
   }
   public function edit_question($id)
   {
       return view('admin.exams.edit_question', ['id'=> $id]);
   }
   public function result($id)
   {
       return view('admin.exams.result', ['id'=> $id]);
   }
   //------------------------------------------


   //--------------USERS----------------------------
    public function staffs()
    {
        return view('admin.user.staffs');
    }
    public function students()
    {
        return view('admin.user.students');
    }
    public function create_user()
    {
        return view('admin.user.create_user');
    }
    public function edit_user($id)
    {
        return view('admin.user.edit', ['id'=> $id]);
    }
    public function locked()
    {
        return view('admin.user.locked');
    }
   //------------------------------------------


    //-------------CLASSROOM-----------------------------
    public function classrooms()
    {
        return view('admin.class.classrooms');
    }
    public function create_classrooms()
    {
        return view('admin.class.create');
    }
    public function edit_classrooms($id)
    {
        return view('admin.class.edit', ['id'=> $id]);
    }
   //------------------------------------------

}
