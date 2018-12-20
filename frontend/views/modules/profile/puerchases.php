<?php
$item = 'id_usuario';
$value = $_SESSION['user']['id'];
$purchases = usersController::ctrShowPuerchases($item, $value);
?>
<br>
<div class="panel-group">


    <?php

    if ($purchases) {
        for ($i = 0; $i < count($purchases); $i++) {

            $order = 'id';
            $item = 'id';
            $value = $purchases[$i]['id_producto'];
            $product = productsController::ctrListProducts($order, $item, $value);

            foreach ($product as $key => $value) {

                $data = ['idUser' => $_SESSION['user']['id'], 'idProduct' => $value['id']];
                $comments = usersController::ctrShowComments($data);


                ?>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <figure>
                                <?php

                                $newportada = str_replace('vistas', 'views', $value['portada']);

                                ?>
                                <img class="img-thumbnail" src="<?= $config['backend'] . $newportada ?>" alt="">
                            </figure>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <h1>
                                <small><?= $value['titulo'] ?></small>
                            </h1>
                            <p>
                                <small><?= $value['titular'] ?></small>
                            </p>

                            <?php
                            if ($value['tipo'] == 'virtual') {
                                ?>

                                <a href="<?= $config['frontend'] . '/course' ?>">
                                    <button class="btn btn-default pull-left">Ir al curso</button>
                                </a>

                                <?php
                            } else { ?>
                                <h6>Proceso de entrega: <?= $value['entrega'] ?> d&iacute;as habiles</h6>
                                <?php

                                if ($purchases[$i]['envio'] == 0) { ?>

                                    <div class="progess">
                                        <div class="progress-bar progress-bar-info" role="progressbar"
                                             style="width: 33.33%">
                                            <i class="fa fa-check"></i> Despachado

                                        </div>
                                        <div class="progress-bar progress-bar-default" role="progressbar"
                                             style="width: 33.33%">
                                            <i class="fa fa-clock-o"></i> Enviando

                                        </div>
                                        <div class="progress-bar progress-bar-success" role="progressbar"
                                             style="width: 33.33%">
                                            <i class="fa fa-clock-o"></i> Entregado

                                        </div>

                                    </div>

                                    <?php
                                }


                            }
                            ?>

                            <h4 class="pull-right">
                                <small><b>Fecha de compra: </b><?= substr($purchases[$i]['fecha'], 0, -8) ?></small>
                            </h4>
                        </div>
                        <div class="col-md-4 col-xs-12">

                            <div class="pull-right">
                                <a id="user-comment-button" href="#modalComments" data-toggle="modal"
                                   idUser="<?= $_SESSION['user']['id']; ?>" idProduct="<?= $value['id'] ?>">
                                    <button class="btn btn-default">
                                        Calificar
                                    </button>
                                </a>
                            </div>
                            <br>
                            <br>
                            <div class="pull-right">
                                <h3 class="text-center">

                                    <?php if ($comments['calificacion'] == 0 && $comments["comentario"] == "") { ?>

                                        <i class="fa fa-star-o text-success" aria-hidden="true"></i>
                                        <i class="fa fa-star-o text-success" aria-hidden="true"></i>
                                        <i class="fa fa-star-o text-success" aria-hidden="true"></i>
                                        <i class="fa fa-star-o text-success" aria-hidden="true"></i>
                                        <i class="fa fa-star-o text-success" aria-hidden="true"></i>
                                        <i class="fa fa-star-o text-success" aria-hidden="true"></i>

                                    <?php } else {

                                        switch ($comments["calificacion"]) {

                                            case 0.5:
                                                echo '<i class="fa fa-star-half-o text-success" aria-hidden="true"></i>
																  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
                                                break;

                                            case 1.0:
                                                echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
																  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
                                                break;

                                            case 1.5:
                                                echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
																  <i class="fa fa-star-half-o text-success" aria-hidden="true"></i>
																  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
                                                break;

                                            case 2.0:
                                                echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
																  <i class="fa fa-star text-success" aria-hidden="true"></i>
																  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
                                                break;

                                            case 2.5:
                                                echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
																  <i class="fa fa-star text-success" aria-hidden="true"></i>
																  <i class="fa fa-star-half-o text-success" aria-hidden="true"></i>
																  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
                                                break;

                                            case 3.0:
                                                echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
																  <i class="fa fa-star text-success" aria-hidden="true"></i>
																  <i class="fa fa-star text-success" aria-hidden="true"></i>
																  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
                                                break;

                                            case 3.5:
                                                echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
																  <i class="fa fa-star text-success" aria-hidden="true"></i>
																  <i class="fa fa-star text-success" aria-hidden="true"></i>
																  <i class="fa fa-star-half-o text-success" aria-hidden="true"></i>
																  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
                                                break;

                                            case 4.0:
                                                echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
																  <i class="fa fa-star text-success" aria-hidden="true"></i>
																  <i class="fa fa-star text-success" aria-hidden="true"></i>
																  <i class="fa fa-star text-success" aria-hidden="true"></i>
																  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
                                                break;

                                            case 4.5:
                                                echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
																  <i class="fa fa-star text-success" aria-hidden="true"></i>
																  <i class="fa fa-star text-success" aria-hidden="true"></i>
																  <i class="fa fa-star text-success" aria-hidden="true"></i>
																  <i class="fa fa-star-half-o text-success" aria-hidden="true"></i>';
                                                break;

                                            case 5.0:
                                                echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
																  <i class="fa fa-star text-success" aria-hidden="true"></i>
																  <i class="fa fa-star text-success" aria-hidden="true"></i>
																  <i class="fa fa-star text-success" aria-hidden="true"></i>
																  <i class="fa fa-star text-success" aria-hidden="true"></i>';
                                                break;

                                        }

                                    } ?>
                                </h3>
                                <p class="panel panel-default" style="padding: 5px; width: 100%;">
                                    <small>
                                        <?= $comments['comentario']; ?>
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }

    } else { ?>

        <div class="col-xs-12 text-center error404">
            <h2>
                <small>A&uacute;n no tienes compras realizadas</small>
            </h2>
            <h3>Cuando realices una compra aqui se mostrara toda su informaci&oacute;n</h3>
        </div>

    <?php } ?>


</div>