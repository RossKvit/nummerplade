<?php
    class RecentSearch extends Component {
        public $data = array();
        public $page_template = '';

        public function init_data(){
            $this->page_template = get_page_template_slug( $this->post->ID );

            $carsObj = new Cars();
            $recent_search = $carsObj->get_car_from_recent_search( $this->props['count'] );

            $this->data[ 'cars_list' ] = $recent_search;
            $this->data[ 'recent_page_link' ] = '/recent-search';
            $this->data[ 'recent_block_title' ] = 'Seneste søgninger';
            $this->data[ 'car_models' ] = $this->render_tmpl( 'car-models', null);
            $this->data[ 'h1_title' ] = $this->post->post_title;
        }

        public function render() {
            $this->init_data();

            if( $this->page_template == 'recent-search.php' ){
                $this->data[ 'cars_list' ] = json_encode( $this->data[ 'cars_list' ] );
                echo $this->render_tmpl( 'recent-search-page', $this->data);
            }else{
                echo $this->render_tmpl( 'recent-search', $this->data);
            }
        }

    }
