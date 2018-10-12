<?php


class routing
{
    /**
     * Return front end
     * @return string
     */

    static public function selectRouteFrontEnd()
    {
        return 'http://' . $_SERVER['HTTP_HOST'] . '/Udemy/carrito-compras-php/frontend/';
    }

    /**
     * Return backend
     * @return string
     */


    static public function selectRouteBackEnd()
    {
        return 'http://' . $_SERVER['HTTP_HOST'] . '/Udemy/carrito-compras-php/backend/';
    }
}