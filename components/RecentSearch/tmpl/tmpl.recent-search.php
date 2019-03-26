<section class="search">
    <div class="container">
        <h2 class="sections-caption"><?php echo $atts['recent_block_title']; ?></h2>
        <div class="search__list">

            <?php foreach( $atts['cars_list'] as $item ): ?>
                <div class="search__item">
                    <a href="<?php echo $item['car_link']; ?>">
                        <div class="search__top">
                            <div class="search__imgwrap">
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/car1.svg" alt="" class="search__img">
                            </div>
                            <h4 class="search__caption"><?php echo $item['car_full_name']; ?></h4>
                        </div>
                        <div class="search__left-rightwrap">
                            <p class="search__information">MODEL ÅRGANG</p>
                            <span class="search__information--right"><?php echo $item['car_produced_date']; ?></span>
                        </div>
                        <div class="search__left-rightwrap">
                            <p class="search__information">INDREGISTRERET</p>
                            <span class="search__information--right"><?php echo $item['car_first_registered']; ?></span>
                        </div>
                        <div class="search__left-rightwrap">
                            <p class="search__information">ART</p>
                            <span class="search__information--right"><?php echo $item['car_type']; ?></span>
                        </div>
                        <div class="search__left-rightwrap">
                            <p class="search__information">REG.NUMMER</p>
                            <span class="search__information--right"><?php echo $item['car_reg_number']; ?></span>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>

        </div>
        <?php if( $atts['recent_page_link'] ): ?>
            <a href="<?php echo $atts['recent_page_link']; ?>" class="search__button">ALLE BILTJEK I DAG <span>></span></a>
        <?php endif; ?>
    </div>
</section>