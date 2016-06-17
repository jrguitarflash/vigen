<?php

    class vigen_alert
    {
        private static $vigen_alert_id;
        private static $vigen_frecu_id;
        private static $vigen_est_id;
        private static $vigen_tip_id;
        private static $vigen_anu;

        //SET
        public function vigen_alert_id_set($vigen_alert_id)
        {
            self::$vigen_alert_id=$vigen_alert_id;
        }

        public function vigen_frecu_id_set($vigen_frecu_id)
        {
            self::$vigen_frecu_id=$vigen_frecu_id;
        }

        public function vigen_est_id_set($vigen_est_id)
        {
            self::$vigen_est_id=$vigen_est_id;
        }

        public function vigen_tip_id_set($vigen_tip_id)
        {
            self::$vigen_tip_id=$vigen_tip_id;
        }

        public function vigen_anu($vigen_anu)
        {
            self::$vigen_anu=$vigen_anu;
        }


        //GET
        public function vigen_alert_id_get()
        {
            return  self::$vigen_alert_id;
        }

        public function vigen_frecu_id_get()
        {
            return  self::$vigen_frecu_id;
        }

        public function vigen_est_id_get()
        {
            return self::$vigen_est_id;
        }

        public function vigen_tip_id_get()
        {
            return self::$vigen_tip_id;
        }

        public function vigen_anu_get()
        {
            return self::$vigen_anu;
        }

        //EXT

        public function obt_ultAler()
        {
            $sql=sql::obt_ultAler();

            return $sql;
        }

        public function config_alert()
        {
            $frecu=self::vigen_frecu_id_get();
            $est=self::vigen_est_id_get();
            $tip=self::vigen_tip_id_get();
            $anu=self::vigen_anu_get();
            $id=self::vigen_alert_id_get();

            $sql=sql::config_alert($frecu,$est,$tip,$anu,$id);

            return $sql;
        }
    }

?>