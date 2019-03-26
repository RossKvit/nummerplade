<?php

class Cars{
    private $cars_table = 'wp_cars';
    private $recent_search_table = 'wp_recent_search';
    private $wpdb ;


    public function __construct(){
        global $wpdb;
        $this->wpdb = $wpdb;

        add_action('wp_ajax_additional_info', array( $this, 'get_additional_info_json' ));
        add_action('wp_ajax_nopriv_additional_info', array( $this, 'get_additional_info_json' ));
    }

    public function search_by_params( ){
        $number =  isset( $_GET['number'] ) ? trim( $_GET['number'] ): null;
        $search_type =  isset( $_GET['search_type'] ) ? trim( $_GET['search_type'] ): null;

        if( $number != null && $number != '' && $search_type != null && $search_type != '' ){
            if( $search_type == 'number' ){
                $result = $this->get_car_by_number( $number )[0];
            }else if( $search_type == 'vin' ){
                $result = $this->get_car_by_vin( $number )[0];
            }else{
                return false;
            }
        }else{
            return false;
        }

        if( isset( $result ) && $result != null ){
            $this->set_car_to_recent_search( $result );
            $result = $this->prepare_cars_arr( array( $result ) )[0];
        }else{
            return false;
        }

        return $result;
    }

    public function arr_for_query( $fields, $type = 'fields' ){

        if( $type == 'fields' ){
            $fields = "`".implode("`, `", $fields)."`";
        }else if( $type == 'values' ){
            $fields = '"'.implode('", "', $fields).'"';
        }
        return $fields;
    }

    public function get_additional_info( $number ){
        return (new Pupuga\Objects\Init('TjekbilDk'))->setQuery(array(
            array('setQueryParameter', 'number', $number),
            array('setInternalQueryParameter','id', 'KoeretoejId'),
            array('setInternalQueryParameter','vin+id', 'StelNr+KoeretoejId'),
            array('setInternalQueryParameter','vin+number', 'StelNr+RegNr')
        ), true)->data()->get();
    }


    public function get_additional_info_json( ){
        $number = isset( $_POST['number'] )? $_POST['number']: null ;

        if( $number !== null ){
            $additional_info = $this->get_additional_info( $number );
            echo json_encode( $this->get_prepared_additional_info($additional_info) );
        }else{
            echo 'error';
        }
        exit();
    }

    public function prepare_cars_arr( $items_list ){
        $new_items_list = array();

        foreach( $items_list as $item ){

            $item = get_object_vars( $item );

            $item['car_full_name'] = $item['car_brend'].' '.$item['car_model'].' &nbsp;'.$item['car_kit'];
            $item['car_first_registered'] = Component::get_prepared_date( $item['car_first_registered'] );
            $item['car_produced_date'] = substr( $item['car_first_registered'], -4 );
            $item['car_particles_filter'] = $item['car_particles_filter'] == 'false'? 'Ingen' : 'Ja' ;
            $item['car_link'] = "/car-info/?search_type=vin&number=". $item['car_vin'];
            $item['car_mileage'] = $item['car_mileage'] != null? $item['car_mileage'] : 'ikke fundet';
            $item['car_mileage'] = strlen( $item['car_mileage'] ) <= 3? $item['car_mileage'] * 1000 : $item['car_mileage'] ;
            $item['car_connection_device'] = $item['car_connection_device'] == true? 'Ja' : 'Nej';
            $item['car_engine_power_hp'] = $item['car_engine_power'] * 1.36 === 0? '': round( $item['car_engine_power'] * 1.36, 0);

            $additional_info = array( );
            $additional_info = $this->get_prepared_additional_info( $additional_info );
            $additional_info = $this->prepare_ajax_loading_fields( $additional_info );

            $item = array_merge( $additional_info, $item );
            $new_items_list[] = $item;
        }

        return $new_items_list;
    }

    private function prepare_ajax_loading_fields( $fields ){
        $new_fields = array();

        foreach ( $fields as $key => $item ){
            if( $item !== null ){
                $new_fields[$key] = $item;
            }else{
                $new_fields[$key] = '<span class="axaj_field '. $key .'"></span>';
            }
        }

        return $new_fields;
    }

    private function get_prepared_additional_info( $additional_info ){
        $dataObj = $additional_info;
        $insurance_info = get_object_vars($additional_info->Forsikring);
        $debts_info = get_object_vars( $additional_info->LaaneDokumenter[0] );
        $debts = $additional_info == null || $debts_info != null ?
            array(
                'debts_person_name' => $debts_info['Debitorer'][0]->Navn,
                'debts_date' => $debts_info['Dato'],
                'debts_legal_unit_name' => $debts_info['Kreditorer'][0]->Navn,
                'debts_sum' => $debts_info['HovedStol'],
                'debts_details' => $debts_info['TillaegsTekster'],
                'debts_isset' => true
            ) : array(
                'debts_isset' => false,
            );

        return array_merge( $debts, array(
            'car_costs' => $additional_info->Afgift->OpkraevedeAfgifter,

            'insurance_company' => $insurance_info['Selskab'],
            'insurance_date'   => $insurance_info['Oprettet'],
            'insurance_status' => $insurance_info['Status'],
            'car_debts' => $debts,

            'visual_report_list' => $dataObj->Rapporter,
            'visual_report_date' => $dataObj->Rapporter[0]->Synsdato,
            'visual_report_result' => $dataObj->Rapporter[0]->Synsresultat,
            'visual_report_mileage' => $dataObj->Rapporter[0]->Kmstand,

            'motor_marking' => $dataObj->MotorMaerkning,
            'rim_tires'     => $dataObj->FaelgDaek,

            'info_gauge_front'  => $dataObj->SporviddenForrest,
            'info_gauge_back'   => $dataObj->SporviddenBagest,
            'passenger_count'   => $dataObj->PassagerAntal,
            'axle_distance'     => $dataObj->AkselAfstand,

            'pulling_axles' => $dataObj->TraekkendeAksler,
            'axle_pressure' => $dataObj->StoersteAkselTryk,
            'environment_opacity' => $dataObj->MiljoeOplysningRoegtaethed,
            'co2_release'   => $dataObj->MiljoeOplysningCO2Udslip,
            'co'            => $dataObj->MiljoeOplysningEmissionCO,
            'hc_nox'        => $dataObj->MiljoeOplysningEmissionHCPlusNOX,

            'nox'                   => $dataObj->MiljoeOplysningEmissionNOX,
            'particles'             => $dataObj->MiljoeOplysningPartikler,
            'particle_filter'       => $dataObj->MiljoeOplysningPartikelFilter,
            'motor_sound_level'     => $dataObj->MotorStoersteEffekt,
            'running_sound_level'   => $dataObj->MotorKoerselStoej,
            'equipment'             => implode(", ", $dataObj->KoeretoejUdstyrSamling),

            'kind_name'         => $dataObj->KoeretoejArtNavn,
            'postal_code'       => $dataObj->AdressePostNummerBy,
            'variant_type_name' => $dataObj->VariantTypeNavn,
            'color_type_name'   => $dataObj->FarveTypeNavn,
        ));
    }

    private function set_car_to_recent_search( $car ){
        $car = get_object_vars( $car );
        $current_date = date( 'Y-m-d H:i:s' ); // format: YYYY-MM-DD HH:MI:SS
        unset( $car['id'] );

        $sql = "UPDATE `".$this->recent_search_table."` SET recent_search_date = '". $current_date ."' WHERE car_vin = '". $car['car_vin']."'";
        $results = $this->wpdb->query( $sql );

        if( $results === false ){
            $fieldsKeys = $this->arr_for_query( array_keys( $car ) ).",`recent_search_date`";
            $fieldsVals = $this->arr_for_query( $car, 'values' ).',"'.$current_date.'"';

            $sql = "INSERT INTO `".$this->recent_search_table."` (".$fieldsKeys.") VALUES (".$fieldsVals.")";
            $results = $this->wpdb->query( $sql );
        }

        return $results;
    }

    public function get_car_from_recent_search( $item_limit ){
        $query_limit =  isset($item_limit) && $item_limit != 0? " LIMIT ".$item_limit : '';
        $sql = "SELECT * FROM `".$this->recent_search_table."` ORDER BY recent_search_date DESC".$query_limit; //ASC/DESC

        $results =  $this->wpdb->get_results( $sql );
        $results = $this->prepare_cars_arr( $results );

        return $results;
    }

    public static function car_content_viewer( $car_data, $content ){

        foreach( $car_data as $key => $item ){
            $content = str_replace( '['.$key.']', $item, $content );
        }

        return $content;
    }


    private function get_car_by_number( $number ){
        $results = $this->wpdb->get_results( "SELECT * FROM {$this->cars_table} WHERE car_reg_number LIKE '{$number}'", OBJECT );
        return $results;
    }

    private function get_car_by_vin( $vin ){
        $results = $this->wpdb->get_results( "SELECT * FROM {$this->cars_table} WHERE car_vin LIKE '{$vin}'", OBJECT );
        return $results;
    }
}

