<?php

class tip_vigen
{
    private static $tip_vigen_id;
    private static $tip_vigen_des;

    //SET
    public function tip_vigen_id_set($tip_vigen_id)
    {
        self::$tip_vigen_id=$tip_vigen_id;
    }

    public function tip_vigen_des_set($tip_vigen_des)
    {
        self::$tip_vigen_des=$tip_vigen_des;
    }

    //GET
    public function tip_vigen_id_get()
    {
        return self::$tip_vigen_id;
    }

    public function tip_vigen_des_get()
    {
        return self::$tip_vigen_des;
    }

    //EXT

    public function obt_tipVig()
    {
        $sql=sql::obt_tipVig();

        return $sql;
    }
}

?>