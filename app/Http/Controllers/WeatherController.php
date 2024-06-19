<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WeatherController extends Controller
{
    public function index()
    {
        $ch = curl_init();
$url = 'http://apis.data.go.kr/1360000/VilageFcstInfoService_2.0/getUltraSrtNcst'; /*URL*/
$queryParams = '?' . urlencode('serviceKey') . '=axqbCgWHznH2tpVTBE8ZOvabiNvweh5E62C8oKOCWThcM9JguxembRtoaVUOXha0Kcm1E04PmR%2BNbsLpvdgeyQ%3D%3D'; /*Service Key*/
$queryParams .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
$queryParams .= '&' . urlencode('numOfRows') . '=' . urlencode('1000'); /**/
$queryParams .= '&' . urlencode('dataType') . '=' . urlencode('JSON'); /**/
$queryParams .= '&' . urlencode('base_date') . '=' . urlencode('20240619'); /**/
$queryParams .= '&' . urlencode('base_time') . '=' . urlencode('0600'); /**/
$queryParams .= '&' . urlencode('nx') . '=' . urlencode('55'); /**/
$queryParams .= '&' . urlencode('ny') . '=' . urlencode('127'); /**/

curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);

return view('weather', ['data' => $data]);
    
        
    }
}
