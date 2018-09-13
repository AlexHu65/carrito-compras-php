<?php

class slideController
{
    /**
     * Request slide from the database
     * @return array
     */

    public static function ctrShowSlide()
    {
        $table = 'slide';
        $response = slideModel::sqlShowSlide($table);
        return $response;

    }

}