<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reg;
use App\Lcourse;
use App\Scourse;
use App\Specialty;
use App\Course;
use App\Question;
use App\QuestionOption;
use App\Quiz;
use App\Teacher;
use Session;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $long = Specialty::all();
        $teacher = Teacher::all();

        return view('dashboard.courses')->with(['long' => $long]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeShort(Request $request)
    {

        //Validate
        $this->validate($request, array(
            'cname' => 'required|string|max:255',
            'price' => 'required|numeric',
            'teacher' => 'required|string',
            'certificate' => 'required|string',
            'start' => 'required|date_format:Y-m-d',
            'finish' => 'required|date_format:Y-m-d',
            'info' => 'required',
        ));

        $shortc = new Scourse;

        $shortc->cname = $request->cname;
        $shortc->price = $request->price;
        $shortc->teacher = $request->teacher;
        $shortc->certificate = $request->certificate;
        $shortc->info = $request->info;
        $shortc->start = $request->start;
        $shortc->finish = $request->finish;

        $shortc->save();

        Session::flash('success', __('trans.shortc_success'));

        return redirect()->route('admin.courses');
    }

    public function storeLong(Request $request)
    {

        //Validate
        $this->validate($request, array(
            'spec_name' => 'required|string|max:255',
            'spec_type' => 'required|string|max:255',
            'duration' => 'required',
            'info' => 'required',
        ));

        $specialty = new Specialty;

        $specialty->spec_name = $request->spec_name;
        $specialty->spec_type = $request->spec_type;
        $specialty->duration = $request->duration;
        $specialty->info = $request->info;

        $specialty->save();

        Session::flash('success', __('trans.longc_success'));

        return redirect()->route('admin.courses');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editShort($id)
    {
        $teacher = new Teacher;
        $teacher = Teacher::all();

        $short = Scourse::find($id);

        return view('dashboard.edit-s')->with(['short' => $short, 'teacher' => $teacher]);
    }

    public function editLong($id)
    {
        $long = Specialty::find($id);

        return view('dashboard.edit-l')->with(['long' => $long]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateShort(Request $request, $id)
    {
        $shortc = Scourse::find($id);

        //Validate
        $this->validate($request, array(
            'cname' => 'required|string|max:255',
            'price' => 'required|numeric',
            'teacher' => 'required|string',
            'certificate' => 'required|string',
            'start' => 'required|date_format:Y-m-d',
            'finish' => 'required|date_format:Y-m-d',
            'info' => 'required',
        ));

        $shortc = new Scourse;

        $shortc->cname = $request->cname;
        $shortc->price = $request->price;
        $shortc->teacher = $request->teacher;
        $shortc->certificate = $request->certificate;
        $shortc->info = $request->info;
        $shortc->start = $request->start;
        $shortc->finish = $request->finish;

        $shortc->save();

        Session::flash('success', __('trans.course_edit'));

        return redirect()->route('admin.courses');
    }

    public function updateLong(Request $request, $id)
    {
        $longc = Specialty::find($id);

        //Validate
        $this->validate($request, array(
            'spec_name' => 'required|string|max:255',
            'spec_type' => 'required|string|max:255',
            'duration' => 'required',
            'info' => 'required',
        ));

        $longc->spec_name = $request->spec_name;
        $longc->spec_type = $request->spec_type;
        $longc->duration = $request->duration;
        $longc->info = $request->info;

        $longc->save();

        Session::flash('success', __('trans.course_edit'));

        return redirect()->route('admin.courses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyShort($id)
    {
        $course = Scourse::find($id);

        $course->delete();

        Session::flash('success', __('trans.course_deleted'));

        return redirect()->route('admin.courses');
    }

    public function destroyLong($id)
    {
        $course = Lcourse::find($id);

        $course->delete();

        Session::flash('success', __('trans.course_deleted'));

        return redirect()->route('admin.courses');
    }

    //Quiz
    public function getQuizzes($c_id)
    {
        $quiz = Course::find($c_id);

        return view('dashboard.add-quizzes')->with(['quiz' => $quiz]);
    }

    public function addQuizzes(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required|string|max:255',
            'no_ques' => 'required|numeric|max:10',
            'score' => 'required|numeric|max:100',
        ));

        $newQuiz = new Quiz;

        $newQuiz->title = $request->title;
        $newQuiz->max_number_questions = $request->no_ques;
        $newQuiz->min_score = $request->score;

        $newQuiz->quizzable()->associate($request->course_id);

        $newQuiz->save();

        Session::flash('success', __('words.certsuc'));
        
        return redirect()->back();
    }

    public function delQuiz($id)
    {
        $quiz = Quiz::find($id);

        $quiz->delete();

        Session::flash('success', __('words.certsuc'));

        return redirect()->back();
    }

    //Question
    public function getQuestions($q_id)
    {
        $questions = Quiz::find($q_id);
        
        return view('dashboard.add-questions')->with(['questions' => $questions]);
    }

    public function addQuestions(Request $request)
    {
        $this->validate($request, array(
            'question' => 'required|string|max:255',
        ));

        $newQuestion = new Question;

        $newQuestion->question = $request->question;
        $newQuestion->type = 'c';

        $newQuestion->quiz()->associate($request->quiz_id);

        $newQuestion->save();

        Session::flash('success', __('words.certsuc'));
        
        return redirect()->back();
    }

    public function delQuestion($id)
    {
        $question = Question::find($id);

        $question->delete();

        Session::flash('success', __('words.certsuc'));

        return redirect()->back();
    }

    //Answers
    public function getAnswers($q_id)
    {
        $answers = Question::find($q_id);

        return view('dashboard.show-answers')->with(['answers' => $answers]);
    }

    public function addAnswers(Request $request)
    {
        $question_id = $request->question_id;
        $ques = 'question' . $question_id;
        $corr = 'correct' . $question_id;

        $this->validate($request, array(
            $ques => 'required|string|max:255',
        ));
        
        $answer = new QuestionOption;

        $answer->alternative = $request->$ques;

        if ($request->has($corr)) {
            $answer->correct = true;
        } else {
            $answer->correct = false;    
        }

        $answer->question()->associate($request->question_id);

        $answer->save();

        Session::flash('success', __('words.certsuc'));

        return redirect()->back();
    }

    public function delAnswer($id)
    {       
        $answer = QuestionOption::find($id);

        $answer->delete();

        Session::flash('success', __('words.certsuc'));

        return redirect()->back();
    }
}
