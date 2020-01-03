<?php

class M_ficha_lista extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }


    function getPatrimonios() {
        $sql = 'SELECT * FROM "public"."obtenerListaPatrimonios"();';
        
        $result = $this->db->query($sql);
        if($result->num_rows() != 0) {
            return array('error'  => EXIT_SUCCESS,
                         'result' => $result->result());
        } else {
            return array('error'=> EXIT_ERROR);
        }
    }

   
}
