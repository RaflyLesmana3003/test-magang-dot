
<?php

return [
      'storages' => [
        'database' => [
            'client' => env('SQL_CLIENT'),
            'connection' => [
              'host' => env('SQL_HOST'),
              'port' => env('SQL_PORT'),
              'user' => env('SQL_USERNAME'),
              'password' => env('SQL_PASSWORD'),
              'database' => env('SQL_DATABASE'),
              ],
            ],
          ],
        ];