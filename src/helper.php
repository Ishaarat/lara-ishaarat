<?php
if (! function_exists('ishaaratWA')) {
    /**
     * Access SmsManager through helper.
     *
     * @return \Ishaarat\LaraIshaarat\Ishaarat
     */
    function ishaaratWA()
    {
        return app('ishaarat');
    }
}
