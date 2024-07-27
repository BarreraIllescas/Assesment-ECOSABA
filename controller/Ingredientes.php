<?php 
	require "../DBmanager.php";

	$conn = new DBmanager(); //conexion a la base de datos
	$response['success'] = false;
	

	if(isset($_REQUEST["accion"])){
		$accion = $_REQUEST["accion"];
		switch ($accion) {
			case 'list':
				$res = $conn->select("tb_ingrediente", "1");
				if($res){
					$response['success'] = true;
					$response['ingredientes'] = $res;
				}
				break;
			case 'new':
				$nombre = $_POST['nombre'];
				$descripcion =  $_POST['descripcion'];
				$fecha_ingreso = $_POST['fecha_ingreso'];
				$fecha_vencimiento = $_POST['fecha_vencimiento'];

				$data = "'".$nombre."', '".$descripcion."', '".$fecha_ingreso."', '".$fecha_vencimiento."', '2024-07-25', '	2024-07-27'";
				echo $data;
				
				$res = $conn->save("tb_ingrediente", $data);

				if($res){
					$response['success'] = true;
				}
				break;
			case 'update':

				$id = $_POST['id_ingrediete'];
				echo "ID UPDATE DE CONTROLLER";
				echo $id;
				echo "\n";
				$nombre = $_POST['nombre'];
				$descripcion =  $_POST['descripcion'];
				$fecha_ingreso = $_POST['fecha_ingreso'];
				$fecha_vencimiento = $_POST['fecha_vencimiento'];

				$data = "nombre='".$nombre."', descripcion='".$descripcion."', fecha_ingreso='".$fecha_ingreso."', fecha_vencimiento='".$fecha_vencimiento."', updated_at='2024-07-29'";
				echo $data;
				
				$res = $conn->update("tb_ingrediente", $data, "id_ingrediete=".$id);

				if($res){
					$response['success'] = true;
				}
				break;
			case 'delete':
				$id = $_POST['id_ingrediete'];
				$res = $conn->delete("tb_ingrediente", "id_ingrediete=".$id);
				if($res){
					$response['success'] = true;
				}
				break;
		}
	}



	$conn = null; //se cierra la conexion a la base de datos
	die(json_encode($response)); //convierte la data en json
 ?>