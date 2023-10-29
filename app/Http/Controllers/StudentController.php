<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Models\QuizResult;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function student_login(Request $request)
    {

        $input['email'] = User::where('student_id', $request->student_id)->first()?->email;
        $input['password'] = $request->password;


        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            $user = auth()->user();
            $exam = Quiz::where([['start_time', '>', Carbon::now()],['class_id', $user->class_id]])->orderBy('start_time','ASC')->first();
            $result = QuizResult::where('quiz_id', $exam?->id)->first();

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
            if($result)
            {
                alert()->error('Exam Completed', 'Your exam has been completed earlier.');
                return redirect()->route('finished');
            }
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

    public static function TrackTime($attempt_id, $seconds)
    {
        $att = QuizAttempt::find($attempt_id);
        $att->seconds = $seconds;
        $att->save();
        return $att;
    }
}
