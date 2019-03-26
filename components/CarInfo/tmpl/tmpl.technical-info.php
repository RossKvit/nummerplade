<h2 class="technical-info__title">Teknisk info</h2>
<ul class="technical-info__list">
    <li class="technical-info__item">
        <div class="technical-info__property">TEKNISK TOTALVÆGT</div>
        <div class="technical-info__value"><?php echo $atts['car_full_weight']; ?> kg</div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">TOTALVÆGT</div>
        <div class="technical-info__value"><?php echo $atts['car_full_weight']; ?> kg</div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">KØREKLAR VÆGT</div>
        <div class="technical-info__value"><?php echo $atts['car_equipped_weight']; ?> kg</div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">FORSIKRING</div>
        <div class="technical-info__value"><a href="<?php echo $atts['car_insurance']; ?>" class="typical__link" target="_blank" >Se forsikringspriser på bilen her</a></div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">VOGNTOGSVÆGT</div>
        <div class="technical-info__value"><?php echo $atts['car_weight_with_traler']; ?> kg</div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">TILKOBLINGSANORDNING</div>
        <div class="technical-info__value"><?php echo $atts['car_connection_device']; ?></div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">VÆGT AF PÅHÆNGSKØRETØJ</div>
        <div class="technical-info__value">
            <ul class="val-list">
                <li class="val-item">MED BREMSER: <?php echo $atts['car_trailer_with_brake']; ?>  KG</li>
                <li class="val-item">UDEN BREMSER: <?php echo $atts['car_trailer_without_brake']; ?>  KG</li>
            </ul>
        </div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">TOTALVÆGT PÅHÆNG</div>
        <div class="technical-info__value"><?php echo $atts['car_trailer_without_brake']; ?> KG</div>
    </li>



    <li class="technical-info__item">
        <div class="technical-info__property">MÆRKNING</div>
        <div class="technical-info__value"><?php echo $atts['motor_marking']; ?></div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">DRIVKRAFT</div>
        <div class="technical-info__value"><?php echo $atts['car_fuel']; ?></div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">OPGIVET FORBRUG</div>
        <div class="technical-info__value"><?php echo $atts['car_km_per_liter']; ?> km/l</div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">ELEKTRISK FORBRUG</div>
        <div class="technical-info__value">*</div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">MAKSIMAL HASTIGHED</div>
        <div class="technical-info__value"><?php echo $atts['car_max_speed']; ?> km/t</div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">MOTORSTØRRELSE</div>
        <div class="technical-info__value"><?php echo $atts['сar_engine_capacity']; ?> ccm</div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">STØRSTE EFFEKT</div>
        <div class="technical-info__value"><?php echo $atts['car_engine_power']; ?> kW (ca. <?php echo $atts['car_engine_power_hp']?> HK)</div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">ANTAL CYLINDRE</div>
        <div class="technical-info__value"><?php echo $atts['car_engine_cylinders']; ?></div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">KAROSSERITYPE</div>
        <div class="technical-info__value"><?php echo $atts['car_body_type']; ?></div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">ANTAL DØRE</div>
        <div class="technical-info__value"><?php echo $atts['car_doors']; ?></div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">FÆLGE/DÆK</div>
        <div class="technical-info__value"><?php echo $atts['rim_tires']; ?></div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">SPORVIDDEN FORREST</div>
        <div class="technical-info__value"><?php echo $atts['info_gauge_front']; ?> mm</div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">SPORVIDDEN BAGERST</div>
        <div class="technical-info__value"><?php echo $atts['info_gauge_back']; ?> mm</div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">ANBRINGELSE AF
            STELNUMMER </div>
        <div class="technical-info__value"><?php echo $atts['car_number_position']; ?></div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">PASSAGERANTAL</div>
        <div class="technical-info__value"><?php echo $atts['passenger_count']; ?></div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">ANTAL SIDDEPLADSER</div>
        <div class="technical-info__value"><?php echo $atts['car_sitting_places']; ?></div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">ANTAL AKSLER</div>
        <div class="technical-info__value"><?php echo $atts['car_axles_number']; ?></div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">AKSELAFSTAND</div>
        <div class="technical-info__value"><?php echo $atts['axle_distance']; ?> mm</div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">TRÆKKENDE AKSEL</div>
        <div class="technical-info__value"><?php echo $atts['pulling_axles']; ?></div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">STØRSTE AKSELTRYK</div>
        <div class="technical-info__value"><?php echo $atts['axle_pressure']; ?> kg</div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">RØGTÆTHED (VED)</div>
        <div class="technical-info__value"><?php echo $atts['environment_opacity']; ?> m-l ( o/m)</div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">CO2-UDSLIP</div>
        <div class="technical-info__value"><?php echo $atts['co2_release']; ?> g</div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">CO</div>
        <div class="technical-info__value"><?php echo $atts['co']; ?> g/km</div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">HC+NOX</div>
        <div class="technical-info__value"><?php echo $atts['hc_nox']; ?> g/km</div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">NOX</div>
        <div class="technical-info__value"><?php echo $atts['nox']; ?> g/km</div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">PARTIKLER</div>
        <div class="technical-info__value"<?php echo $atts['particles']; ?> g/km</div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">PARTIKELFILTER</div>
        <div class="technical-info__value"><?php  echo $atts['car_particles_filter']; ?></div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">STANDSTØJ (VED)</div>
        <div class="technical-info__value"><?php echo $atts['motor_sound_level']; ?> db ( o/m)</div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">KØRSELSSTØJ</div>
        <div class="technical-info__value"><?php echo $atts['running_sound_level']; ?></div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">EURONORM</div>
        <div class="technical-info__value"><?php echo $atts['car_euronorm']; ?></div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">MOTOR</div>
        <div class="technical-info__value"><?php echo $atts['variant_type_name']; ?></div>
    </li>
    <li class="technical-info__item">
        <div class="technical-info__property">UDSTYR</div>
        <div class="technical-info__value"><?php echo $atts['equipment']; ?></div>
    </li>

</ul>