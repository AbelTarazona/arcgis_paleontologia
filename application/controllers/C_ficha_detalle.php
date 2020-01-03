<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_ficha_detalle extends CI_Controller
{

    public function __construct()
    {
		parent::__construct();
		$this->load->model('M_ficha_detalle');
    }

    public function index()
    {
		$data = array(
            'data' => $this->getDetailFicha()
        );
        $this->load->view('v_ficha_detalle',$data);
    }

    public function getDetailFicha()
    {
        $ci = &get_instance();

        //$ci->load->model('M_news');
        $html = "";
		$id = "";
		
		$id = $_GET['id'];

		

		

        if (!isset($_GET['id']) || empty($_GET['id']) || !is_numeric($_GET['id'])) {
            $html .= '<p class="mb-0" style="text-align:center">Ups! Primero debes elegir una noticia.</p>';
            return $html;
        } else {
            $id = $_GET['id'];
        }

        $data = $ci->M_ficha_detalle->getPatrimonioDetalle($id);

        if ($data['error'] == EXIT_ERROR) {
            $html .= '<p class="mb-0" style="text-align:center">Ups! Primero debes elegir una noticia.</p>';
            return $html;
        }

        foreach ($data['result'] as $datos) {

			//$html .= $datos->nombre;

            $html .= '
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
				<h1 class="h4">'.$datos->nombre.'</h1>
				<div class="btn-toolbar mb-2 mb-md-0">
					<button type="button" class="btn btn-sm btn-outline-secondary" onclick="openRegister()">
						PDF
						<span data-feather="download"></span>
					</button>
                </div>
			</div>

			<div class="card my-4">
				<div class="card-body">
					<div class="row">

						<div class="col-12">
							<a class="nav-link float-right">
								<span data-feather="target"></span>
								'.$datos->clasificacion.'
							</a>
							<a class="nav-link float-right">
								<span data-feather="zap"></span>
								'.$datos->estado.'
							</a>
						</div>

						<div class="col-12">
							<div class="form-group">
                                    <label for="selectTipoDoc">Descripción</label>
                                    <textarea class="form-control" rows="4"
										readonly>'.$datos->descripcion.'</textarea>
							</div>
						</div>
							
						<div class="col-3">
							<div class="form-group" id="inscripcion-container">
								<label for="nombre">Estratigrafía</label>
									<input type="text" class="form-control"
										value="'.$datos->estratigrafia.'" readonly>
							</div>
						</div>
						<div class="col-3">
							<div class="form-group" id="inscripcion-container">
								<label for="nombre">N° de Plano</label>
									<input type="text" class="form-control"
										value="'.$datos->num_plano.'" readonly>
							</div>
						</div>

					</div>
				</div>
			</div>

                ';

            /*if (isset($datos->TXTIMAGENESEXTRAS)) {
                $imagenesExtras = explode(";", $datos->TXTIMAGENESEXTRAS);
                for ($i = 0; $i < sizeof($imagenesExtras); $i++) {

                    $html .= '<img class="imgZoom" src="' . URL_SERVER . 'intranet/noticiasimg/' . $imagenesExtras[$i] . '" onclick="zoom(this.src)" style="height: 150px;width: 150px;margin-right: 10px;margin-bottom: 15px;">';
                }
            }*/

            $html .= '</div>';
        }

        return $html;
    }
}
