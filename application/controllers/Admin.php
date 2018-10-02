<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 *  date        : 10 February, 2017
 */

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    /*     * *default functin, redirects to login page if no admin logged in yet** */

    // DEFAULT FUNCTION (redirects to login page if no user is logged in)
    public function index() {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($this->session->userdata('admin_login') == 1)
            redirect(base_url() . 'index.php?admin/dashboard', 'refresh');
        $this->load->view('backend/index');
    }

    // DASHBOARD
    function dashboard() {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        $page_data['page_name'] = 'dashboard';
        $page_data['page_title'] = get_phrase('admin_dashboard');
        $this->load->view('backend/index', $page_data);
    }

	
	
    /* ------------------DEPENDENCIA--------------------- */

    function dependencia($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        if ($param1 == 'create') {
            $this->crud_model->crear_dependencia();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'index.php?admin/dependencia/list', 'refresh');
        }

        if ($param1 == 'edit') {
            $department = $this->crud_model->editar_dependencia($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updted_successfully'));
            redirect(base_url() . 'index.php?admin/dependencia/list', 'refresh');
        }
        if ($param1 == 'delete') {
            $department = $this->crud_model->borrar_dependencia($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/dependencia/list', 'refresh');
        }
        if ($param1 == 'list') {
            $page_data['page_name'] = 'dependencia';
            $page_data['page_title'] = get_phrase('dependencia');
            $this->load->view('backend/index', $page_data);
        }
    }

    /* ------------------FONDOS--------------------- */

    function fondo($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        if ($param1 == 'create') {
            $this->crud_model->crear_fondo();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'index.php?admin/fondo/list', 'refresh');
        }

        if ($param1 == 'edit') {
            $department = $this->crud_model->editar_fondo($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updted_successfully'));
            redirect(base_url() . 'index.php?admin/fondo/list', 'refresh');
        }
        if ($param1 == 'delete') {
            $department = $this->crud_model->borrar_fondo($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/fondo/list', 'refresh');
        }
        if ($param1 == 'list') {
            $page_data['page_name'] = 'fondo';
            $page_data['page_title'] = get_phrase('fondo');
            $this->load->view('backend/index', $page_data);
        }
    }

    /* ------------------ARL--------------------- */

    function arl($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        if ($param1 == 'create') {
            $this->crud_model->crear_arl();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'index.php?admin/arl/list', 'refresh');
        }

        if ($param1 == 'edit') {
            $department = $this->crud_model->editar_arl($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Datos actualizados'));
            redirect(base_url() . 'index.php?admin/arl/list', 'refresh');
        }
        if ($param1 == 'delete') {
            $department = $this->crud_model->borrar_arl($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/arl/list', 'refresh');
        }
        if ($param1 == 'list') {
            $page_data['page_name'] = 'arl';
            $page_data['page_title'] = get_phrase('arl');
            $this->load->view('backend/index', $page_data);
        }
    }

    /* ------------------PROYECTO--------------------- */

    function proyecto($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        if ($param1 == 'create') {
            $this->crud_model->crear_proyecto();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'index.php?admin/proyecto/list', 'refresh');
        }
        if ($param1 == 'edit') {
            $department = $this->crud_model->editar_proyecto($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updted_successfully'));
            redirect(base_url() . 'index.php?admin/proyecto/list', 'refresh');
        }
        if ($param1 == 'delete') {
            $department = $this->crud_model->borrar_proyecto($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/proyecto/list', 'refresh');
        }
        if ($param1 == 'list') {
            $page_data['page_name'] = 'proyecto';
            $page_data['page_title'] = get_phrase('Proyectos');
            $this->load->view('backend/index', $page_data);
        }
    }
	

	

 


	
	
    /* ------------------TIPO DE NOMINA--------------------- */

    function tiponomina($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        if ($param1 == 'create') {
            $this->crud_model->crear_tiponomina();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'index.php?admin/tiponomina/list', 'refresh');
        }

        if ($param1 == 'update') {
            $department = $this->crud_model->editar_tiponomina($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updted_successfully'));
            redirect(base_url() . 'index.php?admin/tiponomina/list', 'refresh');
	  /*redirect(base_url() . 'index.php?admin/concepto', 'refresh');*/
        }
        if ($param1 == 'delete') {
            $department = $this->crud_model->borrar_tiponomina($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/tiponomina/list', 'refresh');
        }
        if ($param1 == 'list') {
            $page_data['page_name'] = 'tiponomina';
            $page_data['page_title'] = get_phrase('Tipo Nomina');
            $this->load->view('backend/index', $page_data);
        }
    }


	
    /* ------------------TERCEROS--------------------- */

    function tercero($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        if ($param1 == 'create') {
            $this->crud_model->crear_tercero();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'index.php?admin/tercero/list', 'refresh');
        }

        if ($param1 == 'edit') {
            $department = $this->crud_model->editar_tercero($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updted_successfully'));
            redirect(base_url() . 'index.php?admin/tercero/list', 'refresh');
        }
        if ($param1 == 'delete') {
            $department = $this->crud_model->borrar_tercero($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/tercero/list', 'refresh');
        }
        if ($param1 == 'list') {
            $page_data['page_name'] = 'tercero';
            $page_data['page_title'] = get_phrase('tercero');
            $this->load->view('backend/index', $page_data);
        }
    }
	

	    /* ------------------BANCOS--------------------- */

    function banco($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        if ($param1 == 'create') {
            $this->crud_model->crear_banco();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'index.php?admin/banco/list', 'refresh');
        }

        if ($param1 == 'edit') {
            $department = $this->crud_model->editar_banco($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updted_successfully'));
            redirect(base_url() . 'index.php?admin/banco/list', 'refresh');
        }
        if ($param1 == 'delete') {
            $department = $this->crud_model->borrar_banco($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/banco/list', 'refresh');
        }
        if ($param1 == 'list') {
            $page_data['page_name'] = 'banco';
            $page_data['page_title'] = get_phrase('banco');
            $this->load->view('backend/index', $page_data);
        }
    }

	    /* ------------------CARGOS--------------------- */

    function cargo($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        if ($param1 == 'create') {
            $this->crud_model->crear_cargo();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'index.php?admin/cargo/list', 'refresh');
        }

        if ($param1 == 'edit') {
            $department = $this->crud_model->editar_cargo($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updted_successfully'));
            redirect(base_url() . 'index.php?admin/cargo/list', 'refresh');
        }
        if ($param1 == 'delete') {
            $department = $this->crud_model->borrar_cargo($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/cargo/list', 'refresh');
        }
        if ($param1 == 'list') {
            $page_data['page_name'] = 'cargo';
            $page_data['page_title'] = get_phrase('cargo');
            $this->load->view('backend/index', $page_data);
        }
    }


	
    /* ------------------DEPARTMENT--------------------- */

    function department($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        if ($param1 == 'create') {
            $this->crud_model->create_department();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'index.php?admin/department/list', 'refresh');
        }

        if ($param1 == 'edit') {
            $department = $this->crud_model->edit_department($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updted_successfully'));
            redirect(base_url() . 'index.php?admin/department/list', 'refresh');
        }
        if ($param1 == 'delete') {
            $department = $this->crud_model->delete_department($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/department/list', 'refresh');
        }
        if ($param1 == 'list') {
            $page_data['page_name'] = 'department';
            $page_data['page_title'] = get_phrase('department');
            $this->load->view('backend/index', $page_data);
        }
    }
	
    function delete_designation($designation_id = '')
    {
        $this->db->where('designation_id', $designation_id);
        $this->db->delete('designation');

        echo 'success';
    }

	
	    /* ------------------EMPLEADOS--------------------- */

    function empleado($param1 = '', $param2 = '', $param3 = '') {
        if ($param1 == 'empleado_add') {
            $page_data['page_name'] = 'empleado_add';
            $page_data['page_title'] = get_phrase('add_employee');
            $this->load->view('backend/index', $page_data);
        }

        if ($param1 == 'list') {
            $page_data['DEP_CODIGO_DEPEN'] = 'all';
            $page_data['page_name'] = 'empleado_list';
            $page_data['page_title'] = get_phrase('employee_list');
            $this->load->view('backend/index', $page_data);
        }

        if ($param1 == 'filter') {
            $page_data['DEP_CODIGO_DEPEN'] = $this->input->post('department_id');
            $page_data['page_name']     = 'empleado_list';
            $page_data['page_title']    = get_phrase('employee_list');
            $this->load->view('backend/index', $page_data);
        }

        if ($param1 == 'create') {
            $employee =$this->crud_model->create_empleado();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'index.php?admin/empleado/list', 'refresh');
           
        }
        if ($param1 == 'empleado_edit') {
            $page_data['page_name'] = 'empleado_edit';
            $page_data['user_code'] = $param2;
            $page_data['page_title'] = get_phrase('edit_employee');
            $this->load->view('backend/index', $page_data);
        }

        if ($param1 == 'employee_profile') {
            $page_data['page_name']     = 'empleado_profile';
            $page_data['user_code']     = $param2;
            $page_data['page_title']    = get_phrase('employee_profile');
            $this->load->view('backend/index', $page_data);
        }

        if ($param1 == 'delete') {
            $employee = $this->crud_model->delete_empleado($param2);
            if ($employee == 'true') {
                redirect(base_url() . 'index.php?admin/empleado/list', 'refresh');
            }
            redirect(base_url() . 'index.php?admin/dashboard', 'refresh');
        }
		
        if ($param1 == 'edit') {
            $employee = $this->crud_model->edit_empleado($param2);
            if ($employee == 'true') {
                $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
                redirect(base_url() . 'index.php?admin/empleado/list' , 'refresh');
            }
            redirect(base_url() . 'index.php?admin/dashboard', 'refresh');
        }

        if ($param1 == 'complaint_add') {
            $this->crud_model->add_complaint($param2); // param2 = employee code
            $this->session->set_flashdata('flash_message', get_phrase('complaint_added_successfully'));
            redirect(base_url() . 'index.php?admin/empleado/empleado_profile/' . $param2, 'refresh');
        }

        if ($param1 == 'complaint_edit') {
            $user_code = $this->crud_model->edit_complaint($param2); // param2 = complaints_id
            $this->session->set_flashdata('flash_message', get_phrase('complaint_updated_successfully'));
            redirect(base_url() . 'index.php?admin/empleado/empleado_profile/' . $user_code, 'refresh');
        }
        if ($param1 == 'complaint_delete') {
            $user_code = $this->crud_model->delete_complaint($param2); // param2 = complaints_id
            $this->session->set_flashdata('flash_message', get_phrase('complaint_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/employee/employee_profile/' . $user_code, 'refresh');
        }
    }

	   /* ------------------FINFE EMPLEADOS--------------------- */
	
	
	
    /* ------------------EMPLOYEE--------------------- */

    function employee($param1 = '', $param2 = '', $param3 = '') {
        if ($param1 == 'employee_add') {
            $page_data['page_name'] = 'employee_add';
            $page_data['page_title'] = get_phrase('add_employee');
            $this->load->view('backend/index', $page_data);
        }

        if ($param1 == 'list') {
            $page_data['department_id'] = 'all';
            $page_data['page_name'] = 'employee_list';
            $page_data['page_title'] = get_phrase('employee_list');
            $this->load->view('backend/index', $page_data);
        }

        if ($param1 == 'filter') {
            $page_data['department_id'] = $this->input->post('department_id');
            $page_data['page_name']     = 'employee_list';
            $page_data['page_title']    = get_phrase('employee_list');
            $this->load->view('backend/index', $page_data);
        }

        if ($param1 == 'create') {
            $employee = $this->crud_model->create_employee();
            if ($employee == 'true') {
                $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
                redirect(base_url() . 'index.php?admin/employee/list', 'refresh');
            }
            redirect(base_url() . 'index.php?admin/dashboard', 'refresh');
        }
        if ($param1 == 'employee_edit') {
            $page_data['page_name'] = 'employee_edit';
            $page_data['user_code'] = $param2;
            $page_data['page_title'] = get_phrase('edit_employee');
            $this->load->view('backend/index', $page_data);
        }

        if ($param1 == 'employee_profile') {
            $page_data['page_name']     = 'employee_profile';
            $page_data['user_code']     = $param2;
            $page_data['page_title']    = get_phrase('employee_profile');
            $this->load->view('backend/index', $page_data);
        }

        if ($param1 == 'delete') {
            $employee = $this->crud_model->delete_employee($param2);
            if ($employee == 'true') {
                redirect(base_url() . 'index.php?admin/employee/list', 'refresh');
            }
            redirect(base_url() . 'index.php?admin/dashboard', 'refresh');
        }
        if ($param1 == 'edit') {
            $employee = $this->crud_model->edit_employee($param2);
            if ($employee == 'true') {
                $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
                redirect(base_url() . 'index.php?admin/employee/employee_edit/' . $param2, 'refresh');
            }
            redirect(base_url() . 'index.php?admin/dashboard', 'refresh');
        }

        if ($param1 == 'complaint_add') {
            $this->crud_model->add_complaint($param2); // param2 = employee code
            $this->session->set_flashdata('flash_message', get_phrase('complaint_added_successfully'));
            redirect(base_url() . 'index.php?admin/employee/employee_profile/' . $param2, 'refresh');
        }

        if ($param1 == 'complaint_edit') {
            $user_code = $this->crud_model->edit_complaint($param2); // param2 = complaints_id
            $this->session->set_flashdata('flash_message', get_phrase('complaint_updated_successfully'));
            redirect(base_url() . 'index.php?admin/employee/employee_profile/' . $user_code, 'refresh');
        }
        if ($param1 == 'complaint_delete') {
            $user_code = $this->crud_model->delete_complaint($param2); // param2 = complaints_id
            $this->session->set_flashdata('flash_message', get_phrase('complaint_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/employee/employee_profile/' . $user_code, 'refresh');
        }
    }

    /* ---------------GET DESIGNATION------------ */

    function get_designation($department_id = '')
    {
        $designation = $this->db->get_where('designation', array('department_id' => $department_id))->result_array();
        foreach($designation as $row)
            echo '<option value="' . $row['designation_id'] . '">' . $row['name'] . '</option>';
    }

    // PAYROLL
    /*function payroll()
    {
         $page_data['month'] = $month;
            $page_data['year'] = $year;
            $page_data['page_name'] = 'payroll_create';
            $page_data['page_title'] = get_phrase('create_payroll');
            $this->load->view('backend/index', $page_data);
    }*/


	
	
	
    function nomina()
    {
        $page_data['page_name']     = 'nomina_add';
        $page_data['page_title']    = get_phrase('Liquidar Nomina');
        $this->load->view('backend/index', $page_data);
    }

    function get_empleados($department_id = '')
    {
        $employees = $this->db->get_where('empleado',
            array('EMP_DEPENDENCIA' => $department_id))->result_array();
        foreach($employees as $row)
            echo '<option value="' . $row['EMP_CEDULA'] . '">' . $row['EMP_APELLIDOS'] ." " .$row['EMP_NOMBRES']  . '</option>';
    }


    function nomina_view($department_id = '', $month = '', $ano = '')
    {
		$page_data['department_id'] = $department_id;
		$page_data['month']         = $month;
		$page_data['year']          = $ano;
		$page_data['page_name']     = 'nomina_add_view';
		$page_data['page_title']    = get_phrase('create_payslip');
		$this->load->view('backend/index', $page_data);
	
    }

 function create_nomina()
    {
		$this->db->where('ANO','2018');
        $this->db->delete('lnomina');
		
		/* ---------------TRAER LOS PARAMETROS BASICOS------------ */
		$parbas = $this->db->get('parametro');
		$parametro = $parbas->row();
		$codigosb=$parametro->PA_CODIGO_SUELDO; 
		$valorat=$parametro->PA_VALOR_TRANSPORTE; 
        $codigoat=$parametro->PA_CODIGO_TRANSPORT; 
		$baseat=$parametro->PA_TOPE_ALIM_TRANS; 
		$valoraa=$parametro->PA_VALOR_ALIMENTA; 
        $codigoaa=$parametro->PA_CODIGO_ALIMENTA; 
		$basebonser=$parametro->PA_SUELDO_TOPE_BONIFSERV;
		$sueldominimo=$parametro->PA_SUELDO_MINIMO;
		$valoruvt=$parametro->PA_UVT_ANO;
		$tiponominaliq=$parametro->PA_TIPO_NOMINA;
		$basedev=0;
		$baseded=0;
		$renexc=0;
		$codigosalud=7200;
		$diastrabajados=30;
		$vigencia=2018;
		$mes=$this->db->get_where('parametro', array('PA_REGISTRO_NUMERO' => '1'))->row()->PA_PERIODO;
		
        $d_ini=$this->db->get_where('meses', array('codigo_mes' => $mes))->row()->dia_ini; 
		$d_fin=$this->db->get_where('meses', array('codigo_mes' => $mes))->row()->dia_fin; 
		
		$fechainim=$vigencia.'/'.$mes.'/'.$d_ini;
		$fechafinm=$vigencia.'/'.$mes.'/'.$d_fin;
		
	   // echo $fechainim;
	   // $this->db->where('EMP_TIPO_HV',$tiponominaliq); //filtrar la nomina activa
		$this->db->order_by(EMP_APELLIDOS,EMP_NOMBRES);
		$empleadosliq = $this->db->get('empleado')->result_array();
        foreach($empleadosliq as $row) /*Por cada empleado */
		{
			$vsalud=0;
			$vpension=0;
			$vfs=0;
			$vembrago=0;
			$diasinc=0;
			$basedev=0;
			$baseded=0;
			$ret=0;
			$desh=0;
			
			
			//BUSCAR DIAS VACACIONES
				$query_result = "";
				$empvac ="";		
				$diasv=0;	
				$this->db->select('*', FALSE);
				$this->db->from('novedad');
				$this->db->where('EMP_CEDULA',$row['EMP_CEDULA']);
				$this->db->where('CON_CODIGO','999');
				$query_result = $this->db->get();
				$empvac = $query_result->result_array();
				$valorinc=0;
				foreach($empvac as $rowv)
				{
				 $diasv=$rowv['LIQ_CANTIDAD'];	
				}
				
			
			//BUSCAR INCAPACIDADES
				$this->db->where('EMP_CEDULA',$row['EMP_CEDULA']);
				$empleadoinc = $this->db->get('incapacidad')->result_array();
			        foreach($empleadoinc as $rowi) /*Por cada empleado */
					
					{
						//echo row['EMP_CEDULA'];
						/*agregar salario basico*/
						$data['P_CEDULA']=$row['EMP_CEDULA'];
						$data['ANO']=$vigencia;
						$data['CON_CODIGO_CONCEPTO']=$rowi['CON_CODIGO'];
						$data['CON_CONSECUTIVO']=$row['EMP_CEDULA'];
						$data['PERIODO_NUMERO']=$mes;
						$data['COD_CARGO']=$row['EMP_CUADRO_PLANTA'];
						$cargo=$row['EMP_CARGO'];
						$planta=$row['EMP_CUADRO_PLANTA'];
						$diasinc = abs((strtotime($rowi['LIQ_FECHA_FIN'])-strtotime($rowi['LIQ_FECHA_INI']))/86400)+1;

						//echo 'lA INCAPACIDAD ES :' .$diasinc+1;
						$data['VALOR_CONCEPTO']=$rowi['LIQ_VALOR_LIQ'];
						$valorinc=$rowi['LIQ_VALOR_LIQ'];
						$basedev=$basedev+$rowi['LIQ_VALOR_LIQ'];
						$data['DIAS_TRABAJADOS']=$diasinc;
						$data['COD_DEPEN']=$row['EMP_DEPENDENCIA'];
						$data['COD_ENTIDAD']=$row['EMP_CUADRO_PLANTA'];
						$data['COD_CARGO']=$row['EMP_CARGO'];
						$data['TIPO_CONCEPTO']=$row['EMP_CEDULA'];
						$data['FECHA_PAGO']=$row['EMP_CEDULA'];
						$data['CONSECUTIVO_PRESTAMO']=$row['EMP_CEDULA'];
						$data['TIPO_LIQUIDACION']=$row['EMP_CEDULA'];
						$this->db->insert('lnomina', $data); 	
					}
				
			//BUSCAR ENCARGOS
			    $dife=0;
				$valorenca=0;
				$this->db->where('EMP_CEDULA',$row['EMP_CEDULA']);
				$empleadoenc = $this->db->get('encargo')->result_array();
			        foreach($empleadoenc as $rowE) /*Por cada empleado */
		
					{
					
					$codencargo=$rowE['CARGO_ASIGNADO'];
					$fechaenc = $rowE['FECHA_INICIO'];
					$dateE = strtotime($fechaenc);
					$sueldoenc=$this->traer_sueldo($codencargo);
					//echo 'codigo encargo :'.$codencargo;
					
					$mese= date("m", $dateE); // Month (12)	
					$diae= date("d", $dateE); // Dias (12)
					$dife=31-$diae;
					$valorenca=round((($sueldoenc/30)*$dife),0);
					//echo 'Encargo:'.$dife;
					//echo 'Valor encargo:'.$valorenca;
					}
				
			    /*agregar salario basico*/
				$data['P_CEDULA']=$row['EMP_CEDULA'];
				$data['ANO']=$vigencia;
				$data['CON_CODIGO_CONCEPTO']=$codigosb;
				$data['CON_CONSECUTIVO']=$row['EMP_CEDULA'];
				$data['PERIODO_NUMERO']=$mes;
				$data['COD_CARGO']=$row['EMP_CUADRO_PLANTA'];
				$cargo=$row['EMP_CARGO'];
				$planta=$row['EMP_CUADRO_PLANTA'];
				//echo 'Aqui'.$valorenca;
				if ($valorenca>0) 
					{
						$sueldonor=$this->traer_sueldo($cargo);
						$sueldonor=round(($sueldonor/30)*(30-$dife-$diasv),0);
						//echo 'Sueldo:';
						$sueldo=$sueldon+$valorenca;
					}
	            else
					{					
						$sueldo=$this->traer_sueldo($cargo);
					}
				
				$data['VALOR_CONCEPTO']=round(($sueldo/30)*(30-$diasinc-$diasv),0);
				
				$data['DIAS_TRABAJADOS']=30-$diasinc-$diasv;
				$data['COD_DEPEN']=$row['EMP_DEPENDENCIA'];
				$data['COD_ENTIDAD']=$row['EMP_CUADRO_PLANTA'];
				$data['COD_CARGO']=$row['EMP_CARGO'];
				$data['TIPO_CONCEPTO']=$row['EMP_CEDULA'];
				$data['FECHA_PAGO']=$row['EMP_CEDULA'];
				$data['CONSECUTIVO_PRESTAMO']=$row['EMP_CEDULA'];
				$data['TIPO_LIQUIDACION']=$row['EMP_CEDULA'];
				$this->db->insert('lnomina', $data);
				$basedev=$basedev+round((($sueldo/30*$diasv)/30)*(30-$diasinc),0);
				
			    /*agregar auxilio de transporte*/
							
				$diastrabajados=30-$diasv-$diasinc;			
				if ($sueldo<=1476000 )
				{
					
					$data['P_CEDULA']=$row['EMP_CEDULA'];
					$data['ANO']=$vigencia;
					$data['CON_CODIGO_CONCEPTO']=$codigoat;
					$data['CON_CONSECUTIVO']=$row['EMP_CEDULA'];
					$data['PERIODO_NUMERO']=$mes;
					$data['COD_CARGO']=$row['EMP_CUADRO_PLANTA'];
					$data['VALOR_CONCEPTO']=$valorat/30*$diastrabajados;
					$data['DIAS_TRABAJADOS']=$diastrabajados;
					$data['COD_DEPEN']=$row['EMP_DEPENDENCIA'];
					$data['COD_ENTIDAD']=$row['EMP_CUADRO_PLANTA'];
					$data['COD_CARGO']=$row['EMP_CARGO'];
					$data['TIPO_CONCEPTO']=$row['EMP_CEDULA'];
					$data['FECHA_PAGO']=$row['EMP_CEDULA'];
					$data['CONSECUTIVO_PRESTAMO']=$row['EMP_CEDULA'];
					$data['TIPO_LIQUIDACION']=$row['EMP_CEDULA'];
					$this->db->insert('lnomina', $data);
				}
				
				/*agregar auxilio de alimentacion*/
				
				if ($sueldo<=$baseat )
				{
					
					$data['P_CEDULA']=$row['EMP_CEDULA'];
					$data['ANO']=$vigencia;
					$data['CON_CODIGO_CONCEPTO']=$codigoaa;
					$data['CON_CONSECUTIVO']=$row['EMP_CEDULA'];
					$data['PERIODO_NUMERO']=$mes;
					$data['COD_CARGO']=$row['EMP_CUADRO_PLANTA'];
					$data['VALOR_CONCEPTO']=$valoraa/30*$diastrabajados;
					$data['DIAS_TRABAJADOS']=$diastrabajados;
					$data['COD_DEPEN']=$row['EMP_DEPENDENCIA'];
					$data['COD_ENTIDAD']=$row['EMP_CUADRO_PLANTA'];
					$data['COD_CARGO']=$row['EMP_CARGO'];
					$data['TIPO_CONCEPTO']=$row['EMP_CEDULA'];
					$data['FECHA_PAGO']=$row['EMP_CEDULA'];
					$data['CONSECUTIVO_PRESTAMO']=$row['EMP_CEDULA'];
					$data['TIPO_LIQUIDACION']=$row['EMP_CEDULA'];
					$this->db->insert('lnomina', $data);
				}
					
				
				//bonificacion por servicios				
				$fechaBon = $row['EMP_ULTIMA_BS'];
			
				$date = strtotime($fechaBon);

				$mesb= date("m", $date); // Month (12)

				$bons=0;	
				if ($mesb==$mes) 
					{
					$data['P_CEDULA']=$row['EMP_CEDULA'];
					$data['ANO']=$vigencia;
					$data['CON_CODIGO_CONCEPTO']=800;
					$data['CON_CONSECUTIVO']=$row['EMP_CEDULA'];
					$data['PERIODO_NUMERO']=$mes;
					$data['COD_CARGO']=$row['EMP_CUADRO_PLANTA'];
					if ($sueldo<=$basebonser )
						{
							$data['VALOR_CONCEPTO']=round(($sueldo*0.50),0);
							$bons=round(($sueldo*0.50),0);
						}
					else
						{
						$data['VALOR_CONCEPTO']=round(($sueldo*0.35),0);	
						$bons=round(($sueldo*0.35),0);
						}						
					$data['DIAS_TRABAJADOS']=$diastrabajados;
					$data['COD_DEPEN']=$row['EMP_DEPENDENCIA'];
					$data['COD_ENTIDAD']=$row['EMP_CUADRO_PLANTA'];
					$data['COD_CARGO']=$row['EMP_CARGO'];
					$data['TIPO_CONCEPTO']=$row['EMP_CEDULA'];
					$data['FECHA_PAGO']=$row['EMP_CEDULA'];
					$data['CONSECUTIVO_PRESTAMO']=$row['EMP_CEDULA'];
					$data['TIPO_LIQUIDACION']=$row['EMP_CEDULA'];
					$this->db->insert('lnomina', $data);
					$basedev=$basedev+$bons;
					}
					
				 //Salud
				{
					
					$data['P_CEDULA']=$row['EMP_CEDULA'];
					$data['ANO']=$vigencia;
					$data['CON_CODIGO_CONCEPTO']=7200;
					$data['CON_CONSECUTIVO']=$row['EMP_CEDULA'];
					$data['PERIODO_NUMERO']=$mes;
					$data['COD_CARGO']=$row['EMP_CUADRO_PLANTA'];
					$vsalud=round(((($sueldo/30*$diastrabajados)+$valorinc+$bons)*0.04),0);
					$vsalud=ceil($vsalud/100);
					$vsalud=$vsalud*100;
					$baseded=$baseded+$vsalud;
					$data['VALOR_CONCEPTO']=$vsalud;
					$data['DIAS_TRABAJADOS']=$diastrabajados;
					$data['COD_DEPEN']=$row['EMP_DEPENDENCIA'];
					$data['COD_ENTIDAD']=$row['EMP_CUADRO_PLANTA'];
					$data['COD_CARGO']=$row['EMP_CARGO'];
					$data['TIPO_CONCEPTO']=$row['EMP_CEDULA'];
					$data['FECHA_PAGO']=$row['EMP_CEDULA'];
					$data['CONSECUTIVO_PRESTAMO']=$row['EMP_CEDULA'];
					$data['TIPO_LIQUIDACION']=$row['EMP_CEDULA'];
					$this->db->insert('lnomina', $data);
				}
				
				{
					//pension
					$data['P_CEDULA']=$row['EMP_CEDULA'];
					$data['ANO']=$vigencia;
					$data['CON_CODIGO_CONCEPTO']=5201;
					$data['CON_CONSECUTIVO']=$row['EMP_CEDULA'];
					$data['PERIODO_NUMERO']=$mes;
					$data['COD_CARGO']=$row['EMP_CUADRO_PLANTA'];
					$vpension=round(((($sueldo/30*$diastrabajados)+$valorinc+$bons)*0.04),0);
					$vpension=ceil($vpension/100);
					$vpension=$vpension*100;
					$baseded=$baseded+$vpension;
					$data['VALOR_CONCEPTO']=$vpension;
					$data['DIAS_TRABAJADOS']=$diastrabajados;
					$data['COD_DEPEN']=$row['EMP_DEPENDENCIA'];
					$data['COD_ENTIDAD']=$row['EMP_CUADRO_PLANTA'];
					$data['COD_CARGO']=$row['EMP_CARGO'];
					$data['TIPO_CONCEPTO']=$row['EMP_CEDULA'];
					$data['FECHA_PAGO']=$row['EMP_CEDULA'];
					$data['CONSECUTIVO_PRESTAMO']=$row['EMP_CEDULA'];
					$data['TIPO_LIQUIDACION']=$row['EMP_CEDULA'];
					$this->db->insert('lnomina', $data);
				}
				
				if ((($sueldo/30*$diastrabajados)+$valorinc+$bons)>=2950868) //Fondo de solidaridad
				{
					
					$data['P_CEDULA']=$row['EMP_CEDULA'];
					$data['ANO']=$vigencia;
					$data['CON_CODIGO_CONCEPTO']=6200;
					$data['CON_CONSECUTIVO']=$row['EMP_CEDULA'];
					$data['PERIODO_NUMERO']=$mes;
					$data['COD_CARGO']=$row['EMP_CUADRO_PLANTA'];
					$vfs=round(((($sueldo/30*$diastrabajados)+$valorinc+$bons)*0.01),0);
					$vfs=ceil($vfs/100);
					$vfs=$vfs*100;
					$baseded=$baseded+$vfs;
					$data['VALOR_CONCEPTO']=$vfs;
					$data['DIAS_TRABAJADOS']=$diastrabajados;
					$data['COD_DEPEN']=$row['EMP_DEPENDENCIA'];
					$data['COD_ENTIDAD']=$row['EMP_CUADRO_PLANTA'];
					$data['COD_CARGO']=$row['EMP_CARGO'];
					$data['TIPO_CONCEPTO']=$row['EMP_CEDULA'];
					$data['FECHA_PAGO']=$row['EMP_CEDULA'];
					$data['CONSECUTIVO_PRESTAMO']=$row['EMP_CEDULA'];
					$data['TIPO_LIQUIDACION']=$row['EMP_CEDULA'];
					$this->db->insert('lnomina', $data);
				}			


				
				
				
				/*Agregar Novedades */
				$query_result = "";
				$empnovedad ="";				
				$this->db->select('*', FALSE);
				$this->db->from('novedad');
				$this->db->where('EMP_CEDULA',$row['EMP_CEDULA']);
				$query_result = $this->db->get();
				$empnovedad = $query_result->result_array();
		
			   //$empnovedad = $this->db->get_where('novedad', array('EMP_CEDULA' => $row['EMP_CEDULA']))->result_array();

			   foreach($empnovedad as $rown) /*Por cada empleado */
				   {	
						$conpor = $this->db->get_where('concepto', array('CON_CODIGO' => $rown[CON_CODIGO]))->row()->CON_FACTOR;
						$tipocaptura = $this->db->get_where('concepto', array('CON_CODIGO' => $rown[CON_CODIGO]))->row()->CON_CAPTURA;
						$tipoliq = $this->db->get_where('concepto', array('CON_CODIGO' => $rown[CON_CODIGO]))->row()->CON_OPERACION;
						$tipocon = $this->db->get_where('concepto', array('CON_CODIGO' => $rown[CON_CODIGO]))->row()->CON_TIPO;
						
	
						if (($rown[CON_CODIGO]==997 or $rown[CON_CODIGO]==996 or $rown[CON_CODIGO]==995 or $rown[CON_CODIGO]==994 or $rown[CON_CODIGO]==993 or $rown[CON_CODIGO]==992 or $rown[CON_CODIGO]==991 or $rown[CON_CODIGO]==990  or $rown[CON_CODIGO]==989 or $rown[CON_CODIGO]==10005) and $rown[LIQ_TIPO_CONCEPTO]=='N' and $tipocaptura='VALOR')//novedades por procentaje
						{	
							$data['P_CEDULA']=$rown['EMP_CEDULA'];
							$data['ANO']=$vigencia;
							$data['CON_CODIGO_CONCEPTO']=$rown['CON_CODIGO'];
							$data['CON_CONSECUTIVO']=$row['EMP_CEDULA'];
							$data['PERIODO_NUMERO']=$mes;
							$data['COD_CARGO']=$row['EMP_CUADRO_PLANTA'];
							$cargo=$row['EMP_CARGO'];
							$planta=$row['EMP_CUADRO_PLANTA'];
							$sueldo=$this->traer_sueldo($cargo);
							$data['VALOR_CONCEPTO']=round($rown['LIQ_CANTIDAD'],0);
							if ($tipocon='DEVENGADO')
								{
								$basedev=$basedev+round($sueldo*$conpor,0);
								}
							$data['DIAS_TRABAJADOS']=$diastrabajados;
							$data['COD_DEPEN']=$row['EMP_DEPENDENCIA'];
							$data['COD_ENTIDAD']=$row['EMP_CUADRO_PLANTA'];
							$data['COD_CARGO']=$row['EMP_CARGO'];
							$data['TIPO_CONCEPTO']='DEDUCIDO';
							$data['FECHA_PAGO']=$row['EMP_CEDULA'];

							$this->db->insert('lnomina', $data);   
							//echo "2";
						} 
						
	
						
						if ($rown[CON_CODIGO]==998 and $rown[LIQ_TIPO_CONCEPTO]=='N' and $tipocaptura='VALOR')
						{	
							$data['P_CEDULA']=$rown['EMP_CEDULA'];
							$data['ANO']=$vigencia;
							$data['CON_CODIGO_CONCEPTO']=$rown['CON_CODIGO'];
							$data['CON_CONSECUTIVO']=$row['EMP_CEDULA'];
							$data['PERIODO_NUMERO']=$mes;
							$data['COD_CARGO']=$row['EMP_CUADRO_PLANTA'];
							$cargo=$row['EMP_CARGO'];
							$planta=$row['EMP_CUADRO_PLANTA'];
							$data['VALOR_CONCEPTO']=$rown['LIQ_CANTIDAD'];
								
							$data['DIAS_TRABAJADOS']=$diastrabajados;
							$data['COD_DEPEN']=$row['EMP_DEPENDENCIA'];
							$data['COD_ENTIDAD']=$row['EMP_CUADRO_PLANTA'];
							$data['COD_CARGO']=$row['EMP_CARGO'];
							$data['TIPO_CONCEPTO']='DEDUCIDO';
							$data['FECHA_PAGO']=$row['EMP_CEDULA'];
							$data['CONSECUTIVO_PRESTAMO']=$rown['CON_CONSECUTIVO_PRESTAMO'];
							$data['COD_ENTIDAD']=$rown['COD_ENTIDAD'];
							$this->db->insert('lnomina', $data);   
							//echo "1";
						}						
						
						//echo $conpor;
						//echo $sueldo=$this->traer_sueldo($cargo,$planta);
						if ($rown[LIQ_TIPO_CONCEPTO]=='L')
						{	
							$data['P_CEDULA']=$rown['EMP_CEDULA'];
							$data['ANO']=$vigencia;
							$data['CON_CODIGO_CONCEPTO']=$rown['CON_CODIGO'];
							$data['CON_CONSECUTIVO']=$row['EMP_CEDULA'];
							$data['PERIODO_NUMERO']=$mes;
							$data['COD_CARGO']=$row['EMP_CUADRO_PLANTA'];
							$cargo=$row['EMP_CARGO'];
							$planta=$row['EMP_CUADRO_PLANTA'];
							//$sueldo=$this->traer_sueldo($cargo);
							if ($rown['LIQ_VALOR_CONCEPTO']>0 and $rown['LIQ_CUOTAS']>0) 
								{
								$data['VALOR_CONCEPTO']=$rown['LIQ_VALOR_CONCEPTO']/$rown['LIQ_CUOTAS'];
								}
							else
								{
								$data['VALOR_CONCEPTO']=$rown['LIQ_VALOR_CONCEPTO'];	
								}								
							$data['DIAS_TRABAJADOS']=$diastrabajados;
							$data['COD_DEPEN']=$row['EMP_DEPENDENCIA'];
							$data['COD_ENTIDAD']=$row['EMP_CUADRO_PLANTA'];
							$data['COD_CARGO']=$row['EMP_CARGO'];
							$data['TIPO_CONCEPTO']='DEDUCIDO';
							$data['FECHA_PAGO']=$row['EMP_CEDULA'];
							$data['CONSECUTIVO_PRESTAMO']=$rown['CON_CONSECUTIVO_PRESTAMO'];
							$data['COD_ENTIDAD']=$rown['COD_ENTIDAD'];
							$this->db->insert('lnomina', $data);   
							//echo "1";
						} 
						if ($rown[LIQ_TIPO_CONCEPTO]=='N' and $conpor<>0 and $tipocaptura='PORCENTAJE' and ($rown[CON_CODIGO]==701 or $rown[CON_CODIGO]==704 ))//novedades por procentaje
						{	
							$data['P_CEDULA']=$rown['EMP_CEDULA'];
							$data['ANO']=$vigencia;
							$data['CON_CODIGO_CONCEPTO']=$rown['CON_CODIGO'];
							$data['CON_CONSECUTIVO']=$row['EMP_CEDULA'];
							$data['PERIODO_NUMERO']=$mes;
							$data['COD_CARGO']=$row['EMP_CUADRO_PLANTA'];
							$cargo=$row['EMP_CARGO'];
							$planta=$row['EMP_CUADRO_PLANTA'];
							$sueldo=$this->traer_sueldo($cargo);
							$data['VALOR_CONCEPTO']=round(($sueldo/30*($diastrabajados))*$conpor,0);
							if ($tipocon='DEVENGADO')
								{
								$basedev=$basedev+round($sueldo*$conpor,0);
								}
							$data['DIAS_TRABAJADOS']=$diastrabajados;
							$data['COD_DEPEN']=$row['EMP_DEPENDENCIA'];
							$data['COD_ENTIDAD']=$row['EMP_CUADRO_PLANTA'];
							$data['COD_CARGO']=$row['EMP_CARGO'];
							$data['TIPO_CONCEPTO']='DEDUCIDO';
							$data['FECHA_PAGO']=$row['EMP_CEDULA'];

							$this->db->insert('lnomina', $data);   
							//echo "2";
						} 
						
						if ($rown[LIQ_TIPO_CONCEPTO]=='N' and $conpor<>0 and $tipocaptura='PORCENTAJE' and ($rown[CON_CODIGO]<>999 and $rown[CON_CODIGO]<>701 and $rown[CON_CODIGO]<>704 and $rown[CON_CODIGO]<>998))//novedades por procentaje
						{	
							$data['P_CEDULA']=$rown['EMP_CEDULA'];
							$data['ANO']=$vigencia;
							$data['CON_CODIGO_CONCEPTO']=$rown['CON_CODIGO'];
							$data['CON_CONSECUTIVO']=$row['EMP_CEDULA'];
							$data['PERIODO_NUMERO']=$mes;
							$data['COD_CARGO']=$row['EMP_CUADRO_PLANTA'];
							$cargo=$row['EMP_CARGO'];
							$planta=$row['EMP_CUADRO_PLANTA'];
							$sueldo=$this->traer_sueldo($cargo);
							$data['VALOR_CONCEPTO']=round($sueldo*$conpor,0);
							if ($tipocon='DEVENGADO')
								{
								$basedev=$basedev+round($sueldo*$conpor,0);
								}
							$data['DIAS_TRABAJADOS']=30;
							$data['COD_DEPEN']=$row['EMP_DEPENDENCIA'];
							$data['COD_ENTIDAD']=$row['EMP_CUADRO_PLANTA'];
							$data['COD_CARGO']=$row['EMP_CARGO'];
							$data['TIPO_CONCEPTO']='DEDUCIDO';
							$data['FECHA_PAGO']=$row['EMP_CEDULA'];

							$this->db->insert('lnomina', $data);   
							//echo "2";
						} 	

						if ($tipoliq=='EMBARGOJ') //EMBARGOS JUDICIALES
						{	
							//echo 'Codigo : ' .$rown['CON_CODIGO'];
							$data['P_CEDULA']=$rown['EMP_CEDULA'];
							$data['ANO']=$vigencia;
							$data['CON_CODIGO_CONCEPTO']=$rown['CON_CODIGO'];
							$data['CON_CONSECUTIVO']=$row['EMP_CEDULA'];
							$data['PERIODO_NUMERO']=$mes;
							$data['COD_CARGO']=$row['EMP_CUADRO_PLANTA'];
							$cargo=$row['EMP_CARGO'];
							$planta=$row['EMP_CUADRO_PLANTA'];
							$sueldo=$this->traer_sueldo($cargo);

							$vembargo=round((($sueldo-$vsalud-$vpension-$vfs-$sueldominimo))/5,0);
							$data['VALOR_CONCEPTO']=$vembargo;
							$data['DIAS_TRABAJADOS']=30;
							$data['COD_DEPEN']=$row['EMP_DEPENDENCIA'];
							$data['COD_ENTIDAD']=$row['EMP_CUADRO_PLANTA'];
							$data['COD_CARGO']=$row['EMP_CARGO'];
							$data['TIPO_CONCEPTO']='DEDUCIDO';
							$data['FECHA_PAGO']=$row['EMP_CEDULA'];

							$this->db->insert('lnomina', $data);   
							//echo 'concepto' ."3";
						}  
						
						if ($tipoliq=='EMBARGOA') //EMBARGOS ALIMENTICIOS
						{	
							//echo 'Codigo : ' .$rown['CON_CODIGO'];
							$data['P_CEDULA']=$rown['EMP_CEDULA'];
							$data['ANO']=$vigencia;
							$data['CON_CODIGO_CONCEPTO']=$rown['CON_CODIGO'];
							$data['CON_CONSECUTIVO']=$row['EMP_CEDULA'];
							$data['PERIODO_NUMERO']=$mes;
							$data['COD_CARGO']=$row['EMP_CUADRO_PLANTA'];
							$cargo=$row['EMP_CARGO'];
							$planta=$row['EMP_CUADRO_PLANTA'];
							$sueldo=$this->traer_sueldo($cargo);
							//echo "Valor :".$rown['LIQ_CANTIDAD'];
							$vembargo=round((($sueldo-$vsalud-$vpension-$vfs))*($rown['LIQ_CANTIDAD']/100),0);
							$data['VALOR_CONCEPTO']=$vembargo;
							$data['DIAS_TRABAJADOS']=30;
							$data['COD_DEPEN']=$row['EMP_DEPENDENCIA'];
							$data['COD_ENTIDAD']=$row['EMP_CUADRO_PLANTA'];
							$data['COD_CARGO']=$row['EMP_CARGO'];
							$data['TIPO_CONCEPTO']='DEDUCIDO';
							$data['FECHA_PAGO']=$row['EMP_CEDULA'];

							$this->db->insert('lnomina', $data);   
							//echo 'concepto' ."3";
						}						
						
						
				   }
				   
				/*$renexc=round(($basedev-$baseded)*0.25,0);
				//echo 'BASE DEV:'.$basedev;
				//echo 'BASE DED:'.$baseded;
				//echo 'UVT:'.$basedev;
				
				$baseg=($basedev-$baseded)-$renexc;
				$tuvt=($baseg-$desh)/$valoruvt;
				
				//echo 'BASE:'.$baseg;
				//echo 'uvt:'.$tuvt;
				$desh=0;
				
				if ($row['EMP_NUM_PERSONAS_CARGO']>=1)
					{
						//echo $sueldo;
					if 	(($sueldo*0.10)<1091000)
						{
						//echo 'porcentaje:'.$sueldo;	
						$desh=round($sueldo*0.10,0);	
						//echo 'Valor Descuento'.$desh;
						}
					else
						{
						//echo 'tope'.$sueldo;	
						$desh=1091000;	
						}	
					}
				
				if ($row['EMP_RET_METODO']==2 and $row['EMP_POR_RET']>0)
					{
						if ($row['EMP_CEDULA']=='17807426')
						{
						//echo 'Base ret:'.$baseg;
						//echo 'Hijos:'.$desh;
						//echo 'Uvt:'.$tuvt;
						}
						
					$ret=round(($row['EMP_POR_RET']/100)*($baseg-$desh),0);
					}
				
				
				if ($row['EMP_RET_METODO']==1)
					{
						if ($tuvt>95)
						{	
						// echo 'UVTs:'.$tuvt;
						}
						if ($row['EMP_CEDULA']=='26995424')
						{
						//echo 'Base ret:'.$baseg;
						//echo 'Hijos:'.$desh;
						//echo 'Uvt:'.$tuvt;
						}
						
						if ($tuvt>95 and $tuvt<=150) 
						{
							//19
							$uvtret=(($tuvt-95)*0.19);
							$ret=$uvtret*$valoruvt;
							//echo '19%;'.$ret;
						}
						if ($tuvt>150 and $tuvt<=360) 
						{
							//28
							$uvtret=(($tuvt-150)*0.28)+10;
							$ret=$uvtret*$valoruvt;
							//echo '28%;'.$ret;
						}
						if ($tuvt>360)
						{
							//33
							$uvtret=(($tuvt-360)*0.33)+69;
							$ret=$uvtret*$valoruvt;
							//echo '33%;'.$ret;					
						}
					}	
				


				
				if ($ret>0) //Retencion
				{
					$data['P_CEDULA']=$row['EMP_CEDULA'];
					$data['ANO']=$vigencia;
					$data['CON_CODIGO_CONCEPTO']=5150;
					$data['CON_CONSECUTIVO']=$row['EMP_CEDULA'];
					$data['PERIODO_NUMERO']=$mes;
					$data['COD_CARGO']=$row['EMP_CUADRO_PLANTA'];
					$ret=ceil($ret/100);
					$ret=$ret*100;
					$data['VALOR_CONCEPTO']=round($ret,0);
					$data['DIAS_TRABAJADOS']=$diastrabajados;
					$data['COD_DEPEN']=$row['EMP_DEPENDENCIA'];
					$data['COD_ENTIDAD']=$row['EMP_CUADRO_PLANTA'];
					$data['COD_CARGO']=$row['EMP_CARGO'];
					$data['TIPO_CONCEPTO']=$row['EMP_CEDULA'];
					$data['FECHA_PAGO']=$row['EMP_CEDULA'];
					$data['CONSECUTIVO_PRESTAMO']=$row['EMP_CEDULA'];
					$data['TIPO_LIQUIDACION']=$row['EMP_CEDULA'];
					$this->db->insert('lnomina', $data);
				}	*/   
				//echo 'Empleado: '. $row[EMP_CEDULA].'Fecha VIEJA :'.date('d-m-Y',$row['EMP_ULTIMA_BS']) .' - '.'Fecha Nueva :'.$nuevafecha .' - ';
		}
		/*Buscar Prima especiales si tiene*/
	
			
		/*Buscar Novedades de Devengado*/
		
		/*Buscar Novedades de Deducido*/
		/*Eps*/
		/*Pension*/
		/*Cesantias*/
		
		
        $this->session->set_flashdata('flash_message', get_phrase('Empleado Liquidado Correctamente'));
        redirect(base_url() . 'index.php?admin/nomina_list/filter2/' . $this->input->post('month') . '/' . $this->input->post('year'), 'refresh');
	}
	
	
	
	
	
	/*Busca el sueldo de un cargo especifico*/
	 function traer_sueldo($codigo_cargo='')
	 {
		$this->db->where('CARGO_COMPLETO', $codigo_cargo);
		$salario= $this->db->get('cargo');
		if($salario->num_rows() > 0 )
			{
			$sueldob = $salario->row();
			$salariobasico=$sueldob->CAD_SUELDO_BASICO;
			return $salariobasico;
			}
		else
		{
			return 0;
		}	
	 }


	 /*Busca encargo en el mes indicado*/
	 function traer_codigo_encargo($cedula='',$mes='')
	 {
		$this->db->where('EMP_CEDULA', $cedula);
		$encargo= $this->db->get('encargo');
		if($encargo->num_rows() > 0 )
			{
			$sueldob = $encargo->row();
			$codigoencargo=$sueldob->CAD_SUELDO_BASICO;
			return $salariobasico;
			}
		else
		{
			return 0;
		}	
	 }
	 
	
    public function delete($id=null)
    {
        if(!$id){show_404();}
        $datos=$this->productos_model->getTodosPorId($id);
        if(sizeof($datos)==0){show_404();}
        $this->productos_model->delete($id);
        $this->session->set_flashdata('css','success');
        $this->session->set_flashdata('mensaje','El registro se ha eliminado exitosamente');
        redirect(base_url()."productos");
    }

	
    function nomina_list($param1 = '', $param2 = '', $param3 = '', $param4 = '')
    {
        if($param1 == 'mark_paid') {
            $data['status'] = 1;

            $this->db->update('payroll', $data, array('payroll_id' => $param2));

            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(base_url() . 'index.php?admin/nomina_list/filter2/' . $param3 . '/' . $param4, 'refresh');
        }

        if($param1 == 'filter') {
            $page_data['month'] = $this->input->post('month');
            $page_data['year']  = $this->input->post('year');
        } else {
            $page_data['month'] = date('n');
            $page_data['year']  = date('Y');
        }

        if($param1 == 'filter2') {
            $page_data['month'] = $param2;
            $page_data['year']  = $param3;
        }

        $page_data['page_name']     = 'nomina_list';
        $page_data['page_title']    = get_phrase('payslip_list');
        $this->load->view('backend/index', $page_data);
    }

    function get_empleado($department_id) {
        $page_data['department_id'] = $department_id;
        $this->load->view('backend/admin/nomina_empleado_select', $page_data);
    }

    function manage_attendance()
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $page_data['page_name']     = 'manage_attendance';
        $page_data['page_title']    = get_phrase('manage_attendance');
        $this->load->view('backend/index', $page_data);
    }

    // DAILY ATTENDANCE
    function attendance_selector()
    {
        $data['department_id']  = $this->input->post('department_id');
        $data['date']           = strtotime($this->input->post('date'));

        $query = $this->db->get_where('attendance', array('date' => $data['date']));

        if($data['department_id'] == 'all')
            $employees  = $this->db->get_where('user', array('type' => 2))->result_array();
        else
            $employees = $this->db->get_where('user',
                array('type' => 2, 'department_id' => $data['department_id']))->result_array();

        // NEW ATTENDANCE ENTRY
        if($query->num_rows() < 1)
            foreach($employees as $row)
            {
                $attn_data['attendance_code']   = substr(md5(rand(100000000, 20000000000)), 0, 7);
                $attn_data['user_id']           = $row['user_id'];
                $attn_data['date']              = $data['date'];
                $attn_data['status']            = 1;
                $this->db->insert('attendance', $attn_data);
            }

        // NEW ATTENDANCE ENTRY ONLY FOR NEWLY INSERTED EMPLOYEES
        if($query->num_rows() >= 1)
        {
            $employee_ids_of_attendance = array();
            $attendance = $query->result_array();

            foreach($attendance as $row2)
                array_push($employee_ids_of_attendance, $row2['user_id']);

            foreach($employees as $row)
                if(!in_array($row['user_id'], $employee_ids_of_attendance))
                {
                    $attn_data['attendance_code']   = substr(md5(rand(100000000, 20000000000)), 0, 7);
                    $attn_data['user_id']           = $row['user_id'];
                    $attn_data['date']              = $data['date'];
                    $attn_data['status']            = 1;
                    $this->db->insert('attendance', $attn_data);
                }
        }

        redirect(base_url() . 'index.php?admin/manage_attendance_view/' . $data['department_id'] . '/' . $data['date'], 'refresh');
    }

    function manage_attendance_view($department_id = '', $date = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if($department_id != 'all')
            $department_name = $this->db->get_where('department',
                array('department_id' => $department_id))->row()->name . ' ' . get_phrase('department');
        else
            $department_name = get_phrase('all_employees');

        $page_data['department_id'] = $department_id;
        $page_data['date']          = $date;
        $page_data['page_name']     = 'manage_attendance_view';
        $page_data['page_title']    = get_phrase('manage_attendance_of') . ' ' . $department_name;
        $this->load->view('backend/index', $page_data);
    }

    function attendance_update($department_id = '', $date = '')
    {
        $number_of_attendances = $this->input->post('number_of_attendances');

        for($i = 1; $i <= $number_of_attendances; $i++) {
            $attendance_id      = $this->input->post('attendance_id_' . $i);
            $attendance_status  = $this->input->post('status_' . $attendance_id);

            if($attendance_status == 2)
                $reason = $this->input->post('reason_' . $attendance_id);
            if($attendance_status == 1)
                $reason = '';

            $this->db->where('attendance_id', $attendance_id);
            $this->db->update('attendance', array('status' => $attendance_status, 'reason' => $reason));
        }

        $this->session->set_flashdata('flash_message', get_phrase('attendance_updated'));
        redirect(base_url() . 'index.php?admin/manage_attendance_view/' . $department_id . '/' . $date, 'refresh');
    }

    // ATTENDANCE REPORT
    function attendance_report()
    {
        $page_data['month']         = date('m');
        $page_data['year']          = date('Y');
        $page_data['page_name']     = 'attendance_report';
        $page_data['page_title']    = get_phrase('attendance_report');
        $this->load->view('backend/index', $page_data);
    }

    function attendance_report_selector()
    {
        $data['department_id']  = $this->input->post('department_id');
        $data['year']           = $this->input->post('year');
        $data['month']          = $this->input->post('month');
        redirect(base_url() . 'index.php?admin/attendance_report_view/' . $data['department_id'] . '/' . $data['year'] . '/' . $data['month'], 'refresh');
    }

    function attendance_report_view($department_id = '', $year = '', $month = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if($department_id != 'all')
            $department_name = $this->db->get_where('department',
                array('department_id' => $department_id))->row()->name . ' ' . get_phrase('department');
        else
            $department_name = get_phrase('all_employees');

        $page_data['department_id'] = $department_id;
        $page_data['year']          = $year;
        $page_data['month']         = $month;
        $page_data['page_name']     = 'attendance_report_view';
        $page_data['page_title']    = get_phrase('attendance_report_of') . ' ' . $department_name;
        $this->load->view('backend/index', $page_data);
    }

    function attendance_report_print_view($department_id = '', $year = '', $month = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $page_data['department_id'] = $department_id;
        $page_data['year']          = $year;
        $page_data['month']         = $month;
        $this->load->view('backend/admin/attendance_report_print_view', $page_data);
    }

    // AWARD
    function award($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'create') {
            $award = $this->crud_model->create_award();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'index.php?admin/award', 'refresh');
        }

        if ($param1 == 'update') {
            $this->crud_model->update_award($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(base_url() . 'index.php?admin/award', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->crud_model->delete_award($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/award', 'refresh');
        }

        $page_data['page_name']     = 'award';
        $page_data['page_title']    = get_phrase('awards_list');
        $this->load->view('backend/index', $page_data);
    }

    // EXPENSE
    function expense($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'create') {
            $expense = $this->crud_model->create_expense();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'index.php?admin/expense', 'refresh');
        }

        if ($param1 == 'update') {
            $this->crud_model->update_expense($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(base_url() . 'index.php?admin/expense', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->crud_model->delete_expense($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/expense', 'refresh');
        }

        $page_data['page_name']     = 'expense';
        $page_data['page_title']    = get_phrase('manage_expenses');
        $this->load->view('backend/index', $page_data);
    }

    // NOTICEBOARD
    function noticeboard($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'create') {
            $noticeboard = $this->crud_model->create_noticeboard();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'index.php?admin/noticeboard', 'refresh');
        }

        if ($param1 == 'update') {
            $this->crud_model->update_noticeboard($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(base_url() . 'index.php?admin/noticeboard', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->crud_model->delete_noticeboard($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/noticeboard', 'refresh');
        }

        $page_data['page_name']     = 'noticeboard';
        $page_data['page_title']    = get_phrase('notice_list');
        $this->load->view('backend/index', $page_data);
    }

    // LEAVE
    function leave($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'approve') {
            $data['status'] = 1;

            $this->db->update('leave', $data, array('leave_id' => $param2));

            $this->session->set_flashdata('flash_message', get_phrase('leave_approved_successfully'));
            redirect(base_url() . 'index.php?admin/leave', 'refresh');
        }

        if ($param1 == 'decline') {
            $data['status'] = 2;

            $this->db->update('leave', $data, array('leave_id' => $param2));

            $this->session->set_flashdata('flash_message', get_phrase('leave_declined_successfully'));
            redirect(base_url() . 'index.php?admin/leave', 'refresh');
        }

        if ($param1 == 'delete') {
            $this->crud_model->delete_leave($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/leave', 'refresh');
        }

        $page_data['page_name']     = 'leave';
        $page_data['page_title']    = get_phrase('leave_list');
        $this->load->view('backend/index', $page_data);
    }

    // PRIVATE MESSAGING
    function message($param1 = 'message_home', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'send_new') {
            $message_thread_code = $this->crud_model->send_new_private_message();
            $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
            redirect(base_url() . 'index.php?admin/message/message_read/' . $message_thread_code, 'refresh');
        }

        if ($param1 == 'send_reply') {
            $this->crud_model->send_reply_message($param2);  //$param2 = message_thread_code
            $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
            redirect(base_url() . 'index.php?admin/message/message_read/' . $param2, 'refresh');
        }

        if ($param1 == 'message_read') {
            $page_data['current_message_thread_code'] = $param2;  // $param2 = message_thread_code
            $this->crud_model->mark_thread_messages_read($param2);
        }

        $page_data['message_inner_page_name']   = $param1;
        $page_data['page_name']                 = 'message';
        $page_data['page_title']                = get_phrase('private_messaging');
        $this->load->view('backend/index', $page_data);
    }

	 // PERFILES DE USUARIO
	    function perfil_usuario($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');

        if ($param1 == 'update_profile_info') {
            $data['name']  = $this->input->post('name');
            $data['email'] = $this->input->post('email');

            $this->db->where('user_id', $this->session->userdata('login_user_id'));
            $this->db->update('user', $data);

            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/admin_image/' . $this->session->userdata('login_user_id') . '.jpg');

            $this->session->set_flashdata('flash_message', get_phrase('account_updated'));
            redirect(base_url() . 'index.php?admin/perfil_usuario/', 'refresh');
        }
        if ($param1 == 'change_password') {
            $data['password']             = sha1($this->input->post('password'));
            $data['new_password']         = sha1($this->input->post('new_password'));
            $data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));

            $current_password = $this->db->get_where('user',
                array('user_id' => $this->session->userdata('login_user_id')))->row()->password;

            if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
                $this->db->where('user_id', $this->session->userdata('login_user_id'));
                $this->db->update('user', array('password' => $data['new_password']));

                $this->session->set_flashdata('flash_message', get_phrase('password_updated'));
            } else {
                $this->session->set_flashdata('flash_message', get_phrase('password_mismatch'));
            }
            redirect(base_url() . 'index.php?admin/manage_profile/', 'refresh');
        }

        $page_data['page_name']     = 'manage_profile';
        $page_data['page_title']    = get_phrase('manage_profile');
        $page_data['edit_data']     = $this->db->get_where('user',
            array('user_id' => $this->session->userdata('login_user_id')))->result_array();
        $this->load->view('backend/index', $page_data);
    }
	
    // MANAGE OWN PROFILE AND CHANGE PASSWORD
    function manage_profile($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');

        if ($param1 == 'update_profile_info') {
            $data['name']  = $this->input->post('name');
            $data['email'] = $this->input->post('email');

            $this->db->where('user_id', $this->session->userdata('login_user_id'));
            $this->db->update('user', $data);

            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/admin_image/' . $this->session->userdata('login_user_id') . '.jpg');

            $this->session->set_flashdata('flash_message', get_phrase('account_updated'));
            redirect(base_url() . 'index.php?admin/manage_profile/', 'refresh');
        }
        if ($param1 == 'change_password') {
            $data['password']             = sha1($this->input->post('password'));
            $data['new_password']         = sha1($this->input->post('new_password'));
            $data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));

            $current_password = $this->db->get_where('user',
                array('user_id' => $this->session->userdata('login_user_id')))->row()->password;

            if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
                $this->db->where('user_id', $this->session->userdata('login_user_id'));
                $this->db->update('user', array('password' => $data['new_password']));

                $this->session->set_flashdata('flash_message', get_phrase('password_updated'));
            } else {
                $this->session->set_flashdata('flash_message', get_phrase('password_mismatch'));
            }
            redirect(base_url() . 'index.php?admin/manage_profile/', 'refresh');
        }

        $page_data['page_name']     = 'manage_profile';
        $page_data['page_title']    = get_phrase('manage_profile');
        $page_data['edit_data']     = $this->db->get_where('user',
            array('user_id' => $this->session->userdata('login_user_id')))->result_array();
        $this->load->view('backend/index', $page_data);
    }

    /*****SITE/SYSTEM SETTINGS*********/
    function system_settings($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');

        if ($param1 == 'do_update') {

            $data['description'] = $this->input->post('system_name');
            $this->db->where('type' , 'system_name');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('system_title');
            $this->db->where('type' , 'system_title');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('address');
            $this->db->where('type' , 'address');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('phone');
            $this->db->where('type' , 'phone');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('system_email');
            $this->db->where('type' , 'system_email');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('language');
            $this->db->where('type' , 'language');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('purchase_code');
            $this->db->where('type' , 'purchase_code');
            $this->db->update('settings' , $data);

            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/system_settings/', 'refresh');
        }

        if ($param1 == 'upload_logo') {
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo.png');
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            redirect(base_url() . 'index.php?admin/system_settings/', 'refresh');
        }

        $page_data['page_name']  = 'system_settings';
        $page_data['page_title'] = get_phrase('system_settings');
        $page_data['settings']   = $this->db->get('settings')->result_array();
        $this->load->view('backend/index', $page_data);
    }

    /*****LANGUAGE SETTINGS*********/
    function manage_language($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');

        if ($param1 == 'edit_phrase') {
            $page_data['edit_profile']  = $param2;
        }
        if ($param1 == 'update_phrase') {
            $language   =   $param2;
            $total_phrase   =   $this->input->post('total_phrase');
            for($i = 1 ; $i < $total_phrase ; $i++)
            {
                //$data[$language]  =   $this->input->post('phrase').$i;
                $this->db->where('phrase_id' , $i);
                $this->db->update('language' , array($language => $this->input->post('phrase'.$i)));
            }
            redirect(base_url() . 'index.php?admin/manage_language/edit_phrase/'.$language, 'refresh');
        }
        if ($param1 == 'do_update') {
            $language        = $this->input->post('language');
            $data[$language] = $this->input->post('phrase');
            $this->db->where('phrase_id', $param2);
            $this->db->update('language', $data);
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            redirect(base_url() . 'index.php?admin/manage_language/', 'refresh');
        }
        if ($param1 == 'add_phrase') {
            $data['phrase'] = $this->input->post('phrase');
            $this->db->insert('language', $data);
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            redirect(base_url() . 'index.php?admin/manage_language/', 'refresh');
        }
        if ($param1 == 'add_language') {
            $language = $this->input->post('language');
            $this->load->dbforge();
            $fields = array(
                $language => array(
                    'type' => 'LONGTEXT'
                )
            );
            $this->dbforge->add_column('language', $fields);

            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            redirect(base_url() . 'index.php?admin/manage_language/', 'refresh');
        }
        if ($param1 == 'delete_language') {
            $language = $param2;
            $this->load->dbforge();
            $this->dbforge->drop_column('language', $language);
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));

            redirect(base_url() . 'index.php?admin/manage_language/', 'refresh');
        }
        $page_data['page_name']        = 'manage_language';
        $page_data['page_title']       = get_phrase('manage_language');
        //$page_data['language_phrases'] = $this->db->get('language')->result_array();
        $this->load->view('backend/index', $page_data);
    }

    // VACANCY
    function vacancy($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'create') {
            $vacancy = $this->crud_model->create_vacancy();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'index.php?admin/vacancy', 'refresh');
        }

        if ($param1 == 'update') {
            $this->crud_model->update_vacancy($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(base_url() . 'index.php?admin/vacancy', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->crud_model->delete_vacancy($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/vacancy', 'refresh');
        }

        $page_data['page_name']     = 'vacancy';
        $page_data['page_title']    = get_phrase('Lista de Vacantes');
        $this->load->view('backend/index', $page_data);
    }

	    // CONCEPTO
    function concepto($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'create') {
            $vacancy = $this->crud_model->create_concepto();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'index.php?admin/concepto', 'refresh');
        }

        if ($param1 == 'update') {
            $this->crud_model->update_concepto($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(base_url() . 'index.php?admin/concepto', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->crud_model->delete_vacancy($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/concepto', 'refresh');
        }

        $page_data['page_name']     = 'concepto';
        $page_data['page_title']    = get_phrase('Lista de Conceptos');
        $this->load->view('backend/index', $page_data);
    }
	
	
	
	
    // APPLICATION
    function application($param1 = 'applied', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'create') {
            $status = $this->input->post('status');
            $this->crud_model->create_application();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'index.php?admin/application/' . $status, 'refresh');
        }

        if ($param1 == 'update') {
            $status = $this->input->post('status');
            $this->crud_model->update_application($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(base_url() . 'index.php?admin/application/' . $status, 'refresh');
        }
        if ($param1 == 'delete') {
            $status = $this->db->get_where('application', array('application_id' => $param2))->row()->status;
            $this->crud_model->delete_application($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/application/' . $status, 'refresh');
        }

        if($param1 != 'applied' && $param1 != 'on_review' && $param1 != 'interview' && $param1 != 'offered' && $param1 != 'hired' && $param1 != 'declined')
            $param1 = 'applied';

        $page_data['status']        = $param1;
        $page_data['page_name']     = 'application';
        $page_data['page_title']    = get_phrase('Lista de Aplicantes');
        $this->load->view('backend/index', $page_data);
		
	}
	
	
	    /*****CONFIGURACION GENERAL*********/
    function configuraciongeneral($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');

        if ($param1 == 'do_update') {

            $data['description'] = $this->input->post('system_name');
            $this->db->where('type' , 'system_name');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('system_title');
            $this->db->where('type' , 'system_title');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('address');
            $this->db->where('type' , 'address');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('phone');
            $this->db->where('type' , 'phone');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('system_email');
            $this->db->where('type' , 'system_email');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('language');
            $this->db->where('type' , 'language');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('purchase_code');
            $this->db->where('type' , 'purchase_code');
            $this->db->update('settings' , $data);

            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/configuraciongeneral/', 'refresh');
        }

        if ($param1 == 'upload_logo') {
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo.png');
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            redirect(base_url() . 'index.php?admin/configuraciongeneral/', 'refresh');
        }

        $page_data['page_name']  = 'configuracion_general';
        $page_data['page_title'] = get_phrase('system_settings');
        $page_data['settings']   = $this->db->get('settings')->result_array();
        $this->load->view('backend/index', $page_data);
    }

	
	    // ESTABLECER LA NOMINA ACTUAL
    function establecer_nomina($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');

        if ($param1 == 'update_profile_info') {
            $data['PA_TIPO_NOMINA']  = $this->input->post('tiponomina');
            $data['PA_ANO'] = $this->input->post('vigencia');
			$data['PA_PERIODO'] = $this->input->post('periodo');
			$data['PA_ESTADO_NOMINA'] = $this->input->post('tipoliquidacion');

           
            $this->db->update('parametro', $data);

            $this->session->set_flashdata('flash_message', get_phrase('account_updated'));
            redirect(base_url() . 'index.php?admin/establecer_nomina/', 'refresh');
        }


        $page_data['page_name']     = 'establecer_nomina';
        $page_data['page_title']    = get_phrase('Establecer Nomina Actual');
        $page_data['edit_data']     = $this->db->get_where('parametro')->result_array();
        $this->load->view('backend/index', $page_data);
    }
	
	/*Generar reporte a pdf */
	
	public function nomina_pdf() 
	
	{
       /* $data['expense_list'] = $this->get_expense_list($year, $month);
        $month_name = date('F', strtotime($year . '-' . $month)); // get full name of month by date query                
        $data['monthyaer'] = $month_name . '  ' . $year;*/
        
		$page_data['page_name'] = 'nomina_report_pdf';
        $page_data['page_title'] = get_phrase('Nomina a pdf');
        /* $this->load->view('backend/index', $page_data); */
			
        $this->load->helper('dompdf');
        $viewfile = $this->load->view('backend/index',  $page_data);
        pdf_create($viewfile, 'NOMINA',FALSE);        
    }
	
	

    public function create_pdf() {
  
    // create new PDF document
	/*$this->load->library("Pdf");*/
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
  
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Muhammad Saqlain Arif');
    $pdf->SetTitle('TCPDF Example 001');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
  
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
  
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
  
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    
  
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
  
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  
  
 
    // ---------------------------------------------------------    
  
    // set default font subsetting mode
    $pdf->setFontSubsetting(true);   
  
    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('dejavusans', '', 14, '', true);   
  
    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage(); 
  
    // set text shadow effect
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
  
    
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
  
    // ---------------------------------------------------------    
  
    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
    $pdf->Output('example_001.pdf', 'I');    
  
    //============================================================+
    // END OF FILE
    //============================================================+
    }
	
	
	

	public function borrador_pdf()
    {
	
        $html.='<htmlpageheader name="MyHeader1">
				<div style="text-align: right">My document</div>
				</htmlpageheader>

				<htmlpagefooter name="MyFooter1">
					<table width="100%">
						<tr>
							<td width="33%"><span style="font-weight: bold; font-style: italic;">{DATE j-m-Y}</span></td>
							<td width="33%" align="center" style="font-weight: bold; font-style: italic;">{PAGENO}/{nbpg}</td>
							<td width="33%" style="text-align: right; ">My document</td>
						</tr>
					</table>
				</htmlpagefooter>

				<sethtmlpageheader name="MyHeader1" value="on" show-this-page="1" />
				<sethtmlpagefooter name="MyFooter1" value="on" />';

		
		/*$html.=
		 '<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
		
			<tr>
				<td><strong>CODIGO</strong></td>
				<td><strong>NOMBRE CONCEPTO</strong></td>
				<td><strong>DIAS</strong></td>
				<td><strong>DEVENGADOS</strong></td>
				<td><strong>DEDUCIONES</strong></td>
			</tr>';*/
		$nomina=$this->crud_model->get_nomina();	
		$empleado='';
		$tdevengado=0;
		$tdeducido=0;
		$sw=0;
		foreach ($nomina as $nom)
		{	
		if ($empleado<>$nom->P_CEDULA)
			{
			
			if ($empleado<>'' AND $sw=1) 
				{		

				$html.='
					<tr>
						<td align="center"><strong>...</strong></td>
						<td align="center"><strong>TOTALES</strong></td>
						<td align="right"><strong>'.number_format($tdevengado,0,'.',',').'</strong></td>
						<td align="right"><strong>'.number_format($tdeducido,0,'.',',').'</strong></td>
						<td align="center"><strong>....</strong></td>
					</tr>
					</table>
					<div style="font-size:9pt;text-align:center;font-weight:bold">NETO A PAGAR :'.number_format($netopagar,0,'.',',').' </div>
					<div> <br></div>
					<div><br> </div>
					
					<table cellspacing="0" style="width:100%; text-align: left; font-size: 8pt; border=1;">
					<tr>
						<td font-size:8pt align="left" style="width:20%;">PENSION</td>
						<td font-size:8pt align="left" style="width:20%;">SALUD</td>
						<td font-size:8pt align="left" style="width:20%;">CESANTIAS</td>
						<td font-size:8pt align="left" style="width:20%;">BANCO</td>
						<td font-size:8pt align="left" style="width:20%;">CUENTA</td>
					</tr>
					<tr>
						<td font-size:8pt align="left" style="width:20%;"><strong>'.$nompension.'</strong></td>
						<td font-size:8pt align="left" style="width:20%;"><strong>'.$nomsalud.'</strong></td>
						<td font-size:8pt align="left" style="width:20%;"><strong>'.$nomcesantia.'</strong></td>
						<td font-size:8pt align="left" style="width:20%;"><strong>'.$nombanco.'<strong></td>
						<td font-size:8pt align="left" style="width:20%;"><strong>'.$numcuenta.'<strong></td>
					</tr>					
					</table>
					<div> <br></div>
					<div><br> </div>
					<p align="center">.......................................................................</p>';					
					$sw=1;


					}		
			$html.='</table>';
			$html.='
			<table border="1" width="100%" style=" font-family: sans-serif;">
				<tr>
					<td rowspan=4 align="center">
						<img src="uploads/logo.png" border="0" width="90" height="60" />
					</td>	
						
					<td  align="center" style="color:black; ">
						<span style="font-weight: bold; font-size: 10pt; align=center">CORPORACION AUTONOMA REGIONAL CORPOGUAJIRA</span><br />
						NIT: 892115314-9 <br />
						NOMINA <br />
						DESPRENDIBLE DE PAGO<br />
					 </td>
				</tr>
			</table>';	
			$html.='</table>';
			
						
			$html.='<table cellspacing="0" style="width:100%; text-align: left; font-size: 8pt; border=1;" >
				<tr>
					<td style="width:15%;" >Cedula :'.$nom->P_CEDULA.'</td>
					<td style="width:35%;" >Nombre :'.$nom->EMP_APELLIDOS." ".$nom->EMP_NOMBRES.'</td>
					<td style="width:35%;" >Fecha de Ingreso: '.$nom->EMP_FECHA_INGRESO.'</td>
				</tr>
				<tr>
					<td style="width:15%;" >Codigo Cargo: '.$nom->EMP_CARGO.'</td>
					<td style="width:35%;" >Cargo: '.$nom->CAD_NOMBRE_CARGO.'</td>
					<td style="width:35%;" >Salario Cargo: '.number_format($nom->CAD_SUELDO_BASICO,0,'.',',').'</td>
				</tr>
				<tr>
					<td style="width:15%;" >Encargo: </td>
					<td style="width:35%;" >Codigo Encargo:</td>
					<td style="width:35%;" >Salario Encargo:</td>
				</tr>
			</table>
			<div style="font-size:9pt">PERIODO DE PAGO: 01/01/2018 A 30/01/2018 </div>
			<div style="font-size:9pt;text-align:center;font-weight:bold">Dependencia: '.$nom->DEP_NOMBRE_DEPEN.' </div>
			<div> 
			</div>';
			
			$html.=
				'<table cellspacing="0" style="width:100%; text-align: left; font-size: 8pt; border=1;" >
				<tr>
					<td align="center"><strong>CODIGO</strong></td>
					<td align="center"><strong>NOMBRE CONCEPTO</strong></td>
					<td align="center"><strong>DEVENGADOS</strong></td>
					<td align="center"><strong>DEDUCIONES</strong></td>
					<td align="center"><strong>DIAS</strong></td>
				</tr>';
				$tdevengado=0;
				$tdeducido=0;

			}
		else
		{
			$html.='<p> No Entro </p>';
		}
		
		if ($nom->CON_TIPO=='DEVENGADO')
			{

				$html.='
					<tr>
						<td align="right">'.$nom->CON_CODIGO_CONCEPTO.'</td>
						<td>'.$nom->CON_NOMBRE.'</td>
						<td align="right" >'.number_format($nom->VALOR_CONCEPTO,0,'.',',').'</td>
						<td align="right">'.'0'.'</td>
						<td align="center">'.$nom->DIAS_TRABAJADOS.'</td>
					</tr>';
					$tdevengado=$tdevengado+$nom->VALOR_CONCEPTO;
					
			}
		if ($nom->CON_TIPO=='DEDUCIDO')
			{
				$html.='
					<tr>
						<td align="right">'.$nom->CON_CODIGO_CONCEPTO.'</td>
						<td>'.$nom->CON_NOMBRE.' '.$nom->ETB_NOMBRE.'</td>
						<td align="right">'.'0'.'</td>
						<td align="right">'.number_format($nom->VALOR_CONCEPTO,0,'.',',').'</td>
						<td align="center">'.$nom->DIAS_TRABAJADOS.'</td>
					</tr>';
					$tdeducido=$tdeducido+$nom->VALOR_CONCEPTO;
			}
		$netopagar=$tdevengado-$tdeducido;		
		$nomsalud=$this->traer_nombrefondo($nom->EMP_SALUD);
		$nompension=$this->traer_nombrefondo($nom->EMP_PENSION);
		$nomcesantia=$this->traer_nombrefondo($nom->EMP_CESANTIA);	
		$nombanco=$nom->EMP_BANCO;
		$numcuenta=$nom->EMP_NUM_CUENTA;
		$empleado=$nom->P_CEDULA;
		}

		$this->mpdf=new mPDF('c', 'A4', '','',10,10,10,10,10,10);
		$this->mpdf->mirrorMargins = 1; // Use different Odd/Even headers and footers and mirror margins
		$this->mpdf->useOddEven = 1;
		$this->mpdf->WriteHTML($html);
        $this->mpdf->Output('desprendible.pdf','I');
        exit;	
		

    }	
  
  
  
  	public function prenomina_pdf()
	 //genera la prenona de pago
    {
	
		$nomina=$this->crud_model->get_prenomina();	
		$empleado='';
		$tdevengado=0;
		$tdeducido=0;
		$tneto=0;
		$sw=0;
	
	
	$header = '<!--mpdf
    <htmlpageheader name="letterheader">

        <table border="1" width="100%" style=" font-family: sans-serif;">
            <tr>
				<td rowspan=4 align="center">
					<img src="uploads/logo.png" border="0" width="90" height="60" />
				</td>	
					
                <td  align="center" style="color:black; ">
                    <span style="font-weight: bold; font-size: 14pt; align=center">CORPORACION AUTONOMA REGIONAL CORPOGUAJIRA</span><br />
					NIT: 892115314-9 <br />
                    DEPARTAMENTO DE NOMINA<br />
					NOMINA GENERAL DE INVERSION<br />
                 </td>
			 
                <td align="center" style="text-align: right; vertical-align: top;">
                    Pagina<br /> 
					<span style=" font-size: 9pt;">{PAGENO} de {nbpg} <br /><br/>
					Fecha  <br />{DATE j-m-Y}<br /></span>
                </td>
            </tr>
        </table>

    </htmlpageheader>
	mpdf-->

<style>
    @page {
        margin-top: 3.5cm;
        margin-bottom: 2.5cm;
        margin-left: 2cm;
        margin-right: 2cm;
        header: html_letterheader;		
        footer: html_letterfooter2;
    }
  
    @page :first {
        margin-top: 3.5cm;
        margin-bottom: 2.5cm;
        header: html_letterheader;
        footer: _blank;
        resetpagenum: 1;
    }
  
    @page letterhead {
        margin-top: 3.5cm;
        margin-bottom: 2.5cm;
        margin-left: 2cm;
        margin-right: 2cm;
        footer: html_letterfooter2;
    }
  
    @page letterhead :all {
        margin-top: 3cm;
        margin-bottom: 2.5cm;
        header: html_letterheader;
        footer: _blank;
        resetpagenum: 1;
    }
</style>';
	
	
		
		$html.='<h3>PERIODO DE PAGO : </h3>';
		
	   $html.=
			'<table cellspacing="0" style="width:100%; text-align: left; font-size: 8pt; font-family: sans-serif; " >
			<tr bgcolor="gray">
				<th align="center"><strong>CEDULA</strong></th>
				<th align="center"><strong>NOMBRE CONCEPTO</strong></th>
				<th align="center"><strong> INGRESOS </strong></th>
				<th align="center"><strong> EGRESOS </strong></th>
				<th align="center"><strong>NETO</strong></th>
				<th align="center"><strong>BANCO</strong></th>
				<th align="center"><strong>NRO CUENTA</strong></th>
				<th align="center"><strong>FIRMA</strong></th>
			</tr>';

		foreach ($nomina as $nom)
		{	
		   $neto=$nom->DEVENGADO-$nom->DEDUCIDO;
		   $html.='
				<tr>
					<td align="center">'.$nom->P_CEDULA.'</td>
					<td align="left">'.$nom->EMP_NOMBRES." ".$nom->EMP_APELLIDOS.'</td>
					<td align="center">'.number_format($nom->DEVENGADO,0,'.',',').'</td>
					<td align="center">'.number_format($nom->DEDUCIDO,0,'.',',').'</td>
					<td align="center">'.number_format($neto,0,'.',',').'</td>
					<td align="center">'.$nom->EMP_BANCO.'</td>
					<td align="center">'.$nom->EMP_NUM_CUENTA.'</td>
					<td align="center"><strong>_____________________________________</strong></td>
				</tr>';
				$tdevengado=$tdevengado+$nom->DEVENGADO;
				$tdeducido=$tdeducido+$nom->DEDUCIDO;
				$tneto=$tneto+$neto;
		}
		 $html.='
			<tr bgcolor="gray">
				<th align="center"><strong></strong></th>
				<th align="center"><strong>TOTALES</strong></th>
				<th align="center"><strong>'.number_format($tdevengado,0,'.',',').' </strong></th>
				<th align="center"><strong>'.number_format($tdeducido,0,'.',',').' </strong></th>
				<th align="center"><strong>'.number_format($tneto,0,'.',',').'</strong></th>
				<th align="center"><strong></strong></th>
				<th align="center"><strong></strong></th>
				<th align="center"><strong></strong></th>
			</tr>';
			
		$html.='</table>'; //CERRAR LA TABLA DE LOS DETALLES
		
		   $html.=
			'<table cellspacing="0" style="width:100%; text-align: left; font-size: 10pt; border=1;" >
			<tr >
				<td align="center"><strong></strong></td>
				<td align="center"><strong></strong></td>
				<td align="center"><strong>  </strong></td>
			</tr>			
			<tr >
				<td align="center"><strong>________________________________</strong></td>
				<td align="center"><strong>________________________________</strong></td>
				<td align="center"><strong> ________________________________ </strong></td>
			</tr>			
			<tr >
				<td align="center"><strong>PROFESIONAL ESPECIALIZADO NOMINA</strong></td>
				<td align="center"><strong>COORDINADOR GRUPO DE TALENTO HUMANO</strong></td>
				<td align="center"><strong> SECRETARIO GENERAL </strong></td>
			</tr>
			<tr >
				<td align="center"><strong> </strong></td>
				<td align="center"><strong> </strong></td>
				<td align="center"><strong>  </strong></td>
			</tr>	
			<tr >
				<td align="center"><strong> </strong></td>
				<td align="center"><strong> </strong></td>
				<td align="center"><strong>  </strong></td>
			</tr>				
			<tr> 
				<td align="center">________________________________ </td>
				<td align="center">________________________________ </td>
				<td align="center">________________________________ </td>
			</tr>
			<tr>
				<td align="center"><strong>DIRECTOR GENERAL</strong></td>
				<td align="center"><strong>COORDINADOR GRUPO FINANCIERO</strong></td>
				<td align="center"><strong> TESORERO</strong></td>
			</tr>			
			</table>';	
		
		
		$this->mpdf->SetHTMLHeader();

		$this->mpdf->SetHTMLHeader('
		<div style="text-align: right; font-weight: bold;">
			My document
		</div>');
		$this->mpdf->SetHTMLFooter('
		<table width="100%">
			<tr>
				<td width="33%">{DATE j-m-Y}</td>
				<td width="33%" align="center">{PAGENO}/{nbpg}</td>
				<td width="33%" style="text-align: right;">My document</td>
			</tr>
		</table>');
			


		$this->mpdf=new mPDF('c','letter-L', '','',10,10,10,10,10,10);
		$this->mpdf->mirrorMargins = 1; // Use different Odd/Even headers and footers and mirror margins
		$this->mpdf->useOddEven = 1;
		$this->mpdf->WriteHTML($header);
		$this->mpdf->WriteHTML($html);
        $this->mpdf->Output('prenomina.pdf','I');
        exit;	
		

    }	
  
   
  	function exportar(){
		$page_data['page_name']     = 'reportetcpdf';
        $page_data['page_title']    = get_phrase('Novedades de Nomina');
        $this->load->view('backend/index', $page_data);
		
		/*$data["usuarios"] = $this->pdf->getUsuarios();
        $this->load->vars($data);*/
        /*$this->load->view("reporte_fpdf");	*/
	}
	  
  
  
		/*Busca el sueldo de un cargo especifico*/
		
			
	 function traer_nombreconcepto($codigo_concepto='')
	 {
		$this->db->where('CON_CODIGO', $codigo_concepto);
		$conceptos= $this->db->get('concepto');
		if($conceptos->num_rows() > 0 )
			{
			$sueldob = $conceptos->row();
			$nombreconcepto=$sueldob->CON_NOMBRE;
			return $nombreconcepto;
			}
		else
		{
			return 0;
		}	
	 }  

	 function traer_nombrefondo($codigo_fondo='')
	 {
		$this->db->where('ENT_CODIGO', $codigo_fondo);
		$fondos= $this->db->get('fondo');
		if($fondos->num_rows() > 0 )
			{
			$sueldob = $fondos->row();
			$nombrefondo=$sueldob->ENT_NOMBRE;
			return $nombrefondo;
			}
		else
		{
			return 0;
		}	
	 }  	 
	 
	 
	 
	    // NOVEDAD
    function novedad($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'create') {
            $vacancy = $this->crud_model->create_novedad();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'index.php?admin/novedad', 'refresh');
        }

        if ($param1 == 'update') {
            $this->crud_model->update_novedad($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(base_url() . 'index.php?admin/novedad', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->crud_model->delete_novedad($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/cnovedad', 'refresh');
        }

        $page_data['page_name']     = 'novedad';
        $page_data['page_title']    = get_phrase('Novedades de Nomina');
        $this->load->view('backend/index', $page_data);
    }
	
	    // LIBRANZA
    function libranza($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'create') {
            $vacancy = $this->crud_model->create_libranza();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'index.php?admin/libranza', 'refresh');
        }

        if ($param1 == 'edit') {
            $this->crud_model->editar_libranza($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(base_url() . 'index.php?admin/libranza', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->crud_model->delete_libranza($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/libranza', 'refresh');
        }

        $page_data['page_name']     = 'libranza';
        $page_data['page_title']    = get_phrase('Manejo de Libranzas');
        $this->load->view('backend/index', $page_data);
    }
	
	
	    // VACACION
    function vacacion($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'create') {
            $vacancy = $this->crud_model->create_vacacion();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'index.php?admin/vacacion', 'refresh');
        }

        if ($param1 == 'update') {
            $this->crud_model->update_vacacion($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(base_url() . 'index.php?admin/vacacion', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->crud_model->delete_vacacion($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/vacacion', 'refresh');
        }

        $page_data['page_name']     = 'vacacion';
        $page_data['page_title']    = get_phrase('Manejo de Vacaciones');
        $this->load->view('backend/index', $page_data);
    }	
	
	// ENCARGO
    function encargo($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'create') {
            $vacancy = $this->crud_model->create_encargo();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'index.php?admin/encargo', 'refresh');
        }

        if ($param1 == 'update') {
            $this->crud_model->update_encargo($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(base_url() . 'index.php?admin/encargo', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->crud_model->delete_encargo($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'index.php?admin/encargo', 'refresh');
        }

        $page_data['page_name']     = 'encargo';
        $page_data['page_title']    = get_phrase('Manejo de Encargo');
        $this->load->view('backend/index', $page_data);
    }	
	

	
	public function GetCountryName()
		{
			$keyword=$this->input->post('keyword');
			$data=$this->datacomplete->GetRow($keyword);        
			echo json_encode($data);
		}

	}

