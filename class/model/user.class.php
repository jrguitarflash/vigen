<?php


    class user
    {

        public static $user_id;
        public static $user_alias;
        public static $user_pass;

        //SET
        public function user_id_set($user_id)
        {
            self::$user_id=$user_id;
        }

        public function user_alias_set($user_alias)
        {
            self::$user_alias=$user_alias;
        }

        public function user_pass_set($user_pass)
        {
            self::$user_pass=$user_pass;
        }

        //GET
        public function user_id_get()
        {
            return self::$user_id;
        }

        public function user_alias_get()
        {
            return self::$user_alias;
        }

        public function user_pass_get()
        {
            return self::$user_pass;
        }

        //EXT

        public function vali_usu()
        {
            $usu=self::user_alias_get();
            $clav=self::user_pass_get();

            $sql=sql::vali_usu($usu,$clav);

            return $sql;
        }

    }

?>