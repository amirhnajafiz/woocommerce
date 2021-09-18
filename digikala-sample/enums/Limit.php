<?php

namespace enum;

use MyCLabs\Enum\Enum;

/**
 * Class Limit for database string lengths.
 *
 * @package enum
 */
final class Limit extends Enum
{
    private const PHONE = 16;
    private const TITLE = 32;
    private const NAME = 64;
    private const LINK = 1024;
    private const COMMENT = 2048;

    /**
     * Phone is 16 chars.
     *
     * @return Limit
     */
    public static function PHONE(): Limit
    {
        return new Limit(self::PHONE);
    }

    /**
     * Title is 32 chars.
     *
     * @return Limit
     */
    public static function TITLE(): Limit
    {
        return new Limit(self::TITLE);
    }

    /**
     * Name is 64 chars.
     *
     * @return Limit
     */
    public static function NAME(): Limit
    {
        return new Limit(self::NAME);
    }

    /**
     * Link is 1024 chars.
     *
     * @return Limit
     */
    public static function LINK(): Limit
    {
        return new Limit(self::LINK);
    }

    /**
     * Comment is 2048 chars.
     *
     * @return Limit
     */
    public static function COMMENT(): Limit
    {
        return new Limit(self::COMMENT);
    }
}
