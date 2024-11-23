<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Mailer
    |--------------------------------------------------------------------------
    |
    | Esta opção controla o mailer padrão usado para enviar todas as mensagens
    | de e-mail, a menos que outro mailer seja explicitamente especificado ao
    | enviar a mensagem. Todos os mailers adicionais podem ser configurados
    | dentro do array "mailers". Exemplos de cada tipo de mailer são fornecidos.
    |
    */

    'default' => env('MAIL_MAILER', 'smtp'),

    /*
    |--------------------------------------------------------------------------
    | Configurações dos Mailers
    |--------------------------------------------------------------------------
    |
    | Aqui você pode configurar todos os mailers usados pela sua aplicação, além
    | de suas respectivas configurações. Vários exemplos foram configurados para
    | você e você é livre para adicionar seus próprios conforme a necessidade.
    |
    | Laravel suporta uma variedade de drivers de transporte de e-mail que podem
    | ser usados ao enviar e-mails. Você pode especificar qual deles está usando
    | para os seus mailers abaixo. Você também pode adicionar mailers adicionais
    | conforme necessário.
    |
    | Suportados: "smtp", "sendmail", "mailgun", "ses", "ses-v2",
    |             "postmark", "resend", "log", "array",
    |             "failover", "roundrobin"
    |
    */

    'mailers' => [

        'smtp' => [
            'transport' => 'smtp',
            'host' => env('MAIL_HOST', '127.0.0.1'),
            'port' => env('MAIL_PORT', 1025),
            'encryption' => env('MAIL_ENCRYPTION', null),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url(env('APP_URL', 'http://localhost'), PHP_URL_HOST)),
        ],

        'ses' => [
            'transport' => 'ses',
        ],

        'postmark' => [
            'transport' => 'postmark',
        ],

        'resend' => [
            'transport' => 'resend',
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp',
                'log',
            ],
        ],

        'roundrobin' => [
            'transport' => 'roundrobin',
            'mailers' => [
                'ses',
                'postmark',
            ],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Endereço "From" Global
    |--------------------------------------------------------------------------
    |
    | Você pode desejar que todos os e-mails enviados pela sua aplicação sejam
    | enviados do mesmo endereço. Aqui você pode especificar um nome e endereço
    | que é usado globalmente para todos os e-mails enviados pela sua aplicação.
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],

];

