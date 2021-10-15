<?php
class DataController {


    public function create($data){
        $arrayRand = $this->getRandom($data);
        return $this->createCsv($arrayRand);
    }

    public function getRandom($dataset){
        $baseData = count(array_filter($dataset)) - 1;
        $arrayRand = [];

        $data25 = $baseData / 4;

        for ($i=0; $i < ceil($data25); $i++) {
            $item = mt_rand(0, $baseData);
            if (!in_array($dataset[$item] , $arrayRand)) {
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

        foreach ($data as $key => $value) {
            if ( is_string($value)) {
                fputcsv($out, [$value]);
            }
            else {
                fputcsv($out, $value);
            }
        }


        $this->download($out);
        fclose($out);
    }

    public function download(){

        header('Content-type: text/csv');
        header('Content-Disposition: attachment; filename=lista.csv');

        readfile("../Download/lista.csv");

    }
}