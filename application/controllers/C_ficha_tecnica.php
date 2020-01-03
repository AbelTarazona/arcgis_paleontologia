<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_ficha_tecnica extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_ficha_tecnica');
        $this->load->helper('utils');
    }

    public function index()
    {
        $data = array(
            'combo_clasificacion' => makeClasificacionSelecter(),
            'combo_estado' => makeEstadoSelecter()

        );
        $this->load->view('v_ficha_tecnica', $data);
    }

    public function insertarPatrimonio()
    {
        $data['error'] = EXIT_ERROR;
        try {

            //Imagenes
            $config['upload_path'] = '../server_files/paleoimagenes';
            $config['allowed_types'] = 'jpg|png|jpeg|stl';
            $config['max_size'] = '20048';
            $search = explode(",", "ç,æ,œ,á,é,í,ó,ú,à,è,ì,ò,ù,ä,ë,ï,ö,ü,ÿ,â,ê,î,ô,û,å,e,i,ø,u");
            $replace = explode(",", "c,ae,oe,a,e,i,o,u,a,e,i,o,u,a,e,i,o,u,y,a,e,i,o,u,a,e,i,o,u");

            $txtextras = null;
            $contExtras = 0;

            foreach ($_FILES as $key => $file) {
				log_message('error',print_r($key,true));
				

                $nuevo = str_replace($search, $replace, $file['name']);
                $config['file_name'] = preg_replace('/[^a-z0-9.]/i', '', $nuevo);
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload($key)) {log_message('error','GG1');
                    $data['msj'] = strip_tags($this->upload->display_errors());
                    echo json_encode($data);
                    return;
                } else {
                    $file_info = $this->upload->data();
                    if ($key != 'archivo') {
                        $txtextras .= ($contExtras != 0 ? ";" : "") . $file_info['file_name'];
                        $contExtras++;
                    } else {
                        $archivo = $file_info['file_name'];
                    }
                }

            }

            if (isset($data['msj'])) {log_message('error','GG2');
                echo json_encode($data);
                return;
            } else {
                //Data patrimonio
                $txtNombre = trim($this->input->post('txtNombre'));
                $selectClasificacion = trim($this->input->post('selectClasificacion'));
                $selectEstado = trim($this->input->post('selectEstado'));
                $txtDescripcion = $this->input->post('txtDescripcion');
                $txtEstratigrafia = $this->input->post('txtEstratigrafia');
                $txtNumPlano = $this->input->post('txtNumPlano');

                $txtAntecedentes = $this->input->post('txtAntecedentes');
                $txtAfectaciones = $this->input->post('txtAfectaciones');
                $txtObservaciones = $this->input->post('txtObservaciones');
                $txtCroquis = $this->input->post('txtCroquis');
                $txtImportancia = $this->input->post('txtImportancia');
                $txtValor = $this->input->post('txtValor');
                $txtSignificado = $this->input->post('txtSignificado');

                //Data ubicacion
                $txtDepartamento = $this->input->post('txtDepartamento');
                $txtProvincia = $this->input->post('txtProvincia');
                $txtDistrito = $this->input->post('txtDistrito');
                $txtUbigeo = $this->input->post('txtUbigeo');

                $patrimonio = array(
                    'txtNombre' => $txtNombre,
                    'selectEstado' => intval($selectEstado),
                    'selectClasificacion' => intval($selectClasificacion),
                    'txtDescripcion' => $txtDescripcion,
                    'txtEstratigrafia' => $txtEstratigrafia,
                    'txtNumPlano' => $txtNumPlano,
                    'txtimagenes' => $txtextras,
                    'txtAntecedentes' => $txtAntecedentes,
                    'txtAfectaciones' => $txtAfectaciones,
                    'txtObservaciones' => $txtObservaciones,
                    'txtCroquis' => $txtCroquis,
                    'txtImportancia' => $txtImportancia,
                    'txtValor' => $txtValor,
                    'txtSignificado' => $txtSignificado,

                );

                $ubicacion = array(
                    'txtdepartamento' => $txtDepartamento,
                    'txtprovincia' => $txtProvincia,
                    'txtdistrito' => $txtDistrito,
                    'txtubigeo' => intval($txtUbigeo)
                );

                log_message('error',print_r($patrimonio,true));
                
                $data = $this->M_ficha_tecnica->insertarPatrimonio($patrimonio, $ubicacion);
            }

            echo json_encode($data);
        } catch (\Throwable $th) {
            throw $th;
        }
	}


}
