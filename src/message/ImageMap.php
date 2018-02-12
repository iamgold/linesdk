<?php

namespace iamgold\linesdk\message;

/**
 * This is an image map message
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 * @see https://developers.line.me/en/docs/messaging-api/reference/#imagemap-message
 */
class ImageMap extends TypeObject
{
    /**
     * construct
     *
     * @param string $baseUrl Base URL of image (Max: 1000 characters) HTTPS
     * @param string $altText
     * @param array $baseSize ex: [width=>{width}, height=>{height}]
     * @param array $actions
     */
    public function __construct(string $baseUrl = '', string $altText = '', array $baseSize = [], array $actions = [])
    {
        if (empty($baseSize)) {
            $baseSize = ['width'=>1040, 'height'=>1040];
        }

        $this->data = [
                'baseUrl' => trim($baseUrl),
                'altText' => trim($altText),
                'baseSize' => $baseSize,
                'actions' => $actions
            ];
    }

    /**
     * set actions
     *
     * @param array $actions each element could be DataInterface or native array
     */
    public function setActions(array $actions)
    {
        $data = [];
        while($act=array_shift($actions)) {
            if ($act instanceof DataInterface) {
                $data[] = $act->getData();
            } else {
                $data[] = $act;
            }
        }

        $this->data['actions'] = $data;
    }

    /**
     * get type
     *
     * @return string
     */
    public function getType()
    {
        return 'imagemap';
    }
}
