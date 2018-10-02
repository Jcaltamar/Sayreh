<?php
if (isset($_GET['term'])){
$return_arr = array();
/* If connection to database, run sql statement. */


	/*$fetch = mysqli_query($con,"SELECT * FROM clientes where nombre_cliente like '%" . _GET['term'] . "%' LIMIT 0 ,50"); */
	$empleados= $this->db->get_where('empleado', array('EMP_CEDULA' => $_GET['term']))->result_array();
  echo $_GET['term'];
	/* GUARDAR RESULTADOS EN UN ARRAY.*/
	foreach ($department as $row): 
		$row_array['cedula'] =$row['EMP_CEDULA'];
		$row_array['nombre'] = $row['EMP_NOMBRES'];
		$row_array['apellido']=$row['EMP_APELLIDOS'];
		$row_array['dependencia']=$row['EMP_DEPENDENCIA'];
		$row_array['proyecto']=$row['EMP_CUADRO_PLANTA'];
		array_push($return_arr,$row_array);
    }
	endforeach;
	
}

/* Toss back results as json encoded array. */
echo json_encode($return_arr);

}
?>