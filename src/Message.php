<?php

namespace iamgold\linesdk;

use GuzzleHttp\Client as GClient;

/**
 * This class is used to handle all APIs include create valide webhook, push and reply message
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.5
 */
class Message {

    /**
     * @var string ENDPOINT
     */
    const ENDPOINT = 'https://api.line.me/v2/';

    /**
     * @var string id means an Id of Channel
     */
    private $id;

    /**
     * @var string secret means a secret of Channel
     */
    private $secret;

    /**
     * @var array $accessToken
     */
    private $accessToken;

    /**
     * construct
     *
     * @param string $id
     * @param string $secret
     * @param string $accessToken means a long live token
     */
    public function __construct($id, $secret, $accessToken = false)
    {
        $id = (string) $id;
        $id = trim($id);
        $secret = (string) $secret;
        $secret = trim($secret);
        $accessToken = (string) $accessToken;
        $accessToken = trim($accessToken);

        if (empty($id))
            throw new Exception("Undefined id of channel", 404);

        if (empty($secret))
            throw new Exception("Undefined secret of channel", 404);

        $this->id = $id;
        $this->secret = $secret;
        $this->accessToken = $accessToken;
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
        $json = json_decode($requestBody, true);
        while($r=array_shift($json['events'])) {
            $events[] = MessageEventFactory::create($r);
        }

        return $events;
    }

    /**
     * Reply message
     *
     * @param string $replyToken
     * @param array $messages
     * @return true|array return error message when request fail.
     */
    public function reply($replyToken, $messages)
    {
        $method = 'POST';
        $headers = array_merge($this->getAuthHeader(), ['Content-Type'=>'application/json']);
        $path = 'bot/message/reply';
        $data = [
            'replyToken' => $replyToken,
            'messages' => $messages
        ];
        $response = $this->sendReqeust($method, $headers, $path, $data, 'json');
        if ($response->getStatusCode()==200)
            return true;

        $reason = json_decode($response->getReasonPhrase(), true);
        return $reason;
    }

    /**
     * push message
     *
     * @param string $to
     * @param array $message
     * @return true|array return error message when request fail.
     */
    public function push($to, $messages)
    {
        $method = 'POST';
        $headers = array_merge($this->getAuthHeader(), ['Content-Type'=>'application/json']);
        $path = 'bot/message/push';
        $data = [
            'to' => $to,
            'messages' => $messages
        ];

        $response = $this->sendReqeust($method, $headers, $path, $data, 'json');
        if ($response->getStatusCode()==200)
            return true;

        $reason = json_decode($response->getReasonPhrase(), true);
        return $reason;
    }

    /**
     * multicast message
     *
     * @param array $to
     * @param array $message
     * @return true|array return error message when request fail.
     */
    public function multicast($to, $messages)
    {
        $method = 'POST';
        $headers = array_merge($this->getAuthHeader(), ['Content-Type'=>'application/json']);
        $path = 'bot/message/multicast';
        $data = [
            'to' => $to,
            'messages' => $messages
        ];

        $response = $this->sendReqeust($method, $headers, $path, $data, 'json');
        if ($response->getStatusCode()==200)
            return true;

        $reason = json_decode($response->getReasonPhrase(), true);
        return $reason;
    }

    /**
     * get content
     *
     * @param string $messageId
     * @return string
     */
    public function getContent($messageId)
    {
        $method = 'GET';
        $path = 'bot/message/' . $messageId . '/content';
        $headers = $this->getAuthHeader();
        $data = [];
        $response = $this->sendReqeust($method, $headers, $path, $data);
        if ($response->getStatusCode()!=200)
            throw new Exception($response->getReasonPhrase(), $response->getStatusCode());

        return $response->getBody();
    }

    /**
     * oauth return false when request fail
     *
     * @param array $result a reference value
     * @return false|array
     */
    public function oauth(&$result)
    {
        $path = 'oauth/accessToken';
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];
        $data = [
                'grant_type' => 'client_credentials',
                'client_id' => $this->id,
                'client_secret' => $this->secret
            ];
        $response = $this->sendReqeust('POST', $headers, $path, $data, 'post');

        if ($response->getStatusCode()!=200)
            throw new Exception($response->getReasonPhrase(), $response->getStatusCode());

        $body = $response->getBody();
        $result = json_decode($body, true);
        return true;
    }


    /**
     * send request
     *
     * @param string $method
     * @param array $headers
     * @param string $path
     * @param array $data
     * @param string $type
     */
    private function sendReqeust($method, $headers, $path, $data, $type)
    {
        $postData = [];
        if ($type=='json') {
            $postData = [
                    'json' => $data
                ];
        }

        if ($type=='file') {
            $postData = [
                    'body' => fopen($data['filepath'], 'r')
                ];
        }

        if ($type=='post') {
            $postData = [
                    'form_params' => $data
                ];
        }

        $postData['headers'] = $headers;

        $client = new GClient([
                'base_uri' => static::ENDPOINT
            ]);
        $response = $client->request($method, $path, $postData);
        return $response;
    }

    /**
     * check has access token
     *
     * @return bool
     */
    private function hasAccessToken()
    {
        return (!empty($this->accessToken));
    }

    /**
     * get access token
     *
     * @return string
     */
    private function getAccessToken()
    {
        try {
            if ($this->hasAccessToken())
                return $this->accessToken;

            if ($this->oauth($res)) {
                $this->accessToken = $res['access_token'];
            }

            return $this->accessToken;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * get authentication header
     *
     * @return array
     */
    private function getAuthHeader()
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        return $headers;
    }
}
