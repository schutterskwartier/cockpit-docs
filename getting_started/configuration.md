### Configuration


The great thing about Cockpit is that it works out of the box without any extra step of configuration. But you you can fine tune some settings if you need to.

All you have to do is to create a **config.php** in the custom folder: <code>cockpit/custom/config.php</code>

```
<?php

return [
    /*

    // cockpit session name
    'session.name' => 'mysession',

    // salt for password hashing etc.
    'sec-key'      => 'c3b40c4c-db44-s5h7-a814-b4931a15e5e1',

    // default system language
    'i18n'         => 'en',

    // use mongodb as main data storage
    "database"    => [
        "server"  => "mongodb://localhost:27017",
        "options" => ["db" => "cockpitdb"]
    ],

    // mailer smtp settings
    "mailer"            => [
        "from"      => "info@mydomain.tld",
        "transport" => "smtp",
        "host"      => "",
        "user"      => "",
        "password"  => "xxxxxx",
        "port"      => 25,
        "auth"      => true,
        "encryption"=> ""    # '', 'ssl' or 'tls'
    ]
    */
];
```
