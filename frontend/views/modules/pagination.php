<?php

$totalPages = ceil(count($listProducts) / 12);

if ($totalPages > 4) {

    if ($paths[1] == 1) {

        echo '<ul id="paginationProducts" class="pagination">';

        for ($i = 1; $i <= 5; $i++) {

            echo '<li class="page-item ' . ($paths[1] == $i ? 'active' : '') . '"><a href="' . $config['frontend'] . $paths[0] . '/' . $i . '"> ' . $i . '</a></li>';

        }

        echo '<li class="page-item" data-toggle="tooltip" data-original-title="Siguiente"><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/' . ($i - 4) . '"><i class="fa fa-angle-right"></i></a></li>';
        echo '<li class="page-item" data-toggle="tooltip" data-original-title="&Uacute;ltima p&aacute;gina"><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/' . $totalPages . '"><i class="fa fa-angle-double-right"></i></a></li>';
        echo '</ul>';


    } else

        if ($paths[1] == $totalPages) {

            echo '<ul id="paginationProducts" class="pagination">';
            echo '<li class="page-item" data-toggle="tooltip" data-original-title="Primera p&aacute;gina"><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/1"><i class="fa fa-angle-double-left"></i></a></li>';
            echo '<li class="page-item" data-toggle="tooltip" data-original-title="Anterior"><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/' . ($totalPages - 1) . '"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>';

            for ($i = ($totalPages - 3); $i <= $totalPages; $i++) {

                echo '<li class="page-item ' . ($paths[1] == $i ? 'active' : '') . '"><a href="' . $config['frontend'] . $paths[0] . '/' . $i . '"> ' . $i . '</a></li>';

            }

            echo '</ul>';


        } else if (
            $paths[1] != $totalPages &&
            $paths[1] != 1 &&
            $paths[1] < ($totalPages / 2) &&
            $paths[1] < $totalPages - 3

        ) {

            $actualPage = $paths[1];

            echo '<ul id="paginationProducts" class="pagination">';
            echo '<li class="page-item" data-toggle="tooltip" data-original-title="Primera p&aacute;gina"><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/1"><i class="fa fa-angle-double-left"></i></a></li>';
            echo '<li class="page-item" data-toggle="tooltip" data-original-title="Anterior"><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/' . ($actualPage - 1) . '"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>';


            for ($i = $actualPage; $i <= ($actualPage + 3); $i++) {

                echo '<li class="page-item ' . ($actualPage == $i ? 'active' : '') . '"><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/' . $i . '"> ' . $i . '</a></li>';

            }

            echo '<li class="page-item" data-toggle="tooltip" data-original-title="Siguiente"><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/' . ($actualPage + 1) . '"><i class="fa fa-angle-right"></i></a></li>';
            echo '<li class="page-item" data-toggle="tooltip" data-original-title="&Uacute;ltima p&aacute;gina"><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/' . $totalPages . '"><i class="fa fa-angle-double-right"></i></a></li>';
            // echo '<li class="disabe"><a href="' . $config['frontend'] . $paths[0] . '/' . $totalPages . '">' . $totalPages . '</a></li>';
            echo '</ul>';

        } else if (
            $paths[1] != $totalPages &&
            $paths[1] != 1 &&
            $paths[1] >= ($totalPages / 2) &&
            $paths[1] < $totalPages - 3


        ) {

            $actualPage = $paths[1];


            echo '<ul id="paginationProducts" class="pagination">';

            echo '<li class="page-item" data-toggle="tooltip" data-original-title="Primera p&aacute;gina"><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/1"><i class="fa fa-angle-double-left"></i></a></li>';
            echo '<li class="page-item" data-toggle="tooltip" data-original-title="Anterior"><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/' . ($actualPage - 1) . '"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>';

            for ($i = $actualPage; $i <= ($actualPage + 3); $i++) {

                echo '<li class="page-item ' . ($actualPage == $i ? 'active' : '') . '"><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/' . $i . '"> ' . $i . '</a></li>';

            }

            echo '<li class="page-item" data-toggle="tooltip" data-original-title="Siguiente" ><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/' . ($actualPage + 1) . '"><i class="fa fa-angle-right"></i></a></li>';
            echo '<li class="page-item" data-toggle="tooltip" data-original-title="&Uacute;ltima p&aacute;gina" ><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/' . $totalPages . '"><i class="fa fa-angle-double-right"></i></a></li>';


            echo '</ul>';

        } else {

            $actualPage = $paths[1];

            echo '<ul id="paginationProducts" class="pagination">';

            echo '<li class="page-item" data-toggle="tooltip" data-original-title="Primera p&aacute;gina"><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/1"><i class="fa fa-angle-double-left"></i></a></li>';
            echo '<li class="page-item" data-toggle="tooltip" data-original-title="Anterior"><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/' . ($actualPage - 1) . '"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>';

            for ($i = ($totalPages - 3); $i <= $totalPages; $i++) {

                echo '<li class="page-item ' . ($actualPage == $i ? 'active' : '') . '"><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/' . $i . '"> ' . $i . '</a></li>';

            }
            echo '<li class="page-item" data-toggle="tooltip" data-original-title="Siguiente"><a href="' . $config['frontend'] . $paths[0] . '/' . ($actualPage + 1) . '"><i class="fa fa-angle-right"></i></a></li>';
            echo '<li class="page-item" data-toggle="tooltip" data-original-title="&Uacute;ltima p&aacute;gina"><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/' . $totalPages . '"><i class="fa fa-angle-double-right"></i></a></li>';


            echo '</ul>';

        }
} else {

    echo '<ul id="paginationProducts" class="pagination">';

    for ($i = 1; $i <= $totalPages; $i++) {

        echo '<li class="page-item ' . ($paths[1] == $i ? 'active' : '') . '" class="page-item"><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/' . $i . '"> ' . $i . '</a></li>';
    }
    echo '</ul>';
}