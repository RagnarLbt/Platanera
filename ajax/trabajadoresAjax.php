<?php
	$peticionAjax=true;

	require_once "../core/configGeneral.php";

	//Axios
	$_POST = json_decode(file_get_contents("php://input"), true);

	if(isset($_POST['option'])){

                require_once "../controladores/trabajadoresControlador.php";
		$intTrabajador= new trabajadoresControlador();

		if(isset($_POST['option']) && $_POST['option'] == 1){
			echo $intTrabajador->registroTrabajadorControlador();
                }

                if(isset($_POST['option']) && $_POST['option'] == 2){
                	$data = $intTrabajador->actualizarTrabajadorControlador();
                }

                if(isset($_POST['option']) && $_POST['option'] == 3){
                	echo $intTrabajador->eliminarTrabajadorControlador();
                }

                if(isset($_POST['option']) && $_POST['option'] == 4){
                	$data = $intTrabajador->listaPeladorControlador();
                }

                if(isset($_POST['option']) && $_POST['option'] == 5){
                	$data = $intTrabajador->listaBolseroControlador();
                }

                if(isset($_POST['option']) && $_POST['option'] == 6){
                	$data = $intTrabajador->listaGeneralControlador();
                }

                print json_encode($data, JSON_UNESCAPED_UNICODE);

	}else{
		session_start(['name'=>'PT']);
		session_destroy();
		echo '<script>window.location.href="'.SERVERURL.'login/"</script>';
	}