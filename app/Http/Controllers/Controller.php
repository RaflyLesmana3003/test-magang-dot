<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function task1(Request $request)
    {
        $array = array_map('intval', explode(',', $request->numbers));
        $largest = 0;
        $secondLargest = 0;
        
        foreach($array as $number) {
            
            //If it's greater than the value of max
            if($number > $largest) {
                $secondLargest = $largest;
                $largest = $number;
            }else {
                $secondLargest = $request->numbers;
            }
            
            //If array number is greater than secondMax and less than max
            if($number > $secondLargest && $number < $largest) {
                $secondLargest = $number;
            }else {
                $secondLargest = $request->numbers;
            }
        }
        
        return view('/task1',['number'=> $request->numbers,'secondlargest'=>$secondLargest]);
    }


   //get data from rajaongkir api
   function curl($url)
   {
       
       $curl = curl_init();

       curl_setopt_array($curl, array(
       CURLOPT_URL => $url,
       CURLOPT_RETURNTRANSFER => true,
       CURLOPT_ENCODING => "",
       CURLOPT_MAXREDIRS => 10,
       CURLOPT_TIMEOUT => 30,
       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
       CURLOPT_CUSTOMREQUEST => "GET",
       CURLOPT_HTTPHEADER => array(
           "key: 0df6d5bf733214af6c6644eb8717c92c"
       ),
       ));
       return($curl);
   }


   public function prov(Request $request)
   {
       $curl = $this->curl("https://api.rajaongkir.com/starter/province");
       $response = curl_exec($curl);
       $json = json_decode($response, true);

       $err = curl_error($curl);

       curl_close($curl);

       if ($err) {
       return $err;
       }

       $provinceName = [];
       $matchName = [];

       foreach ($json["rajaongkir"]["results"] as $key => $val) {
           array_push($provinceName,strtolower( $val['province'] ));
        }
        
        $input = preg_quote( strtolower( $request->prov ), '~'); // don't forget to quote input string!
        $result = preg_grep('~' . $input . '~', $provinceName); 
        
        foreach (array_keys($result) as $key) {
            array_push($matchName,$json["rajaongkir"]["results"][$key]);
        }

        return $matchName;
   }
   

   public function city(Request $request)
   {
       //call func curl and send url param
       $curl = $this->curl("https://api.rajaongkir.com/starter/city");

       $response = curl_exec($curl);
       $json = json_decode($response, true);

       $err = curl_error($curl);

       curl_close($curl);

        if ($err) {
        return $err;
        }
 
        $citiesName = [];
        $matchName = [];
 
        foreach ($json["rajaongkir"]["results"] as $key => $val) {
            array_push($citiesName,strtolower( $val['city_name'] ));
         }
         
         $input = preg_quote( strtolower( $request->city ), '~'); // don't forget to quote input string!
         $result = preg_grep('~' . $input . '~', $citiesName); 
         
         foreach (array_keys($result) as $key) {
             array_push($matchName,$json["rajaongkir"]["results"][$key]);
         }
         
         return $matchName;
   }
   
    
}
