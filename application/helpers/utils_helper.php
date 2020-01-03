<?php

function makeClasificacionSelecter(){
    $ci =& get_instance();

    $ci->load->model('M_ficha_tecnica');
    $data = $ci->M_ficha_tecnica->getClasificacion();
    $html = "";
    foreach ($data['result'] as $datos) {
        $html.="<option value=".$datos->id_zona.">".$datos->descripcion."</option>";
    }
    
    return $html;
}


function makeEstadoSelecter(){
    $ci =& get_instance();

    $ci->load->model('M_ficha_tecnica');
    $data = $ci->M_ficha_tecnica->getEstado();
    $html = "";
    foreach ($data['result'] as $datos) {
        $html.="<option value=".$datos->id_estado.">".$datos->descripcion."</option>";
    }
    
    return $html;
}