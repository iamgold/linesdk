<?php

namespace iamgold\linesdk;

use GuzzleHttp\Client as GClient;

/**
 * This class is used to handle all APIs include create valide webhook, push and reply message
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class Message {

    /**
     * @var string id means an Id of Channel
     */
    private $id;

    /**
     * @var string secret means a secret of Channel
     */
    private $secret;

    /**
     * construct
     *
     * @param string $id
     * @param string $secret
     */
    public function __construct($id, $secret)
    {
        $id = (string) $id;
        $id = trim($id);
        $secret = (string) $secret;
        $secret = trim($secret);

        if (empty($id))
            throw new Exception("Undefined id of channel", 404);

        if (empty($secret))
            throw new Exception("Undefined secret of channel", 404);

        $this->id = $id;
        $this->secret = $secret;
    }

    /**
     * validate webhook
     *
     * @param string $signature
     * @param string $requestBody
     * @return bool
     */
    public function validWebHook($signature, $requestBody)
    {
        $hash = hash_hmac('sha256', $requestBody, $this->secret, true);
        $hashSignature = base64_encode($hash);
        return ($hashSignature===$signature);
    }

    /**
     * parse events of specific requestbody
     *
     * @param string $resquestBody
     * @return iamgold\message\Events[]
     */
    public function parseEvents($requestBody)
    {
        $events = [];
        $rows = json_decode($this->requestBody, true);
        while($r=array_shift($rows)) {
            $events[] = MessageEventFactory::create($r);
        }

        return $events;
    }
}
