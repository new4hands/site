<?php

/**
 * Instagram Spider [MOD : WP - Insta Gallery]
 * @author Karan Singh
 * @version 1.3.3
 * @depends RUSpider
 * @description script to get instagram media by using Username and Tag-name. added WP (wp_remote_request) to run in WP.
 */

// loading dependencies

class InstagramSpider
{
    
    protected $instagram;
    
    // handle raw result from server, for further processing in your app
    public $instagramResult;
    
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
    public function getUserItems($username = '')
    {
        $username = urlencode((string) $username); // non-english string support
        if (empty($username)) {
            $this->messages[] = 'Please provide a valid username';
            return;
        }
        
        $inURL = $this->instagram . $username . '/?__a=1';
        // For next 12 images, use ID of the last item (maxId = media.nodes[11].id) in the max_id param: /{USER_NAME}/?__a=1&max_id={maxId}
        $instaRes = $this->igSpider($inURL);
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
        
        // if empty, continus with the next API : HTML
        if (! empty($items)) {
            $inURL = $this->instagram . $username . '/';
            $items = $this->getFromHtmlAPI($inURL);
        }
        
        // if empty, continus with the next API
        // removed API from Nov 2017
        if (empty($items)) {            
            $inURL = $this->instagram . $username . '/media/';
            $instaRes = $this->igSpider($inURL);
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
        }
        return $items;
    }
    
    /**
     * takes #Tag name and return items list array
     *
     * @param string $tag
     * @param
     *            boolean get top posts (10 posts)
     * @return array
     */
    public function getTagItems($tag = '', $getTopItems = false)
    {
        $tag = urlencode((string) $tag);
        if (empty($tag)) {
            $this->messages[] = 'Please provide a valid # tag';
            return;
        }
        $inURL = $this->instagram . 'explore/tags/' . $tag . '/?__a=1';
        $instaRes = $this->igSpider($inURL);
        $instaRes = json_decode($instaRes);
        $items = array();
        if (isset($instaRes->tag->media->nodes)) {
            
            $instaItems = $instaRes->tag->media->nodes;
            if (empty($instaItems) && isset($instaRes->tag->top_posts->nodes)) {
                $instaItems = $instaRes->tag->top_posts->nodes;
            }
            
            // get top posts
            if ($getTopItems && isset($instaRes->tag->top_posts->nodes)) {
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
        
        // continue to next API : API updated on Jan 03 17
        if (empty($items) && isset($instaRes->graphql->hashtag->edge_hashtag_to_media->edges)) {
            
            //$instaItems = $instaRes->tag->media->nodes;
            $instaItems = $instaRes->graphql->hashtag->edge_hashtag_to_media->edges;
            if (empty($instaItems) && isset($instaRes->tag->top_posts->nodes)) {
                $instaItems = $instaRes->tag->top_posts->nodes;
            }
            
            // get top posts
            if ($getTopItems && isset($instaRes->tag->top_posts->nodes)) {
                $instaItems = $instaRes->tag->top_posts->nodes;
            }
            
            if (! empty($instaItems) && is_array($instaItems)) {
                foreach ($instaItems as $res) {
                    $items[] = array(
                        'img_standard' => $res->node->display_url,
                        'img_low' => $res->node->thumbnail_src,
                        'img_thumb' => $res->node->thumbnail_resources[0],
                        'likes' => $res->node->edge_media_to_comment->count,
                        'comments' => $res->node->edge_liked_by->count,
                        'caption' => isset($res->node->edge_media_to_caption->edges[0]->node->text) ? htmlspecialchars($res->node->edge_media_to_caption->edges[0]->node->text) : ''
                    );
                }
            }
        }
        
        // if empty, continus with the next API
        if (empty($items)) {
            $inURL = $this->instagram . 'explore/tags/' . $tag . '/';
            $items = $this->getFromHtmlAPI($inURL);
        }
        return $items;
    }
    
    /**
     * takes page URL and return items list array
     *
     * @param
     *            string url
     * @return array
     */
    protected function getFromHtmlAPI($inURL = '')
    {
        $instaRes = $this->igSpider($inURL);
        $items = array();
        if (! empty($instaRes)) {
            $insta_json = explode('window._sharedData = ', $instaRes);
            $insta_json = explode(';</script>', $insta_json[1]);
            $instaArray = json_decode($insta_json[0], true);
            
            $nodes = array();
            if (isset($instaArray['entry_data']['ProfilePage'][0]['user']['media']['nodes'])) {
                $nodes = $instaArray['entry_data']['ProfilePage'][0]['user']['media']['nodes'];
            } else if (isset($instaArray['entry_data']['TagPage'][0]['tag']['media']['nodes'])) {
                $nodes = $instaArray['entry_data']['TagPage'][0]['tag']['media']['nodes'];
            }
            if (! empty($nodes) && is_array($nodes)) {
                foreach ($nodes as $node) {
                    $caption = (! empty($node['caption'])) ? $node['caption'] : '';
                    $items[] = array(
                        'img_standard' => $node['display_src'],
                        'img_low' => $node['thumbnail_src'],
                        'img_thumb' => $node['thumbnail_resources'][0]['src'],
                        'likes' => $node['likes']['count'],
                        'comments' => $node['comments']['count'],
                        'caption' => $caption
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
    public function igSpider($url = '')
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
                $this->messages[] = 'WP Error: ' . implode(', ',$result->get_error_messages());
            } else {
                if (! empty($result['body'])) {
                    $instaItems = $result['body'];
                }
            }
        } else {
            $this->messages[] = 'Error: running outside WP.';
        }
        
        
        $this->instagramResult = $instaItems;
        return $instaItems;
    }
    
    // return messages array
    public function getMessages()
    {
        return array_unique($this->messages);
    }
}

