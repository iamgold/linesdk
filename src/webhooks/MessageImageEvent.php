<?php

namespace iamgold\linesdk\webhooks;

/**
 * This is a message event of image.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class MessageImageEvent extends Event
{
    // use message event trait
    use MessageEventTrait;
}
