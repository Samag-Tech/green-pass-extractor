<?php require_once('../Controller/DataController.php');

    $data = json_decode(file_get_contents('php://input'),true);

if ($data['dataset'] !== '') {

    $controller = new DataController();
    $response = $controller->create($data);

}else{
    die;
}


