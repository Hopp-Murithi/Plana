<?php
/**
 * @package Plana
 */

 namespace Inc;

final class Init{
    /**
     * Store all the classes inside an array
     * @return array Full list of classes
     */
    public static function get_services(){
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Pages\CreateEvents::class,
            Base\SettingsLinks::class
            
        ];
    }
    /**
     * Loop through all the classes, initialize them and call the register() method if exists
     *
     * @return void
     */
    public static function register_sevices(){
        foreach(self::get_services() as $class ){
            $service = self::instantiate($class);
            if ( method_exists($service, 'register') ){
                $service -> register();
            }
        }
    }

    /**
     * Initializes the class
     * @param [class] $class from the services array
     *
     */
    private static function instantiate($class){
        $service = new $class();

        return $service;
    }
}

