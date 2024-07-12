<?php

namespace App\Http\Requests;

use App\Models\CourseTopic as ModelsCourseTopic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator as ValidationValidator;

class CourseTopics
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function store(): ValidationValidator
    {
        $requestAll = $this->request->all();
        $validator = Validator::make($requestAll, [
            'course_id' => [
                'required',
                'numeric'
            ],
          
            'topics' => [
                'required',
                'string',
            ]

        ]);

        return $validator;
    }
}
