<?php

error_reporting(E_ALL);

/*
 * 
 * YouTube API Channels PHP Class
 * 
 * Grab your youtube channel and get all videos and playlist , search on channel and get popular videos
 * 
 * PHP Version >= 5.4
 *
 * Author Tatwerat-Team 
 * 
 * Author-Account http://codecanyon.net/user/tatwerat-team 
 * 
 * Version 1.3.2
 *
 */

class YTChannel {

    public $Key;
    public $Error;

    public function __construct($appKey) {
        $this->Key = $appKey;
    }

    // Setup API key from your google app
    public function API($query) {
        if ($query) {
            return ('https://www.googleapis.com/youtube/v3/' . $query);
        } else {
            $this->Error = 'Must be enter your api query';
            $this->error();
        }
    }

    // Get video Data by ID
    public function video_info($id) {
        $url = $this->API("videos?id=" . $this->safe($id) . "&key=" . $this->Key . "&part=snippet,contentDetails,statistics,status");
        $result = array();
        $json = @file_get_contents("http://www.youtube.com/get_video_info?video_id=" . $this->safe($id) . "&asv=3&el=detailpage&hl=en_US");
        $video_json = @file_get_contents($url);
        $data = json_decode($video_json);
        //die($this->dumb_array($data));
        if ($json and $data) {
            parse_str($json);
            if (isset($url_encoded_fmt_stream_map)) {
                $my_formats_array = explode(',', $url_encoded_fmt_stream_map);
                if (count($my_formats_array) != 0) {
                    $avail_formats[] = '';
                    $i = 0;
                    $ipbits = $ip = $sig = $quality = '';
                    $expire = time();
                    foreach ($my_formats_array as $format) {
                        parse_str($format);
                        $avail_formats[$i]['quality'] = $quality;
                        $type = explode(';', $type);
                        $avail_formats[$i]['type'] = $type[0];
                        $avail_formats[$i]['url'] = urldecode($url) . '&signature=' . $sig;
                        parse_str(urldecode($url));
                        $avail_formats[$i]['expire'] = date("G:i:s T", $expire);
                        $avail_formats[$i]['ipbits'] = $ipbits;
                        $avail_formats[$i]['ip'] = $ip;
                        $i++;
                    }
                    for ($i = 0; $i < count($avail_formats); $i++) {
                        $result[$avail_formats[$i]['quality'] . str_replace('video/', '', $avail_formats[$i]['type'])];
                        $result[$avail_formats[$i]['quality'] . str_replace('video/', '', $avail_formats[$i]['type'])]['quality'] = $avail_formats[$i]['quality'];
                        $result[$avail_formats[$i]['quality'] . str_replace('video/', '', $avail_formats[$i]['type'])]['type'] = $avail_formats[$i]['type'];
                        $result[$avail_formats[$i]['quality'] . str_replace('video/', '', $avail_formats[$i]['type'])]['url'] = $avail_formats[$i]['url'];
                    }
                }
            }
            $data = explode('&', $json);
            return($result);
        } else {
            //debug_backtrace(); 
            $this->Error = 'Error in get data';
            $this->error();
        }
    }

    // Dumb array
    public function dumb_array($array) {
        
        $data_json = json_encode($array);
        print_r($data_json);
    }

    // safe values
    private function safe($value) {
        return trim(htmlspecialchars($value));
    }

    // safe values
    private function filter_date($data) {
        return !empty($data) ? $data : NULL;
    }

    // check server name
    private function checkServer($domains = array(), $url) {
        foreach ($domains as $domain) {
            if (strpos($url, $domain) > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    // Show errors when function can't get data
    public function error() {
        if ($this->Error)
            echo('<div class="yt-error" style="padding:15px;color:red;margin:10px;border:1px solid red;border-radius:2px;">' . $this->Error . '</div>');
    }

}
