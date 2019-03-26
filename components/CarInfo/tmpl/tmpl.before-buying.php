<div class="before-buying">
    <h3 class="before-buying__list-title"><?php echo $atts['before_baying_title']; ?></h3>
    <ul class="before-buying__list">

        <?php $i = 1; foreach( $atts['before_baying_items'] as $item ): ?>
        <li class="before-buying__list-item">
            <span class="before-buying__counter"> <?php echo $i; ?></span>
            <h4 class="before-buying__item-title before-buying__list-item--1"><?php echo $item['title']; ?></h4>
            <?php echo content_viewer( $item['desc'] ); ?>
        </li>
        <?php $i++; endforeach; ?>
    </ul>
</div>