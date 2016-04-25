<?php

class vigen
{

    public static $vigen_id;
    public static $tip_prod_id;
    public static $vigen_cc;
    public static $vigen_proy;
    public static $vigen_des;
    public static $vigen_seri;
    public static $vigen_mar;
    public static $vigen_cli;
    public static $vigen_fac;
    public static $vigen_fechIni;
    public static $vigen_fechVigen;


    //SET

    public function vigen_id_set($vigen_id)
    {
        self::$vigen_id=$vigen_id;
    }

    public function vigen_cc_set($vigen_cc)
    {
        self::$vigen_cc=$vigen_cc;
    }

    public function vigen_proy_set($vigen_proy)
    {
        self::$vigen_proy=$vigen_proy;
    }

    public function tip_prod_id_set($tip_prod_id)
    {
        self::$tip_prod_id=$tip_prod_id;
    }

    public function vigen_des_set($vigen_des)
    {
        self::$vigen_des=$vigen_des;
    }

    public function vigen_seri_set($vigen_seri)
    {
        self::$vigen_seri=$vigen_seri;
    }

    public function vigen_mar_set($vigen_mar)
    {
        self::$vigen_mar=$vigen_mar;
    }

    public function vigen_cli_set($vigen_cli)
    {
        self::$vigen_cli=$vigen_cli;
    }

    public function vigen_fac_set($vigen_fac)
    {
        self::$vigen_fac=$vigen_fac;
    }

    public function vigen_fechIni_set($vigen_fechIni)
    {
        self::$vigen_fechIni=$vigen_fechIni;
    }

    public function vigen_fechVigen_set($vigen_fechVigen)
    {
        self::$vigen_fechVigen=$vigen_fechVigen;
    }

    //GET

    public function vigen_id_get()
    {
        return self::$vigen_id;
    }

    public function vigen_cc_get()
    {
        return self::$vigen_cc;
    }

    public function vigen_proy_get()
    {
        return self::$vigen_proy;
    }

    public function tip_prod_id_get()
    {
        return self::$tip_prod_id;
    }

    public function vigen_des_get()
    {
        return self::$vigen_des;
    }

    public function vigen_seri_get()
    {
        return self::$vigen_seri;
    }

    public function vigen_mar_get()
    {
        return self::$vigen_mar;
    }

    public function vigen_cli_get()
    {
        return self::$vigen_cli;
    }

    public function vigen_fac_get()
    {
        return self::$vigen_fac;
    }

    public function vigen_fechIni_get()
    {
        return self::$vigen_fechIni;
    }

    public function vigen_fechVigen_get()
    {
        return self::$vigen_fechVigen;
    }

    //EXT

    public function insert_vigen()
    {

        $tip=self::tip_prod_id_get();
        $cc=self::vigen_cc_get();
        $proy=self::vigen_proy_get();
        $des=self::vigen_des_get();
        $seri=self::vigen_seri_get();
        $mar=self::vigen_mar_get();
        $cli=self::vigen_cli_get();
        $fac=self::vigen_fac_get();
        $fechIni=self::vigen_fechIni_get();
        $fechVig=self::vigen_fechVigen_get();

        $sql=sql::insert_vigen($tip,
                                $cc,
                                $proy,
                                $des,
                                $seri,
                                $mar,
                                $cli,
                                $fac,
                                $fechIni,
                                $fechVig);


        return $sql;


    }

    public function obt_vigen()
    {
        $sql=sql::obt_vigen();

        return $sql;
    }

    public function obt_anVen()
    {
        $sql=sql::obt_anVen();

        return $sql;
    }
}

?>