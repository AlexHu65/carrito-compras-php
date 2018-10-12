<div class="container-fluid productos">
    <div class="container">
        <div class="row">
            <ul class="breadcrumb fondoBreadCrumb">
                <li>
                    <a href="<?= $config['frontend'] ?>">Home</a>
                </li>
                <li class="active paginaActiva">
                    <?= $paths[0]; ?>
                </li>
            </ul>
            <hr>
        </div>
    </div>
</div>

<div class="container-fluid infoproducto">
    <div class="container">
        <!-- Info products -->
        <div class="row">

            <div class="col-md-5 col-sm-6 col-xs-12 visorImg">

                <figure class="visor">
                    <img id="lupa1" src="<?= $config['backend'] ?>views/img/multimedia/tennis-verde/img-01.jpg"
                         alt="tennis verde tenis">
                    <img id="lupa2" src="<?= $config['backend'] ?>views/img/multimedia/tennis-verde/img-02.jpg"
                         alt="tennis verde tenis">
                    <img id="lupa3" src="<?= $config['backend'] ?>views/img/multimedia/tennis-verde/img-03.jpg"
                         alt="tennis verde tenis">
                    <img id="lupa4" src="<?= $config['backend'] ?>views/img/multimedia/tennis-verde/img-04.jpg"
                         alt="tennis verde tenis">
                    <img id="lupa5" src="<?= $config['backend'] ?>views/img/multimedia/tennis-verde/img-05.jpg"
                         alt="tennis verde tenis">
                </figure>

                <!-- Place somewhere in the <body> of your page -->
                <div class="flexslider carousel">   
                    <ul class="slides">     
                        <li>
                            <img value="1" src="<?= $config['backend'] ?>views/img/multimedia/tennis-verde/img-01.jpg"
                                 alt="tennis verde tenis">
                        </li>
                            
                        <li>
                            <img value="2" src="<?= $config['backend'] ?>views/img/multimedia/tennis-verde/img-02.jpg"
                                 alt="tennis verde tenis">
                        </li>
                            
                        <li>
                            <img value="3" src="<?= $config['backend'] ?>views/img/multimedia/tennis-verde/img-03.jpg"
                                 alt="tennis verde tenis">
                        </li>
                            
                        <li><img value="4" src="<?= $config['backend'] ?>views/img/multimedia/tennis-verde/img-04.jpg"
                                 alt="tennis verde tenis">
                        </li>
                        <li>
                            <img value="5" src="<?= $config['backend'] ?>views/img/multimedia/tennis-verde/img-05.jpg"
                                 alt="tennis verde tenis">
                        </li>
                            <!-- items mirrored twice, total of 12 -->                          
                    </ul>
                </div>
            </div>
            <div class="col-md-7 col-sm-6 col-xs-12">
            <!-- lupa -->
            <figure class="lupa">

                <img src="" alt="">
            </figure>
            </div>


        </div>
    </div>

</div>