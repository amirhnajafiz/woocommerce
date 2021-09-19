<?php

namespace enum;

use MyCLabs\Enum\Enum;

/**
 * Class Status for cart status options.
 *
 * @package enum
 */
final class Status extends Enum
{
    private const ORDER = 'order';
    private const READY = 'ready';
    private const SEND = 'send';
    private const DELIVERED = 'delivered';
    private const FAILED = 'failed';
    private const STORE_FAIL = 'store_fail';

    /**
     * In ordering status.
     *
     * @return Status
     */
    public static function ORDER(): Status
    {
        return new Status(self::ORDER);
    }

    /**
     * Ready cart status.
     *
     * @return Status
     */
    public static function READY(): Status
    {
        return new Status(self::READY);
    }

    /**
     * Shipped cart status.
     *
     * @return Status
     */
    public static function SEND(): Status
    {
        return new Status(self::SEND);
    }

    /**
     * Successful received.
     *
     * @return Status
     */
    public static function DELIVERED(): Status
    {
        return new Status(self::DELIVERED);
    }

    /**
     * Failed received.
     *
     * @return Status
     */
    public static function FAILED(): Status
    {
        return new Status(self::FAILED);
    }

    /**
     * Item out of amount failed.
     *
     * @return Status
     */
    public static function STORE_FAIL(): Status
    {
        return new Status(self::STORE_FAIL);
    }
}
