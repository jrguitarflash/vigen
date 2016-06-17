<?php

class vigen_hist
{
    public static $vigen_hist_id;
    public static $vigen_id;
    public static $vigen_hist_envi;
    public static $vigen_hist_fechEnv;
    public static $vigen_hist_msg;

    //SET
    public function vigen_hist_id_set($vigen_hist_id)
    {
        self::$vigen_hist_id=$vigen_hist_id;
    }

    public function vigen_id_set($vigen_id)
    {
        self::$vigen_id=$vigen_id;
    }

    public function vigen_hist_envi_set($vigen_hist_envi)
    {
        self::$vigen_hist_envi=$vigen_hist_envi;
    }

    public function vigen_hist_fechEnv_set($vigen_hist_fechEnv)
    {
        self::$vigen_hist_fechEnv=$vigen_hist_fechEnv;
    }

    public function vigen_hist_msg_set($vigen_hist_msg)
    {
        self::$vigen_hist_msg=$vigen_hist_msg;
    }

    //GET

    public function vigen_hist_id_get()
    {
        return self::$vigen_hist_id;
    }

    public function vigen_id_get()
    {
        return self::$vigen_id;
    }

    public function vigen_hist_envi_get()
    {
        return self::$vigen_hist_envi;
    }

    public function vigen_hist_fechEnv_get()
    {
        return self::$vigen_hist_fechEnv;
    }

    public function vigen_hist_msg_get()
    {
        return self::$vigen_hist_msg;
    }

    //EXT

    public function insert_hist()
    {

        $vigen_id=self::vigen_id_get();
        $hist_envi=self::vigen_hist_envi_get();
        $hist_fech=self::vigen_hist_fechEnv_get();
        $hist_msg=self::vigen_hist_msg_get();

        $sql=sql::insert_hist($vigen_id,
                                $hist_envi,
                                $hist_fech,
                                $hist_msg);

        return $sql;
    }
}

?>