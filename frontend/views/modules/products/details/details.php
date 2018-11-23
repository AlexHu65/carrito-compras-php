<?php

//var_dump($details);

//first attempt

/*

if (isset($details['Talla']) && $details['Talla'] != null) {

echo '<div class="col-md-3 col-xs-12">
    <select class="form-control seleccionarDetalle" id="seleccionarTalla">

        <option value="">Talla</option>';

        for ($i = 0; $i >= count($details['Talla']); $i++) {

        echo '<option value="' . $details['Talla'][$i] . '">' . $details['Talla'][$i] . '</option>';
        }

        echo '</select>
</div>';

}

if (isset($details['Color']) && $details['Color'] != null) {

echo '<div class="col-md-3 col-xs-12">
    <select class="form-control seleccionarDetalle" id="seleccionarTalla">

        <option value="">Color</option>';

        for ($i = 0; $i <= count($details['Color']); $i++) {

        echo '<option value="' . $details['Color'][$i] . '">' . $details['Color'][$i] . '</option>';                            }

        echo '</select>
</div>';

}

if (isset($details['Marca']) && $details['Marca'] != null) {

echo '<div class="col-md-3 col-xs-12">
    <select class="form-control seleccionarDetalle" id="seleccionarTalla">

        <option value="">Marca</option>';

        for ($i = 0; $i <= count($details['Marca']); $i++) {
        echo '<option value="' . $details['Marca'][$i] . '">' . $details['Marca'][$i] . '</option>';
        }

        echo '</select>
</div>';

}*/


if (isset($infoProduct['tipo']) && $infoProduct['tipo'] == 'fisico') {

    echo '<div id="product-details" class="col-md-7 col-sm-6 col-xs-12">';

    echo '<ul class="details">';

    foreach ($details as $key => $detail) {

        if ($details[$key] != null) {

            echo '<li>' . $key . ':';

            echo '<select class="form-control seleccionarDetalle" id="seleccionarTalla">';

            for ($i = 0; $i < count($detail); $i++) {

                echo '<option value="' . $detail[$i] . '">' . $detail[$i] . '</option>';
            }

            echo '</select></li>';
        }
    }

    echo '</ul>';

    echo '</div>';

} else {

    echo '<div id="product-details" class="col-sm-6 col-xs-12">';

    echo '<ul class="details">';

    foreach ($details as $key => $detail) {

        if ($details[$key] != null) {

            echo '<li class="text-muted"><strong><span class="fa fa-angle-right"></span></strong>  '.$detail . '</li>';

        }
    }

    echo '</ul>';

    echo '</div>';

}


//second attempts






                    