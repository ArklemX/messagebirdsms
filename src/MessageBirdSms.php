<?php

namespace MessageBirdSms;

use MessageBird\Client;
use MessageBird\Objects\Message;

class MessageBirdSms
{

    private $accessKey;
    private $originator;
    private $receiver;
    private $message;

    /**
     * Initialise our class at the instantiation.
     *
     * @param $accessKey
     * @param $originator
     */
    public function __construct($accessKey, $originator)
    {
        //Set the accesskey with which we'll send our messages
        $this->setAccessKey($accessKey);

        //Set the Originator : Who the message come from
        $this->setOriginator($originator);
    }

    /**
     *
     *  Send a $message to a $recipient ( a destinator ).
     *
     * @return void
     * @throws \JsonException
     * @throws \MessageBird\Exceptions\AuthenticateException
     * @throws \MessageBird\Exceptions\BalanceException
     * @throws \MessageBird\Exceptions\HttpException
     */
    public function send($receiver, $message)
    {
        $MessageBird = new Client($this->getAccessKey(). '');
        $Message = new Message();
        $Message->originator = $this->getOriginator(). '';
        $Message->recipients = array(RECIPIENT);
        $Message->body = 'This is a test message';

        $MessageBird->messages->create($Message);
    }

    /**
     * @return mixed
     */
    public function getAccessKey()
    {
        return $this->accessKey;
    }

    /**
     * @param mixed $accessKey
     * @return MessageBirdSms
     */
    public function setAccessKey($accessKey)
    {
        $this->accessKey = $accessKey;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOriginator()
    {
        return $this->originator;
    }

    /**
     * @param mixed $originator
     * @return MessageBirdSms
     */
    public function setOriginator($originator)
    {
        $this->originator = $originator;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * @param mixed $receiver
     * @return MessageBirdSms
     */
    public function setReceiver($receiver)
    {
        $this->receiver = $receiver;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     * @return MessageBirdSms
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

}