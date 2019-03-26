<h2 class="overview-info__title">
    <?php echo $atts['car_full_name']; ?>
</h2>
<ul class="overview-info__list" id="car_reg_num" data-car-num="<?php echo $atts['car_reg_number']; ?>" >
    <li class="overview-info__item">
        <div class="overview-info__property">MODEL ÅRGANG</div>
        <div class="overview-info__value"><?php echo $atts['car_produced_date']; ?></div>
    </li>
    <li class="overview-info__item">
        <div class="overview-info__property">INDREGISTRERET</div>
        <div class="overview-info__value"><?php echo $atts['car_first_registered']; ?></div>
    </li>
    <li class="overview-info__item">
        <div class="overview-info__property">REG. NUMMER</div>
        <div class="overview-info__value"><?php echo $atts['car_reg_number']; ?></div>
    </li>
    <li class="overview-info__item">
        <div class="overview-info__property">STELNUMMER</div>
        <div class="overview-info__value"><?php echo $atts['car_vin']; ?></div>
    </li>
    <li class="overview-info__item">
        <div class="overview-info__property">FORSIKRING</div>
        <div class="overview-info__value"><a href="<?php echo $atts['car_insurance']; ?>" class="typical__link" target="_blank" >Se forsikringspriser på bilen her</a></div>
    </li>
    <li class="overview-info__item">
        <div class="overview-info__property">FINANSIERING</div>
        <div class="overview-info__value">* Beregn mdl. ydelse hos Santander</div>
    </li>
    <li class="overview-info__item">
        <div class="overview-info__property">STATUS</div>
        <div class="overview-info__value"><?php echo $atts['car_registration_status']; ?></div>
    </li>
    <li class="overview-info__item">
        <div class="overview-info__property">OPGIVET FORBRUG</div>
        <div class="overview-info__value"><?php echo $atts['car_km_per_liter']; ?> km/l</div>
    </li>
    <li class="overview-info__item">
        <div class="overview-info__property">NÆSTE SYN</div>
        <div class="overview-info__value"><?php echo $atts['car_next_vision']; ?></div>
    </li>
    <li class="overview-info__item">
        <div class="overview-info__property">SIDST SYNET</div>
        <div class="overview-info__value">
            <p><?php echo $atts['visual_report_date'] .' / '. $atts['visual_report_result'] .' / '. $atts['visual_report_mileage'] ; ?></p>
            <p class="typical__link reports-btn" >Se alle rapporter</p>
        </div>
    </li>
    <li class="overview-info__item">
        <div class="overview-info__property">Art</div>
        <div class="overview-info__value"><?php echo $atts['kind_name']; ?></div>
    </li>
    <li class="overview-info__item">
        <div class="overview-info__property">Postnummer</div>
        <div class="overview-info__value"><?php echo $atts['postal_code']; ?></div>
    </li>
    <li class="overview-info__item">
        <div class="overview-info__property">Motor</div>
        <div class="overview-info__value"><?php echo $atts['variant_type_name']; ?></div>
    </li>
    <li class="overview-info__item">
        <div class="overview-info__property">Farve</div>
        <div class="overview-info__value"><?php echo $atts['color_type_name']; ?></div>
    </li>
    <li class="overview-info__item">
        <div class="overview-info__property">Fælge/Dæk</div>
        <div class="overview-info__value"><?php echo $atts['rim_tires']; ?></div>
    </li>
</ul>

<div>
    <h3 class="overview-info__sub-title">Udstyr</h3>
    <p class="overview-info__text"><?php echo $atts['equipment']; ?></p>

    <h3 class="overview-info__sub-title">Forsikring</h3>
    <ul class="overview-info__list">
        <li class="overview-info__item">
            <div class="overview-info__property">SELSKAB</div>
            <div class="overview-info__value"><?php echo $atts['insurance_company'] ; ?></div>
        </li>
        <li class="overview-info__item">
            <div class="overview-info__property">STATUS</div>
            <div class="overview-info__value"><?php echo $atts['insurance_status']; ?></div>
        </li>
        <li class="overview-info__item">
            <div class="overview-info__property">OPRETTET</div>
            <div class="overview-info__value"><?php echo $atts['insurance_date']; ?></div>
        </li>
    </ul>

    <h3 class="overview-info__sub-title overview-info__sub-title_debts">Gæld <span class="axaj_field"></span></h3>
    <div class="debt-info debt-info_overview-tab">
        <?php echo $atts['debts']; ?>
    </div>

</div>