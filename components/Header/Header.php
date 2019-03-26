<?php
    class Header extends Component {
        public $data = array();

        public function init_data(){
            $logo = carbon_get_theme_option('header_logo' );
            $this->data['logo'] = wp_get_attachment_image( $logo, 'medium', false, array( 'class' => 'logo__img' ));
            $this->data['header_middle_image'] = wp_get_attachment_image( $logo, 'larges', false, array( 'class' => 'blog-header__biglogo-img' ));
            $this->data['menu'] = theme_nav_menu( 'header_menu' );

            $this->data['title'] = carbon_get_post_meta(  $this->post->ID , 'title');
            $this->data['desc'] = carbon_get_post_meta( $this->post->ID , 'desc' );
            $this->data['num_icon_url'] = $this->get_img_path( 'Path%2015.svg' );
            $this->data['form_action'] = '/car-info';

        }

        public function set_header_page_text(){
            $this->data['title'] = carbon_get_theme_option('page_header_title' );
            $this->data['desc'] = carbon_get_theme_option('page_header_desc' );
        }

        public function set_header_post_text(){
            $this->data['title'] = carbon_get_theme_option('post_header_title' );
        }

        public function render_large_form(){
            $this->data['find_number_form'] = $this->render_tmpl( 'find-number-form', $this->data);
        }

        public function render() {
            $this->init_data();
            $page_template = get_page_template_slug( $this->post->ID );

            if( $page_template == 'home.php' ){
                $this->render_large_form();
                echo $this->render_tmpl( 'header-banner', $this->data);

            }else if( $page_template == 'blog.php' || $this->post->post_type == 'post' ){
                $this->post->post_type == 'post' ? $this->set_header_post_text() : false ;
                echo $this->render_tmpl( 'header-middle', $this->data);

            }else if( $this->post->post_type == 'page' && $page_template == '' ){
                $this->set_header_page_text();
                $this->render_large_form();
                echo $this->render_tmpl( 'header-page', $this->data);

            }else{
                echo $this->render_tmpl( 'header-car-info', $this->data);
            }

        }
    }