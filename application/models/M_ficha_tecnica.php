<?php

class M_ficha_tecnica extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }


    function getClasificacion() {
        $sql = 'SELECT * FROM "public"."zona";';
        $result = $this->db->query($sql);
        if($result->num_rows() != 0) {
            return array('error'  => EXIT_SUCCESS,
                         'result' => $result->result());
        } else {
            return array('error'=> EXIT_ERROR);
        }
    }

    function getEstado() {
        $sql = 'SELECT * FROM "public"."estado";';
        $result = $this->db->query($sql);
        if($result->num_rows() != 0) {
            return array('error'  => EXIT_SUCCESS,
                         'result' => $result->result());
        } else {
            return array('error'=> EXIT_ERROR);
        }
    }

    function insertarPatrimonio($patrimonio, $ubicacion) {
        //$this->db->trans_start();        log_message('error',print_r($result->result()[0],true)) ;//return array('error'=> EXIT_SUCCESS);
        $sql= 'SELECT * FROM "public"."insertarPatrimonio"(?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
        $result = $this->db->query($sql, $patrimonio);

        
        $data = explode('|',$result->result()[0]->insertarPatrimonio);

        if($data[0] == 'OK'){
            //Insertamos ubicacion
            return $this->insertarUbicacion($ubicacion, $data[1]); 

        } else {
            return array('error'=> EXIT_ERROR,
                         'msj'=> 'No se pudo registrar el documento');
        }
    }

    function insertarUbicacion($ubicacion, $idpatrimonio) {
        
        //Anadimos idpatrimonio al array de ubicacion
        $patrimonio = array('id_patrimonio' => $idpatrimonio);

        $ubicacion += $patrimonio;

        log_message('error',print_r($ubicacion,true));

        $sql= 'SELECT * FROM "public"."insertarUbicacion"(?,?,?,?,?)';
        $result = $this->db->query($sql, $ubicacion);

        //log_message('error',print_r($result->result()[0],true));


        if($result->result()[0]->insertarUbicacion == 'OK'){
            return array('error'=> EXIT_SUCCESS);
        } else {
            return array('error'=> EXIT_ERROR,
                         'msj'=> 'No se pudo registrar la ubicacion');
        }
    }
    
   
}
