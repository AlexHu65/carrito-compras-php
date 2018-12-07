<!-- Search form  modal-->
<div class="modal fade" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div id="menu-modal-content" class="modal-content">
            <!--<div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>-->
            <div id="menu-modal-body" class="modal-body">
                <div id="menu-content" class="col-sm-12" style="width: 94%;">


                        <?php

                        for ($i = 0; $i < count($config['categories']); $i++) {

                            echo '<div class="col-sm-2"><h4><a style="font-family: \'Montserrat\', sans-serif; font-weight: 500; font-size: small;" href="' . $config['frontend'] . $config['categories'][$i]['ruta'] . '" class="pixelCategorias"> ' . $config['categories'][$i]['categoria'] . '</a></h4><hr class="limiter"><ul>';

                            $value = $config['categories'][$i]['id'];
                            $item = 'id_categoria';

                            $subCategories = productsController::ctrSubCategories($item, $value);

                            foreach ($subCategories as $key => $value) {
                                echo '<li><a style="font-family: \'Montserrat\', sans-serif; font-size: small;" href="' . $config['frontend'] . $value['ruta'] . '" class="pixelSubCategorias">' . $value['subcategoria'] . '</a></li>';

                            }
                            echo '</ul></div>';
                        } ?>
                </div>
            </div>
        </div>
    </div>
</div>