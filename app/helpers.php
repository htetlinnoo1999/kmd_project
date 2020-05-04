<?php

use \Illuminate\Support\Str;

if (!function_exists('app_name')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}

if (!function_exists('parse_phone_number')) {

    /**
     * For International Number Parsing
     *
     * @param string $number
     * @return string
     */
    function parse_phone_number($number)
    {
        $count = strlen($number);
        if ($count >= 10 && Str::startsWith($number, "959")) {
            return Str::after($number, "959");
        } elseif ($count >= 9 && Str::startsWith($number, "09")) {
            return Str::after($number, "09");
        } else {
            return $number;
        }
    }
}

if (!function_exists('extract_value_from_array')) {

    /**
     * Extract value from the key from the array
     * If there is no value with that key, default value is return.
     * @param string $key
     * @param array $array
     * @param null $default
     * @return mixed|null
     */
    function extract_value_from_array(string $key, array $array, $default = null)
    {
        if (array_key_exists($key, $array)) {
            return $array[$key];
        } else {
            return $default;
        }
    }


}

if (!function_exists('include_route_files')) {

    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @param $folder
     */
    function include_route_files($folder)
    {
        try {
            $rdi = new recursiveDirectoryIterator($folder);
            $it = new recursiveIteratorIterator($rdi);

            while ($it->valid()) {
                if (!$it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php') {
                    require $it->key();
                }

                $it->next();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

if (!function_exists('get_admin_roles')) {

    /**
     * get the admins of the root company (eg, BlueOcean)
     *
     * @return array
     */
    function get_admin_roles()
    {
        return config('constants.admins', ['Blue Ocean Admin']);
    }
}

if (!function_exists('is_production')) {

    /**
     * check whether the application is in production mode or not
     *
     * @return bool
     */
    function is_production()
    {
        return config('constants.is_production', false);
    }
}


if (!function_exists('get_acronym')) {

    /**
     * check whether the application is in production mode or not
     *
     * @param $input
     * @return string
     */
    function get_acronym($input): string
    {
        preg_match_all("/[A-Z0-9]/", $input, $matches);
        return implode('', $matches[0]);
    }
}

if (!function_exists('showPrettyStatus')) {
    function showPrettyStatus($status)
    {
        switch ($status) {
            case 1:
                return '<i class="fa fa-check-circle  text-success"></i>';
                break;
            case 2:
                return '<i class="fa fa-times-circle  text-danger"></i>';
                break;
            case 0:
                return '<small class="label text-warning">pending</small>';
                break;
        }
    }
}

if (!function_exists('isCompanyAdmin')) {
    function isCompanyAdmin($user) {
        return $user->hasAnyRole(['Blue Ocean Admin', 'Super Admin']);
    }
}

if (!function_exists('brandSlug')) {
    function brandSlug($user_id) {
        $user = \App\User::with('brands')->find($user_id);
        return $user->brands[0]->slug;
    }
}

