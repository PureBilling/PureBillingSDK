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
     * Version
     *
     * @var string
     */
    private static $version = 'V1';

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
     * Sets endPoint
     *
     * @param string $endPoint
     */
    public static function setVersion($version)
    {
        self::$version = $version;
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

    /**
     * Return Version
     *
     * @return string
     */
    public static function getVersion()
    {
        return self::$version;
    }

}
