<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\StudentClass;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\Console\Question\Question;
use function Laravel\Prompts\error;

class AdminController extends Controller
{
    public function post_admin_login(Request $request)
    {

    }

    //EXAM
    public function add_exam(Request $request)
    {
        try
        {
            $quiz = Quiz::create(array(
                'class_id'=> $request->class_id,
                'name'=> $request->name,
                'points'=> $request->points,
                'total_point'=> $request->total_point,
                'duration'=> $request->duration,
                'start_time'=> $request->start_time
            ));
            toast('Creation sucessful.Proceed to add questions.', 'success');
            return redirect()->route('edit_exams',$quiz->id);
        }
        catch(\Exception $exception)
        {
            error_log($exception);
            toast("An error Occured", 'error');
            return redirect()->back();
        }

    }
    public function update_exam(Request $request)
    {
        try
        {
            Quiz::where('id', $request->id)->update(array(
                'id'=> $request->id,
                'class_id'=> $request->class_id,
                'name'=> $request->name,
                'points'=> $request->points,
                'total_point'=> $request->total_point,
                'duration'=> $request->duration,
                'start_time'=> $request->start_time
            ));
            toast('Update Sucessful', 'success');
        }
        catch(\Exception $exception)
        {
            error_log($exception);
            toast("An error Occured", 'error');
            return redirect()->back();
        }
        return redirect()->back();

    }
    public function delete_exam($id)
    {
        try
        {
            Quiz::find($id)->delete();
            toast('Deletion Sucessful', 'success');
        }
        catch(\Exception $exception)
        {
            error_log($exception);
            toast("An error Occured", 'error');
            return redirect()->back();
        }
        return redirect()->back();
    }

    //QUESTIONS
    public function add_question(Request $request)
    {
        try
        {
            QuizQuestion::create(array(
                'quiz_id'=> $request->quiz_id,
                'title'=> $request->title,
                'correct'=> $request->correct,
                'a'=> $request->a,
                'b'=> $request->b,
                'c'=> $request->c,
                'd'=> $request->d,
            ));
            toast('Creation Sucessful', 'success');
        }
        catch(\Exception $exception)
        {
            error_log($exception);
            toast("An error Occured", 'error');
            return redirect()->back();
        }
        return redirect()->back();
    }
    public function update_question(Request $request)
    {
        try
        {
            QuizQuestion::where('id', $request->id)->update(array(
                'id'=> $request->id,
                'quiz_id'=> $request->quiz_id,
                'title'=> $request->title,
                'correct'=> $request->correct,
                'a'=> $request->a,
                'b'=> $request->b,
                'c'=> $request->c,
                'd'=> $request->d,
                'point'=> $request->point
            ));
            toast('Update Sucessful', 'success');
        }
        catch(\Exception $exception)
        {
            error_log($exception);
            toast("An error Occured", 'error');
            return redirect()->back();
        }
        return redirect()->back();

    }
    public function delete_question($id)
    {
        try
        {
            QuizQuestion::find($id)->delete();
            toast('Deletion Sucessful', 'success');
        }
        catch(\Exception $exception)
        {
            error_log($exception);
            toast("An error Occured", 'error');
            return redirect()->back();
        }
        return redirect()->back();
    }

    //STAFFS
    public function add_user(Request $request)
    {
        try
        {
            $image = null;
            if($request->image != null)
            {
                $client = $request->image->getClientOriginalExtension();

                if($client == 'jpg' || $client == 'png'|| $client == 'jpeg')
                {
                    toast('File format accepted', 'success');
                }
                else
                {
                    toast('File format rejected.Accepted include (jpg, png, jpeg)', 'error');
                    return redirect()->back();
                }
                $image = asset('Staticfiles/'.time().'.'.request()->image->getClientOriginalExtension());
                request()->image->move(public_path('Staticfiles'), $image);

            }
            User::create(array(
                'image'=> $image,
                'first_name'=> $request->first_name,
                'last_name'=> $request->last_name,
                'middle_name'=> $request->middle_name,
                'exam_access'=> $request->exam_access,
                'class_id'=> $request->class_id,
                'password'=> bcrypt($request->exam_access),
                'role'=> $request->role,
                'locked'=> $request->locked
            ));
            toast('Creation Sucessful', 'success');
        }
        catch(\Exception $exception)
        {
            error_log($exception);
            toast("An error Occured", 'error');
            return redirect()->back();
        }
        return redirect()->back();
    }
    public function update_user(Request $request)
    {
        try
        {
            $user = User::find($request->id);
            $image = $user->image;
            if($request->image != null)
            {
                $client = $request->image->getClientOriginalExtension();

                if($client == 'jpg' || $client == 'png'|| $client == 'jpeg')
                {
                    toast('File format accepted', 'success');
                }
                else
                {
                    toast('File format rejected.Accepted include (jpg, png, jpeg)', 'error');
                    return redirect()->back();
                }
                $image = asset('Staticfiles/'.time().'.'.request()->image->getClientOriginalExtension());
                request()->image->move(public_path('Staticfiles'), $image);

            }
            User::where('id', $request->id)->update(array(
                'id'=> $request->id,
                'image'=> $image,
                'first_name'=> $request->first_name,
                'last_name'=> $request->last_name,
                'middle_name'=> $request->middle_name,
                'exam_access'=> $request->exam_access,
                'class_id'=> $request->class_id,
                'email_verified_at'=> $user->email_verified_at,
                'password'=> bcrypt($request->exam_access),
                'role'=> $user->role,
                'locked'=> $request->locked
            ));
            toast('Update Sucessful', 'success');
        }
        catch(\Exception $exception)
        {
            error_log($exception);
            toast("An error Occured", 'error');
            return redirect()->back();
        }
        return redirect()->back();

    }
    public function delete_user($id)
    {
        try
        {
           User::find($id)->delete();
            toast('Deletion Sucessful', 'success');
        }
        catch(\Exception $exception)
        {
            error_log($exception);
            toast("An error Occured", 'error');
            return redirect()->back();
        }
        return redirect()->back();
    }


    //UNLOCK
    public function unlock_student($id)
    {
        try
        {
            $user = User::find($id);
            $user->locked = false;
            $user->save();
            toast('Update Sucessful', 'success');
        }
        catch(\Exception $exception)
        {
            error_log($exception);
            toast("An error Occured", 'error');
            return redirect()->back();
        }
        return redirect()->back();
    }

    //CLASSROOM
    public function add_classroom(Request $request)
    {
        try
        {
           StudentClass::create(array(
               'name'=> $request->name
           ));
            toast('Creation Sucessful', 'success');
        }
        catch(\Exception $exception)
        {
            error_log($exception);
            toast("An error Occured", 'error');
            return redirect()->back();
        }
        return redirect()->back();
    }
    public function update_classroom(Request $request)
    {
        try
        {
            StudentClass::where('id', $request->id)->update(array(
                'id'=> $request->id,
                'name'=> $request->name
            ));
            toast('Update Sucessful', 'success');
        }
        catch(\Exception $exception)
        {
            error_log($exception);
            toast("An error Occured", 'error');
            return redirect()->back();
        }
        return redirect()->back();

    }
    public function delete_classroom($id)
    {
        try
        {
            StudentClass::find($id)->delete();
            toast('Deletion Sucessful', 'success');
        }
        catch(\Exception $exception)
        {
            error_log($exception);
            toast("An error Occured", 'error');
            return redirect()->back();
        }
        return redirect()->back();
    }

    //UPLOADS
    public function admin_upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $filenametostore = $filename.'_blog_image_'.time().'.'.$extension;
            $logo = asset('uploads/' . time() . '.' . $request->file('upload')->getClientOriginalExtension());
            //Upload the file
            $request->file('upload')->move(public_path('uploads'), $logo);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = $logo;

            $msg = 'Image added successfully';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }


}
