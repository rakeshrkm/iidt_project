<?php

namespace App\Http\Requests;

use App\Models\Offer as ModelsOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator as ValidationValidator;

class Offer
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
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:offers,name'
            ],
            'course_id' => [
                'required',
                'numeric',
            ],
            'offer_percentage' => [
                'required',
                'numeric',
            ],
            'from_date' => [
                'required',
                'after_or_equal:today',
              
            ],
            'to_date' => [
                'required_with:start_date',
                'after_or_equal:start_date'
            ]


        ]);

        return $validator;
    }

    public function update(): ValidationValidator
    {
        $offer = ModelsOffer::find($this->request->offer->id);
        $validator = Validator::make($this->request->all(), [
             'name' => [
                'required',
                'string',
                Rule::unique('offers', 'name')
                    ->ignore($offer->id, 'id')
                    ->whereNull('deleted_at')
            ],
            'course_id' => [
                'required',
                'numeric',
                // Rule::unique('offers', 'course_id')
                //     ->ignore($offer->id, 'id')
                //     ->whereNull('deleted_at')
            ],
            'college_id' => [
                'required',
                'numeric'
            ],
           
            'offer_percentage' => [
                'required',
            ],
            'from_date' => [
                'required',
                'after_or_equal:today',
              
            ],
            'to_date' => [
                'required_with:start_date',
                'after_or_equal:start_date'
            ],
            'coupon_code' => [
                'required_with:start_date',
                'after_or_equal:start_date'
            ]
            ]);
        return $validator;
    }
}
