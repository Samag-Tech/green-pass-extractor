<?php require_once('../Controller/DataController.php');

    $data = json_decode(file_get_contents('php://input'),true);

if ($data != '') {

    $controller = new DataController();
    $response = $controller->create($data);

}else{
    return json_encode(false);
}