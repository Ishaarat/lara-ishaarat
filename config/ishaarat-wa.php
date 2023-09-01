<?php

return [
    /*
    |--------------------------------------------------------------------------
    | ISHAARAT AUTH KEY
    |--------------------------------------------------------------------------
    |
    | Ishaarat Auth key is your Ishaarat account Authorization key.
    | You can get your Auth key by logging into your Ishaarat account https://ishaarat.com/login
    | In the left menu you will find menu item : auth key
    | You will find your auth key there.
    |
    */
    'auth_key' => env('ISHAARAT_AUTH_KEY', ''),
    /*
    |--------------------------------------------------------------------------
    | ISHAARAT APP KEY
    |--------------------------------------------------------------------------
    |
    | Ishaarat APP key defines which application you will use to send whatsapp notifications.
    | Each APP key represents single device ( single Whatsapp sender number)
    | You can get your App key by logging into your Ishaarat account https://ishaarat.com/login
    | If you haven't added any devices yet, From Devices Add new device and scan the QR code to link your whatsapp sender
    | From Apps add new App and you will get the APP key from there.
    |
    */
    'app_key' => env('ISHAARAT_APP_KEY', ''),

];
