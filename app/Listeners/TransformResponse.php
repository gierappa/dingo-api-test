<?php

namespace App\Listeners;

use Dingo\Api\Event\ResponseWasMorphed;

class TransformResponse
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ResponseWasMorphed  $event
     * @return void
     */
    public function handle(ResponseWasMorphed $event)
    {
        $content = $event->content;

        if(array_key_exists('id', $content)) {

            unset($content['category_id']);
            unset($content['created_at']);
            unset($content['updated_at']);
            unset($content['category']['created_at']);
            unset($content['category']['updated_at']);
            $content['photo_urls'] =  json_decode($content['photo_urls']);

            foreach($content['tags'] as $key => $tag) {
                unset($content['tags'][$key]['created_at']);
                unset($content['tags'][$key]['updated_at']);
                unset($content['tags'][$key]['pivot']);

            }
        }

        $event->response->setContent($content);
    }
}
