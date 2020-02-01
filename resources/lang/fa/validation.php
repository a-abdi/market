<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
    'date' => ':attribute ورودی را تاریخ وارد کنید.',
    'match' => ':attribute اشتباه است.',
    'max' => [
        'string' => ':attribute  باید حداکثر :max حرف باشد.',
    ],
    'min' => [
        'string' => ':attribute  باید حداقل :min حرف باشد.',
    ],
  
    'required' => ':attribute را وارد کنید.',

    'same' => ':attribute اشتباه است.',

    'numeric' => ':attribute باید عدد باشد.',

    'Alpha' => ':attribute باید حروف باشد.',
    
     
    

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => 'نام کاربری',
        'password' => 'رمز',
        'value' => 'مقدار',
    ],

];