<?php

class sql
{

    public function obt_anVen()
    {
        $sql="call obt_anVen()";

        return $sql;
    }

    public function obt_tipProd()
    {
        $sql="call obt_tipProd()";

        return $sql;
    }

    public function obt_vigen()
    {
        $sql="call obt_vigen()";

        return $sql;
    }

    public function vali_usu($usu,$clav)
    {
        $sql="call vali_usu('".$usu."','".$clav."')";

        return $sql;
    }

    public function insert_vigen($tip,
								$cc,
                                $proy,
								$des,
                                $seri,
                                $mar,
                                $cli,
                                $fac,
                                $fechIni,
                                $fechVig)
    {

        $sql="select insert_vigen('".$tip."',
								   '".$cc."',
                                   '".$proy."',
                                   '".$des."',
                                   '".$seri."',
                                   '".$mar."',
                                   '".$cli."',
                                   '".$fac."',
                                   '".$fechIni."',
                                   '".$fechVig."') as response";
        return $sql;

    }

}

?>