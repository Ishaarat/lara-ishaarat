<?php
/**
 * IshaaratPublishCommand
 *
 * @copyright Copyright © 2023 Ushop Unilever. All rights reserved.
 * @author    ahmed.allam@unilever.com
 */

namespace Ishaarat\LaraIshaarat\Commands;


class IshaaratPublishCommand
{
    public $signature = 'ishaarat:publish';

    public $description = 'Publish Ishaarat whatsapp config file';

    public function handle()
    {
        $this->call('vendor:publish', ['--tag' => 'ishaarat-wa-config']);
    }
}
