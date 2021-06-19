<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Reg;
use App\Regs;
use App\User;
use App\Scourse;
use App\Lcourse;
use App\Note;
use App\Material;
use App\Specialty;
use App\Course;
use App\Question;
use App\Quiz;
use App\QuizAttempt;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {
        return view('user.dash');
    }

    public function getCourses()
    {
        $short = new Reg;
        $short = Reg::where('user_id', Auth::user()->id)->get();

        $long = new Regs;
        $long = Regs::where('user_id', Auth::user()->id)->get();

        return view('user.courses')->with(['long' => $long, 'short' => $short]);
    }

    public function getShort()
    {
        $user = new User;
        $user = User::find(Auth::user()->id);

        $short_courses = new Scourse;
        $short_courses = Scourse::all();

        return view('user.short-course-regestration')->with(['user' => $user, 'shortc' => $short_courses]);
    }

    public function getLong()
    {
        $user = new User;
        $user = User::find(Auth::user()->id);

        $long_courses = new Lcourse;
        $long_courses = Lcourse::all();

        return view('user.long-course-regestration')->with(['user' => $user, 'longc' => $long_courses]);
    }

    public function storeShort(Request $request)
    {
         //Validate
         $this->validate($request, array(
            'name' => 'required|string|max:255',
            'dob' => 'required|date_format:Y-m-d',
            'nationality' => 'required|string',
            'phone' => 'required|numeric|min:10',
            'email' => 'required|string|email|max:255',
          ));

          //save info into database

          $user = User::find(Auth::user()->id);

          $reg = new Reg;
  
          $reg->name = $request->name;
          $reg->dob = $request->dob;
          $reg->sex = $request->sex;
          $reg->nationality = $request->nationality;
          $reg->phone = $request->phone;
          $reg->email = $request->email;

          $reg->scourse()->associate($request->scourse_id);
          $reg->user()->associate($user);
  
  
          try {
            $reg->save();
             }
          catch (\Illuminate\Database\QueryException $e) {
              $errorcode = $e->errorInfo[1];
              if ($errorcode == 1062) {
                Session::flash('error', __('home.error'));
  
                return redirect()->back();
              }
          }
  
          Session::flash('success', __('trans.short_user_reg'));
  
          return redirect()->route('user.dash');
    }

    public function storeLong(Request $request)
    {
        //Validate
         $this->validate($request, array(
            'name' => 'required|string|max:255',
            'dob' => 'required|date_format:Y-m-d',
            'nationality' => 'required|string',
            'phone' => 'required|numeric|min:10',
            'email' => 'required|string|email|max:255',
          ));

          //save info into database

          $user = User::find(Auth::user()->id);

          $reg = new Regs;
  
          $reg->name = $request->name;
          $reg->dob = $request->dob;
          $reg->sex = $request->sex;
          $reg->nationality = $request->nationality;
          $reg->phone = $request->phone;
          $reg->email = $request->email;
          
          $reg->lcourse()->associate($request->lcourse_id);
          $reg->user()->associate($user);
  
  
          try {
            $reg->save();
             }
          catch (\Illuminate\Database\QueryException $e) {
              $errorcode = $e->errorInfo[1];
              if ($errorcode == 1062) {
                Session::flash('error', __('home.error'));
  
                return redirect()->back();
              }
          }
  
          Session::flash('success', __('trans.long_user_reg'));
  
          return redirect()->route('user.dash');
    }

    public function note($cid)
    {
        $note = new Note;
        $note = Note::where('lcourse_id', $cid)->where('user_id', Auth::user()->id)->get();
        
        return view('user.note')->with(['notes' => $note]);
    }

    public function Cert($id)
    {
        $cert = Reg::find($id);

        return view('user.cert')->withCert($cert);
    }

    public function Certl($id)
    {
        $cert = Regs::find($id);

        return view('user.certl')->withCert($cert);
    }

    public function getSubject($id)
    {
        $courses = Course::where('spec_id', $id)->get();
        
        $spec = Specialty::find($id);

        return view('user.subject')->with(['courses' => $courses, 'spec' => $spec]);
    }

    // [ADD]LMS FUNCTIONS
    public function getStudentCourse($c_id)
    {
        $course = Material::where('course_id', $c_id)->get();
        $course_info = Course::find($c_id);

        return view('user.course-material')->with(['material' => $course, 'course_info' => $course_info]);
    }

    //Quizzes
    public function getQuizzes($id)
    {
        $quiz = Course::find($id);
        
        $taken = QuizAttempt::where('user_id', auth()->id())->get();

        // dd($taken);
        return view('user.my-quiz')->with(['quiz' => $quiz, 'taken' => $taken]);
    }

    public function getQuestions($id)
    {
        $questions = Quiz::find($id);
        
        return view('user.take-quiz')->with(['questions' => $questions]);
    }

    //Answers
    public function addAnswers(Request $request)
    {
        

        $countQuestion = Question::where('quiz_id', $request->quiz_id)->get();

        $countCorrect = 0;
        for ($i = 0; $i < $countQuestion->count(); $i++) { 
            $num = 'choice' . strval($countQuestion[$i]->id);
            $countCorrect += $request->$num;
        }
        
        $score = ($request->quiz_score / $countQuestion->count()) * $countCorrect;
        
        $quizAnswer = new QuizAttempt;

        $quizAnswer->alternative = auth()->user()->name . '/' . $request->quiz_name;
        $quizAnswer->attempt = 1;
        $quizAnswer->score = $score;

        $quizAnswer->quiz()->associate($request->quiz_id);
        $quizAnswer->user()->associate(auth()->id());

        $quizAnswer->save();

        Session::flash('success', __('words.quiz_finish'));

        return redirect()->route('user.quiz.show', Quiz::find($request->quiz_id)->quizzable->id);
    }
}
