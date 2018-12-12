<?php

$pass = new usersController();
$pass->ctrMissPass();


?>
<div class="modal fade modalForm" id="modalPassword" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Olvido de contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- email register  -->
                <form action="" method="post">


                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-envelope"></i>
                            </span>
                            <input type="email" class="form-control" id="passEmail" name="passEmail" required
                                   placeholder="Correo electr&oacute;nico">
                        </div>
                    </div>


                    <input type="submit" class="btn btn-primary btn-block" value="Enviar">

                </form>
            </div>
            <div class="modal-footer">
               Ya tengo cuenta , <a href="#modalIngreso" data-dismiss="modal" data-toggle="modal">ingresa aqu&iacute;</a>
            </div>

        </div>

    </div>
</div>