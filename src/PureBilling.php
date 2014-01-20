<?php

class PureBilling
{

    /**
     * Private key
     *
     * @var string
     */
    private static $privateKey;

    /**
     * End point
     *
     * @var string
     */
    private static $endPoint;

    /**
     * Sets privatekey
     *
     * @param string $privateKey
     */
    public static function setPrivateKey($privateKey)
    {
        self::$privateKey = $privateKey;
    }

    /**
     * Sets endPoint
     *
     * @param string $endPoint
     */
    public static function setEndPoint($endPoint)
    {
        self::$endPoint = $endPoint;
    }

    /**
     * Return privateKey
     *
     * @return string
     */
    public static function getPrivateKey()
    {
        return self::$privateKey;
    }

    /**
     * Return Endpoint
     *
     * @return string
     */
    public static function getEndPoint()
    {
        return self::$endPoint;
    }

}
