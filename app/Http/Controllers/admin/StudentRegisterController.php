<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ConstantHelper;
use App\Models\StudentRegister;
use App\Models\College;
use App\Models\User;
use Exception;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\StudentRegister as Validator;
use Mail;
use Crypt;
use Illuminate\Support\Facades\Hash;
use DB;



class StudentRegisterController extends Controller
{
    public function index(Request $request){

        $studentRegisters = StudentRegister::with('getCollegeDetail')->select('id','college_id','name','email','mobile','gender','current_course','course_name','created_at');
        $search = $request->search;
        $genders=ConstantHelper::GENDER;
        $colleges = College::select('id','name')->get();
        
        if($search){
                $studentRegisters->where(function($query) use ( $search){
                    $query->where('first_name', 'like', "%{$search}%");
                    $query->orWhere('last_name', 'like', "%{$search}%");
                    $query->orWhere('email', 'like', "%{$search}%");
                    $query->orWhere('mobile', 'like', "%{$search}%");
                    $query->orWhere('gender', 'like', "%{$search}%");
                });
            }
            
            if($request->gender){
                $studentRegisters->where('gender', $request->gender);
            }

            if($request->college_id){
                $studentRegisters->where('college_id', $request->college_id);
            }

           
            $studentRegisters = $studentRegisters->paginate(10);

            // dd( $studentRegisters );


        return view('admin.registers.student-index', compact('studentRegisters','genders','colleges'));

    }
    public function create(){
        $colleges = College::select('id','name')->get();
        $genders = ConstantHelper::GENDER;
        return view('admin.registers.student-create', compact('genders','colleges'));

    }

    public function studentRegistration(){
        $colleges = College::select('id','name')->get();
        $genders = ConstantHelper::GENDER;
        return view('front.student_register', compact('genders','colleges'));
    }

    public function saveRegister(Request $request){

        $validator = (new Validator($request))->store();

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
   

        // dd($request->dob);

        // dd(date_format($request->dob, 'Y-m-d'));
    DB::beginTransaction();
    try {
        $student = new StudentRegister();
        $student->status = 1;
        $student->fill($request->all());
        $student->dob = date('Y-m-d', strtotime($request->dob));
        $student->save();


        $user = new User();
        $user->name = $student->name; 
        $user->seminar_registration_id = $student->id; 
        $user->role_id = 2; 
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        
        $userEmail = $request->email;

        $data = [
            'name' => $student->name,
            'email' =>  Crypt::encrypt($student->email),
            'id' =>  Crypt::encrypt($student->id),
        ];

        // verify email

        Mail::send('send-mail.verifyEmail', $data, function ($message) use ($userEmail) {
            $message->to($userEmail)->subject('Verify Email Id');
        });



        Mail::send('send-mail.send-register-mail', $data, function ($message) use ($userEmail) {
            $message->to($userEmail)->subject('Registration successfully');
        });
        DB::commit();
        return redirect()->route('student.registration')->with('success', 'You have registered Successfully !');
    } catch (\Exception $e) {
        DB::rollback();
        return redirect()->route('student.registration')->with('error', "Student Record not Created ");
    }

    }


    // front verify email

    public function verifyEmail(Request $request){
        $email = Crypt::decrypt($request->email);
        $students = User::where('email', $email)->first();
        if($students){
            $students->email_verified_at = date('Y-m-d');
            $students->save();
            return redirect()->route('LoginPageLoad')->with('success', 'Your email verified successfull |');
        }else{
            return redirect()->back()->with('error', 'Your email is not found in our records');
        }
    }


    public function save(Request $request){


        $validator = (new Validator($request))->store();
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

        try {
            $student = new StudentRegister();
            $student->status = 1;
            $student->fill($request->all());
            $student->save();

            $data = [
                'name' => $student->name,
                'email' =>  $student->email,
                'id' =>  Crypt::encrypt($student->id),
            ];


            Mail::send('send-mail.send-register-mail', $data, function ($message) use ($userEmail) {
                $message->to($userEmail)->subject('Registration successfully');
            });
           
            return redirect()->route('registers.index')->with('success', 'Student Record created');
        } catch (\Exception $e) {
            return redirect()->route('registers.index')->with('error', "Student Record not Created ");
        }

    }

    public function createCredentials(Request $request){
        $id = Crypt::decrypt($request->id);
        $data = StudentRegister::select('id','email','name')->where('id', $id)->first();
        $email = $data->email;
        $id = $data->id;
        $name = $data->name;
        return view('userCredentials',compact('email','id','name'));
    }



    public function saveCredentials(Request $request){

        $validator = (new Validator($request))->createcredent();
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        try {
        $email = $request->email;
        $password = Hash::make($request->password);
        $id = $request->id;
        $name = $request->name;

        $user = new User();
        $user->email =  $email;
        $user->role_id =  2;
        $user->password =  $password;
        $user->seminar_registration_id =  $id ;
        $user->name =  $name ;
       
        $user->save();
        if($user){

            return redirect()->route('login');
        }
    }catch (\Exception $e) {
            return redirect()->route('login')->with('error', "Course not Created $e");
        }

    }

    public function edit(StudentRegister $studentRegister){
        $colleges = College::select('id','name')->get();
        $genders=ConstantHelper::GENDER;
        return view('admin.registers.student-edit', compact('genders','studentRegister','colleges'));
    }

    public function update(Request $request, StudentRegister $studentRegister){

        try {
            $validator = (new Validator($request))->update();
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }
            
        $dataStudentRegister =  $studentRegister;
        $dataStudentRegister->status = '1';
        $dataStudentRegister->fill($request->all());
        $dataStudentRegister->save();
        if( $dataStudentRegister){
            return redirect()->route('registers.index')->with('success', 'Student Register updated Successfully');
        }
        } catch (\Exception $e) {
            return redirect()->route('registers.index')->with('error', "Student Register not updated Successfully $e");
        }

    }

    public function show(StudentRegister $studentRegister){
        $data = $studentRegister->load('getCollegeDetail');
        return view('admin.registers.student-show', compact('data'));
    }

    public function destroy(StudentRegister $studentRegister){
        $studentRegister->delete();
        return redirect()->route('registers.index')->with("success", "Student record deleted");
    }

    public function createCredentialsByAdmin($id){
        $data = StudentRegister::find($id);
        return view('admin.registers.student-credentials',compact('data'));
    }

    public function saveCredentialsByAdmin(Request $request){

        $data = User::where('email', $request->email)->first();
        if($data){
            return redirect()->back()->with('error', 'You have alreared created this user credentials');
        }
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->seminar_registration_id = $request->id;
        $user->save();

        $userEmail = $request->email;
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  $request->password,
        ];

        Mail::send('send-mail.credentials', $data, function ($message) use ($userEmail) {
            $message->to($userEmail)->subject('Registration successfully');
        });

        return redirect()->route('registers.index');
    }
}
