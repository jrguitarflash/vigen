<?php

class sql
{

    //tip_prod

        public function obt_tipProd()
        {
            $sql="call obt_tipProd()";

            return $sql;
        }

    //tip_vigen

        public function obt_tipVig()
        {
            $sql="call obt_tipVig()";

            return $sql;
        }

    //user

        public function vali_usu($usu,$clav)
        {
            $sql="call vali_usu('".$usu."','".$clav."')";

            return $sql;
        }

    //vigen

        public function obt_ccVig()
        {
            $sql="call obt_ccVig()";

            return $sql;
        }

        public function obt_anVen()
        {
            $sql="call obt_anVen()";

            return $sql;
        }

        public function obt_vigen($est,$anu,$tip,$cc)
        {
            $sql="call obt_vigen('".$est."','".$anu."','".$tip."','".$cc."')";

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
                                     $fechVig,
                                     $contac,
                                     $mail)
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
                                       '".$fechVig."',
                                       '".$contac."',
                                       '".$mail."') as response";
            return $sql;

        }

    //vigen_alert

        public function obt_ultAler()
        {
            $sql="call obt_ultAler()";

            return $sql;
        }

        public function config_alert($frecu,$est,$tip,$anu,$id)
        {
            $sql="select config_alert('".$frecu."','".$est."','".$tip."','".$anu."','".$id."') as response";

            return $sql;
        }


    //vigen_desti

        public function ope_desti($nom,$mail,$op,$id)
        {
            $sql="select ope_desti('".$nom."','".$mail."','".$op."','".$id."') as response";

            return $sql;
        }

        public function obte_desti()
        {
            $sql="call obte_desti()";

            return $sql;
        }

    //vigen_frecu

        public function obt_frecu()
        {
            $sql="call obt_frecu()";

            return $sql;
        }

    //vigen_hist

        public function insert_hist($vigen_id,$hist_envi,$hist_fech,$hist_msg)
        {
            $sql="select insert_hist('".$vigen_id."',
                                    '".$hist_envi."',
                                    '".$hist_fech."',
                                    '".$hist_msg."') as response";

            return $sql;
        }

    //vigen_rep

        public function insert_rep($alert_id,
                                    $rep_nom,
                                    $rep_fech,
                                    $rep_msg,
                                    $rep_env)
        {
            $sql="select insert_rep('".$alert_id."',
                                    '".$rep_nom."',
                                    '".$rep_fech."',
                                    '".$rep_msg."',
                                    '".$rep_env."') as response";

            return $sql;
        }

}

?>