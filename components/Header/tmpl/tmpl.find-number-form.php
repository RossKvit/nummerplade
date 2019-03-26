<form action="<?php echo $atts['form_action'] ?>" method="get">
    <div class="find-number__select-car">
        <div class="find-number__checkbox-wrap">
            <input type="radio" id="radio" name="search_type" value="vin"/>
            <label for="radio">Stelnummer</label>
        </div>
        <div class="find-number__checkbox-wrap">
            <input type="radio" id="radio1" name="search_type" value="number" checked/>
            <label for="radio1">Nummerplade</label>
        </div>
    </div>
    <div class="licenseplate-search">
        <div class="licenseplate-search__flag">
            <img class="licenseplate-search__flag-img" src="<?php echo $atts['num_icon_url']; ?>" alt="">
            <p>DK</p>
        </div>
        <input type="text" name="number" class="licenseplate-search__input">
        <input class="licenseplate-search__button" type="submit" value="Søg efter bil" >
    </div>
</form>