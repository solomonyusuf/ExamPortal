<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Models\QuizResponse;
use App\Models\QuizResult;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class StudentController extends Controller
{
    public function student_login(Request $request)
    {

        $input['email'] = User::where('student_id', $request->student_id)->first()?->email;
        $input['password'] = $request->password;


        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if(!Cookie::has('authorize'))
                Cookie::queue('authorize', Carbon::now(),5000);
            $user = auth()->user();
            $exam = Quiz::where([['class_id', $user->class_id],['open', '=', true]])->first();
            session()->put('exam_id', $exam?->id);
            if($user->locked == true)
            {
                alert()->error('Account Locked', 'Your account has been placed on lockdown, contact the nearest invigilator.');
                return redirect()->route('exam_locked');
            }

            if(!$exam)
            {
                alert()->success('Welcome '."{$user->first_name}",'there is currently no exam scheduled.');
                return redirect()->route('no_exam');
            }
            if(!$exam->open)
            {
                alert()->success('Welcome '."{$user->first_name}",'there is currently no exam scheduled.');
                return redirect()->route('no_exam');
            }

            $result = \App\Models\QuizResult::where([['quiz_id', $exam?->id], ['users_id', auth()->user()?->id]])->first();
            if($result) return redirect()->route('finished');



            if($user->role == 'student' && $user->locked == false)
            {
                session()->put('exam_id', $exam->id);
                alert()->success('Welcome '."{$user->first_name}",'your login attempt was successful.');
                return redirect()->route('current_exam');
            }
            else
            {

                alert()->error('Login Error','An error occured.');
                return redirect()->back();
            }
        }
        else
        {
            toast('Invalid email or password.', 'danger');
            return redirect()->back();

        }
    }
    public static function respond(Request $request)
    {
        try
        {
            if(self::check_question($request->id))
            {
                toast('Already answered', 'warning');
                return redirect()->back();
            }
            QuizResponse::create(array(
                'quiz_id'=> $request->quiz_id,
                'question_id'=> $request->id,
                'users_id'=> auth()->user()?->id,
                'response'=> $request->opt1
            ));
            toast('Response recorded', 'success');

            $index = 0;
            if(request()->page == request()->quiz_total)
            {
                $index = request()->page;
            }
            else
            {
                $index = request()->page
                    ? intval(request()->page) + 1 : 2;
            }
            return response()->json(['index'=> $index], 200);
            //return redirect(route('current_exam').'?page='.$index);
        }
        catch(\Exception $exception)
        {
            error_log($exception);
            toast('An error occured', 'error');
            return redirect()->back();
        }
    }
    public static function clear_choice($id)
    {
        try
        {
            $response = QuizResponse::where([['question_id', $id], ['users_id', auth()->user()?->id]])->first();
            if(!$response) return redirect()->back();
            $response->delete();

            toast('Response removed', 'success');
        }
        catch(\Exception $exception)
        {
            error_log($exception);
            toast('An error occured', 'error');
            return redirect()->back();
        }

        return redirect()->back();

    }
    public static function check_question($id)
    {
        $response = QuizResponse::where([['question_id', $id], ['users_id', auth()->user()?->id]])->first();
        if (!$response) return false;

        return true;
    }
    public static function get_response($id)
    {
        $response = QuizResponse::where([['question_id', $id], ['users_id', auth()->user()?->id]])->first();

        return $response;
    }
    public static function lock_exam($id)
    {
        try
        {
            $user = User::find(auth()->user()?->id);
            $user->locked = true;
            $user->save();

            alert()->warning('Exam Locked', 'due to suspicious activity, like opening new tab or leaving the exam page, you have been locked-out of this system');
        }
        catch(\Exception $exception)
        {
            error_log($exception);
            toast('An error occured', 'error');
            return redirect()->back();
        }
        return redirect()->route('exam_locked');
    }
    public static function get_all_response($id)
    {
        return QuizResponse::where([['quiz_id', $id], ['users_id', auth()->user()?->id]])->get();
    }
    public static function submit($id)
    {
        try
        {
            $request = request();
            $score = 0;
            $quiz = Quiz::find($id);
            /* fetch questions vis a vis the response, then mark them */
            $questions = \App\Models\QuizQuestion::where('quiz_id', $id)->get();

            if(($request->request->count()-7) == 0 && intval($request->storage) > 0)
            {
                alert()->warning('Incomplete Response', 'Your exam response is not complete');
                return redirect()->back();
            }
            for($i = 6; $i < $request->request->count(); $i++)
            {
                $index = 0;
                //dd($request->request->getString('opt'."{$questions[$index]->id}"));
                //dd($questions[$index]->correct);
               if($request->request->getString('opt'."{$questions[$index]->id}") == $questions[$index]->correct)
                   $score += $quiz->points;
                ++$index;
            }
            //dd($score);

            $quiz->total_point = ($questions->count() * $quiz->points);
            $quiz->save();

            $percentage = ($score * 100)/$quiz->total_point;

            QuizResult::create(array(
                'quiz_id'=> $id ,
                'users_id'=> auth()->user()?->id,
                'score'=> $percentage
            ));

            alert()->success('Exam Ended', 'Your exam ended successfully');
            return redirect()->route('finished');
        }
        catch(\Exception $exception)
        {
            error_log($exception);
            toast('An error occured', 'error');
            return redirect()->back();
        }
    }
}
