<?php

class sql
{

    public function vali_usu($usu,$clav)
    {
        $sql="call vali_usu('".$usu."','".$clav."')";

        return $sql;
    }

}

?>