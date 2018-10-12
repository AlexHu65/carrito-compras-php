<?php

class slideController
{
    /**
     * Request slide from the database
     * @return array
     */

    public static function ctrGetSlide()
    {
        $table = 'slide';
        $response = slideModel::sqlShowSlide($table);
        return $response;

    }

}