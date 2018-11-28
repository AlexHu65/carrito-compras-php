<div class="col-md-5 col-sm-6 col-xs-12 visorImg">

    <figure class="visor">
        <?php if (isset($multimedia) && sizeof($multimedia) > 0 && $multimedia != null) {

            for ($i = 0; $i < count($multimedia); $i++) {
                ?>
                <img id="lupa<?= ($i + 1) ?>" src="<?= $config['backend'] . $multimedia[$i]['picture']; ?>"
                     alt="<?= strtolower($infoProduct['titulo']) . ($i + 1); ?>">
            <?php }
        } ?>
    </figure>

    <!-- end thumbnails -->

    <!-- Place somewhere in the <body> of your page -->
    <div class="flexslider carousel">   
        <ul class="slides">
            <?php if (isset($multimedia) && sizeof($multimedia) > 0 && $multimedia != null) {

                for ($i = 0; $i < count($multimedia); $i++) {
                    ?>
                    <li>
                        <img value="<?= ($i + 1) ?>"
                             src="<?= $config['backend'] . $multimedia[$i]['picture']; ?>"
                             alt="<?= strtolower($infoProduct['titulo']) . ($i + 1); ?>">
                    </li>
                <?php }
            } ?>       
        </ul>
    </div>
</div>