<?php
class DataController {

/**
*
*  restituisce la lista dei nomi all'utente
*  @param array $listArray lista nomi
*  @return array;
*
*/
    public function getRandom($listArray){

        /* array finale che verra restituito all'utente */
        $randArr = [];

        /* array di numeri randomici di lunghezza 25% */
        $purifiedList = $this->purifier($listArray);
        $randList = $this->randomNum($purifiedList);

        /* ciclo per inserire in $randArr gli elementi dell'array principale assegnando come chiave ciascuno degli elementi di $randList */
        foreach ($randList as $key => $value) {
            array_push($randArr , $purifiedList[$value]);
        }

        return $randArr;
    }



/**
*
*  permette di eliminare tutti gli spazi vuoti dalla lista inserita dall'utente
*  @param array $listArray lista nomi
*  @return array;
*
*/
    public function purifier($listArray){

        /* array di elementi senza spazi */
        $purifiedArr = [];

        $spacelessArr = $this->purSpace($listArray);

        foreach ($spacelessArr as $key => $value) {

            if (!empty($value)) {
                array_push($purifiedArr , $value);
            }
        }

        return $purifiedArr;
    }


/**
*
*  elimina tutti gli spazi dalla lista e nel caso in cui ci sia piu di uno spazio tra due parole lo riduce a uno
*  @param array $data lista di elementi
*  @return array;
*
*/
public function purSpace($data){

    $spacelessArr = [];

    foreach ($data as $key => $value) {
        $trimmedval = trim($value);
        $singleVal = explode(' ', $trimmedval);


        if ([$singleVal]) {
            $wordConstruct = [];

            foreach ($singleVal as $key => $value) {
                if (!empty($value)) {
                    array_push($wordConstruct , $value);
                }
            }

            $spacelessWord = implode(' ',$wordConstruct);
            array_push($spacelessArr , $spacelessWord);

        }else{
            array_push($spacelessArr , $trimmedval);
        }

    }

    return $spacelessArr;
}


/**
*
*  restituisce una lista randomica delle dimensioni pari al 25% di quella inserita
*  @param array $listArray lista nomi
*  @return array;
*
*/
    public function randomNum($listArray){

        /* variabile contenente il numero di elementi di $listArray */
        $countArray = count(array_filter($listArray));

        /* quantita di elementi da estrarre */
        $quantity = $countArray / 100 * 25;

        /* array che verra popolato dal ciclo a seguire */
        $randomArray = [];


        for ($i=0; $i < ceil($quantity); $i++) {

            /* elemento randomico generato ad ogni ciclo */
            $index = mt_rand(0, $countArray -1);

            /* inserisce l'elemento nell'array solo se non esiste gia */
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

