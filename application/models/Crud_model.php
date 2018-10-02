<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Crud_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function clear_cache() {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    function add_complaint($user_code) {
        $data['user_id']    =   $this->db->get_where('user', array('user_code' => $user_code))->row()->user_id;
        $data['title']  =   $this->input->post('title');
        $data['summary']  =   $this->input->post('summary');
        $data['timestamp']  =   strtotime($this->input->post('timestamp'));
        $this->db->insert('complaints', $data);
    }

    function edit_complaint($complaints_id) {
        $data['title']  =   $this->input->post('title');
        $data['summary']  =   $this->input->post('summary');
        $data['timestamp']  =   strtotime($this->input->post('timestamp'));

        $this->db->where('complaints_id', $complaints_id);
        $this->db->update('complaints', $data);

        $user_id = $this->db->get_where('complaints', array('complaints_id' => $complaints_id))->row()->user_id;
        $code = $this->db->get_where('user', array('user_id' => $user_id))->row()->user_code;

        return $code;
    }

    function delete_complaint($complaints_id) {

        $user_id = $this->db->get_where('complaints', array('complaints_id' => $complaints_id))->row()->user_id;
        $code = $this->db->get_where('user', array('user_id' => $user_id))->row()->user_code;

        $this->db->where('complaints_id', $complaints_id);
        $this->db->delete('complaints');

        return $code;
    }

    function curl_request($code = '') {

      $purchase_code = $code;
      $ch = curl_init();
  		curl_setopt($ch, CURLOPT_URL, 'https://marketplace.envato.com/api/edge/Creativeitem/3q961vxab5xh5cys82lip6wchxgarrj3/verify-purchase:' . $purchase_code . '.json');
  		curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (compatible; Envato Marketplace API Wrapper PHP)');
  		curl_setopt($ch, CURLOPT_USERAGENT, 'API');
  		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
  		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  		$result_from_json = curl_exec($ch);
  		curl_close($ch);
  		$result = json_decode($result_from_json, true);

  		if (count($result['verify-purchase']) > 0) {
  			return true;
  		} else {
  			return false;
  		}

  	}

	    //CREAR DEPENDENCIA
    function crear_dependencia() {
        $data['dep_codigo_depen']    		= $this->input->post('codigo');
        $data['dep_nombre_depen']           = $this->input->post('nombre');
		
        $this->db->insert('dependencia',$data);
    }
	    //EDITAR DEPENDENCIA//
    function editar_dependencia($department_code = '') {
        $department_id = $this->db->get_where('dependencia', array('DEP_CODIGO_DEPEN' => $department_code))->row()->DEP_CODIGO_DEPEN;

        $data['DEP_NOMBRE_DEPEN'] = $this->input->post('nombre');

        $this->db->where('DEP_CODIGO_DEPEN', $department_id);
        $this->db->update('dependencia', $data);
	}
	
	
	    //BORRAR DEPENDENCIA
    function borrar_dependencia($department_code = '') {
        $department_id = $this->db->get_where('dependencia',array('DEP_CODIGO_DEPEN'=>$department_code))->row()->DEP_CODIGO_DEPEN;
        $this->db->where('DEP_CODIGO_DEPEN',$department_id);
        $this->db->delete('dependencia');
	}
	
	    //CREAR FONDO
    function crear_fondo() {
        $data['ent_codigo']    		= $this->input->post('codigo');
        $data['ent_nombre']           = $this->input->post('nombre');
		
        $this->db->insert('fondo',$data);
    }
	    //EDITAR FONDO//
    function editar_fondo($department_code = '') {
        $department_id = $this->db->get_where('fondo', array('ent_codigo' => $department_code))->row()->ENT_CODIGO;

        $data['ENT_NOMBRE'] = $this->input->post('nombre');

        $this->db->where('ENT_CODIGO', $department_id);
        $this->db->update('fondo', $data);
	}
	
	
	    //BORRAR  FONDO
    function borrar_fondo($department_code = '') {
        $department_id = $this->db->get_where('dependencia',array('ent_codigo'=>$department_code))->row()->ENT_CODIGO;
        $this->db->where('ENT_CODIGO',$department_id);
        $this->db->delete('fondo');
	}
	


	    //CREAR ARL
    function crear_arl() {
        $data['codigo_riesgo']    		= $this->input->post('codigo');
        $data['nombre_riesgo']           = $this->input->post('nombre');
		$data['porcentaje_riesgo']           = $this->input->post('porcentaje');
		
        $this->db->insert('arl',$data);
    }
	    //EDITAR ARL//
    function editar_arl($department_code = '') {
        $department_id = $this->db->get_where('arl', array('codigo_riesgo' => $department_code))->row()->codigo_riesgo;

        $data['nombre_riesgo'] = $this->input->post('nombre');
		$data['porcentaje_riesgo'] = $this->input->post('porcentaje');

        $this->db->where('codigo_riesgo', $department_id);
        $this->db->update('arl', $data);
	}
		
	    //BORRAR ARL
    function borrar_arl($department_code = '') {
        $department_id = $this->db->get_where('arl',array('codigo_riesgo'=>$department_code))->row()->codigo_riesgo;
        $this->db->where('codigo_riesgo',$department_id);
        $this->db->delete('arl');
	}

	
		    //CREAR TIPO DE NOMINA
    function crear_tiponomina() {
        $data['codigo_nomina']    		= $this->input->post('codigo');
        $data['nombre_nomina']           = $this->input->post('nombre');
		
        $this->db->insert('tipo_nomina',$data);
    }
	    //EDITAR TIPO DE NOMINA//
    function editar_tiponomina($department_code = '') {
        $department_id = $this->db->get_where('tipo_nomina', array('codigo_nomina' => $department_code))->row()->codigo_nomina;

        $data['nombre_nomina'] = $this->input->post('nombre');

        $this->db->where('codigo_nomina', $department_id);
        $this->db->update('tipo_nomina', $data);
	}
		
	    //BORRAR TIPO DE NOMINA
    function borrar_tiponomina($department_code = '') {
        $department_id = $this->db->get_where('tipo_nomina',array('codigo_nomina'=>$department_code))->row()->codigo_nomina;
        $this->db->where('codigo_nomina',$department_id);
        $this->db->delete('tipo_nomina');
	}
	
	
   //CREAR PROYECTO
    function crear_proyecto() {
        $data['PLANTA_CODIGO']    		= $this->input->post('codigo');
        $data['PLANTA_NOMBRE']           = $this->input->post('nombre');
		
        $this->db->insert('planta',$data);
    }
	    //EDITAR PROYECTO//
    function editar_proyecto($department_code = '') {
        $department_id = $this->db->get_where('planta', array('PLANTA_CODIGO' => $department_code))->row()->PLANTA_CODIGO;

        $data['PLANTA_NOMBRE'] = $this->input->post('nombre');

        $this->db->where('PLANTA_CODIGO', $department_id);
        $this->db->update('planta', $data);
	}
		
	    //BORRAR PROYECTO
    function borrar_proyecto($department_code = '') {
        $department_id = $this->db->get_where('planta',array('PLANTA_CODIGO'=>$department_code))->row()->PLANTA_CODIGO;
        $this->db->where('PLANTA_CODIGO',$department_id);
        $this->db->delete('planta');
	}

	

	
	
		    //CREAR TERCERO
    function crear_tercero() {
        $data['etb_codigo']    		= $this->input->post('nit');
        $data['etb_nombre']           = $this->input->post('nombret');
		
        $this->db->insert('tercero',$data);
    }
	    //EDITAR TERCERO//
    function editar_tercero($department_code = '') {
        $department_id = $this->db->get_where('tercero', array('etb_codigo' => $department_code))->row()->ETB_CODIGO;

        $data['ETB_NOMBRE'] = $this->input->post('nombret');

        $this->db->where('ETB_CODIGO', $department_id);
        $this->db->update('tercero', $data);
	}
	
	
	    //BORRAR  TERCERO
    function borrar_tercero($department_code = '') {
        $department_id = $this->db->get_where('dependencia',array('ETB_CODIGO'=>$department_code))->row()->ETB_CODIGO;
        $this->db->where('ETB_CODIGO',$department_id);
        $this->db->delete('tercero');
	}
	
	
	
		    //CREAR BANCO
    function crear_banco() {
        $data['BCO_COD']    		= $this->input->post('codigo');
        $data['BCO_NOMBRE']           = $this->input->post('nombre');
		$data['BCO_NIT']           = $this->input->post('nit');
		
        $this->db->insert('banco',$data);
    }
	    //EDITAR BANCO//
    function editar_banco($department_code = '') {
        $department_id = $this->db->get_where('banco', array('BCO_COD' => $department_code))->row()->BCO_COD;

        $data['BCO_NOMBRE'] = $this->input->post('nombre');
		$data['BCO_NIT'] = $this->input->post('nit');

        $this->db->where('BCO_COD', $department_id);
        $this->db->update('banco', $data);
	}
		
	    //BORRAR BANCO
    function borrar_banco($department_code = '') {
        $department_id = $this->db->get_where('banco',array('BCO_COD'=>$department_code))->row()->BCO_COD;
        $this->db->where('BCO_COD',$department_id);
        $this->db->delete('banco');	
	
	}	

	
	//CREAR CARGO|
    function crear_cargo() {
        $data['CARGO_COMPLETO']    		= $this->input->post('codigo');
        $data['CAD_NOMBRE_CARGO']           = $this->input->post('nombre');
		
        $this->db->insert('cargo',$data);
    }
	    //EDITAR CARGO//
    function editar_cargo($department_code = '') {
        $department_id = $this->db->get_where('cargo', array('CARGO_COMPLETO' => $department_code))->row()->CARGO_COMPLETO;

        $data['CAD_NOMBRE_CARGO'] = $this->input->post('name');
		$data['CAD_SUELDO_BASICO'] = $this->input->post('sueldo');
		
        $this->db->where('CARGO_COMPLETO', $department_id);
        $this->db->update('cargo', $data);
	}
		
	    //BORRAR CARGO
    function borrar_cargo($department_code = '') {
        $department_id = $this->db->get_where('cargo',array('CARGO_COMPLETO|'=>$department_code))->row()->CODIGO_COMPLETO;
        $this->db->where('CODIGO_COMPLETO',$department_id);
        $this->db->delete('cargo');	
	
	}	
	
	
	
	
    //CREATE DEPARTMENT
    function create_department() {
        $department_code            = substr(md5(rand(100000000, 20000000000)), 0, 15);
        $data['department_code']    = $department_code;
        $data['name']               = $this->input->post('name');
        $this->db->insert('department',$data);
        $department_id              = $this->db->insert_id();
        $designation                = $this->input->post('designation');

        foreach ($designation as $designation):
            if($designation != ""):
            $data2['department_id'] = $department_id;
            $data2['name']          = $designation;
            $this->db->insert('designation',$data2);
        endif;
        endforeach;
    }
	

    //EDIT DEPARTMENT//
    function edit_department($department_code = '') {
        $department_id = $this->db->get_where('department', array('department_code' => $department_code))->row()->department_id;

        $data['name'] = $this->input->post('name');

        $this->db->where('department_id', $department_id);
        $this->db->update('department', $data);

        // UPDATE EXISTING DESIGNATIONS
        $designations = $this->db->get_where('designation', array('department_id' => $department_id))->result_array();
        foreach ($designations as $row):
           $data2['name'] = $this->input->post('designation_' . $row['designation_id']);
           $this->db->where('designation_id',  $row['designation_id']);
           $this->db->update('designation', $data2);
        endforeach;

        // CREATE NEW DESIGNATIONS
        $designations = $this->input->post('designation');

        foreach($designations as $designation)
            if($designation != ""):
                $data3['department_id'] = $department_id;
                $data3['name']          = $designation;
                $this->db->insert('designation', $data3);
            endif;
    }

    //DELETE DEPARTMENT
    function delete_department($department_code = '') {
        $department_id = $this->db->get_where('department',array('department_code'=>$department_code))->row()->department_id;
        $this->db->where('department_id',$department_id);
        $this->db->delete('designation');
        $this->db->where('department_id',$department_id);
        $this->db->delete('department');
    }
    //CREATE EMPLOYEE//
    function create_employee() {
               $document_id = '';
                //bank
                $data['name']                   = $this->input->post('bank_name');
                $data['branch']                 = $this->input->post('branch');
                $data['account_holder_name']    = $this->input->post('account_holder_name');
                $data['account_number']         = $this->input->post('account_number');
                $this->db->insert('bank',$data);
                $bank_id = $this->db->insert_id();

                //document
                if($_FILES['resume']['name'] != ''||$_FILES['offer_letter']['name'] != ''||$_FILES['joining_letter']['name'] != ''||$_FILES['contract_agreement']['name'] != ''||$_FILES['others']['name'] != ''){
                    if($_FILES['resume']['name'] != '')
                        $data3['resume']            = $this->input->post('user_code') . '_' . $_FILES['resume']['name'];
                    if($_FILES['offer_letter']['name'] != '')
                        $data3['offer_letter']            = $this->input->post('user_code') . '_' . $_FILES['offer_letter']['name'];
                    if($_FILES['joining_letter']['name'] != '')
                        $data3['joining_letter']            = $this->input->post('user_code') . '_' . $_FILES['joining_letter']['name'];
                    if($_FILES['contract_agreement']['name'] != '')
                        $data3['contract_agreement']            = $this->input->post('user_code') . '_' . $_FILES['contract_agreement']['name'];
                    if($_FILES['others']['name'] != '')
                        $data3['others']            = $this->input->post('user_code') . '_' . $_FILES['others']['name'];

                    $this->db->insert('document',$data3);
                    $document_id = $this->db->insert_id();

                    if($_FILES['resume']['name'] != '')
                        move_uploaded_file($_FILES['resume']['tmp_name'], 'uploads/document/resume/' . $data3['resume']);
                    if($_FILES['offer_letter']['name'] != '')
                        move_uploaded_file($_FILES['offer_letter']['tmp_name'], 'uploads/document/offer_letter/' . $data3['offer_letter']);
                    if($_FILES['joining_letter']['name'] != '')
                        move_uploaded_file($_FILES['joining_letter']['tmp_name'], 'uploads/document/joining_letter/' . $data3['joining_letter']);
                    if($_FILES['contract_agreement']['name'] != '')
                        move_uploaded_file($_FILES['contract_agreement']['tmp_name'], 'uploads/document/contract_agreement/' . $data3['contract_agreement']);
                    if($_FILES['others']['name'] != '')
                        move_uploaded_file($_FILES['others']['tmp_name'], 'uploads/document/others/' . $data3['others']);
                }

                //user
                $data2['name']                  = $this->input->post('name');
                $data2['father_name']           = $this->input->post('father_name');
                $data2['date_of_birth']         = strtotime($this->input->post('date_of_birth'));
                $data2['gender']                = $this->input->post('gender');
                $data2['phone']                 = $this->input->post('phone');
                $data2['local_address']         = $this->input->post('local_address');
                $data2['permanent_address']     = $this->input->post('permanent_address');
                $data2['nationality']           = $this->input->post('nationality');
                $data2['martial_status']        = $this->input->post('martial_status');
                $data2['email']                 = $this->input->post('email');
                $data2['password']              = sha1($this->input->post('password'));
                $data2['user_code']             = $this->input->post('user_code');
                $data2['department_id']         = $this->input->post('department_id');
                $data2['designation_id']        = $this->input->post('designation_id');
                $data2['date_of_joining']       = strtotime($this->input->post('date_of_joining'));
                $data2['joining_salary']        = $this->input->post('joining_salary');
                $data2['date_of_leaving']       = strtotime($this->input->post('date_of_leaving'));
                $data2['status']                = $this->input->post('status');
                $data2['type']                  = 2;
                $data2['bank_id']               = $bank_id;
                if($document_id != ''){
                $data2['document_id']           = $document_id;
                }else{
                    $data2['document_id']       =0;
                }
                $this->db->insert('user',$data2);
                $user_id = $this->db->insert_id();

                // job history
                $company_names = $this->input->post('company_name');
                if (count($company_names > 0)) {

                    for ($i=0; $i < count($company_names); $i++) {
                        $job_history_data['user_id']        =   $user_id;
                        $job_history_data['company_name']   =   $company_names[$i];
                        $job_history_data['department']     =   $this->input->post('department')[$i];
                        $job_history_data['designation']    =   $this->input->post('designation')[$i];
                        $job_history_data['timestamp_from'] =   strtotime($this->input->post('timestamp_from')[$i]);
                        $job_history_data['timestamp_to']   =   strtotime($this->input->post('timestamp_to')[$i]);

                        $this->db->insert('job_history', $job_history_data);
                    }
                }


                move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/user_image/' . $this->input->post('user_code') . '.jpg');
                $this->email_model->account_opening_email($this->input->post('email'), $this->input->post('password'));
           return true;
    }
    //EDIT EMPLOYEE
    function edit_employee($user_code = '')
    {
        //bank
        $bank_id = $this->db->get_where('user',array('user_code'=>$user_code))->row()->bank_id;
        $data['name']                   = $this->input->post('bank_name');
        $data['branch']                 = $this->input->post('branch');
        $data['account_holder_name']    = $this->input->post('account_holder_name');
        $data['account_number']         = $this->input->post('account_number');
        $this->db->where('bank_id',$bank_id);
        $this->db->update('bank',$data);
        $bank_id = $this->db->insert_id();

        //document
        if($_FILES['resume']['name'] != '' || $_FILES['offer_letter']['name'] != '' || $_FILES['joining_letter']['name'] != '' || $_FILES['contract_agreement']['name'] != '' || $_FILES['others']['name'] != '') {

            if($_FILES['resume']['name'] != '')
                $data3['resume'] = $user_code . '_' . $_FILES['resume']['name'];
            if($_FILES['offer_letter']['name'] != '')
                $data3['offer_letter'] = $user_code . '_' . $_FILES['offer_letter']['name'];
            if($_FILES['joining_letter']['name'] != '')
                $data3['joining_letter'] = $user_code . '_' . $_FILES['joining_letter']['name'];
            if($_FILES['contract_agreement']['name'] != '')
                $data3['contract_agreement'] = $user_code . '_' . $_FILES['contract_agreement']['name'];
            if($_FILES['others']['name'] != '')
                $data3['others'] = $user_code . '_' . $_FILES['others']['name'];

            $document_id = $this->db->get_where('user', array('user_code' => $user_code))->row()->document_id;

            if($document_id == 0) {
                $this->db->insert('document', $data3);
                $document_id = $this->db->insert_id();
            } else
                $this->db->update('document', $data3, array('document_id' => $document_id));


            if($_FILES['resume']['name'] != '')
                move_uploaded_file($_FILES['resume']['tmp_name'], 'uploads/document/resume/' . $data3['resume']);
            if($_FILES['offer_letter']['name'] != '')
                move_uploaded_file($_FILES['offer_letter']['tmp_name'], 'uploads/document/offer_letter/' . $data3['offer_letter']);
            if($_FILES['joining_letter']['name'] != '')
                move_uploaded_file($_FILES['joining_letter']['tmp_name'], 'uploads/document/joining_letter/' . $data3['joining_letter']);
            if($_FILES['contract_agreement']['name'] != '')
                move_uploaded_file($_FILES['contract_agreement']['tmp_name'], 'uploads/document/contract_agreement/' . $data3['contract_agreement']);
            if($_FILES['others']['name'] != '')
                move_uploaded_file($_FILES['others']['tmp_name'], 'uploads/document/others/' . $data3['others']);

            $data2['document_id'] = $document_id;
        }

        //user
        $data2['name']                  = $this->input->post('name');
        $data2['father_name']           = $this->input->post('father_name');
        $data2['date_of_birth']         = strtotime($this->input->post('date_of_birth'));
        $data2['gender']                = $this->input->post('gender');
        $data2['phone']                 = $this->input->post('phone');
        $data2['local_address']         = $this->input->post('local_address');
        $data2['permanent_address']     = $this->input->post('permanent_address');
        $data2['nationality']           = $this->input->post('nationality');
        $data2['martial_status']        = $this->input->post('martial_status');
        $data2['email']                 = $this->input->post('email');
        $data2['department_id']         = $this->input->post('department_id');
        $data2['designation_id']        = $this->input->post('designation_id');
        $data2['date_of_joining']       = strtotime($this->input->post('date_of_joining'));
        $data2['joining_salary']        = $this->input->post('joining_salary');
        $data2['date_of_leaving']       = strtotime($this->input->post('date_of_leaving'));
        $data2['status']                = $this->input->post('status');

        $this->db->where('user_code',$user_code);
        $this->db->update('user',$data2);
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/user_image/' . $user_code . '.jpg');

        return true;
    }

    //DELETE EMPLOYEE
    function delete_employee($user_code) {
        $user = $this->db->get_where('user',array('user_code'=>$user_code));
        $bank_id = $user->row()->bank_id;
        $this->db->where('bank_id',$bank_id);
        $this->db->delete('bank');
        $document_id = $user->row()->document_id;
        $document = $this->db->get_where('document',array('document_id'=>$document_id));

        $this->db->where('document_id',$document_id);
        $this->db->delete('document');
        if (file_exists('uploads/user_image/' . $user_code . '.jpg'))
        unlink('uploads/user_image/'.$user_code.'.jpg');
        $this->db->where('user_code',$user_code);
        $this->db->delete('user');
        return true;
    }
	
	    //CREATE EMPLEADO
    function create_empleado() 
	{
               
                //Empleado
				$data2['EMP_CEDULA']                  		= $this->input->post('documento');
				$data2['EMP_TIPO_CEDULA']                  	= 'C';
				$data2['PAIS_CODIGO']                  		= 1;
                $data2['EMP_DEPENDENCIA']                   = $this->input->post('dependencia_id');
                $data2['EMP_CIUDAD_CEDULA']           		= $this->input->post('munnac');
                $data2['EMP_APELLIDOS']         			= $this->input->post('apellidos');
                $data2['EMP_NOMBRES']                		= $this->input->post('nombres');
                $data2['EMP_FECHA_NACIMIENTO']              = $this->input->post('fecnac');
                $data2['EMP_MUNICIPIO_NACIMIENTO']          = $this->input->post('munnac');
                $data2['EMP_PAIS_NACIMIENTO']     			= 1;
                $data2['EMP_DEPTO_NACIMIENTO']           	= $this->input->post('depnac');
                $data2['EMP_MUNICIPIO_RESIDENCIA']        	= $this->input->post('munres');
                $data2['EMP_DEPTO_RESIDENCIA']              = $this->input->post('depres');
                $data2['EMP_PAIS_RESIDENCIA']            	= 1;
                $data2['EMP_DIRECCION_EMP']            		= $this->input->post('dirres');
                $data2['EMP_TELEFONOS_EMP']         		= $this->input->post('telefono');
                $data2['EMP_BARRIO']        				= 1;
                $data2['EMP_SEXO_EMP']      				= $this->input->post('sexo');
                $data2['EMP_ESTADO_CIVIL']      		    = $this->input->post('estadoc');
                $data2['EMP_PENSION']       				= $this->input->post('pension_id');
                $data2['EMP_CESANTIA']                		= $this->input->post('cesantia_id');
				$data2['EMP_SALUD']                			= $this->input->post('eps_id');
				$data2['EMP_FECHA_INGRESO']                 = $this->input->post('fechaentrada');
				$data2['EMP_CUADRO_PLANTA']                 = $this->input->post('proyecto_id');
				$data2['EMP_TIPO_HV']               		= $this->input->post('tiponomina_id');
				$data2['EMAIL']                				= $this->input->post('email');
				$data2['EMP_CARGO']                			= $this->input->post('cargo_id');
				$data2['EMP_ETNIA']                			= $this->input->post('etnia_id');
				$data2['EMP_DISCAPACIDAD']                	= $this->input->post('discapacidad');
				$data2['EMP_EXTENSION']               		= $this->input->post('tipovinculacion_id');
				
				$this->db->insert('empleado',$data2);
			}
  
    //EDIT EMPLEADO
    function edit_empleado($user_code = '')
    {

        //DATOS DEL EMPLEADO
		$data2['EMP_CEDULA']                  		= $this->input->post('documento');
		$data2['EMP_TIPO_CEDULA']                  	= 'C';
		$data2['PAIS_CODIGO']                  		= 1;
		$data2['EMP_DEPENDENCIA']                   = $this->input->post('dependencia_id');
		$data2['EMP_CIUDAD_CEDULA']           		= $this->input->post('munnac');
		$data2['EMP_APELLIDOS']         			= $this->input->post('apellidos');
		$data2['EMP_NOMBRES']                		= $this->input->post('nombres');
		$data2['EMP_FECHA_NACIMIENTO']              = $this->input->post('fecnac');
		$data2['EMP_MUNICIPIO_NACIMIENTO']          = $this->input->post('munnac');
		$data2['EMP_PAIS_NACIMIENTO']     			= 1;
		$data2['EMP_DEPTO_NACIMIENTO']           	= $this->input->post('depnac');
		$data2['EMP_MUNICIPIO_RESIDENCIA']        	= $this->input->post('munres');
		$data2['EMP_DEPTO_RESIDENCIA']              = $this->input->post('depres');
		$data2['EMP_PAIS_RESIDENCIA']            	= 1;
		$data2['EMP_DIRECCION_EMP']            		= $this->input->post('dirres');
		$data2['EMP_TELEFONOS_EMP']         		= $this->input->post('telefono');
		$data2['EMP_BARRIO']        				= 1;
		$data2['EMP_SEXO_EMP']      				= $this->input->post('sexo');
		$data2['EMP_ESTADO_CIVIL']      		    = $this->input->post('estadoc');
		$data2['EMP_PENSION']       				= $this->input->post('pension_id');
		$data2['EMP_CESANTIA']                		= $this->input->post('cesantia_id');
		$data2['EMP_SALUD']                			= $this->input->post('eps_id');
		$data2['EMP_ARL']                			= $this->input->post('arl_id');
		$data2['EMP_FECHA_INGRESO']                 = $this->input->post('fechaentrada');
		$data2['EMP_CUADRO_PLANTA']                 = $this->input->post('proyecto_id');
		$data2['EMP_TIPO_HV']               		= $this->input->post('tiponomina_id');
		$data2['EMP_EXTENSION']               		= $this->input->post('tipovinculacion_id');
		$data2['EMAIL']                				= $this->input->post('email');
		$data2['EMP_CARGO']                			= $this->input->post('cargo_id');
		$data2['EMP_ETNIA']                			= $this->input->post('etnia_id');
		$data2['EMP_DISCAPACIDAD']                	= $this->input->post('discapacidad_id');

        $this->db->where('EMP_CEDULA',$user_code);
        $this->db->update('empleado',$data2);
   
        return true;
    }

    //DELETE EMPLEADO
    function delete_empleado($user_code) {
        $this->db->where('EMP_CEDULA',$user_code);
        $this->db->delete('empleado');
        return true;
    }

	
	
	
	
	
	
    ////////IMAGE URL//////////
    function get_image_url($type = '', $code = '') {
        if (file_exists('uploads/' . $type . '_image/' . $code . '.jpg'))
            $image_url = base_url() . 'uploads/' . $type . '_image/' . $code . '.jpg';
        else
            $image_url = base_url() . 'uploads/user.jpg';

        return $image_url;
    }

    function change_password($user_id) {
        $type                       = $this->session->userdata('login_type');
        $old_password               = $this->input->post('old_password');
        $data = $this->db->get_where($type, array($type.'_id' => $user_id))->result_array();
        foreach ($data as $row) {
            if (sha1($old_password) == $row['password']) {
                $newpassword        = sha1($this->input->post('new_password'));
                $confirmpassword    = sha1($this->input->post('confirm_password'));
                if ($newpassword == $confirmpassword) {
                    $data = array("password" => $newpassword);
                    $this->db->where($type.'_id', $user_id);
                    $this->db->update($type, $data);
                    return true;
                }
            }
            return false;
        }
    }
//verifiy account
    function verify_account($student_id) {
        $data['status']     = 1;
        $this->db->where('student_id' , $student_id);
        $this->db->update('student',$data);
    }

    // AWARD
    function create_award()
    {
        $data['award_code'] = substr(md5(rand(100000000, 20000000000)), 0, 7);
        $data['name']       = $this->input->post('name');
        $data['gift']       = $this->input->post('gift');
        $data['amount']     = $this->input->post('amount');
        $data['user_id']    = $this->input->post('user_id');
        $data['date']       = strtotime($this->input->post('date'));

        $this->db->insert('award',$data);
    }

    function update_award($award_id = '')
    {
        $data['name']       = $this->input->post('name');
        $data['gift']       = $this->input->post('gift');
        $data['amount']     = $this->input->post('amount');
        $data['user_id']    = $this->input->post('user_id');
        $data['date']       = strtotime($this->input->post('date'));

        $this->db->update('award', $data, array('award_id' => $award_id));
    }

    function delete_award($award_id = '')
    {
        $this->db->where('award_id', $award_id);
        $this->db->delete('award');
    }

    // EXPENSE
    function create_expense()
    {
        $data['expense_code'] = substr(md5(rand(100000000, 20000000000)), 0, 7);
        $data['title']          = $this->input->post('title');
        $data['description']    = $this->input->post('description');
        $data['amount']         = $this->input->post('amount');
        $data['date']           = strtotime($this->input->post('date'));

        $this->db->insert('expense',$data);
    }

    function update_expense($expense_id = '')
    {
        $data['title']          = $this->input->post('title');
        $data['description']    = $this->input->post('description');
        $data['amount']         = $this->input->post('amount');
        $data['date']           = strtotime($this->input->post('date'));

        $this->db->update('expense', $data, array('expense_id' => $expense_id));
    }

    function delete_expense($expense_id = '')
    {
        $this->db->where('expense_id', $expense_id);
        $this->db->delete('expense');
    }

    // NOTICEBOARD
    function create_noticeboard()
    {
        $data['noticeboard_code'] = substr(md5(rand(100000000, 20000000000)), 0, 7);
        $data['title']          = $this->input->post('title');
        $data['description']    = $this->input->post('description');
        $data['status']         = $this->input->post('status');
        $data['date']           = strtotime($this->input->post('date'));

        $this->db->insert('noticeboard',$data);
    }

    function update_noticeboard($noticeboard_id = '')
    {
        $data['title']          = $this->input->post('title');
        $data['description']    = $this->input->post('description');
        $data['status']         = $this->input->post('status');
        $data['date']           = strtotime($this->input->post('date'));

        $this->db->update('noticeboard', $data, array('noticeboard_id' => $noticeboard_id));
    }

    function delete_noticeboard($noticeboard_id = '')
    {
        $this->db->where('noticeboard_id', $noticeboard_id);
        $this->db->delete('noticeboard');
    }

    // LEAVE
    function create_leave()
    {
        $data['leave_code']     = substr(md5(rand(100000000, 20000000000)), 0, 7);
        $data['user_id']        = $this->session->userdata('login_user_id');
        $data['start_date']     = strtotime($this->input->post('start_date'));
        $data['end_date']       = strtotime($this->input->post('end_date'));
        $data['reason']         = $this->input->post('reason');

        $this->db->insert('leave',$data);
    }

    function update_leave($leave_id = '')
    {
        $data['start_date']     = strtotime($this->input->post('start_date'));
        $data['end_date']       = strtotime($this->input->post('end_date'));
        $data['reason']         = $this->input->post('reason');

        $this->db->update('leave', $data, array('leave_id' => $leave_id));
    }

    function delete_leave($leave_id = '')
    {
        $this->db->where('leave_id', $leave_id);
        $this->db->delete('leave');
    }

    // PRIVATE MESSAGING
    function send_new_private_message()
    {
        $message = $this->input->post('message');
        $timestamp = strtotime(date("Y-m-d H:i:s"));

        $reciever = $this->input->post('reciever');
        $sender = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');

        //check if the thread between those 2 users exists, if not create new thread
        $num1 = $this->db->get_where('message_thread', array('sender' => $sender, 'reciever' => $reciever))->num_rows();
        $num2 = $this->db->get_where('message_thread', array('sender' => $reciever, 'reciever' => $sender))->num_rows();

        if ($num1 == 0 && $num2 == 0) {
            $message_thread_code = substr(md5(rand(100000000, 20000000000)), 0, 15);
            $data_message_thread['message_thread_code'] = $message_thread_code;
            $data_message_thread['sender'] = $sender;
            $data_message_thread['reciever'] = $reciever;
            $this->db->insert('message_thread', $data_message_thread);
        }
        if ($num1 > 0)
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $sender, 'reciever' => $reciever))->row()->message_thread_code;
        if ($num2 > 0)
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $reciever, 'reciever' => $sender))->row()->message_thread_code;


        $data_message['message_thread_code'] = $message_thread_code;
        $data_message['message'] = $message;
        $data_message['sender'] = $sender;
        $data_message['timestamp'] = $timestamp;
        $this->db->insert('message', $data_message);

        // notify email to email reciever
        //$this->email_model->notify_email('new_message_notification', $this->db->insert_id());

        return $message_thread_code;
    }

    function send_reply_message($message_thread_code)
    {
        $message = $this->input->post('message');
        $timestamp = strtotime(date("Y-m-d H:i:s"));
        $sender = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');


        $data_message['message_thread_code'] = $message_thread_code;
        $data_message['message'] = $message;
        $data_message['sender'] = $sender;
        $data_message['timestamp'] = $timestamp;
        $this->db->insert('message', $data_message);

        // notify email to email reciever
        //$this->email_model->notify_email('new_message_notification', $this->db->insert_id());
    }

    function mark_thread_messages_read($message_thread_code)
    {
        // mark read only the oponnent messages of this thread, not currently logged in user's sent messages
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $this->db->where('sender !=', $current_user);
        $this->db->where('message_thread_code', $message_thread_code);
        $this->db->update('message', array('read_status' => 1));
    }

    function count_unread_message_of_thread($message_thread_code)
    {
        $unread_message_counter = 0;
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $messages = $this->db->get_where('message', array('message_thread_code' => $message_thread_code))->result_array();
        foreach ($messages as $row) {
            if ($row['sender'] != $current_user && $row['read_status'] == '0')
                $unread_message_counter++;
        }
        return $unread_message_counter;
    }

    // VACANCY
    function create_vacancy()
    {
        $data['name']                   = $this->input->post('name');
        $data['number_of_vacancies']    = $this->input->post('number_of_vacancies');
        $data['last_date']              = strtotime($this->input->post('last_date'));

        $this->db->insert('vacancy',$data);
    }

    function update_vacancy($vacancy_id = '')
    {
        $data['name']                   = $this->input->post('name');
        $data['number_of_vacancies']    = $this->input->post('number_of_vacancies');
        $data['last_date']              = strtotime($this->input->post('last_date'));

        $this->db->update('vacancy', $data, array('vacancy_id' => $vacancy_id));
    }

    function delete_vacancy($vacancy_id = '')
    {
        $this->db->where('vacancy_id', $vacancy_id);
        $this->db->delete('vacancy');
    }

	    // CONCEPTO
    function create_concepto()
    {
        $data['CON_NOMBRE']                   = $this->input->post('name');
        $data['CON_TIPO']    = $this->input->post('number_of_vacancies');
        $data['CON_SIGLA']              = strtotime($this->input->post('last_date'));

        $this->db->insert('concepto',$data);
    }

    function update_concepto($vacancy_id = '')
    {
        $data['CON_NOMBRE']                   = $this->input->post('name');
        $data['CON_TIPO']    = $this->input->post('number_of_vacancies');
        $data['CON_SIGLA']              = strtotime($this->input->post('last_date'));

        $this->db->update('concepto', $data, array('CON_CODIGO' => $vacancy_id));
    }

    function delete_concepto($vacancy_id = '')
    {
        $this->db->where('CON_CODIGO', $vacancy_id);
        $this->db->delete('concepto');
    }
	
	
	
    // APPLICATION
    function create_application()
    {
        $data['applicant_name'] = $this->input->post('applicant_name');
        $data['vacancy_id']     = $this->input->post('vacancy_id');
        $data['apply_date']     = strtotime($this->input->post('apply_date'));
        $data['status']         = $this->input->post('status');

        $this->db->insert('application', $data);
    }

    function update_application($application_id = '')
    {
        $old_vacancy_id = $this->db->get_where('application', array('application_id' => $application_id))->row()->vacancy_id;

        $data['applicant_name'] = $this->input->post('applicant_name');
        $data['vacancy_id']     = $this->input->post('vacancy_id');
        $data['apply_date']     = strtotime($this->input->post('apply_date'));
        $data['status']         = $this->input->post('status');

        $this->db->update('application', $data, array('application_id' => $application_id));
    }

    function delete_application($application_id = '')
    {
        $this->db->where('application_id', $application_id);
        $this->db->delete('application');
    }


	
	    //CREAR NOVEDAD
    function create_novedad() {
        $data['EMP_CEDULA']    			= $this->input->post('empleado_id');
        $data['CON_CODIGO']         	= $this->input->post('concepto_id');
        $data['LIQ_CANTIDAD']    		= $this->input->post('cantidad');
        $data['LIQ_FECHA_INI']    	    = $this->input->post('fechai');
        $data['LIQ_FECHA_FIN']   	    = $this->input->post('fechaf');
		$data['LIQ_TIPO_CONCEPTO']      = 'N';
        $data['LIQ_PERIODO']            = $mes;

        $this->db->insert('novedad',$data);
    }
	    //EDITAR NOVEDAD//
    function editar_novedad($department_code = '') {
        $department_id = $this->db->get_where('novedad', array('ENT_CODIGO' => $department_code))->row()->ENT_CODIGO;

        $data['ENT_NOMBRE'] = $this->input->post('nombre');

        $this->db->where('ENT_CODIGO', $department_id);
        $this->db->update('fondo', $data);
	}
	
	
	    //BORRAR  NOVEDAD
    function borrar_novedad($department_code = '') {
        $department_id = $this->db->get_where('novedad',array('ent_codigo'=>$department_code))->row()->ENT_CODIGO;
        $this->db->where('ENT_CODIGO',$department_id);
        $this->db->delete('fondo');
	}	
	
	    //CREAR LIBRANZA
    function create_libranza() {
        $data['EMP_CEDULA']    			= $this->input->post('empleado_id');
        $data['CON_CODIGO']         	= $this->input->post('concepto_id');
        $data['LIQ_VALOR_CONCEPTO']     = $this->input->post('valor');
        $data['LIQ_FECHA_INI']    	    = $this->input->post('fechai');
        $data['LIQ_FECHA_FIN']   	    = $this->input->post('fechaf');
		$data['LIQ_CUOTAS']   	  	    = $this->input->post('cuotas');
		$data['LIQ_NUM_PRESTAMO']       = $this->input->post('numerolibramza');
		$data['COD_ENTIDAD']            = $this->input->post('tercero_id');
		$data['LIQ_TIPO_CONCEPTO']      = 'L';
        $data['LIQ_PERIODO']            = $mes;

        $this->db->insert('novedad',$data);
    }
	    //EDITAR LIBRANZA//
    function editar_libranza($department_code ='')
	{
        $data['EMP_CEDULA']    			= $this->input->post('empleado_id');
        $data['CON_CODIGO']         	= $this->input->post('concepto_id');
        $data['LIQ_VALOR_CONCEPTO']     = $this->input->post('valor');
        $data['LIQ_FECHA_INI']    	    = $this->input->post('fechai');
        $data['LIQ_FECHA_FIN']   	    = $this->input->post('fechaf');
		$data['LIQ_CUOTAS']   	  	    = $this->input->post('cuotas');
		$data['LIQ_NUM_PRESTAMO']       = $this->input->post('numerolibramza');
		$data['COD_ENTIDAD']            = $this->input->post('tercero_id');
		$data['LIQ_TIPO_CONCEPTO']      = 'L';
        $data['LIQ_PERIODO']            = $mes;

       // $this->db->where('COD_ENTIDAD', $entidadn);
		$this->db->where('EMP_CEDULA', $department_code);
        $this->db->update('novedad', $data);
	}

	    //BORRAR  LIBRANZA
    function borrar_libranza($department_code = '') {
        $department_id = $this->db->get_where('novedad',array('ent_codigo'=>$department_code))->row()->ENT_CODIGO;
        $this->db->where('ENT_CODIGO',$department_id);
        $this->db->delete('fondo');
	}



	function get_prenomina() {

        $this->db->select('*', FALSE);
        $this->db->from('cnomina_resumen');
	    //$this->db->where('EMP_TIPO_HV','F');
		$this->db->order_by('EMP_NOMBRES,EMP_APELLIDOS asc');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

	
	function get_nomina() {

        $this->db->select('*', FALSE);
        $this->db->from('cnomina');
	    //$this->db->where('EMP_TIPO_HV','F');
		$this->db->order_by('EMP_APELLIDOS,EMP_NOMBRES,CON_CODIGO_CONCEPTO asc');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

	    //CREAR VACACION
    function create_vacacion() {
	$i = 1;
	$nd=1;
	$fecha_inicio=$this->input->post('fechai');
	$nuevafecha = strtotime ('+0 day', strtotime($fecha_inicio ));
	$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
	
	while ($i <= 15):

		$nuevafecha = strtotime ('+1 day', strtotime($nuevafecha ));
		$nuevafecha = date ( 'Y-m-d' , $nuevafecha );
		
		$this->db->where('fecha',$nuevafecha);
		$esfestivo= $this->db->get('festivo');
	
		$numero_filas=$esfestivo->num_rows();
		if ($numero_filas==0) 
			{
				$i++;
			}
			$nd++;
	//	echo ' registros :'.$numero_filas;
	//	echo ' fecha :'.$nuevafecha;
	//	echo ' Numero dias : '.$nd;
	//	echo ' Contador : '.$i;
	
	endwhile;
		
        $data['EMP_CEDULA']    			= $this->input->post('empleado_id');
        $data['CON_CODIGO']         	= $this->input->post('concepto_id');
        $data['LIQ_VALOR_CONCEPTO']     = $this->input->post('valor');
        $data['LIQ_FECHA_INI']    	    = $this->input->post('fechai');
        $data['LIQ_FECHA_FIN']   	    = $nuevafecha;
		$data['LIQ_TIPO_CONCEPTO']      = 'V';
        $data['LIQ_PERIODO']            = $mes;

        $this->db->insert('novedad',$data);
    }
	    //EDITAR VACACION//
    function editar_vacacion($department_code = '') {
        $department_id = $this->db->get_where('novedad', array('ent_codigo' => $department_code))->row()->ENT_CODIGO;

        $data['ENT_NOMBRE'] = $this->input->post('nombre');

        $this->db->where('ENT_CODIGO', $department_id);
        $this->db->update('fondo', $data);
	}

	    //BORRAR  VACACION
    function borrar_vacacion($department_code = '') {
        $department_id = $this->db->get_where('novedad',array('ent_codigo'=>$department_code))->row()->ENT_CODIGO;
        $this->db->where('ENT_CODIGO',$department_id);
        $this->db->delete('novedad');	
	}


	    //CREAR ENCARGO
    function create_encargo() {
        $data['EMP_CEDULA']    			= $this->input->post('empleado_id');
		$codigo_cargo = $this->db->get_where('empleado', array('EMP_CEDULA' => $this->input->post('empleado_id')))->row()->EMP_CARGO;
        $data['CARGO_ACTUAL']         	= $codigo_cargo;
        $data['CARGO_ASIGNADO']		     = $this->input->post('encargo');
        $data['FECHA_INICIO']    	    = $this->input->post('fechai');
        $data['FECHA_FIN']   	    = $this->input->post('fechaf');
		$data['ESTADO']      = 'ACTIVO';

        $this->db->insert('encargo',$data);
    }
	    //EDITAR ENCARGO//
    function editar_encargo($department_code = '') {
        $department_id = $this->db->get_where('novedad', array('ent_codigo' => $department_code))->row()->ENT_CODIGO;

        $data['ENT_NOMBRE'] = $this->input->post('nombre');

        $this->db->where('ENT_CODIGO', $department_id);
        $this->db->update('fondo', $data);
	}

	    //BORRAR  ENCARGO
    function delete_encargo($empleado = '') {
  
        $this->db->where('EMP_CEDULA',$empleado);
		//$this->db->where('CARGO_ASIGNADO',$encargo);
		$this->db->delete('encargo');
	}


	
	public function GetRow($keyword) 
	{        
		$this->db->order_by('EMP_CEDULA', 'DESC');
		$this->db->like("EMP_NOMBRES", $keyword);
		return $this->db->get('empleado')->result_array();
	}
	
}
