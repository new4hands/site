<?php

/**
 * Instagram Spider
 * @author Karan Singh
 * @version 1.2.3
 * @description script to get instagram media by using Username and/or Tag. added WP (wp_remote_request) to run in WP.
 */
class InstagramSpider
{
    
    protected $instagram;
    
    public $messages;
    
    public function __construct()
    {
        $this->instagram = 'https://www.instagram.com/';
        $this->messages = array();
    }
    
    /**
     * takes username and return items list array
     *
     * @param string $username
     * @return array
     */
    function getUserItems($username = '')
    {
        $username = urlencode((string) $username); // non-english string support
        if (empty($username)) {
            $this->messages[] = 'Please provide a valid username';
            return;
        }
        
        $inURL = $this->instagram . $username . '/media/';
        $instaRes = $this->ig_spider($inURL);
        $instaRes = @json_decode($instaRes);
        
        $items = array();
        if (isset($instaRes->items)) {
            $instaItems = $instaRes->items;
            
            if (! empty($instaItems) && is_array($instaItems)) {
                foreach ($instaItems as $res) {
                    $items[] = array(
                        'img_standard' => $res->images->standard_resolution->url,
                        'img_low' => $res->images->low_resolution->url,
                        'img_thumb' => $res->images->thumbnail->url,
                        'likes' => $res->likes->count,
                        'comments' => $res->comments->count,
                        'caption' => isset($res->caption->text) ? htmlspecialchars($res->caption->text) : ''
                    );
                }
            }
        }
        if(empty($items)){
            $inURL = $this->instagram . $username . '/?__a=1';
            $instaRes = $this->ig_spider($inURL);
            $instaRes = @json_decode($instaRes);
            $items = array();
            if (isset($instaRes->user->media->nodes)) {
                $instaItems = $instaRes->user->media->nodes;
                
                if (! empty($instaItems) && is_array($instaItems)) {
                    foreach ($instaItems as $res) {
                        $items[] = array(
                            'img_standard' => $res->display_src,
                            'img_low' => $res->thumbnail_resources[4]->src,
                            'img_thumb' => $res->thumbnail_resources[0]->src,
                            'likes' => $res->likes->count,
                            'comments' => $res->comments->count,
                            'caption' => isset($res->caption) ? htmlspecialchars($res->caption) : ''
                        );
                    }
                }
            }
        }
        return $items;
    }
    
    /**
     * takes #Tag name and return items list array
     *
     * @param string $tag
     * @param boolean get top posts
     * @return array
     */
    function getTagItems($tag = '',$getTopItems = false)
    {
        $tag = urlencode((string) $tag);
        if (empty($tag)) {
            $this->messages[] = 'Please provide a valid # tag';
            return;
        }
        $inURL = $this->instagram . 'explore/tags/' . $tag . '/?__a=1';
        $instaRes = $this->ig_spider($inURL);
        $instaRes = json_decode($instaRes);
        $items = array();
        if (isset($instaRes->tag->media->nodes)) {
            
            $instaItems = $instaRes->tag->media->nodes;
            if (empty($instaItems) && isset($instaRes->tag->top_posts->nodes)) {
                $instaItems = $instaRes->tag->top_posts->nodes;
            }
            
            // get top posts
            if($getTopItems && isset($instaRes->tag->top_posts->nodes)){
                $instaItems = $instaRes->tag->top_posts->nodes;
            }
            
            if (! empty($instaItems) && is_array($instaItems)) {
                foreach ($instaItems as $res) {
                    $items[] = array(
                        'img_standard' => $res->display_src,
                        'img_low' => $res->thumbnail_src,
                        'img_thumb' => str_replace('s640x640', 's150x150', $res->thumbnail_src),
                        'likes' => $res->likes->count,
                        'comments' => $res->comments->count,
                        'caption' => isset($res->caption) ? htmlspecialchars($res->caption) : ''
                    );
                }
            }
        }
        
        return $items;
    }
    
    /**
     * takes URL string and return URL content
     *
     * @param string $url
     * @return string
     */
    protected function ig_spider($url = '')
    {
        if (empty($url) || (! filter_var($url, FILTER_VALIDATE_URL))) {
            $this->messages[] = 'Please provide a Valid URL';
            return;
        }
        $instaItems = '';
        
        // get results if script executed in WP
        if (function_exists('wp_remote_request')) {
            $result = wp_remote_request($url);
            if (is_wp_error($result)) {
                $this->messages[] = 'WP Error: ' . $result->get_error_messages();
            } else {
                if (! empty($result['body'])) {
                    $instaItems = $result['body'];
                }
            }
        }
        
        if (empty($instaItems)) { // continue via PHP
            
            if (function_exists('curl_version')) {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $contents = curl_exec($ch);
                if (curl_error($ch)) {
                    $this->messages[] = 'error: ' . curl_error($ch);
                }
                curl_close($ch);
                $instaItems = $contents;
            } else {
                if (ini_get('allow_url_fopen')) {
                    $instaItems = @file_get_contents($url);
                } else {
                    $this->messages[] = 'Your server does\'t have enabled the required extensions/functions.';
                }
            }
        }
        return $instaItems;
    }
    
    // return messages array
    public function getMessages()
    {
        return $this->messages;
    }
}

