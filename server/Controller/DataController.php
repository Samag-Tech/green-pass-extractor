<?php
class DataController {

/**
*
*  restituisce la lista dei nomi all'utente
*  @param array $data lista nomi
*  @return array;
*
*/
    public function getRandom($listArray){

        $randArr = [];
        $randList = $this->randomNum($listArray);

        foreach ($randList as $key => $value) {
            array_push($randArr , $listArray[$value]);
        }

        return $randArr;
    }



/**
*
*  restituisce una lista randomica delle dimensioni pari al 25% di quella inserita
*  @param array $data lista nomi
*  @return array;
*
*/
    public function randomNum($listArray){

        $countArray = count(array_filter($listArray));
        $randomArray = [];
        $quantity = $countArray / 100 * 25;

        for ($i=0; $i < ceil($quantity); $i++) {

            $index = mt_rand(0, $countArray -1);

            if (!in_array($index, $randomArray)) {

                $randomArray[] = $index;
            }
            else{
                $i--;
            }
        }
        return $randomArray;
    }
/**
*
*  crea un file csv inserendo in ogni riga i nomi inseriti nella lista
*  @param array $data lista di elementi
*  @return void;
*
*/
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

/**
*
*  header per permettere al browser di scaricare direttamente il file csv
*
*  @return void;
*
*/
    public function download(){

        header('Content-type: text/csv');
        header('Content-Disposition: attachment; filename=lista.csv');

        readfile("../Download/lista.csv");

    }
}

