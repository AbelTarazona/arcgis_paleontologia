<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_ficha_lista extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('M_ficha_lista');
		
    }

	public function index()
	{
		$data = array(
            'patrimonios' => $this->getPatrimonios()
        );
		$this->load->view('v_ficha_lista', $data);
	}

	public function getPatrimonios()
    {
        $data['error'] = EXIT_ERROR;
        try {
            $data = $this->M_ficha_lista->getPatrimonios();
            $data["html"] = "";
            if ($data['error'] == EXIT_ERROR){
                echo json_encode($data);
                return;
            }
            $cont = 0;
            foreach($data['result'] as $dat){
                $cont++;
                $data["html"] .=
                    "<tr>
                        <td>".$cont."</td>
                        <td attr='nombre'>".$dat->nombre."</td>
                        <td attr='desc'>".$dat->clasificacion."</td>
                        <td attr='fecinicio'>".$dat->estado."</td>
                        <td>
                            <div class='block_container text-center'>
								<div class='block' onclick='openDetalle(".$dat->idpatrimonio.")'>
									<span data-feather='eye' style='color: green'></span>
								</div>
                            </div>	
                        </td>
                        <td>
						<div class='block_container text-center'>
							<div class='block' onclick='deletePatrimonio(".$dat->idpatrimonio.",this)'>
								<span data-feather='trash-2' style='color: red'></span>
							</div>
						</div>
                        </td>
                    </tr>";
            }
            return $data['html'];
        }
        catch (\Throwable $th) {
            throw $th;
        }
    }


}
