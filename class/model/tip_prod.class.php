<?php


    class tip_prod
    {
        public $tip_prod_id;
        public $tip_prod_des;

        //SET

        public function tip_prod_id_set($tip_prod_id)
        {
            $this->tip_prod_id=$tip_prod_id;
        }

        public function tip_prod_des_set($tip_prod_des)
        {
            $this->tip_prod_des=$tip_prod_des;
        }

        //GET

        public function tip_prod_id_get()
        {
            return $this->tip_prod_id;
        }

        public function tip_prod_des_get()
        {
            return $this->tip_prod_des;
        }

        //EXT
    }

?>