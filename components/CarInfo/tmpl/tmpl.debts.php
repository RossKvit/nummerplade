<div>
    <h2 class="debt-info__title">Gæld i bilen <span class="axaj_field"></span></h2>

    <div class="debt-info__text">

            <ul class="debt-info__list hidden">
                <li class="debt-info__list-item">
                    <span class="debt-info__property">Datoen</span>
                    <span class="debt-info__value">Den <?php echo $atts['debts_date']; ?> er der registreret en gæld på <?php echo $atts['debts_sum']; ?> i denne bil.</span>
                </li>
                <li class="debt-info__list-item"><span class="debt-info__property">HVEM SKYLDER</span><span><?php echo $atts['debts_person_name'] ?></span></li>
                <li class="debt-info__list-item"><span class="debt-info__property">STELNR</span><span class="debt-info__value"><?php echo $atts['car_vin']; ?></span></li>
                <li class="debt-info__list-item"><span class="debt-info__property">OPRINDELIGE LÅN</span><span class="debt-info__value"><?php echo $atts['debts_sum']; ?></span></li>
                <li class="debt-info__list-item"><span class="debt-info__property">KREDITOR</span><span class="debt-info__value"><?php echo $atts['debts_legal_unit_name']; ?></span></li>

                <li class="debt-info__list-item"><span class="debt-info__property">TILLÆGSTEKST</span>
                    <ul class="debt-info__sub-list">
                        <li class="debt-info__sub-list-item"></li>
                    </ul>
                </li>
            </ul>

            <p class="debts-info__not-found hidden"><?php echo $atts['debts_not_found']; ?></p>

    </div>

    <a class="typical__link" target="_blank" href="<?php echo $atts['debts_financed_link']; ?>">Se hvor billigt denne bil kan finansieres</a>
</div>