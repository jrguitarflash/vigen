<?php

class vigen_desti
{
    public static $vigen_desti_id;
    public static $vigen_desti_nom;
    public static $vigen_desti_email;

    public static $vigen_desti_op;

    //SET
    public function vigen_desti_id_set($vigen_desti_id)
    {
        self::$vigen_desti_id=$vigen_desti_id;
    }

    public function vigen_desti_nom_set($vigen_desti_nom)
    {
        self::$vigen_desti_nom=$vigen_desti_nom;
    }

    public function vigen_desti_email_set($vigen_desti_email)
    {
        self::$vigen_desti_email=$vigen_desti_email;
    }

    public function vigen_desti_op_set($vigen_desti_op)
    {
        self::$vigen_desti_op=$vigen_desti_op;
    }

    //GET

    public function vigen_desti_id_get()
    {
        return self::$vigen_desti_id;
    }

    public function vigen_desti_nom_get()
    {
        return self::$vigen_desti_nom;
    }

    public function vigen_desti_email_get()
    {
        return self::$vigen_desti_email;
    }

    public function vigen_desti_op_get()
    {
        return self::$vigen_desti_op;
    }

    //EXT

    public function ope_desti()
    {
        $nom=self::vigen_desti_nom_get();
        $mail=self::vigen_desti_email_get();
        $op=self::vigen_desti_op_get();
        $id=self::vigen_desti_id_get();

        $sql=sql::ope_desti($nom,$mail,$op,$id);

        return $sql;
    }

    public function obte_desti()
    {
        $sql=sql::obte_desti();

        return $sql;
    }
}

?>