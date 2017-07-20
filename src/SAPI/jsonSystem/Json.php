<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 20/07/2017
 * Time: 18:46
 */

namespace SAPI\jsonSystem;


class Json
{

    /**
     * @param array $array
     * @return string
     */
    public function arrayToJson(array $array){
        return json_encode($array); // ["array" => "teste"] to {"array":"teste"}
    }

    /**
     * @param String $string
     * @return mixed
     */
    public function jsonToArray(String $string){
        return json_decode($string); // {"array":"teste"} to ["array" => "teste"]
    }

}