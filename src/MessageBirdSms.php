<?php

namespace arklem\messagebirdsms\src;

use JsonException;
use MessageBird\Client;
use MessageBird\Exceptions\AuthenticateException;
use MessageBird\Exceptions\BalanceException;
use MessageBird\Exceptions\HttpException;
use MessageBird\Objects\Message;

class MessageBirdSms
{

    private string $accessKey;
    private string $originator;
    private string $receiver;
    private string $message;

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
     * @param array $receivers
     * @param $message
     * @return void
     * @throws AuthenticateException
     * @throws BalanceException
     * @throws HttpException
     * @throws JsonException
     */
    public function send(array $receivers, $message)
    {
        $MessageBird = new Client($this->getAccessKey());
        $Message = new Message();
        $Message->originator = $this->getOriginator();
        $Message->recipients = array($receivers);
        $Message->body = $message;

        $MessageBird->messages->create($Message);
    }

    /**
     * @return string
     */
    public function getAccessKey(): string
    {
        return $this->accessKey;
    }

    /**
     * @param string $accessKey
     * @return MessageBirdSms
     */
    public function setAccessKey(string $accessKey): MessageBirdSms
    {
        $this->accessKey = $accessKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getOriginator(): string
    {
        return $this->originator;
    }

    /**
     * @param string $originator
     * @return MessageBirdSms
     */
    public function setOriginator(string $originator): MessageBirdSms
    {
        $this->originator = $originator;
        return $this;
    }

    /**
     * @return string
     */
    public function getReceiver(): string
    {
        return $this->receiver;
    }

    /**
     * @param string $receiver
     * @return MessageBirdSms
     */
    public function setReceiver(string $receiver): MessageBirdSms
    {
        $this->receiver = $receiver;
        return $this;
    }


    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return MessageBirdSms
     */
    public function setMessage(string $message): MessageBirdSms
    {
        $this->message = $message;
        return $this;
    }

}