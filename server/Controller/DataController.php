<?php
class DataController {


    public function create($data){
        $dataset = $data['dataset'];
        $purifiedData = explode( ' ' ,$dataset);

        $arrayRand = $this->getRandom($purifiedData);

        return $this->createCsv($arrayRand);
    }

    public function getRandom($dataset){
        $baseData = count($dataset);
        $data25 = $baseData / 4;

        $arrayRand = [];
        for ($i=1; $i <= ceil($data25); $i++) {

            $item = mt_rand(0, $baseData -1);

            if(!in_array($item,$arrayRand)){
                array_push($arrayRand ,$dataset[$item]);
            }
            else{
                $i--;
            }
        }
        return $arrayRand;
    }


    public function createCsv($data){
        $out = fopen('../Download/lista.csv', 'w');

        fputcsv($out, $data , "\n");

        $this->download($out);
        fclose($out);
    }

    public function download(){

        header('Content-type: text/csv');
        header('Content-Disposition: attachment; filename=lista.csv');

        readfile("../Download/lista.csv");

    }
}