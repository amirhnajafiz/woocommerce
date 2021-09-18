<?php

namespace enum;

use MyCLabs\Enum\Enum;

/**
 * Class Role for database user roles.
 * @package enum
 */
final class Role extends Enum
{
    private const USER = 'user';
    private const WRITER = 'writer';
    private const ADMIN = 'admin';

    /**
     * Normal user role
     * @return Role
     */
    public static function USER(): Role
    {
        return new Role(self::USER);
    }

    /**
     * Writer role in our website
     * @return Role
     */
    public static function WRITER() : Role
    {
        return new Role(self::WRITER);
    }

    /**
     * Admin role of the website
     * @return Role
     */
    public static function ADMIN() : Role
    {
        return new Role(self::ADMIN);
    }
}
