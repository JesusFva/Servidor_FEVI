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

    'accepted' => 'El :attribute debe ser aceptado.',
    'accepted_if' => 'El :attribute debe ser aceptado cuando :other es :value.',
    'active_url' => 'El :attribute no es una URL válida.',
    'after' => 'El :attribute debe ser una fecha posterior :date.',
    'after_or_equal' => 'El :attribute debe ser una fecha posterior o igual a :date.',
    'alpha' => 'El :attribute sólo debe contener letras.',
    'alpha_dash' => 'El :attribute sólo debe contener letras, números, guiones y guiones bajos.',
    'alpha_num' => 'El :attribute sólo debe contener letras y números.',
    'array' => 'El :attribute debe ser una matriz.',
    'before' => 'El :attribute debe ser una fecha anterior a :date.',
    'before_or_equal' => 'El :attribute debe ser una fecha anterior o igual a :date.',
    'between' => [
        'array' => 'El :attribute debe tener entre :min y :max elementos.',
        'file' => 'El :attribute debe tener entre :min and :max kilobytes.',
        'numeric' => 'El :attribute debe tener entre :min y :max.',
        'string' => 'El :attribute debe tener entre :min y :max carácteres.',
    ],
    'boolean' => 'El :attribute el campo debe ser verdadero o falso.',
    'confirmed' => 'El :attribute la confirmación no coincide.',
    'current_password' => 'La contraseña es incorrecta.',
    'date' => 'El :attribute no es una fecha válida.',
    'date_equals' => 'El :attribute debe ser una fecha igual a :date.',
    'date_format' => 'El :attribute no coincide con el formato :format.',
    'declined' => 'El :attribute debe ser rechazado.',
    'declined_if' => 'El :attribute debe rechazarse cuando :other es :value.',
    'different' => 'El :attribute y :other deben ser diferentes.',
    'digits' => 'El :attribute deben tener :digits dígitos.',
    'digits_between' => 'El :attribute debe tener entre :min y :max dígitos.',
    'dimensions' => 'El :attribute tiene dimensiones de imagen no válidas.',
    'distinct' => 'El :attribute tiene un valor duplicado.',
    'doesnt_end_with' => 'El :attribute no puede terminar con uno de los siguientes: :values.',
    'doesnt_start_with' => 'El :attribute no puede comenzar con uno de los siguientes: :values.',
    'email' => 'El :attribute debe ser una dirección de correo electrónico válida.',
    'ends_with' => 'El :attribute debe terminar con uno de los siguientes: :values.',
    'enum' => 'La selección :attribute no es válida.',
    'exists' => 'La selección :attribute no es válida.',
    'file' => 'El :attribute debe ser un archivo.',
    'filled' => 'El :attribute debe tener un valor.',
    'gt' => [
        'array' => 'El :attribute debe tener más de :value elementos.',
        'file' => 'El :attribute debe ser mayor que :value kilobytes.',
        'numeric' => 'El :attribute debe ser mayor que :value.',
        'string' => 'El :attribute debe ser mayor que :value carácteres.',
    ],
    'gte' => [
        'array' => 'El :attribute debe tener :value elementos o más.',
        'file' => 'El :attribute debe ser mayor o igual que :value kilobytes.',
        'numeric' => 'El :attribute debe ser mayor o igual que :value.',
        'string' => 'El :attribute debe ser mayor o igual que :value carácteres.',
    ],
    'image' => 'El :attribute debe ser una imagen.',
    'in' => 'La selección :attribute no es válida.',
    'in_array' => 'El :attribute campo no existe en :other.',
    'integer' => 'El :attribute debe ser un entero.',
    'ip' => 'El :attribute debe ser una dirección IP válida.',
    'ipv4' => 'El :attribute debe ser una dirección IPv4 válida',
    'ipv6' => 'El :attribute debe ser una dirección IPv6 válida.',
    'json' => 'El :attribute debe ser una cadena JSON válida.',
    'lowercase' => 'El :attribute debe estar en minúsculas.',
    'lt' => [
        'array' => 'El :attribute debe tener menos de :value elementos.',
        'file' => 'El :attribute debe tener menos de :value kilobytes.',
        'numeric' => 'El :attribute debe tener menos de :value.',
        'string' => 'El :attribute debe tener menos de :value carácteres.',
    ],
    'lte' => [
        'array' => 'El :attribute no debe tener más de :value elementos.',
        'file' => 'El :attribute debe tener menos o igual que :value kilobytes.',
        'numeric' => 'El :attribute debe tener menos o igual que :value.',
        'string' => 'El :attribute debe tener menos o igual que :value carácteres.',
    ],
    'mac_address' => 'El :attribute debe ser una dirección MAC válida.',
    'max' => [
        'array' => 'El :attribute no debe tener más de :max elementos.',
        'file' => 'El :attribute no debe ser mayor que :max kilobytes.',
        'numeric' => 'El :attribute no debe ser mayor que :max.',
        'string' => 'El :attribute no debe ser mayor que :max carácteres.',
    ],
    'max_digits' => 'El :attribute no debe tener más de :max dígitos.',
    'mimes' => 'El :attribute debe ser un archivo de tipo: :values.',
    'mimetypes' => 'El :attribute debe ser un archivo de tipo: :values.',
    'min' => [
        'array' => 'El :attribute debe tener al menos :min elementos.',
        'file' => 'El :attribute al menos debe ser :min kilobytes.',
        'numeric' => 'El :attribute al menos debe ser :min.',
        'string' => 'El :attribute al menos debe ser :min carácteres.',
    ],
    'min_digits' => 'El :attribute debe tener al menos :min dígitos.',
    'multiple_of' => 'El :attribute debe ser múltiplo de :value.',
    'not_in' => 'La selección :attribute no es válida.',
    'not_regex' => 'El :attribute formato no válido.',
    'numeric' => 'El :attribute debe ser un número.',
    'password' => [
        'letters' => 'El :attribute debe contener al menos una letra.',
        'mixed' => 'El :attribute debe contener al menos una letra mayúscula y una minúscula.',
        'numbers' => 'El :attribute debe contener al menos un número.',
        'symbols' => 'El :attribute debe contener al menos un símbolo.',
        'uncompromised' => 'El :attribute ha aparecido en una fuga de datos. Por favor, elija uno diferente :attribute.',
    ],
    'present' => 'El :attribute debe estar presente.',
    'prohibited' => 'El :attribute está prohibido.',
    'prohibited_if' => 'El :attribute está prohibido cuando :other es :value.',
    'prohibited_unless' => 'El :attribute está prohibido a menos que :other está en :values.',
    'prohibits' => 'El :attribute prohíbe :other de estar presente.',
    'regex' => 'El :attribute formato no válido.',
    'required' => 'El :attribute es requerido.',
    'required_array_keys' => 'El :attribute debe contener entradas para: :values.',
    'required_if' => 'El :attribute es requerido cuando :other es :value.',
    'required_if_accepted' => 'El :attribute es requerido cuando :other es aceptado.',
    'required_unless' => 'El :attribute es requerido a menos que :other está en :values.',
    'required_with' => 'El :attribute es requerido cuando :values están presentes.',
    'required_with_all' => 'El :attribute es requerido cuando :values están presentes.',
    'required_without' => 'El :attribute es requerido cuando :values no está presente.',
    'required_without_all' => 'El :attribute es requerido cuando ninguno de :values están presentes.',
    'same' => 'El :attribute y :other debe coincidir.',
    'size' => [
        'array' => 'El :attribute debe contener :size elementos.',
        'file' => 'El :attribute debe ser :size kilobytes.',
        'numeric' => 'El :attribute debe ser :size.',
        'string' => 'El :attribute debe ser :size carácteres.',
    ],
    'starts_with' => 'El :attribute debe comenzar con uno de los siguientes: :values.',
    'string' => 'El :attribute debe ser texto.',
    'timezone' => 'El :attribute debe ser una zona horaria válida.',
    'unique' => 'El :attribute ya se ha tomado.',
    'uploaded' => 'El :attribute no se pudo cargar.',
    'uppercase' => 'El :attribute debe ser en mayúsculas.',
    'url' => 'El :attribute debe ser una URL válida.',
    'uuid' => 'El :attribute debe ser una UUID válida.',

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

    'attributes' => [],

];
