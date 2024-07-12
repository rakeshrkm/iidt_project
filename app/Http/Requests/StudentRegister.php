<?php

namespace App\Http\Requests;

use App\Models\StudentRegister as ModelsStudentRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Rules\ReCaptcha;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use Illuminate\Validation\Validator as ValidationValidator;

class StudentRegister
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function store(): ValidationValidator
    {
        $requestAll = $this->request->all();

        // dd($requestAll);


        $validator = Validator::make($requestAll, [
            // 'college_id' => [
            //     'required'
            // ],
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'gender' => [
                'required',
                'string'
            ],
            'email' => [
                'required',
                'string',
                'max:255',
                'email',
                'unique:seminar_registrations,email'
            ],
            'mobile' => [
                'required',
                'numeric',
                'digits:10',
                'unique:seminar_registrations,mobile'
            ],
            // 'current_course' => [
            //     'required',
            //     'string',
            //     'max:255'
            // ],
            // 'course_name' => [
            //     'required',
            //     'string',
            //     'max:255'
            // ],
            // 'remarks' => [
            //     'required',
            //     'string',
            //     'max:255'
            // ],
            'dob' => [
                'required',
                'before:today'
            ],
            'password' => [
                'required',
                'min:6',
                'required_with:password_confirmation',
                'same:password_confirmation'

            ],
            
            'password_confirmation' => [
                'required',
                'min:6',
            ],
            'g-recaptcha-response' => ['required', new ReCaptcha]

        ]);

        return $validator;
    }

    public function update(): ValidationValidator
    {
        $student = ModelsStudentRegister::find($this->request->studentRegister->id);
    
        $validator = Validator::make($this->request->all(), [
            // 'college_id' => [
            //     'required',
            // ],
            'name' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'email',
                'string',
                'max:255',
                Rule::unique('seminar_registrations', 'email')
                    ->ignore($student->id, 'id')
                    ->whereNull('deleted_at')
            ],
            'mobile' => [
                'required',
                'string',
                'digits:10',
                Rule::unique('seminar_registrations', 'mobile')
                    ->ignore($student->id, 'id')
                    ->whereNull('deleted_at')
            ],
           
            'dob' => [
                'required',
                'before:today'
            ],
            'gender' => [
                'required'
            ],
            'password' => [
                'required'
            ],
            
            'confirm_password' => [
                'required'
            ],
            

            // 'current_course' => [
            //     'required',
            //     'max:255'
            // ],
            // 'course_name' => [
            //     'required',
            //     'max:255'
            // ],
            // 'remarks' => [
            //     'required',
            //     'max:255'
            // ]
        ]);
    
        return $validator;
    }

    public function createcredent(): ValidationValidator
    {     
        $validator = Validator::make($this->request->all(), [
    
        'email' => [
            'required',
            'max:255',
            'email'
        ],
        'password' => [
            'required',
            'min:6',
            'max:8',
            'confirmed'
        ],
        'password_confirmation' => [
            'required',
            'min:6',
            'max:8'
        ]
          
        ]);
        return $validator;
    }
    
}
