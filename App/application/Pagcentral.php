<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PagCentral extends Auth_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mensajes_model');
		$this->load->model('calendario_model');
    $this->load->model('fotos_model');
    $this->load->model('galeria_model');
		$this->load->model('usuario_model');
		$this->load->library('calendar');
    $this->load->library('upload');
	}

	public function index($id = NULL) {
		if (is_null($id)) {
			$id = 1;
		}
		if ($id==1) {
			$data['nivel']="Curso Smiling";
		}elseif ($id==2) {
			$data['nivel']="Curso Explorers";
		}elseif ($id==3) {
			$data['nivel']="Curso Adventures";
		}elseif ($id==4) {
			$data['nivel']="Curso Travelers";
		}else{
			$data['nivel']="Curso Dreamers";
		}
		$mensajes=$this->mensajes_model->leidos($this->session->userdata('id_usuario'));
		$i=0;
		if (!empty($mensajes)) {
			foreach ($mensajes as $mensaje) {
				$i = $i + 1;
			}
		}
		$data['leidos']=$i;
		$data['usuario']=$this->usuario_model->getById($this->session->userdata('id_usuario'));
    $data['eventos']=$this->fotos_model->Leerfotos();

		if($this->session->userdata('id_cargo')==1){
			$this->load->view('Pagcentral/index', $data);
		}elseif ($this->session->userdata('id_cargo')==2) {
			$this->load->view('Pagcentral/index', $data);
		}else{
			$this->load->view('Pagcentral/index2',$data);
		}			

	}

	public function get_events()
 	{
     // Our Start and End Dates
     	$start = $this->input->get("start");
     	$end = $this->input->get("end");

     	$startdt = new DateTime('now'); // setup a local datetime
     	$startdt->setTimestamp($start); // Set the date based on timestamp
     	$start_format = $startdt->format('Y-m-d H:i:s');

     	$enddt = new DateTime('now'); // setup a local datetime
     	$enddt->setTimestamp($end); // Set the date based on timestamp
     	$end_format = $enddt->format('Y-m-d H:i:s');

     	$events = $this->calendario_model->get_events($start_format, $end_format);

     	$data_events = array();

     	foreach($events->result() as $r) {

        	 $data_events[] = array(
            	 "id" => $r->id,
             	"title" => $r->title,
             	"descripcion" => $r->descripcion,
             	"end" => $r->end,
             	"start" => $r->start
         	);
     	}

     	echo json_encode(array("events" => $data_events));
     	exit();
 	}

 	public function add_event() 
	{
    	/* Our calendar data */
    	$name = $this->input->post("name", TRUE);
    	$desc = $this->input->post("description", TRUE);
    	$start_date = $this->input->post("start_date1", TRUE);
    	$end_date = $this->input->post("end_date1", TRUE);    	

    	$this->calendario_model->add_event(array(
       		"title" => $name,
       		"descripcion" => $desc,
       		"start" => $start_date,
       		"end" => $end_date
       	)
    	);

    	redirect(pagcentral);
	}

  public function edit_event()
     {
      $eventid = intval($this->input->post("eventid"));
      $event = $this->calendar_model->get_event($eventid);
      if($event->num_rows() == 0) {
        echo"Invalid Event";
        exit();
      }

      $event->row();

          /* Our calendar data */
      $name = $this->common->nohtml($this->input->post("name"));
      $desc = $this->common->nohtml($this->input->post("description"));
      $start_date = $this->common->nohtml($this->input->post("start_date"));
      $end_date = $this->common->nohtml($this->input->post("end_date"));
      $delete = intval($this->input->post("delete"));

      if(!$delete) {

        if(!empty($start_date)) {
          $sd = DateTime::createFromFormat("Y/m/d H:i", $start_date);
          $start_date = $sd->format('Y-m-d H:i:s');
          $start_date_timestamp = $sd->getTimestamp();
        } else {
          $start_date = date("Y-m-d H:i:s", time());
          $start_date_timestamp = time();
        }

        if(!empty($end_date)) {
          $ed = DateTime::createFromFormat("Y/m/d H:i", $end_date);
          $end_date = $ed->format('Y-m-d H:i:s');
          $end_date_timestamp = $ed->getTimestamp();
        } else {
          $end_date = date("Y-m-d H:i:s", time());
          $end_date_timestamp = time();
        }

        $this->calendar_model->update_event($eventid, array(
          "title" => $name,
          "descripcion" => $desc,
          "start" => $start_date,
          "end" => $end_date,
        )
        );

      } else {
        $this->calendar_model->delete_event($eventid);
      }

      redirect(site_url("pagcentral"));
    }

    public function crearevento() {
      //$date = new DateTime('now');
      $data = $this->input->post('descripcion');
      $id_evento = $this->input->post('id-evento');
      $id_foto = $this->input->post('id_foto');

      if ($id_evento !== NULL && !empty($id_evento)) {
        if ($id_foto !== NULL && !empty($id_foto)) {
          $this->galeria_model->insert($id_evento);
          $num_msj=$this->db->insert_id();
          $date = new DateTime('now');

          $config['upload_path'] = '../php/fotos/';
          $config['file_name'] = $id_evento."_".$num_msj.".png";
          $config['allowed_types'] = '*';
          $config['overwrite'] = TRUE;
          $config['max_size'] = '100000';
          $config['width'] = 166;
          $config['height'] = 90;
          $this->upload->initialize($config);

          if (!$this->upload->do_upload("adjunto")) {
            $this->session->set_flashdata('Error', $this->upload->display_errors());
            $pdfadjunto = null;
          } else {
            $this->upload->data();
            $pdfadjunto = '../php/fotos/' . $id_evento."_".$num_msj. '.png';
          }

          $this->galeria_model->insertarchivo($pdfadjunto, $num_msj);
          $this->output->set_content_type('application/json')->set_output(json_encode(array('resultado' => 'ok3')));

        } else {
          $this->fotos_model->actualizar($id_evento, $data);
          $this->output->set_content_type('application/json')->set_output(json_encode(array('resultado' => 'ok')));
        }
      } else {
        $this->fotos_model->insert($data);
        $this->output->set_content_type('application/json')->set_output(json_encode(array('resultado' => 'ok2')));
      }

    }

    public function leerEvento($id = NULL) {
      $data = $this->fotos_model->leerfotosid($id);
      $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function eliminar() {
    $this->fotos_model->eliminar($this->input->post('id_evento'));
    }
} 
?>
