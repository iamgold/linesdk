<?php

namespace iamgold\linesdk\message;

/**
 * This is a template of button
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 * @see https://developers.line.me/en/docs/messaging-api/reference/#template-messages
 */
class ButtonTemplate extends TypeObject
{
    /**
     * construct
     *
     * @param string $thumbnailImageUrl
     * @param string $imageAspectRatio
     * @param string $imageSize
     * @param string $imageBackgroundColor
     * @param string $title
     * @param string $text
     * @param TypeObject $defaultAction
     * @param array $actions
     */
    public function __construct(string $thumbnailImageUrl = '', string $imageAspectRatio = '', string $imageSize = '', string $imageBackgroundColor = '', string $title = '', string $text = '', TypeObject $defaultAction, array $actions)
    {
        $this->data = [
                'thumbnailImageUrl' => $thumbnailImageUrl,
                'imageAspectRatio' => $imageAspectRatio,
                'imageSize' => $imageSize,
                'imageBackgroundColor' => $imageBackgroundColor,
                'title' => $title,
                'text' => $text,
                'defaultAction' => $defaultAction->getData(),
                'actions' => $this->setActions($actions)
            ];
    }

    /**
     * set actions
     *
     * @param array $actions
     */
    public function setActions($actions)
    {
        $data = [];
        while($act=array_shift($actions)) {
            $data[] = $act->getData();
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
        return 'buttons';
    }
}
