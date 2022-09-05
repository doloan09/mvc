<?php

namespace App\Core;

use App\Models\User;

class Controller
{
    /**
     * Execute an action on the controller.
     *
     * @param string $method
     * @param array $parameters
     * @return mixed
     */
    public function callAction(string $method, array $parameters)
    {
        return $this->{$method}(...array_values($parameters));
    }

    /**
     * Handle calls to missing methods on the controller.
     *
     * @param string $method
     * @param array $parameters
     * @return mixed
     *
     * @throws \Exception
     */
    public function __call(string $method, array $parameters)
    {
        throw new \Exception(sprintf(
            'Method %s::%s does not exist.', static::class, $method
        ));
    }

    public function checkLoginCookie()
    {
        $userName = $_COOKIE['name'] ?? '';
        $password = $_COOKIE['pass'] ?? '';

        $user = new User();
        return $user->checkLogin($userName, $password);
    }
}