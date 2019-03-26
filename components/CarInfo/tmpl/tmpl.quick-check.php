<div class="quick-check">

    <h3 class="quick-check__list-title"><?php echo $atts['quick_check_title']; ?></h3>
    <ul class="quick-check__list">
        <?php foreach( $atts['quick_check_items'] as $item ): ?>
            <li class="quick-check__list-item"><div class="quick-check__list-style"></div><?php echo $item['text']; ?></li>
        <?php endforeach; ?>
    </ul>
    <p class="quick-check__overview">Se overblik over forsikringspriser på
        bilen <a target="_blank" class="quick-check__overview-link" href="<?php echo $atts['overview_insurance']; ?>">her.</a></p>

    <ul class="loan">
        <li class="loan__item">
            <p class="loan__prop">Billån:</p>
            <span class="loan__val"><a target="_blank" class="typical__link" href="<?php echo $atts['car_loan_1']; ?>">Se oversigt over billån</a></span>
        </li>
        <li class="loan__item">
            <p class="loan__prop">Lån:</p>
            <span class="loan__val"><a target="_blank" class="typical__link" href="<?php echo $atts['car_loan_2']; ?>">Se oversigt over billån</a></span>
        </li>
        <li class="loan__item">
            <?php echo $atts['used_car_parts']; ?>
        </li>
    </ul>
</div>