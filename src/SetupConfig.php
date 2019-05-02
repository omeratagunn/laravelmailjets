<?php


namespace tyraelll\laravelmailjet;


use Illuminate\Support\Facades\Config;

trait SetupConfig
{

    /**
     * @return array
     */
    public static function checkConfig() : array{

        if(!file_exists(config_path('laravelmailjet.php'))) {

            return ['Message' => 'Please publish config file by using "php artisan vendor:publish"', 'Status' => false];

        }

        if(empty(Config::get('laravelmailjet')['MAILJETKEY'])){

            return ['Message' => 'Please provide mailjetkey in your config file', 'Status' => false];

        }

        if(empty(Config::get('laravelmailjet')['MAILJET_SECRET'])){

            return ['Message' => 'Please provide mailjet secretkey in your config file', 'Status' => false];

        }

        if(empty(Config::get('laravelmailjet')['ADMIN_MAIL'])){

            return ['Message' => 'Please provide admin mail in your config file. This is about sender mail', 'Status' => false];

        }

        if(empty(Config::get('laravelmailjet')['APP_NAME'])){

            return ['Message' => 'You dont have app_name ? :O', 'Status' => false];

        }


    }

}