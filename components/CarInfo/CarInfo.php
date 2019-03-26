<?php
class CarInfo extends Component {
    public $data = array();

    public function init_data(){

        $carsObj = new Cars();
        $carInfo = $carsObj->search_by_params();

        $this->data['car_insurance'] = carbon_get_theme_option('insurance' );
        $this->data['overview_insurance'] = carbon_get_theme_option('overview_insurance' );
        $this->data['car_loan_1'] = carbon_get_theme_option('car_loan_1' );
        $this->data['car_loan_2'] = carbon_get_theme_option('car_loan_2' );
        $this->data['used_car_parts'] = carbon_get_theme_option('used_car_parts' );
        $this->data['debts_not_found'] = carbon_get_theme_option('debts_not_found' );
        $this->data['visual_reports_not_found_text'] =  Cars::car_content_viewer( $carInfo, carbon_get_theme_option('visual_reports_not_found_text' ) );
        $this->data['charges_info_not_found_text'] = carbon_get_theme_option('charges_info_not_found_text' );
        $this->data['debts_financed_link'] = carbon_get_theme_option('debts_financed_link' );


        if( $carInfo == false ){
            $this->data['not_found'] = true;
            $this->data['not_found_text'] = carbon_get_theme_option('car_not_found_text');
            $this->data['not_found_tmpl'] = $this->render_tmpl( 'not-found', $this->data );
        }else{

            $this->data['car_debts'] = $carInfo['car_debts'];
            $this->data['visual_report_info'] = $carInfo['visual_report'];

            $this->data['debts'] = $this->render_tmpl( 'debts', array_merge( $carInfo, $this->data ) );
            $this->data['overview'] = $this->render_tmpl( 'car-overview', array_merge( $carInfo, $this->data ) );
            $this->data['technical-info'] = $this->render_tmpl( 'technical-info', array_merge( $carInfo, $this->data ) );
            $this->data['visual-reports'] = $this->render_tmpl( 'visual-reports', $this->data );
            $this->data['costs'] = $this->render_tmpl( 'costs', $this->data );

            $this->data['before_baying_title'] = carbon_get_post_meta( $this->post->ID,'before_baying_title');
            $this->data['before_baying_items'] = carbon_get_post_meta( $this->post->ID, 'before_baying_items');
            $this->data['quick_check_title'] = carbon_get_post_meta( $this->post->ID,'quick_check_title');
            $this->data['quick_check_items'] = carbon_get_post_meta( $this->post->ID, 'quick_check_items');

            $this->addDebtsToBeforeBaying();
            $this->data['quick-check'] = Cars::car_content_viewer( $carInfo , $this->render_tmpl( 'quick-check', array_merge( $carInfo, $this->data ) ) );
            $this->data['before-buying'] = Cars::car_content_viewer( $carInfo , $this->render_tmpl( 'before-buying', $this->data ) );
        }

    }

    public function addDebtsToBeforeBaying(){
        $car_debts_notice = array();
        $car_debts_notice[0]['title'] = 'Er bilen fri for restgæld?';

        if( $this->data['car_debts'] != null ){
            $car_debts_notice[0]['desc'] = "Der er registreret gæld i denne [car_brend] [car_model] med stelnummer [car_vin]. Sørg for at sælger får slettet denne gæld, inden du køber bilen.";
        }else{
            $car_debts_notice[0]['desc'] = 'Ifølge tinglysning.dk er der ikke registreret gæld i denne bil';
        }

        $this->data['before_baying_items'] = array_merge( $car_debts_notice, $this->data['before_baying_items'] );
    }

    function render() {
        $this->init_data();
        echo $this->render_tmpl( 'car-info', $this->data);
    }
}