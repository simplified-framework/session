<?php
/**
 * Created by PhpStorm.
 * User: bratfisch
 * Date: 12.01.2016
 * Time: 14:48
 */

namespace {
    use Simplified\Core\ContainerInterface;
    use Symfony\Component\Debug\Exception\UndefinedMethodException;

    class Session implements ContainerInterface{

        public function get($id) {
        }

        public function has($id) {
        }

        public function __callStatic($method, $arguments) {
            if ($method === 'get') {
                return;
            }

            if ($method === 'has') {
                return;
            }

            if ($method === 'put') {
                return;
            }

            if ($method === 'pull') {
                return;
            }

            throw new UndefinedMethodException("Method {$method} doesn't exists");
        }
    }
}