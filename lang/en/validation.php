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
    'accepted' => 'You must accept :attribute.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes, and underscores.',
    'alpha_num' => 'The :attribute may only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'attached' => 'The :attribute is already attached.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'array' => 'The :attribute must have between :min and :max items.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'numeric' => 'The :attribute must be between :min and :max.',
        'string' => 'The :attribute must be between :min and :max characters.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'current_password' => 'The :attribute is incorrect.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'The :attribute must be a valid email address.',
    'ends_with' => 'The :attribute must end with one of the following: :values',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'array' => 'The :attribute must have more than :value items.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'numeric' => 'The :attribute must be greater than :value.',
        'string' => 'The :attribute must be greater than :value characters.',
    ],
    'gte' => [
        'array' => 'The :attribute must have :value items or more.',
        'file' => 'The :attribute must be :value kilobytes or more.',
        'numeric' => 'The :attribute must be :value or more.',
        'string' => 'The :attribute must be :value characters or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'array' => 'The :attribute must have less than :value items.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'numeric' => 'The :attribute must be less than :value.',
        'string' => 'The :attribute must be less than :value characters.',
    ],
    'lte' => [
        'array' => 'The :attribute must not have more than :value items.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'numeric' => 'The :attribute must be less than or equal :value.',
        'string' => 'The :attribute must be less than or equal :value characters.',
    ],
    'max' => [
        'array' => 'The :attribute may not have more than :max items.',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'numeric' => 'The :attribute may not be greater than :max.',
        'string' => 'The :attribute may not be greater than :max characters.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'array' => 'The :attribute must have at least :min items.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'numeric' => 'The :attribute must be at least :min.',
        'string' => 'The :attribute must be at least :min characters.',
    ],
    'multiple_of' => 'The :attribute must be a multiple of :value',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => 'The password is incorrect.',
    'present' => 'The :attribute field must be present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'regex' => 'The :attribute format is invalid.',
    'relatable' => 'The :attribute cannot be associated with this resource.',
    'required' => 'The :attribute field is required.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'array' => 'The :attribute must contain :size items.',
        'file' => 'The :attribute must be :size kilobytes.',
        'numeric' => 'The :attribute must be :size.',
        'string' => 'The :attribute must be :size characters.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid timezone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute must be a valid URL.',
    'uuid' => 'The :attribute must be a valid UUID.',

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
    | with something more reader-friendly, such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'address' => 'Address',
        'age' => 'Age',
        'available' => 'Available',
        'city' => 'City',
        'content' => 'Content',
        'country' => 'Country',
        'current_password' => 'Current password',
        'date' => 'Date',
        'day' => 'Day',
        'description' => 'Description',
        'email' => 'E-mail address',
        'excerpt' => 'Excerpt',
        'first_name' => 'First name',
        'gender' => 'Sex',
        'hour' => 'Time',
        'last_name' => 'Surname',
        'minute' => 'Minute',
        'mobile' => 'Mobile number',
        'month' => 'Month',
        'name' => 'Name',
        'password' => 'Password',
        'password_confirmation' => 'Password Confirmation',
        'phone' => 'Phone',
        'second' => 'Second',
        'sex' => 'Gender',
        'size' => 'Size',
        'time' => 'Time',
        'title' => 'Title',
        'username' => 'Nickname',
        'year' => 'Year',
        'question' => 'Your question',
        'mail' => 'Mail',
        'text' => 'Your message',
        'portion_id' => 'Section',
        'category_id' => 'Category',
        'subcategory_id' => 'Subcategory',
        'type_id' => 'Ad Type',
        'countries_id' => 'Country',
        'regions_id' => 'Region',
        'cities_id' => 'City',
        'viber' => 'Viber',
        'telegram' => 'Telegram',
        'whatApp' => 'WhatsApp',
        'phone2' => 'Phone',
        'currency_id' => 'Currency',
        'link' => 'Link',
        'value' => 'Value',
        'sort' => 'Sorting',
        'file' => 'Image',
        'job' => 'Position',
        'years' => 'Year',
        'title_two' => 'Title',
        'description_two' => 'Description',
        'contacts' => 'Contacts section',
        'leftBlock' => 'Left Block',
        'rightBlock' => 'Right Block',
        'rating' => 'Rating',
        'comment' => 'Comment',
        'client' => 'Number of Satisfied Clients',
        'conversion' => 'Sales Conversion Increase (%)',

        'facebook' => 'Facebook',
        'instagram' => 'Instagram',
        'phone3' => 'Phone',
        'phone4' => 'Phone',
        'work' => 'Working days',
        'weekend' => 'Weekend days',
        'map' => 'Map',
        'category_photo_id' => 'Category for photo',
        'quote' => 'Quote',
        'old_password' => 'Old password',
    ],

];
