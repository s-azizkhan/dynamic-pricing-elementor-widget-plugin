<?php
class Az_Dynamic_Pricing_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'az_dynamic_pricing';
    }

    public function get_title() {
        return __( 'Dynamic Pricing', 'az-custom-elementor-widget' );
    }

    public function get_icon() {
        return 'eicon-slider-pips';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'pricing_section',
            [
                'label' => __( 'Pricing Settings', 'az-custom-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'base_price',
            [
                'label' => __( 'Base Price per User ($)', 'az-custom-elementor-widget' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 1,
            ]
        );

        $this->add_control(
            'discount_percentage',
            [
                'label' => __( 'Yearly Discount (%)', 'az-custom-elementor-widget' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 25,
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $base_price = $settings['base_price'];
        $discount_percentage = $settings['discount_percentage'];
        ?>
        <div class="az-pricing-widget">
            <input type="range" id="userCount" min="5" max="500" value="100" step="5" />
            <p>Users: <span id="userValue">100</span></p>
            <p>Price: $<span id="monthlyPrice"></span> per user / month</p>
            <p>Yearly: <del id="originalYearlyPrice"></del> <strong id="discountedYearlyPrice"></strong></p>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const slider = document.getElementById("userCount");
                const userValue = document.getElementById("userValue");
                const monthlyPrice = document.getElementById("monthlyPrice");
                const originalYearlyPrice = document.getElementById("originalYearlyPrice");
                const discountedYearlyPrice = document.getElementById("discountedYearlyPrice");

                function updatePricing() {
                    let users = parseInt(slider.value);
                    let basePrice = <?php echo $base_price; ?>;
                    let discount = <?php echo $discount_percentage; ?>;
                    let yearlyCost = users * basePrice * 12;
                    let discountedPrice = yearlyCost * (1 - discount / 100);

                    userValue.innerText = users;
                    monthlyPrice.innerText = basePrice;
                    originalYearlyPrice.innerText = "$" + yearlyCost.toFixed(0);
                    discountedYearlyPrice.innerText = "$" + discountedPrice.toFixed(0);
                }

                slider.addEventListener("input", updatePricing);
                updatePricing();
            });
        </script>
        <?php
    }
}
