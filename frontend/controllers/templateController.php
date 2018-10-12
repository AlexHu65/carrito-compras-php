<?php

class templateController
{

    /**
     * Return main ctrTemplate from the view dir
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


    static public function ctrStyleBanner($item, $value)
    {
        $table = 'banner';
        $response = templateModel::mdlStyleBanner($table, $item, $value);
        return $response;


    }

}