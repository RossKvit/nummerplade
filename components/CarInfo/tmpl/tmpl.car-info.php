<section class="car-info">
    <div class="container">
        <div class="car-info__wrap">

            <?php if( isset( $atts['not_found'] ) && $atts['not_found'] == true ): ?>

                <?php echo $atts['not_found_tmpl']; ?>

            <?php else: ?>

                <section class="leftbar">
                    <div class="leftbar-wrap">
                        <?php
                            echo $atts['quick-check'];
                            echo $atts['before-buying'];
                        ?>
                    </div>
                </section>

                <ul class="main-info">

                    <li class="main-info__nav">
                        <ul class="main-info__list">
                            <li class="main-info__item overview-btn tab-active">Overblik</li>
                            <li class="main-info__item debt-btn">Gæld i bilen</li>
                            <li class="main-info__item reports-btn">Synsrapporter</li>
                            <li class="main-info__item technical-btn">Teknisk info</li>
                            <li class="main-info__item charges-btn">Afgifter</li>
                        </ul>
                    </li>

                    <li class="overview-info info-disp">
                        <?php echo $atts['overview']; ?>
                    </li>

                    <li class="debt-info info-disp">
                        <?php echo $atts['debts']; ?>
                    </li>

                    <li class="reports-info info-disp">
                        <?php echo $atts['visual-reports']; ?>
                        <!--<p class="reports-info__text">Næste planlagte syn: Ingen syn planlagt</p>-->
                    </li>

                    <li class="technical-info info-disp">
                        <?php echo $atts['technical-info']; ?>
                    </li>

                    <li class="charges-info info-disp">
                        <?php echo $atts['costs']; ?>
                    </li>

                </ul>

            <?php endif; ?>

        </div>
    </div>
</section>
