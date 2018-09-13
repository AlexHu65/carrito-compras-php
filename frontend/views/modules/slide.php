<div class="container-fluid" id="slide">

    <div class="row">
        <ul>
            <!-- SLIDE -->
            <?php
            $slide = slideController::ctrShowSlide();
            for ($i = 0; $i < count($slide); $i++) {
                $stylesText = (empty($slide[$i]['estiloTextoSlide'])) ? null : json_decode($slide[$i]['estiloTextoSlide'], 1);
                $stylesImg = (empty($slide[$i]['estiloImgProducto'])) ? null : json_decode($slide[$i]['estiloImgProducto'], 1);
                $stylesTitle1 = (empty($slide[$i]['titulo1'])) ? null : json_decode($slide[$i]['titulo1'], 1);
                $stylesTitle2 = (empty($slide[$i]['titulo2'])) ? null : json_decode($slide[$i]['titulo2'], 1);
                $stylesTitle3 = (empty($slide[$i]['titulo3'])) ? null : json_decode($slide[$i]['titulo3'], 1);
                ?>
                <li>
                    <img src="<?php echo empty($slide[$i]['imgFondo']) ? '' : $pathBackEnd . $slide[$i]['imgFondo'] ?>">
                    <div class="slideOpciones <?php echo $slide[$i]['tipoSlide']; ?>">
                        <img class="imgProducto"
                             src="<?php echo empty($slide[$i]['imgProducto']) ? '' : $pathBackEnd . $slide[$i]['imgProducto'] ?>"
                             style="<?php
                             if ($stylesImg !== null) {
                                 foreach ($stylesImg as $key => $value) {
                                     echo empty($value) ? " " : $key . ":" . $value . '; ';
                                 }
                             }
                             ?>">
                        <div class="textosSlide" style=" <?php

                        if ($stylesText !== null) {
                            foreach ($stylesText as $key => $value) {
                                echo empty($value) ? " " : $key . ":" . $value . '; ';
                            }
                        }

                        ?>">
                            <h1 style="color: <?php echo $stylesTitle1['color']; ?>;"><?php echo $stylesTitle1['texto']; ?></h1>
                            <h2 style="color: <?php echo $stylesTitle2['color']; ?>;"><?php echo $stylesTitle2['texto']; ?></h2>
                            <h3 style="color: <?php echo $stylesTitle3['color']; ?>;"><?php echo $stylesTitle3['texto']; ?></h3>
                            <a href="#">
                                <?php echo (empty($slide[$i]['boton'])) ? '' : $slide[$i]['boton']; ?>
                            </a>
                        </div>
                    </div>
                </li>

            <?php } ?>
        </ul>
        <!-- Pagination -->
        <ol id="paginacion">
            <?php for ($i = 1; $i <= count($slide); $i++) { ?>
                <li id="item-pagination" item="<?php echo $i ; ?>"><span class="fa fa-circle"></span></li>
            <?php } ?>
        </ol>


        <!-- Arrows -->
        <div class="controls" id="play"><span class="fa fa-pause-circle"></span></div>
        <div class="flechas" id="retroceder"><span class="fa fa-chevron-left"></span></div>
        <div class="flechas" id="avanzar"><span class="fa fa-chevron-right"></span></div>

    </div>
</div>

<center>

    <button id="btnSlide" class="backColor"><i class="fa fa-angle-up"></i></button>

</center>