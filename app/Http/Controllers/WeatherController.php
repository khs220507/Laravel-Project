<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WeatherController extends Controller
{
    public function index()
    {

        $baseDate = $currentTime->format('Ymd');
        $currentTime = Carbon::now();
        $baseTime = $currentTime->subHour()->format('H00');

        $ch = curl_init();
$url = 'http://apis.data.go.kr/1360000/VilageFcstInfoService_2.0/getUltraSrtNcst'; /*URL*/
$queryParams = '?' . urlencode('serviceKey') . '=axqbCgWHznH2tpVTBE8ZOvabiNvweh5E62C8oKOCWThcM9JguxembRtoaVUOXha0Kcm1E04PmR%2BNbsLpvdgeyQ%3D%3D'; /*Service Key*/
$queryParams .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
$queryParams .= '&' . urlencode('numOfRows') . '=' . urlencode('1000'); /**/
$queryParams .= '&' . urlencode('dataType') . '=' . urlencode('JSON'); /**/
$queryParams = '&' . urlencode('base_date') . '=' . urlencode($baseDate);
$queryParams = '&' . urlencode('base_time') . '=' . urlencode($baseTime);
$queryParams .= '&' . urlencode('nx') . '=' . urlencode('55'); /**/
$queryParams .= '&' . urlencode('ny') . '=' . urlencode('127'); /**/

curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);

        // Filter T1H and REH categories
        $t1hValue = null;
        $rehValue = null;
        foreach ($data['response']['body']['items']['item'] as $item) {
            if ($item['category'] === 'T1H') {
                $t1hValue = $item['obsrValue'];
            } elseif ($item['category'] === 'REH') {
                $rehValue = $item['obsrValue'];
            }
        }

return view('weather', ['t1hValue' => $t1hValue, 'rehValue' => $rehValue]);

    
        
    }
}
