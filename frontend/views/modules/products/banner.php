<!-- Banner -->
<figure class="banner">
<?php

$item3 = null;
$value3 = null;
$bannerPaths = null;

$routesBanner = templateController::ctrStyleBanner($item3, $value3);

foreach ($routesBanner as $bannerSetting) {
    $bannerPaths [] = $bannerSetting['ruta'];
}


if (isset($paths[0])) {

    if (!empty($bannerPaths) && in_array($paths[0], $bannerPaths)) {

        $item3 = 'ruta';
        $value3 = $paths[0];

    } else {

        $item3 = 'ruta';
        $value3 = 'sin-categoria';

    }

}else{

    $item3 = 'ruta';
    $value3 = 'sin-categoria';

}

/*Render banner*/

$banner = templateController::ctrStyleBanner($item3, $value3);


echo '<img src="' . $config['backend'] . $banner['img'] . '" class="img-responsive" alt="banner" width="100%">';

$style = (isset($banner['estilo']) && !empty($banner['estilo'])) ? $banner['estilo'] : '';

echo '<div class="textoBanner ' . $style . '">';


//Title 1
if (isset($banner['titulo1']) && !empty($banner['titulo1'])) {

    $title1 = json_decode($banner['titulo1'], 1);
    $color1 = $title1['color'];
    $title1 = $title1['texto'];

    echo '<h1 style="color: ' . $color1 . ';">' . $title1 . '</h1>';
}

//Title 2
if (isset($banner['titulo2']) && !empty($banner['titulo2'])) {

    $title2 = json_decode($banner['titulo2'], 1);
    $color2 = $title2['color'];
    $title2 = $title2['texto'];

    echo '<h2 style="color: ' . $color2 . ';"><strong>' . $title2 . '</strong></h2>';

}

//Title 3
if (isset($banner['titulo3']) && !empty($banner['titulo3'])) {

    $title3 = json_decode($banner['titulo3'], 1);
    $color3 = $title3['color'];
    $title3 = $title3['texto'];

    echo '<h3 style="color: ' . $color3 . ';">' . $title3 . '</h3>';
}


echo '</div></figure>';
//print_r($banner);



