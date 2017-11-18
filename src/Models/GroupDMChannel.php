<?php
/**
 * Yasmin
 * Copyright 2017 Charlotte Dunois, All Rights Reserved
 *
 * Website: https://charuru.moe
 * License: https://github.com/CharlotteDunois/Yasmin/blob/master/LICENSE
*/

namespace CharlotteDunois\Yasmin\Models;

/**
 * Represents a Group DM channel.
 *
 * @property  string|null  $applicationID  Returns the application ID which created the group DM channel.
 */
class GroupDMChannel extends DMChannel {
    protected $applicationID;
    
    /**
     * @internal
     */
    function __construct(\CharlotteDunois\Yasmin\Client $client, array $channel) {
        parent::__construct($client, $channel);
        
        $this->applicationID = $channel['application_id'] ?? null;
    }
    
    /**
     * Adds the given user to the Group DM channel using the given access token. Resolves with $this.
     * @param string|\CharlotteDunois\Yasmin\Models\User  $user         The User object, or the user ID.
     * @param string                                      $accessToken  The OAuth 2.0 access token for the user.
     * @param string                                      $nick         The nickname of the user being added.
     * @return \React\Promise\Promise
     * @throws \InvalidArgumentException
     */
    function addRecipient($user, string $accessToken, string $nick = '') {
        if(!\is_string($user)) {
            $user = $this->client->users->resolve($user)->id;
        }
        
        return (new \React\Promise\Promise(function (callable $resolve, callable $reject) use ($user, $accessToken, $nick) {
            $this->client->apimanager()->endpoints->channel->groupDMAddRecipient($this->id, $user, $accessToken, $nick)->then(function () use ($resolve) {
                $resolve($this);
            }, $reject)->done(null, array($this->client, 'handlePromiseRejection'));
        }));
    }
    
    /**
     * Removes the given user from the Group DM channel. Resolves with $this.
     * @param string|\CharlotteDunois\Yasmin\Models\User  $user  The User object, or the user ID.
     * @return \React\Promise\Promise
     * @throws \InvalidArgumentException
     */
    function removeRecipient($user) {
        if(!\is_string($user)) {
            $user = $this->client->users->resolve($user)->id;
        }
        
        return (new \React\Promise\Promise(function (callable $resolve, callable $reject) use ($user) {
            $this->client->apimanager()->endpoints->channel->groupDMRemoveRecipient($this->id, $user)->then(function () use ($resolve) {
                $resolve($this);
            }, $reject)->done(null, array($this->client, 'handlePromiseRejection'));
        }));
    }
    
    /**
     * @inheritDoc
     *
     * @throws \Exception
     * @internal
     */
    function __get($name) {
        if(\property_exists($this, $name)) {
            return $this->$name;
        }
        
        return parent::__get($name);
    }
}