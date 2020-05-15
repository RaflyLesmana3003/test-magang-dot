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
    
    // NOTE func task 1

    public function task1(Request $request)
    {
        // get data and convert to array
        $array = array_map('intval', explode(',', $request->numbers));

        // initialize counter
        $largest = 0;
        $secondLargest = 0;
        
        
        foreach($array as $number) {
            
            //if number is  largest than largest variabel 
            if($number > $largest) {
                // then initialize secondlargest as largest
                $secondLargest = $largest;
                $largest = $number;
            }else {
                $secondLargest = $request->numbers;
            }
            
            //If array number is greater than secondlargest and less than largest
            if($number > $secondLargest && $number < $largest) {
                $secondLargest = $number;
            }else {
                $secondLargest = $request->numbers;
            }
        }
        
        return view('/task1',['number'=> $request->numbers,'secondlargest'=>$secondLargest]);
    }


   // NOTE func task 2

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

       // get all data from rajaongkir then get only province name for search 
       foreach ($json["rajaongkir"]["results"] as $key => $val) {
           array_push($provinceName,strtolower( $val['province'] ));
        }
        
        // matching keyword with province name with regex
        $input = preg_quote( strtolower( $request->prov ), '~'); 
        $result = preg_grep('~' . $input . '~', $provinceName); 
        
        // last get a whole province data from search result to get province_id for frontend needs
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

        // get all data from rajaongkir then get only cities name for search 
        foreach ($json["rajaongkir"]["results"] as $key => $val) {
            array_push($citiesName,strtolower( $val['city_name'] ));
         }
         
        // matching keyword with cities name with regex
         $input = preg_quote( strtolower( $request->city ), '~'); 
         $result = preg_grep('~' . $input . '~', $citiesName); 
         
        // last get a whole city data from search result for frontend needs
         foreach (array_keys($result) as $key) {
             array_push($matchName,$json["rajaongkir"]["results"][$key]);
         }
         
         return $matchName;
   }
   
    
}
