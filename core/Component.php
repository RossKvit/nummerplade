<?php
require_once get_stylesheet_directory() .'/core/iComponent.php';

Class Component implements iComponent {
    public $component_name = '';
    public $component_path = '';
    public $post = null;
    public $props = [];

    function __construct($props) {
        global $post;
        $this->post = $post;
        $this->props = $props;
        $this->component_name = $this->get_name();

        return $this;
    }

    public function get_name() {
        return get_class($this);
    }

    public function get_path(){
        $components_path = get_stylesheet_directory();

        $component_path = $components_path. '/components/' . $this->component_name;

        return $component_path;
    }

    public function get_img_path( $img_name ){
        return get_stylesheet_directory_uri() . '/assets/img/'. $img_name;
    }

    public function render() {}

    public function get_images_by_id( $img_list, $args ){
        $new_img_list = array();

        foreach( $img_list as $item ){
            $new_img_list[] = wp_get_attachment_image( $item['image'] , 'full', false, $args );
        }

        return $new_img_list;
    }

    protected function render_tmpl($tmpl_name, $atts ) {
        $component_path = $this->get_path();

        ob_start();
        $html = '';

        require $component_path.'/tmpl/tmpl.'.$tmpl_name.'.php';

        $html = ob_get_contents();
        ob_end_clean();

        return $html;
    }

    protected function render_tmpl_by_array($tmpl_name, $atts_listing) {
        $html = '';

        foreach ($atts_listing as $props){
            $html .= $this->render_tmpl($tmpl_name, $props);
        }

        return $html;
    }

    public static function get_component($component_name, $options) {

        require get_stylesheet_directory(). '/components/'.$component_name.'/'.$component_name.'.php';

        $component = new $component_name($options);
        $component->render($options);
    }

    public function get_association_ids( $assoc_arr, $param = 'id' ){
        $new_assoc_arr = array();

        foreach ($assoc_arr as $item){
            $new_assoc_arr[] = $item[$param];
        }

        return $new_assoc_arr;
    }

    public static function get_prepared_date( $date ){
        $date = date_create( $date );
        $date = strtolower( date_format($date,"d. F Y") );

        return $date;
    }


}