<?php

namespace App\Http\Requests;

use App\Models\LearningPoints as ModelsLearningPoints;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator as ValidationValidator;

class LearningPoints
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
          
            'learning_point' => [
                'required',
                'string',
            ]

        ]);

        return $validator;
    }
}
