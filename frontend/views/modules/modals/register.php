<?php


$register = new usersController();
$register->ctrRegisterUser();


?>
<div class="modal fade modalForm" id="modalRegistro" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Registro de usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- facebook register -->

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

                <!-- email register  -->
                <form action="" method="post" onsubmit="return userRegister()">

                    <div class="form-group">
                        <div id="userNameGroup" class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <input type="text" class="form-control text-uppercase" id="regUser" name="regUser"
                                   placeholder="Nombre">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-envelope"></i>
                            </span>
                            <input type="email" class="form-control" id="emailReg" name="emailReg" required
                                   placeholder="Correo electr&oacute;nico">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-lock"></i>
                            </span>
                            <input type="password" class="form-control" id="regPass" name="regPass" required
                                   placeholder="Contraseña">
                        </div>
                    </div>

                    <div class="checkBox">
                        <label>
                            <input type="checkbox" id="regTerms">
                            <small>
                                Al registrarse usted acepta nuestra condiciones de &uacute;so y pol&iacute;ticas de privacidad
                            </small>
                            <br>
                            <br>
                            <a href="https://www.iubenda.com/privacy-policy/52151536"
                               class="iubenda-black iubenda-embed "
                               title="Politicas de uso y privacidad">Leer m&aacute;s</a>
                        </label>
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
            <div class="modal-footer">
               Ya tengo cuenta , <a href="#modalIngreso" data-dismiss="modal" data-toggle="modal">ingresa aqu&iacute;</a>
            </div>

        </div>

    </div>
</div>