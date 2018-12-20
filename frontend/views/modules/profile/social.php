<br>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="hidden" name="id_user" id="id_user" value="<?= $_SESSION['user']['id'] ?>">
        <input type="hidden" name="mode" id="mode" value="<?= $_SESSION['user']['mode'] ?>">
        <label for="edit-name">Nombre:</label>
        <div class="input-group">
        <span class="input-group-addon"><i
                    class="glyphicon glyphicon-user"></i></span>
            <input id="edit-name" name="edit-name" class="form-control" type="text" readonly
                   value="<?= $_SESSION['user']['nombre'] ?>">
        </div>
        <br>
        <label for="edit-email">Email:</label>
        <div class="input-group">
        <span class="input-group-addon"><i
                    class="glyphicon glyphicon-envelope"></i></span>
            <input id="edit-email" name="edit-email" class="form-control " type="text" readonly
                   value="<?= $_SESSION['user']['email'] ?>">
        </div>
        <br>
        <label for="edit-tel">Tel:</label>
        <div class="input-group">
        <span class="input-group-addon"><i
                    class="glyphicon glyphicon-phone"></i></span>
            <input id="edit-tel" name="edit-tel" class="form-control text-uppercase"
                   type="text" value="">
        </div>
        <br>
        <label for="edit-tel2">Tel2 (Opcional):</label>
        <div class="input-group">
        <span class="input-group-addon"><i
                    class="glyphicon glyphicon-phone"></i></span>
            <input id="edit-tel2" name="edit-tel2" class="form-control text-uppercase" type="text" value="">
        </div>
        <br>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <label for="edit-direction">Calle y numero: </label>
        <div class="input-group">
        <span class="input-group-addon"><i
                    class="glyphicon glyphicon-user"></i></span>
            <input id="edit-direction" name="edit-direction" class="form-control text-uppercase" type="text" value="">
        </div>
        <br>
        <label for="edit-colonia">Colonia:</label>
        <div class="input-group">
        <span class="input-group-addon"><i
                    class="glyphicon glyphicon-arrow-right"></i></span>
            <input id="edit-colonia" name="edit-colonia" class="form-control text-uppercase" type="text" value="">
        </div>
        <br>
        <label for="edit-references">Referencias de direcci&oacute;n:</label>
        <div class="input-group">
        <span class="input-group-addon"><i
                    class="glyphicon glyphicon-info-sign"></i></span>
            <input id="edit-references" name="edit-references" class="form-control text-uppercase" type="text" value="">
        </div>
        <br>
        <label for="edit-zip">C.P:</label>
        <div class="input-group">
        <span class="input-group-addon"><i
                    class="glyphicon glyphicon-map-marker"></i></span>
            <input id="edit-zip" name="edit-zip" class="form-control text-uppercase" type="text" value="">
        </div>

    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12 buttons">
        <input class="btn btn-success" type="submit" value="Guardar">
        <button class="btn btn-danger">Borrar cuenta</button>
    </div>
</div>