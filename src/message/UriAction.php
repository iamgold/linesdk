<?php

namespace iamgold\linesdk\message;

/**
 * This is a action of Uri.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class UriAction extends TypeObject
{
    /**
     * construct
     *
     * @param string $linkUri
     * @param array $area ex: [x=>{x}, y=>{y}, width=>{width}, height=>{height}]
     */
    public function __construct($linkUri, $area)
    {
        $linkUri = (string) $linkUri;
        $area = (array) $area;
        $this->data = [
                'linkUri' => trim($linkUri),
                'area' => $area
            ];
    }

    /**
     * get type
     *
     * @return string
     */
    public function getType()
    {
        return 'uri';
    }
}
