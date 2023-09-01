<?php
/**
 * WA
 *
 * @copyright Copyright © 2023 Ishaarat. All rights reserved.
 * @author    Ishaarat Tech Team <sales@ishaarat.com>
 */

namespace Ishaarat\LaraIshaarat\Facades;

use Illuminate\Support\Facades\Facade;
class WA extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ishaarat-wa';
    }
}
