<?php

class vigen_rep
{
    public static $vigen_rep_id;
    public static $vigen_alert_id;
    public static $vigen_rep_nom;
    public static $vigen_rep_fech;
    public static $vigen_rep_msg;
    public static $vigen_rep_env;

    //SET
    public function vigen_rep_id_set($vigen_rep_id)
    {
        self::$vigen_rep_id=$vigen_rep_id;
    }

    public function vigen_alert_id_set($vigen_alert_id)
    {
        self::$vigen_alert_id=$vigen_alert_id;
    }

    public function vigen_rep_nom_set($vigen_rep_nom)
    {
        self::$vigen_rep_nom=$vigen_rep_nom;
    }

    public function vigen_rep_fech_set($vigen_rep_fech)
    {
        self::$vigen_rep_fech=$vigen_rep_fech;
    }

    public function vigen_rep_msg_set($vigen_rep_msg)
    {
        self::$vigen_rep_msg=$vigen_rep_msg;
    }

    public function vigen_rep_env_set($vigen_rep_env)
    {
        self::$vigen_rep_env=$vigen_rep_env;
    }


    //GET

    public function vigen_rep_id_get()
    {
        return self::$vigen_rep_id;
    }

    public function vigen_alert_id_get()
    {
        return self::$vigen_alert_id;
    }

    public function vigen_rep_nom_get()
    {
        return self::$vigen_rep_nom;
    }

    public function vigen_rep_fech_get()
    {
        return self::$vigen_rep_fech;
    }

    public function vigen_rep_msg_get()
    {
        return self::$vigen_rep_msg;
    }

    public function vigen_rep_env_get()
    {
        return self::$vigen_rep_env;
    }

    //EXT

    public function insert_rep()
    {

        $alert_id=self::vigen_alert_id_get();
        $rep_nom=self::vigen_rep_nom_get();
        $rep_fech=self::vigen_rep_fech_get();
        $rep_msg=self::vigen_rep_msg_get();
        $rep_env=self::vigen_rep_env_get();

        $sql=sql::insert_rep($alert_id,
                                $rep_nom,
                                $rep_fech,
                                $rep_msg,
                                $rep_env);

        return $sql;
    }
}

?>