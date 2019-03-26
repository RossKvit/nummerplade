<div class="blog-header">
    <div class="container">
        <div class="header-component header-component--blog">
            <div class="logo">
                <a href="\" class="logo__link"><?php echo $atts['logo']; ?></a>
            </div>
            <nav class="header-nav">
                <ul class="menu">
                    <?php echo $atts['menu']; ?>
                </ul>
            </nav>
        </div>
        <div class="blog-header__biglogo">
            <?php echo $atts['header_middle_image']; ?>
        </div>
        <h1 class="blog-header__titel"><?php echo $atts['title']; ?></h1>
        <form action="<?php echo $atts['form_action'] ?>" method="get" class="licenseplate-search">
            <div class="licenseplate-search__flag">
                <img class="licenseplate-search__flag-img" src="<?php echo $atts['num_icon_url']; ?>" alt="">
                <p>DK</p>
            </div>
            <input type="radio" id="radio1" name="search_type" value="number" checked hidden />
            <input type="text" name="number"  class="licenseplate-search__input">
            <input type="submit" value="Søg efter bil" class="licenseplate-search__button">
        </form>
    </div>
</div>
<div class="burger-wrap burger-wrap--header-disp">
    <div class="nav-resp-btn">
        <div class="one"></div>
        <div class="two"></div>
        <div class="three"></div>
    </div>
    <div class="burger-menu">
        <ul>
            <?php echo $atts['menu']; ?>
        </ul>
    </div>
</div>