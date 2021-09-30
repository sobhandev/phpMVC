<?php
class Request{

    public static function post(string $url, array $headers = [] , string $data = '')
    {
        return self::endpoint($url , true , $headers , $data);
    }

    public static function get(string $url, array $headers = [] , string $data = '')
    {
        return self::endpoint($url , false , $headers , $data);
    }

    private static function endpoint(string $url , $post = false , $headers = [] , string $data = ''): bool|string
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, $post);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        if ($data) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        $resp = curl_exec($curl);
        curl_close($curl);
        return $resp;
    }
}
