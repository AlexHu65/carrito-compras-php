<?php

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

    static public function ctrStyleTemplate()
    {

        $table = 'plantilla';

        $response = templateModel::mdlStyleTemplate($table);

        return $response;
    }

    //ToDO: Include all paths in one config file

}