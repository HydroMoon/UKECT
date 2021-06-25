<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;

use jeremykenedy\LaravelRoles\Models\Role;

use App\Reg;
use App\Regs;
use App\Teacher;
use App\Course;
use App\Material;
use App\TemporaryMedia;
use App\Message;
use App\Scourse;
use App\Lcourse;
use App\Note;
use App\Specialty;
use Illuminate\Support\Facades\Storage;
use Session;
use Purifier;
use Image as IM;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index');
    }

    public function getUsers()
    {
        $users = new User;

        $users = User::all();

        return view('dashboard.users')->with(['data' => $users]);
    }

    public function delUser($id)
    {
        $user = User::find($id);

        $user->delete();

        Session::flash('success', __('trans.delUser'));

        return redirect()->back();
    }

    public function getShortUser($id)
    {
        $short_reg = new Reg;

        $user = User::find($id);

        $short_reg = Reg::where('user_id', $id)->get();

        return view('dashboard.single-short')->with(['reg' => $short_reg, 'usern' => $user]);
    }

    public function getLongUser($id)
    {

        $user = User::find($id);

        $long_reg = Specialty::where('id', $user->spec_id)->get();

        return view('dashboard.single-long')->with(['regs' => $long_reg, 'user' => $user]);
    }


    public function getTeacher()
    {
        $teach = Admin::where('id', '!=', auth()->id()  )->get();

        return view('dashboard.teacher')->with(['teacher' => $teach]);
    }

    public function nameTeacher(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|string|max:255'
          ));

        $teach = Admin::find(auth()->id());

        $teach->name = $request->name;

        $teach->save();

        Session::flash('success', __('words.certsuc'));


        return redirect()->back();
    }

    public function storeTeacher(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'info' => 'required'
          ));
        
          $teach = new Teacher;

          $teach->name = $request->name;
          $teach->major = $request->major;
          $teach->level = $request->level;
          $teach->university = $request->university;
          $teach->info = $request->info;

          $teach->save();

          Session::flash('success', __('trans.add_teacher'));
  
          return redirect()->route('admin.teacher');
    }

    public function deleteTeacher($id)
    {
        $teacher = Admin::find($id);
        $teacher->delete();

        Session::flash('success', __('trans.delTeacher'));

        return redirect()->back();
    }

    public function updateReg(Request $request, $id)
    {
        $reg = Reg::find($id);

        $reg->accepted = $request->acc;

        $reg->save();

        Session::flash('success', __('trans.reg'));
  
        return redirect()->route('users.single.short', $reg->user->id);
    }

    public function updateRegs(Request $request, $id)
    {

        $regs = Regs::find($id);

        $regs->accepted = $request->acc;

        $regs->save();

        Session::flash('success', __('trans.reg'));
  
        return redirect()->route('users.single.long', $regs->user->id);
    }

    public function getMessage()
    {
        $mess = new Message;
        $mess = Message::all();

        return view('dashboard.message')->with(['mess' => $mess]);
    }

    public function addUser()
    {
        return view('dashboard.register');
    }

    public function getShort($id)
    {
        $user = new User;
        $user = User::find($id);

        $short_courses = new Scourse;
        $short_courses = Scourse::all();

        return view('dashboard.add-short')->with(['user' => $user, 'shortc' => $short_courses]);
    }

    public function getLong($id)
    {
        $user = new User;
        $user = User::find($id);

        $long_courses = new Lcourse;
        $long_courses = Lcourse::all();

        return view('dashboard.add-long')->with(['user' => $user, 'longc' => $long_courses]);
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

          $user = User::find($request->userid);

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
  
          return redirect()->back();
    }

    public function storeLong(Request $request)
    {
        //Validate
         $this->validate($request, array(
            'spec_name' => 'required|string|max:255',
            'spec_type' => 'required|string',
            'duration' => 'required',
            'info' => 'required',
          ));

          //save info into database

          $reg = new Specialty;
  
          $reg->spec_name = $request->spec_name;
          $reg->spec_type = $request->spec_type;
          $reg->duration = $request->duration;
          $reg->info = $request->info;
  
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
  
          return redirect()->back();
    }

    public function addNote($id, $cid)
    {
        $user = User::find($id);
        $lcourse = Lcourse::find($cid);

        return view('dashboard.add-note')->with(['user' => $user, 'lcourse' => $lcourse]);
    }

    public function storeNote(Request $request)
    {
        $user = User::find($request->uid);
        $lcourse = Lcourse::find($request->cid);

        $note = new Note;

        $note->note = $request->note;
        $note->user()->associate($user);
        $note->lcourse()->associate($lcourse->id);

        $note->save();

        Session::flash('success', __('trans.add_note'));

        return redirect()->back();
    }

    public function addCerts(Request $request)
    {
        
        $this->validate($request, array(
            'completed' => 'numeric',
            'cert' => 'image'
        ));

        $cert = Reg::find($request->user);

        if ($request->hasFile('cert')) {
            $image = $request->file('cert');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('cert/' . $filename);
            IM::make($image)->encode($image->getClientOriginalExtension(), 75)->save($location);
            $cert->cert = $filename;
          }
        
          $cert->completed = $request->comp;

        $cert->save();
        
        Session::flash('success', __('words.certsuc'));

        return redirect()->back();
    }

    public function addCertl(Request $request)
    {
        
        $this->validate($request, array(
            'completed' => 'numeric',
            'cert' => 'image'
        ));

        $cert = Regs::find($request->user);

        if ($request->hasFile('cert')) {
            $image = $request->file('cert');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('cert/' . $filename);
            IM::make($image)->encode($image->getClientOriginalExtension(), 75)->save($location);
            $cert->cert = $filename;
          }
          $cert->completed = $request->comp;

        $cert->save();
        
        Session::flash('success', __('words.certsuc'));

        return redirect()->back();
    }

    public function getSubject($id)
    {
        $subject = Course::where('spec_id', $id)->get();
        $teacher = Role::where('name', '=', 'Teacher')->first();
        $spec = Specialty::find($id);
        
        return view('dashboard.subject')->with(['subject' => $subject, 'teacher' => $teacher, 'spec' => $spec]);
    }

    public function getSubjectP(Request $request)
    {
        $subject = Course::where([
            ['spec_id', $request->spec_id],
            ['semester', $request->semester]
        ])->get();

        $teacher = Role::where('name', '=', 'Teacher')->first();
        $spec = Specialty::find($request->spec_id);
        
        return view('dashboard.subject')->with(['subject' => $subject, 'teacher' => $teacher, 'spec' => $spec]);
    }

    public function addSubject(Request $request, $id)
    {
        $this->validate($request, array(
            'course_name' => 'required|string|max:255',
            'semester' => 'required|numeric|min:1|max:10',
            'teacher' => 'required|string', 
        ));

        $teacher_name = Admin::find($request->teacher);
        
        $course = new Course;

        $course->course_name = $request->course_name;
        $course->semester = $request->semester;
        $course->teacher = $teacher_name->name;
        
        $course->spec()->associate($id);
        $course->teacher()->associate($request->teacher);

        $course->save();

        Session::flash('success', __('words.certsuc'));

        return redirect()->route('admin.subject.get', $id);
    }

    public function createTeacher(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|min:10|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ));

        $role = Role::where('name', '=', 'Teacher')->first();//choose the default role upon user creation.

        $newUser = Admin::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $attRole = Admin::find($newUser->id);
        
        $attRole->attachRole($role);

        Session::flash('success', __('words.certsuc'));

        return redirect()->route('admin.teacher');
    }


    public function getMyCourses($specc = 1, $semester = 1)
    {
        $courses = Course::where([
            ['teacher_id', auth()->id()],
            ['spec_id', $specc],
            ['semester', $semester]
        ])->get();
        $spec = Specialty::all();
        
        return view('dashboard.my-courses')->with(['courses' => $courses, 'spec' => $spec]);
    }

    public function getPMyCourses(Request $request)
    {
        $courses = Course::where([
            ['teacher_id', auth()->id()],
            ['spec_id', $request->spec_id],
            ['semester', $request->semester]
        ])->get();
        $spec = Specialty::all();

        return view('dashboard.my-courses')->with(['courses' => $courses, 'spec' => $spec]);
    }

    public function getLectures($c_id)
    {
        $material = Material::where('course_id', $c_id)->get();
        $course_name = Course::find($c_id)->course_name;

        return view('dashboard.add-lectures')->with(['material' => $material, 'course_id' => $c_id, 'cname' => $course_name]);
    }


    public function addMaterials(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|string|max:255',
        ));

        $tmpFile = TemporaryMedia::where('path', $request->file)->first();

        if ($tmpFile) {
            $size = Storage::size('tmp/' . $request->file . '/' . $tmpFile->name);

            $fileType = pathinfo(storage_path() . 'tmp/' . $request->file . '/' . $tmpFile->name);

            $material = new Material;

            $material->name = $request->name;
            $material->file_name = $request->file . '/' . $tmpFile->name;
            $material->type = $fileType['extension'];
            $material->size = $this->formatBytes($size);

            $material->course()->associate($request->course_id);

            $material->save();

            $material->addMedia('files/tmp/' . $request->file . '/' . $tmpFile->name)->toMediaCollection();

            $tmpFile->delete();

            Session::flash('success', __('words.certsuc'));
        }
        
        

        return redirect()->route('admin.lectures.get', $request->course_id);
    }

    public function delMaterial($id)
    {
        $material = Material::find($id);

        $material->forceDelete();

        Session::flash('success', __('trans.course_deleted'));
        
        return redirect()->back();
    }

    public function formatBytes($bytes, $precision = 2) { 
        $units = array('B', 'KB', 'MB', 'GB', 'TB'); 
    
        $bytes = max($bytes, 0); 
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
        $pow = min($pow, count($units) - 1); 
    
        // Uncomment one of the following alternatives
        $bytes /= pow(1024, $pow);
        // $bytes /= (1 << (10 * $pow)); 
    
        return round($bytes, $precision) . ' ' . $units[$pow]; 
    } 
}
