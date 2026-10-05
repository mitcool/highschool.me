<?php

namespace App\Traits;

// For article sections of type 5 (video), whose content is a video URL
trait HasVideoEmbed
{
    // Returns an iframe-embeddable URL for YouTube/Vimeo links, or null for anything else (e.g. a direct video file)
    public function video_embed_url(){
        $url = trim($this->content);

        if(preg_match('~(?:youtube\.com/(?:watch\?(?:.*&)?v=|embed/|shorts/)|youtu\.be/)([A-Za-z0-9_-]{11})~', $url, $matches)){
            return 'https://www.youtube.com/embed/'.$matches[1];
        }
        if(preg_match('~vimeo\.com/(?:video/)?(\d+)~', $url, $matches)){
            return 'https://player.vimeo.com/video/'.$matches[1];
        }

        return null;
    }
}
