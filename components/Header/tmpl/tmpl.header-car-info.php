<div class="info-header">
    <div class="container">
        <div class="info-header-content-wrap">
            <div class="logo logo--infoheader">
                <a href="\" class="logo__link"><?php echo $atts['logo']; ?></a>
            </div>
            <div class="search-and-menubtn-wrap">
                <form action="<?php echo $atts['form_action'] ?>" method="get" class="licenseplate-search licenseplate-search--infoheader">
                    <div class="licenseplate-search__flag licenseplate-search__flag--infoheader">
                        <img class="licenseplate-search__flag-img licenseplate-search__flag-img--infoheader" src="<?php echo $atts['num_icon_url']; ?>" alt="">
                        <p>DK</p>
                    </div>
                    <input type="radio" id="radio1" name="search_type" value="number" checked hidden />
                    <input type="text" name="number" class="licenseplate-search__input licenseplate-search__input--infoheader" />
                    <input type="submit" value="Søg efter bil" class="licenseplate-search__button licenseplate-search__button--infoheader" />

                </form>
                <div class="burger-wrap burger-wrap--infoheader">
                    <div class="nav-resp-btn nav-resp-btn--infoheader">
                        <div class="one-infoheader"></div>
                        <div class="two two-infoheader"></div>
                        <div class="three-infoheader"></div>
                    </div>
                    <div class="burger-menu">
                        <ul>
                            <?php echo $atts['menu']; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>