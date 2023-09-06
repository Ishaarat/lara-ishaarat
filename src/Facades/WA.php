<?php
/**
 * WA
 *
 * @copyright Copyright © 2023 Ishaarat. All rights reserved.
 * @author    Ishaarat Tech Team <sales@ishaarat.com>
 */
declare(strict_types=1);
namespace Ishaarat\LaraIshaarat\Facades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
class WA extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ishaarat';
    }
}
