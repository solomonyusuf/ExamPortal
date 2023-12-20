<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Models\QuizQuestion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PagesController extends Controller
{
   public function current_exam()
   {
       if(!session()->has('exam_id'))
           return redirect()->back();
       $quiz = \App\Models\Quiz::find(session()->get('exam_id'));
       $questions = \App\Models\QuizQuestion::where('quiz_id', $quiz->id)->get();

       /* check if its quiz is open*/
       if(!$quiz->open)
       {
           alert()->success('No Exam Scheduled', 'Sorry no exam has been scheduled.');
           return redirect()->route('no_exam');
       }
       /* get attempt record, if there is any and its expired redirect the user*/
       $attempt = \App\Models\QuizAttempt::where([['quiz_id', $quiz->id], ['users_id', auth()->user()?->id]])->first();
       if($attempt)
       {
           session()->put('attempt_id', $attempt->id);
           if(!$quiz->open)
           {
               return redirect()->route('finished');
           }
           else
           {
               if(!request()->page)
               alert()->success('Exam Resumed', 'Your exam has been resumed');
           }
       }
       else
       {
           $attempt = \App\Models\QuizAttempt::create(array(
               'quiz_id'=> $quiz->id,
               'users_id'=> auth()->user()->id,
               'seconds'=> ($quiz->duration * 60),
               'start_time'=> $quiz->start_time
           ));
           session()->put('attempt_id', $attempt->id);
       }

       return view('student.exam',['quiz'=> $quiz, 'questions'=>$questions, 'attempt'=> $attempt]);
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
    public function instruction()
    {
        return view('student.instruction');
    }
    public function view_instruction()
    {
        return view('admin.exams.add_instruction');
    }
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
   public function exam_locked()
   {
       return view('student.locked');
   }
   public function no_exam()
   {
       return view('student.no_exam');
   }
   public function finished()
   {
       return view('student.finished');
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
