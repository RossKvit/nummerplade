<section class="typical-header">
    <div class="container">
        <div class="header-component header-component--typical">
            <div class="logo">
                <a href="\" class="logo__link"><?php echo $atts['logo']; ?></a>
            </div>
            <nav class="header-nav">
                <ul class="menu">
                    <?php echo $atts['menu']; ?>
                </ul>
            </nav>
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

        <section class="find-number find-number--typical-page">
            <h1 class="find-number__titel find-number__titel--typical-page"><?php echo $atts['title']; ?></h1>
            <p class="find-number__sub-titel"><?php echo $atts['desc']; ?></p>
            <?php echo $atts['find_number_form']; ?>
        </section>
    </div>
</section>