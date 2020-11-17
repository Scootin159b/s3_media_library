<?php namespace photos;

require __DIR__ . '/composer/vendor/autoload.php';

class Loader
{
    private const LOAD_LEVEL_0 = 0;
    private const LOAD_LEVEL_1 = 1;
    private const LOAD_LEVEL_2 = 2;
    private const LOAD_LEVEL_3 = 3;

    public const LOAD_LEVEL_DATABASE = Loader::LOAD_LEVEL_2;
    public const LOAD_LEVEL_SESSION = Loader::LOAD_LEVEL_2;    

    private static $current_level = 0;

    public static function LoadLevel(int $desired_level)
    {
        if($desired_level > Loader::$current_level)
        {
            for($i = Loader::$current_level; $i <= $desired_level; $i++)
            {
                Loader::InitLevel($i);
                Loader::$current_level = $i;
            }
        }
    }

    private static function InitLevel(int $level_to_load)
    {
        switch($level_to_load)
        {
            case Loader::LOAD_LEVEL_0:
            break;
            case Loader::LOAD_LEVEL_1:

            break;
            case Loader::LOAD_LEVEL_2:
                require_once(__DIR__ . '/database.inc.php');
                require_once(__DIR__ . '/session.inc.php');
            break;
            case Loader::LOAD_LEVEL_3:
                
            break;
        }
    }
}