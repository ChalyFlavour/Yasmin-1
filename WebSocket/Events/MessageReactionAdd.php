<?php
/**
 * Yasmin
 * Copyright 2017 Charlotte Dunois, All Rights Reserved
 *
 * Website: https://charuru.moe
 * License: MIT
*/

namespace CharlotteDunois\Yasmin\WebSocket\Events;

/**
 * WS Event
 * @link https://discordapp.com/developers/docs/topics/gateway#message-reaction-add
 * @access private
 */
class MessageReactionAdd {
    protected $client;
    
    function __construct(\CharlotteDunois\Yasmin\Client $client) {
        $this->client = $client;
    }
    
    function handle(array $data) {
        $channel = $this->client->channels->get($data['channel_id']);
        if($channel) {
            $message = $channel->messages->get($data['message_id']);
            if($message) {
                $reaction = $message->reactions->get($data['emoji']['id']);
                if(!$reaction) {
                    $emoji = $this->client->emojis->get($data['emoji']['id']);
                    if(!$emoji) {
                        $emoji = new \CharlotteDunois\Yasmin\Structures\Emoji($this->client, $channel->guild, $data['emoji']);
                        if($channel->guild) {
                            $channel->guild->emojis->set($emoji->id, $emoji);
                        }
                    }
                    
                    $reaction = new \CharlotteDunois\Yasmin\Structures\MessageReaction($this->client, $message, $emoji, array(
                        'count' => 0,
                        'me' => (bool) ($this->client->getClientUser()->id === $data['user_id']),
                        'emoji' => $emoji
                    ));
                    
                    $message->reactions->set($emoji->id, $reaction);
                }
                
                $reaction->_incrementCount();
                $this->client->emit('messageReactionAdd', $reaction);
            }
        }
    }
}