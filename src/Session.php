<?php

namespace {

    use Simplified\Core\NullPointerException;

    class Session {

        // retrieve one item
        public static function get($key, $default = null) {
            $value = $default;
            if (self::has($key)) {
                $value = $_SESSION[$key];
            }
            return $value;
        }

        // check one item
        public static function has($key) {
            return isset($_SESSION[$key]);
        }

        // put one item
        public static function put($key, $value) {
            self::push($key, $value);
        }

        // retrieve one item and forget in
        public static function pull($key, $default = null) {
            $value = self::get($key, $default);
            self::forget($key);
            return $value;
        }

        // add array key (key.subkey)
        public static function push($key, $value) {
            if (is_null($key))
                throw new NullPointerException("Key must not be null");

            $keys = explode(".", $key);
            if (isset($keys[1])) {
                $_SESSION[trim($keys[0])][trim($keys[1])] = $value;
            } else {
                $_SESSION[trim($keys[0])] = $value;
            }
        }

        // delete one item
        public static function forget($key) {
            if (self::has($key)){
                $_SESSION[$key] = null;
                unset($_SESSION[$key]);
            }
        }

        // delete all data
        public static function flush() {
            $keys = array_keys($_SESSION);
            foreach ($keys as $key) {
                self::forget($key);
            }
        }

        // never call the ctor
        private function __construct() {
        }
    }
}