<?php

class vigen
{

    //MOD
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
    public static $vigen_contac;
    public static $vigen_mail;

    //FIL
    public static $est_fil;
    public static $anu_fil;

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

    public function vigen_contac_set($vigen_contac)
    {
        self::$vigen_contac=$vigen_contac;
    }

    public function vigen_mail_set($vigen_mail)
    {
        self::$vigen_mail=$vigen_mail;
    }

    //FIL SET

    public function est_fil_set($est_fil)
    {
        self::$est_fil=$est_fil;
    }

    public function anu_fil_set($anu_fil)
    {
        self::$anu_fil=$anu_fil;
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

    public function vigen_contac_get()
    {
        return self::$vigen_contac;
    }

    public function vigen_mail_get()
    {
        return self::$vigen_mail;
    }

    //FILL GET

    public function est_fil_get()
    {
        return self::$est_fil;
    }

    public function anu_fil_get()
    {
        return self::$anu_fil;
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
        $contac=self::vigen_contac_get();
        $mail=self::vigen_mail_get();

        $sql=sql::insert_vigen($tip,
                                $cc,
                                $proy,
                                $des,
                                $seri,
                                $mar,
                                $cli,
                                $fac,
                                $fechIni,
                                $fechVig,
                                $contac,
                                $mail);


        return $sql;


    }

    public function obt_vigen()
    {

        $est=self::est_fil_get();
        $anu=self::anu_fil_get();
        $tip=self::tip_prod_id_get();
        $cc=self::vigen_cc_get();

        $sql=sql::obt_vigen($est,$anu,$tip,$cc);

        return $sql;
    }

    public function obt_anVen()
    {
        $sql=sql::obt_anVen();

        return $sql;
    }

    public function obt_ccVig()
    {

        $sql=sql::obt_ccVig();

        return $sql;
    }
}

?>