<?php

return [
    'name' => 'Install',
    'configuration' => [
        'version' => [
            'PHP >= 8.0' => '8.0',
        ],
        'extensions' => [
        	'Bcmath',
        	'Ctype',
        	'fileinfo',
        	'JSON',
        	'Mbstring',
            'Openssl',
            'Pdo',
            'Tokenizer',
            'Xml',
        ]
    ],
    'writables' => [
        'storage',
        'bootstrap/cache',
    ],
    'migration' => '.migration',
    
    'app' => [
        'APP_NAME'      => 'Chatloop',
        'APP_ENV'       => '',
        'APP_DEBUG'     => 'true',
        'APP_URL'       => 'http://127.0.0.1:8000',
    ],

    'installation' => 'installation.json'
];
