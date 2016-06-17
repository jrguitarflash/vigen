<?php
/**
 * Created by PhpStorm.
 * User: Jose Fernandez
 * Date: 28/04/2016
 * Time: 12:11 PM
 */
class vigen_frecu
{
    //MOD
    public static $vigen_frecu_id;
    public static $vigen_frecu_des;

    //SET
    public function vigen_frecu_id_set($vigen_frecu_id)
    {
        self::$vigen_frecu_id=$vigen_frecu_id;
    }

    public function vigen_frecu_des_set($vigen_frecu_des)
    {
        self::$vigen_frecu_des=$vigen_frecu_des;

        return $vigen_frecu_des;
    }

    //GET

    public function vigen_frecu_id_get()
    {
        return self::$vigen_frecu_id();
    }

    public function vigen_frecu_des_get()
    {
        return self::$vigen_frecu_des();
    }

    //EXT

    public function obt_frecu()
    {
        $sql=sql::obt_frecu();

        return $sql;
    }

}

?>