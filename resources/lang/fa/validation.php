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
    'alpha' => ':attribute باید حروف باشد.',
    'date' => ':attribute ورودی را تاریخ وارد کنید.',
    'email' => ':attribute نامعتبر است.',
    'image' => 'فرمت :attribute ورودی پشتیبانی نمی شود.',
    'match' => ':attribute اشتباه است.',
    'max' => [
        'string' => ':attribute  باید حداکثر :max حرف باشد.',
    ],
    'min' => [
        'string' => ':attribute  باید حداقل :min حرف باشد.',
    ],
    'numeric' => ':attribute باید عدد باشد.',
    'required' => ':attribute را وارد کنید.',
    'same' => ':attribute همخوانی ندارد.',
    
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
        'password_confirm' => 'تایید رمز',
        'value' => 'مقدار',
        'frist_name' => 'نام',
        'last_name' => 'نام خانوادگی',
        'phone_number' => 'شماره تلفن',
        'email' => 'ایمیل آدرس',
        'price' => 'قیمت',
        'image' => 'تصویر',

    ],

];