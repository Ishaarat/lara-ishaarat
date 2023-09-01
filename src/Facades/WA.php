<?php
/**
 * WA
 *
 * @copyright Copyright © 2023 Ushop Unilever. All rights reserved.
 * @author    ahmed.allam@unilever.com
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
