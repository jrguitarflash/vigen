<?php

class vigen
{

    public $vigen_id;
    public $tip_prod_id;
    public $vigen_des;
    public $vigen_mar;
    public $vigen_cli;
    public $vigen_fac;
    public $vigen_fechIni;
    public $vigen_fechVigen;


    //SET

    public function vigen_id_set($vigen_id)
    {
        $this->vigen_id=$vigen_id;
    }

    public function tip_prod_id_set($tip_prod_id)
    {
        $this->tip_prod_id=$tip_prod_id;
    }

    public function vigen_des_set($vigen_des)
    {
        $this->vigen_des=$vigen_des;
    }

    public function vigen_mar_set($vigen_mar)
    {
       $this->vigen_mar=$vigen_mar;
    }

    public function vigen_cli_set($vigen_cli)
    {
        $this->vigen_cli=$vigen_cli;
    }

    public function vigen_fac_set($vigen_fac)
    {
        $this->vigen_fac=$vigen_fac;
    }

    public function vigen_fechIni_set($vigen_fechIni)
    {
        $this->vigen_fechIni=$vigen_fechIni;
    }

    public function vigen_fechVigen_set($vigen_fechVigen)
    {
        $this->vigen_fechVigen=$vigen_fechVigen;
    }

    //GET

    public function vigen_id_get()
    {
        return $this->vigen_id;
    }

    public function tip_prod_id_get()
    {
        return $this->tip_prod_id;
    }

    public function vigen_des_get()
    {
        return $this->vigen_des;
    }


    public function vigen_mar_get()
    {
        return $this->vigen_mar;
    }

    public function vigen_cli_get()
    {
        return $this->vigen_cli;
    }

    public function vigen_fac_get()
    {
        return $this->vigen_fac;
    }

    public function vigen_fechIni_get()
    {
        return $this->vigen_fechIni;
    }

    public function vigen_fechVigen_get()
    {
        return $this->vigen_fechVigen;
    }

    //EXT

}

?>