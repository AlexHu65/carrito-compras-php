<div id="modalComments" class="modal fade modalForm" role="dialog">
       <div class="modal-content modal-dialog">
        <div class="modal-body modalTitle">
            <h3>Califica producto</h3>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <form method="post">
                <h1 class="text-center" id="start">

                    <i class="fa fa-star text-success" aria-hidden="true"></i>
                    <i class="fa fa-star text-success" aria-hidden="true"></i>
                    <i class="fa fa-star text-success" aria-hidden="true"></i>
                    <i class="fa fa-star text-success" aria-hidden="true"></i>
                    <i class="fa fa-star text-success" aria-hidden="true"></i>
                    <i class="fa fa-star text-success" aria-hidden="true"></i>

                </h1>
                <div class="form-group">
                    <label class="radio-inline"><input type="radio" name="points" value="0.5">0.5</label>
                    <label class="radio-inline"><input type="radio" name="points" value="1.0">1.0</label>
                    <label class="radio-inline"><input type="radio" name="points" value="1.5">1.5</label>
                    <label class="radio-inline"><input type="radio" name="points" value="2.0">2.0</label>
                    <label class="radio-inline"><input type="radio" name="points" value="2.5">2.5</label>
                    <label class="radio-inline"><input type="radio" name="points" value="3.0">3.0</label>
                    <label class="radio-inline"><input type="radio" name="points" value="3.5">3.5</label>
                    <label class="radio-inline"><input type="radio" name="points" value="4.0">4.0</label>
                    <label class="radio-inline"><input type="radio" name="points" value="5.0" checked>5.0</label>
                </div>
                <input type="hidden" value="" name="idUserComment" id="idUserComment">
                <input type="hidden" value="" name="idProductComment" id="idProductComment">

                <br>

                <div class="form-group">
                    <label for="comment" class="text-muted">Dejanos tu oponi&oacute;n:
                        <span><small>(maximo 300 caracteres)</small></span>
                    </label>
                    <hr>
                    <textarea name="comment" id="comment" maxlength="300" cols="70" required rows="5"></textarea>
                    <input type="submit" class="btn btn-default btn-block" value="Enviar">
                </div>
            </form>
        </div>
        <div class="modal-footer">

        </div>
    </div>
</div>