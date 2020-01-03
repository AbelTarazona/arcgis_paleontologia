<?php

class M_ficha_detalle extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }


    function getPatrimonioDetalle($id) {
        $sql = 'SELECT 
        nombre, 
        descripcion, 
        (SELECT descripcion FROM public.zona WHERE id_zona = public.patrimonio.id_zona) AS clasificacion, 
        (SELECT descripcion FROM public.estado WHERE id_estado = public.patrimonio.id_estado) AS estado,
        estratigrafia,
        num_plano,
        antecedentes,
        afectaciones,
        observaciones,
        croquis,
        importancia,
        valor,
        significado,
        modelo_3d,
        imagenes
        FROM "public"."patrimonio" WHERE id_patrimonio = ?';
        
        $result = $this->db->query($sql,array($id));
        if($result->num_rows() != 0) {
            return array('error'  => EXIT_SUCCESS,
                         'result' => $result->result());
        } else {
            return array('error'=> EXIT_ERROR);
        }
    }

   
}
