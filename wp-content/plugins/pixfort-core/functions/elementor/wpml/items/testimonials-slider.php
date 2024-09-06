<?php
if (class_exists('WPML_Elementor_Module_With_Items')) {
    /**
     * Class WPML_Elementor_Icon_List
     */
    class Pix_WPML_Elementor_TESTIMONIALS_SLIDER extends WPML_Elementor_Module_With_Items {
        /**
         * @return string
         */
        public function get_items_field() {
            return 'testimonials';
        }
        /**
         * @return array
         */
        public function get_fields() {
            return ['text', 'name', 'title', 'link'];
        }
        /**
         * @param string $field
         *
         * @return string
         */
        protected function get_title($field) {
            switch ($field) {
                case 'text':
                    return esc_html__('Testimonials text: text', 'pixfort-core');
                case 'name':
                    return esc_html__('Testimonials name: text', 'pixfort-core');
                case 'title':
                    return esc_html__('Testimonials title: text', 'pixfort-core');
                case 'link':
                    return esc_html__('Testimonials link: link', 'pixfort-core');
                default:
                    return '';
            }
        }
        /**
         * @param string $field
         *
         * @return string
         */
        protected function get_editor_type($field) {
            switch ($field) {
                case 'name':
                    return 'LINE';
                case 'title':
                    return 'LINE';
                case 'link':
                    return 'LINE';
                case 'text':
                    return 'AREA';
                default:
                    return '';
            }
        }
    }
}
