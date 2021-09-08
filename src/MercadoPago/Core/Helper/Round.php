<?php

namespace MercadoPago\Core\Helper;

class Round
{
    /**
     * Countries that need to have the total rounded to not have decimal values
     *
     * @var string[]
     */
    const COUNTRIES_WITH_INTEGER_PRICE = [
        'MLC',
        'MLO',
    ];

    /**
     * Get rounded value with site id
     *
     * @param  float $value
     * @param  string $siteId
     * @return float|integer
     */
    public static function roundWithSiteId($value, $siteId)
    {
        $round = (float) number_format($value, 2, '.', '');

        if (in_array($siteId, self::COUNTRIES_WITH_INTEGER_PRICE, true)) {
            return (int) $round;
        }

        return $round;
    }

    /**
     * Get rounded value with site id
     *
     * @param float $value
     * @return float
     */
    public static function roundWithoutSiteId($value)
    {
        return (float) number_format($value, 2, '.', '');
    }

    /**
     * Get rounded value with site id
     *
     * @param float $value
     * @return integer
     */
    public static function roundInteger($value)
    {
        return (int) number_format($value, 0, '.', '');
    }
}
