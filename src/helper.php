<?php
if (! function_exists('ishaaratWA')) {
    /**
     * Access SmsManager through helper.
     *
     * @return \Ishaarat\LaraIshaarat\WA
     */
    function ishaaratWA()
    {
        return app('ishaarat-wa');
    }
}
