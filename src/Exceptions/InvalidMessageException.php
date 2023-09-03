<?php
/**
 * InvalidMessageException
 *
 * @copyright Copyright © 2023 Ishaarat. All rights reserved.
 * @author    Ishaarat Tech Team <sales@ishaarat.com>
 */

namespace Ishaarat\LaraIshaarat\Exceptions;

use Exception;

class InvalidMessageException extends Exception
{
    protected $message = 'An error occurred';
}
