<?php
require_once('vendor/autoload.php');
class Weather {
    public function printWeather() {
        $weather_api = new RestClient();
        $url = "api.openweathermap.org/data/2.5/";
        $query = "weather?q=Seoul&units=metric";
        $key = "a548f6a9bae3e68036c8ca7809a60656";
        $weather_api->set_option('url',$url.$query.$location.$key);
        $temp = $weather_api->get($url.$query."&appid=".$key);
        return json_decode($temp->response)->main->temp;
    }
}
function getWeather() {
    $weather = new Weather;
    $file = fopen("weather.txt", "w") or die("Unable to open file!");
    $temp = $weather->printWeather();
    fwrite($file, $temp);
    fclose($file);
}
?>