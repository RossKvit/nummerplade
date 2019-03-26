<section class="find-number">
    <div class="container">
        <div class="header-component-helper">
            <div class="header-component fix">
                <div class="container">
                    <div class="logo">
                        <a href="\" class="logo__link"><?php echo $atts['logo']; ?></a>
                    </div>
                    <nav class="header-nav">
                        <ul class="menu">
                            <?php echo $atts['menu']; ?>
                        </ul>
                    </nav>
                </div>

                <div class="burger-wrap burger-wrap--disp">
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
            </div>
        </div>

        <h1 class="find-number__titel"><?php echo $atts['title']; ?></h1>
        <p class="find-number__sub-titel"><?php echo $atts['desc']; ?></p>
        <?php echo $atts['find_number_form']; ?>
    </div>
</section>