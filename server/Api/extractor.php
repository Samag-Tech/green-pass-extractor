<?php require_once('../Controller/DataController.php');

    $data = json_decode(file_get_contents('php://input'),true);

if ($data[0] != '') {

    $controller = new DataController();
    $response = $controller->create($data);

}else{
    die;
}


