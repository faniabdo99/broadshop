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

    'accepted' => 'The :attribute moet worden geaccepteerd.',
    'active_url' => 'The :attribute heeft geen geldige URL.',
    'after' => 'The :attribute moet een datum zijn na :date.',
    'after_or_equal' => 'The :attribute moet een datum zijn na of gelijk aan :date.',
    'alpha' => 'The :attribute mag alleen letters bevatten.',
    'alpha_dash' => 'The :attribute mag alleen letters, cijfers, streepjes en underscores bevatten.',
    'alpha_num' => 'The :attribute mag alleen letters en cijfers bevatten.',
    'array' => 'The :attribute moet een reeks zijn.',
    'before' => 'The :attribute moet een datum eerder zijn dan :date.',
    'before_or_equal' => 'The :attribute moet een datum zijn voor of gelijk aan :date.',
    'between' => [
        'numeric' => 'The :attribute moet tussen :min en :max zijn.',
        'file' => 'The :attribute moet tussen :min en :max kilobytes liggen.',
        'string' => 'The :attribute moet tussen :min en :max tekens hebben.',
        'array' => 'The :attribute moet tussen :min en :max items hebben.',
    ],
    'boolean' => 'The :attribute veld moet waar of onwaar zijn.',
    'confirmed' => 'The :attribute bevestiging komt niet overeen.',
    'date' => 'The :attribute is geen geldige datum.',
    'date_equals' => 'The :attribute moet een datum zijn die gelijk is aan :date.',
    'date_format' => 'The :attribute komt niet overeen met het format :format.',
    'different' => 'The :attribute en :other moeten anders zijn.',
    'digits' => 'The :attribute moeten :digits cijfers zijn.',
    'digits_between' => 'The :attribute moet tussen :min en :max cijfers liggen.',
    'dimensions' => 'The :attribute heeft ongeldige afbeeldingsafmetingen.',
    'distinct' => 'The :attribute veld heeft een dubbele waarde.',
    'email' => 'The :attribute moet een geldig e-mailadres zijn.',
    'ends_with' => 'The :attribute moet eindigen met een van de volgende: :values. ',
    'exists' => 'De geselecteerde :attribute is ongeldig.',
    'file' => 'The :attribute moet een bestand zijn.',
    'filled' => 'The :attribute veld moet een waarde hebben.',
    'gt' => [
        'numeric' => 'The :attribute moet groter zijn dan :value.',
        'file' => 'The :attribute moet groter zijn dan :value kilobytes.',
        'string' => 'The :attribute moet groter zijn dan :value characters.',
        'array' => 'The :attribute moet meer hebben dan :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute moet groter zijn dan of gelijk zijn aan :value.',
        'file' => 'The :attribute moet groter zijn dan of gelijk zijn aan :value kilobytes.',
        'string' => 'The :attribute moet groter zijn dan of gelijk zijn aan :value characters.',
        'array' => 'The :attribute moet :value items hebben of meer.',
    ],
    'image' => 'The :attribute moet een afbeelding zijn.',
    'in' => 'De geselecteerde :attribute is ongeldig.',
    'in_array' => 'The :attribute veld bestaat niet in :other.',
    'integer' => 'The :attribute moet een heel getal zijn.',
    'ip' => 'The :attribute moet een geldig IP-adres zijn.',
    'ipv4' => 'The :attribute moet een geldig IPv4-adres zijn.',
    'ipv6' => 'The :attribute moet een geldig IPv6-adres zijn.',
    'json' => 'The :attribute moet een geldige JSON-string zijn.',
    'lt' => [
        'numeric' => 'The :attribute moet kleiner zijn dan :value.',
        'file' => 'The :attribute moet minder zijn dan :value kilobytes.',
        'string' => 'The :attribute moet minder zijn dan :value tekens.',
        'array' => 'The :attribute moet minder dan :value items hebben.',
    ],
    'lte' => [
        'numeric' => 'The :attribute moet minder zijn dan :value.',
        'file' => 'The :attribute moet minder dan :value kilobytes hebben.',
        'string' => 'The :attribute moet minder dan :value tekens hebben.',
        'array' => 'The :attribute moet minder dan :value items hebben.',
    ],
    'max' => [
        'numeric' => 'The :attribute mag niet groter zijn dan :max.',
        'file' => 'The :attribute mag niet groter zijn dan :max kilobytes.',
        'string' => 'The :attribute mag niet groter zijn dan :max tekens.',
        'array' => 'The :attribute mag niet meer hebben dan :max items.',
    ],
    'mimes' => 'The :attribute moet een bestand zijn van type: :values.',
    'mimetypes' => 'The :attribute moet een bestand zijn van type: :values.',
    'min' => [
        'numeric' => 'The :attribute moet minstens :min zijn.',
        'file' => 'The :attribute moet minstens :min kilobytes zijn.',
        'string' => 'The :attribute moet minstens :min tekens zijn.',
        'array' => 'The :attribute moet op zijn minst :min items hebben.',
    ],
    'multiple_of' => 'The :attribute moet een veelvoud zijn van :value.',
    'not_in' => 'De geselecteerde :attribute is ongeldig.',
    'not_regex' => 'The :attribute format is ongeldig.',
    'numeric' => 'The :attribute moet een nummer zijn.',
    'password' => 'Het wachtwoord is onjuist.',
    'present' => 'The :attribute veld moet aanwezig zijn.',
    'regex' => 'The :attribute format is ongeldig.',
    'required' => 'The :attribute veld is verplicht.',
    'required_if' => 'The :attribute veld is verplicht wanneer :other is :value.',
    'required_unless' => 'The :attribute veld is verplicht tenzij :other is in :values.',
    'required_with' => 'The :attribute veld is verplicht wanneer :values aanwezig is.',
    'required_with_all' => 'The :attribute veld is verplicht wanneer :values aanwezig zijn.',
    'required_without' => 'The :attribute veld is verplicht wanneer :values niet aanwezig is.',
    'required_without_all' => 'The :attribute veld is verplicht wanneer :values niet aanwezig zijn.',
    'prohibited' => 'The :attribute veld is verboden.',
    'prohibited_if' => 'The :attribute veld is verboden wanneer :other is :value.',
    'prohibited_unless' => 'The :attribute veld is verboden tenzij :other in :values staat.',
    'same' => 'The :attribute en :other moeten overeenkomen.',
    'size' => [
        'numeric' => 'The :attribute moet :size zijn.',
        'file' => 'The :attribute moet :size kilobytes zijn.',
        'string' => 'The :attribute moet :size tekens zijn.',
        'array' => 'The :attribute moet :size items bevatten.',
    ],
    'starts_with' => 'The :attribute moet beginnen met een van de volgende :values.',
    'string' => 'The :attribute moet een string zijn.',
    'timezone' => 'The :attribute moet een geldige zone zijn.',
    'unique' => 'The :attribute is reeds genomen.',
    'uploaded' => 'The :attribute niet geüpload.',
    'url' => 'The :attribute format is ongeldig.',
    'uuid' => 'The :attribute moet een geldige UUID zijn.',

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
            'rule-name' => 'aangepast bericht',
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

    'attributes' => [attributen],

];