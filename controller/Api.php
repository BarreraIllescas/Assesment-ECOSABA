<?php 
	require "../DBmanager.php";

	$conn = new DBmanager(); //conexion a la base de datos
	$response['success'] = false;
	

	if(isset($_REQUEST["accion"])){
		$accion = $_REQUEST["accion"];
		switch ($accion) {
			case 'list':
				$res = $conn->select("tb_pastel", "1");
				if($res){
					$response['success'] = true;
					$response['pasteles'] = $res;
				}
				break;
			case 'new':
				$nombre = $_POST['nombre'];
				$descripcion =  $_POST['descripcion'];
				$preparado_por = $_POST['preparado_por'];
				$fecha_creacion = $_POST['fecha_creacion'];
				$fecha_vencimiento = $_POST['fecha_vencimiento'];

				$data = "'".$nombre."', '".$descripcion."', ".$preparado_por.", '".$fecha_creacion."', '".$fecha_vencimiento."', '2024-07-25', '	2024-07-27'";
				echo $data;
				
				$res = $conn->save("tb_pastel", $data);

				if($res){
					$response['success'] = true;
				}
				break;
			case 'update':
			echo "METOD UPDATE DE LA API";
				$id = $_POST['id_pastel'];
				$nombre = $_POST['nombre'];
				$descripcion =  $_POST['descripcion'];
				$preparado_por = $_POST['preparado_por'];
				$fecha_creacion = $_POST['fecha_creacion'];
				$fecha_vencimiento = $_POST['fecha_vencimiento'];

				$data = "nombre='".$nombre."', descripcion='".$descripcion."', preparado_por=".$preparado_por.", fecha_creacion='".$fecha_creacion."', fecha_vencimiento='".$fecha_vencimiento."', updated_at='2024-07-29'";
				echo $data;
				
				$res = $conn->update("tb_pastel", $data, "id_pastel=".$id);

				if($res){
					$response['success'] = true;
				}
				break;
			case 'delete':
				$id = $_POST['id_pastel'];
				$res = $conn->delete("tb_pastel", "id_pastel=".$id);
				if($res){
					$response['success'] = true;
				}
				break;
			case 'reporte':
			if (isset($_POST['id_pastel'])) {
				$id = $_POST['id_pastel'];
				$res = $conn->pastel_ingrediente($id);
				if($res){
					$response['success'] = true;
					$response['reportes'] = $res;
				}
			}
			break;
			case 'list_ingredientes':
				$res = $conn->select("tb_ingrediente", "1");
				if($res){
					$response['success'] = true;
					$response['ingredientes'] = $res;
				}
				break;
			case 'addIngred':
				$id_pastel = $_POST['id_pastel'];
				$id_ingrediente =  $_POST['id_ingrediente'];

				$data = $id_pastel.", ".$id_ingrediente;
				echo $data;
				
				$res = $conn->save_pi("tb_pastel_ingrediente", $data);

				if($res){
					$response['success'] = true;
				}
				break;
				
		}
	}



	$conn = null; //se cierra la conexion a la base de datos
	die(json_encode($response)); //convierte la data en json
 ?>