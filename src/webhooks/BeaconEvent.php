<?php

namespace iamgold\linesdk\webhooks;

/**
 * This is a beacon event class.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class BeaconEvent extends Event
{
    /**
     * get beacon
     *
     * @return array
     */
    public function getBeacon()
    {
        return $this->data['beacon'];
    }

    /**
     * get hwid of beacon
     *
     * @return string
     */
    public function getBeaconHwid()
    {
        $beacon = $this->getBeacon();
        return $beacon['hwid'];
    }

    /**
     * get type of beacon
     *
     * @return string
     */
    public function getBeaconType()
    {
        $beacon = $this->getBeacon();
        return $beacon['type'];
    }

    /**
     * check is enter event of beacon
     *
     * @return bool
     */
    public function isEnterBeason()
    {
        $type = $this->getBeaconType();
        return ($type==='enter');
    }

    /**
     * check is leave event of beacon
     *
     * @return bool
     */
    public function isLeaveBeason()
    {
        $type = $this->getBeaconType();
        return ($type==='leave');
    }

    /**
     * check is banner event of beacon
     *
     * @return bool
     */
    public function isBannerBeason()
    {
        $type = $this->getBeaconType();
        return ($type==='banner');
    }
}
