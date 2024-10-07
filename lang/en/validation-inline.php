<?php

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

return [
    'accepted' => 'Must be accepted.',
    'accepted_if' => 'This field must be accepted when :other is :value.',
    'active_url' => 'Invalid URL.',
    'after' => 'Date must be after :date.',
    'after_or_equal' => 'Date must be after or equal to :date.',
    'alpha' => 'Only letters are allowed here.',
    'alpha_dash' => 'Only letters, numbers, dashes, and underscores are allowed here.',
    'alpha_num' => 'Only letters and numbers are allowed here.',
    'array' => 'Must be an array.',
    'attached' => 'Already attached.',
    'before' => 'Date must be before :date.',
    'before_or_equal' => 'Date must be before or equal to :date.',
    'between' => [
        'array' => 'The number of elements must be between :min and :max.',
        'file' => 'File size must be between :min and :max kilobytes.',
        'numeric' => 'Value must be between :min and :max.',
        'string' => 'The number of characters must be between :min and :max.',
    ],

    'boolean' => 'The field must have a boolean value.',
    'confirmed' => 'Does not match the confirmation.',
    'current_password' => 'Incorrect password.',
    'date' => 'Is not a valid date.',
    'date_equals' => 'The date must be equal to :date.',
    'date_format' => 'Does not match the format :format.',
    'different' => 'The value must be different from :other',
    'digits' => 'The length must be :digits.',
    'digits_between' => 'The length must be between :min and :max.',
    'dimensions' => 'The image has invalid dimensions.',
    'distinct' => 'The field contains a duplicate value.',
    'email' => 'The email address must be valid.',
    'ends_with' => 'Must end with one of the following values: :values',
    'exists' => 'The selected value is invalid.',
    'file' => 'Must be a file.',
    'filled' => 'Is required.',
    'gt' => [
        'array' => 'The number of items must be greater than :value.',
        'file' => 'The file size must be greater than :value kilobytes.',
        'numeric' => 'The value must be greater than :value.',
        'string' => 'The length must be greater than :value characters.',
    ],
    'gte' => [
        'array' => 'The number of items must be :value or greater.',
        'file' => 'The file size must be :value kilobytes or greater.',
        'numeric' => 'The value must be :value or greater.',
        'string' => 'The length must be :value or greater.',
    ],

    'image' => 'This field must be an image.',
    'in' => 'The selected value is invalid.',
    'in_array' => 'The value does not exist in :other.',
    'integer' => 'Must be an integer.',
    'ip' => 'Must be a valid IP address.',
    'ipv4' => 'Must be a valid IPv4 address.',
    'ipv6' => 'Must be a valid IPv6 address.',
    'json' => 'Must be a valid JSON string.',
    'lt' => [
        'array' => 'The number of items must be less than :value.',
        'file' => 'The file size must be less than :value kilobytes.',
        'numeric' => 'The value must be less than :value.',
        'string' => 'The length must be less than :value characters.',
    ],
    'lte' => [
        'array' => 'The number of items must be :value or less.',
        'file' => 'The file size must be :value kilobytes or less.',
        'numeric' => 'The value must be :value or less.',
        'string' => 'The length must be :value or less.',
    ],
    'max' => [
        'array' => 'The number of items may not be greater than :max.',
        'file' => 'The file size may not be greater than :max kilobytes.',
        'numeric' => 'The value may not be greater than :max.',
        'string' => 'The length may not be greater than :max characters.',
    ],
    'mimes' => 'The file must be of type: :values.',
    'mimetypes' => 'The file must be of type: :values.',
    'min' => [
        'array' => 'The number of items must be at least :min.',
        'file' => 'The file size must be at least :min kilobytes.',
        'numeric' => 'The value must be at least :min.',
        'string' => 'The length must be at least :min characters.',
    ],
    'multiple_of' => 'The value must be a multiple of :value',
    'not_in' => 'The selected value is invalid.',
    'not_regex' => 'The format is invalid.',
    'numeric' => 'Must be a number.',
    'password' => 'Incorrect password.',
    'present' => 'The field must be present.',
    'prohibited' => 'This value is prohibited.',
    'prohibited_if' => 'This value is prohibited when :other is :value.',
    'prohibited_unless' => 'This value is prohibited unless :other is in :values.',
    'regex' => 'The format is invalid.',
    'relatable' => 'The object cannot be related to this resource.',
    'required' => 'The field is required.',
    'required_if' => 'The field is required when :other is :value.',
    'required_unless' => 'The field is required unless :other is in :values.',
    'required_with' => 'The field is required when :values is present.',
    'required_with_all' => 'The field is required when :values are present.',
    'required_without' => 'The field is required when :values is not present.',
    'required_without_all' => 'The field is required when none of :values are present.',
    'same' => 'The value must be the same as :other.',

    'size' => [
        'array' => 'The number of items must be equal to :size.',
        'file' => 'The file size must be :size kilobytes.',
        'numeric' => 'The value must be equal to :size.',
        'string' => 'The length must be equal to :size characters.',
    ],
    'starts_with' => 'The value must start with one of the following values: :values',
    'string' => 'This field must be a string.',
    'timezone' => 'Must be a valid timezone.',
    'unique' => 'This value already exists.',
    'uploaded' => 'Upload failed.',
    'url' => 'Invalid URL format.',
    'uuid' => 'Must be a valid UUID.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    'attributes' => [],

];
