<div class="modal fade modalForm" id="modalIngreso" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-sm-6 col-xs-12 facebook " id="btnFacebookRegister">
                    <p>
                        <i class="fa fa-facebook"></i>
                        Usando Facebook
                    </p>
                </div>
                <!-- google register -->
                <div class="col-sm-6 col-xs-12 google " id="btnFacebookRegister">
                    <p>
                        <i class="fa fa-google"></i>
                        Usando Google
                    </p>
                </div>

                <!-- email register -->
                <form action="#" method="post" onsubmit="return userRegister()">
                    <hr>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-envelope"></i>
                            </span>
                            <input type="email" class="form-control" id="emailLogin" name="emailLogin" required
                                   placeholder="Correo electr&oacute;nico">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-lock"></i>
                            </span>
                            <input type="password" class="form-control" id="logPass" name="logPass" required
                                   placeholder="Contraseña">
                        </div>
                    </div>

                    <script type="text/javascript">(function (w, d) {
                            var loader = function () {
                                var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0];
                                s.src = "https://cdn.iubenda.com/iubenda.js";
                                tag.parentNode.insertBefore(s, tag);
                            };
                            if (w.addEventListener) {
                                w.addEventListener("load", loader, false);
                            } else if (w.attachEvent) {
                                w.attachEvent("onload", loader);
                            } else {
                                w.onload = loader;
                            }
                        })(window, document);</script>
                    <input type="submit" class="btn btn-primary btn-block" value="Enviar">

                </form>
            </div>
        </div>
    </div>
</div>