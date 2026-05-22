<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Locale
    |--------------------------------------------------------------------------
    |
    | This option controls the default locale used by SedkiyFaker when
    | generating fake data. You may set this to any of the supported locales.
    | If not set, it will fall back to config('app.faker_locale') then 'en_US'.
    |
    | Supported locales:
    | ar_MA, ar_DZ, ar_TN, ar_EG, ar_LY, ar_SA, ar_LB, ar_JO,
    | fr_FR, de_DE, es_ES, it_IT, pt_PT, en_GB, nl_NL, nl_BE,
    | pl_PL, ro_RO, en_US
    |
    */

    'default_locale' => env('SEDKIY_FAKER_LOCALE', null),
];
