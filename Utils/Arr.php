<?php
/**
 * Created by PhpStorm.
 * User: lilichun
 * Date: 2015/7/8 0008
 * Time: 14:04
 */

namespace App\Libraries\Allinpay\Utils;

class Arr{

    /**
     * 获取数组的值 -- 可深度获取
     * $array = ['names' => ['joe' => ['programmer']]];
     * $value = array_get($array, 'names.joe');
     * @param $array
     * @param $key
     * @param null $default
     * @return null
     */
    public static function get($array, $key, $default = null)
    {
        if (is_null($key)) {
            return $array;
        }

        if (isset($array[$key])) {
            return $array[$key];
        }

        foreach (explode('.', $key) as $segment) {
            if (!is_array($array) || !array_key_exists($segment, $array)) {
                return $default;
            }
            $array = $array[$segment];
        }

        return $array;
    }

}