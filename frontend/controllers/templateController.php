<?php

/**
 * Created by PhpStorm.
 * User: alejandro.chavez
 * Date: 8/29/2018
 * Time: 11:38 AM
 */
class templateController
{

    /**
     * Return main template from the view dir
     *
     */

    public function template()
    {

        include './views/template.php';
    }

    //ToDO: Include all paths in one config file


}