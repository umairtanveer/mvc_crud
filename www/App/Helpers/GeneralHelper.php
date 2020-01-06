<?php

namespace App\Helpers;

class GeneralHelper
{

    public static function dd($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        exit(0);
    }

    public static function makeJsonResponse($data,$msg,$status){

      $x = 0;
      $output = array();
      while( $row = mysqli_fetch_assoc($data)){
          $output[] = $row;
          $x++;
      }

      if($x <= 0){
        $output[] = "Sorry no record found";
      }

      $response = array(
      'status' => $status,
      'message' => $msg,
      'data' => $output
      );

      return json_encode($response);
    }

}
