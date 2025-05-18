<?php
class Az_Dynamic_Pricing_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'az_dynamic_pricing';
    }

    public function get_title()
    {
        return __('Dynamic Pricing', 'az-custom-elementor-widget');
    }

    public function get_icon()
    {
        return 'eicon-price-table';
    }

    public function get_categories()
    {
        return ['general'];
    }

    protected function register_controls()
    {
        // Professional Plan Settings
        $this->start_controls_section(
            'professional_section',
            [
                'label' => __('Professional Plan Settings', 'az-custom-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'pro_price',
            [
                'label' => __('Professional Plan Price ($)', 'az-custom-elementor-widget'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 10,
            ]
        );

        $this->end_controls_section();

        // Teams Plan Settings
        $this->start_controls_section(
            'teams_section',
            [
                'label' => __('Teams Plan Settings', 'az-custom-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'teams_price_per_user',
            [
                'label' => __('Teams Price per User ($)', 'az-custom-elementor-widget'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 2,
            ]
        );

        $this->end_controls_section();

        // Contact Button Settings
        $this->start_controls_section(
            'contact_section',
            [
                'label' => __('Contact Button Settings', 'az-custom-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'contact_button_text',
            [
                'label' => __('Contact Button Text', 'az-custom-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Contact Us',
            ]
        );

        $this->end_controls_section();

        // UI Text Settings
        $this->start_controls_section(
            'ui_text_section',
            [
                'label' => __('UI Text Settings', 'az-custom-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Header
        $this->add_control(
            'main_title_text',
            [
                'label' => __('Main Title', 'az-custom-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Pricing', 'az-custom-elementor-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'main_subtitle_text',
            [
                'label' => __('Main Subtitle', 'az-custom-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Get started in minutes. Save up to 25% off the annual plan', 'az-custom-elementor-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        // Tabs
        $this->add_control(
            'tab_professional_text',
            [
                'label' => __('Professional Tab Text', 'az-custom-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Professional', 'az-custom-elementor-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'tab_teams_text',
            [
                'label' => __('Teams Tab Text', 'az-custom-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Teams', 'az-custom-elementor-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'tab_agency_text',
            [
                'label' => __('Agency Hub Tab Text', 'az-custom-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Agency Hub', 'az-custom-elementor-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        // Professional Plan Card
        $this->add_control(
            'pro_card_title_text',
            [
                'label' => __('Pro Card Title', 'az-custom-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Professional', 'az-custom-elementor-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'pro_card_subtitle_text',
            [
                'label' => __('Pro Card Subtitle', 'az-custom-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Perfect for individual professionals', 'az-custom-elementor-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'pro_price_suffix_text',
            [
                'label' => __('Pro Price Suffix', 'az-custom-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('/month', 'az-custom-elementor-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'pro_save_badge_text',
            [
                'label' => __('Pro Save Badge Text', 'az-custom-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Save 25%', 'az-custom-elementor-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'pro_billing_info_text',
            [
                'label' => __('Pro Billing Info', 'az-custom-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Billed yearly', 'az-custom-elementor-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'pro_button_text',
            [
                'label' => __('Pro Button Text', 'az-custom-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Start Free Trial', 'az-custom-elementor-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        // Teams Plan Card
        $this->add_control(
            'teams_card_title_text',
            [
                'label' => __('Teams Card Title', 'az-custom-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Teams', 'az-custom-elementor-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'teams_card_subtitle_text',
            [
                'label' => __('Teams Card Subtitle', 'az-custom-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Best for teams with more than >5 members', 'az-custom-elementor-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'teams_price_suffix_text',
            [
                'label' => __('Teams Price Suffix', 'az-custom-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('/user/month', 'az-custom-elementor-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'teams_save_badge_text',
            [
                'label' => __('Teams Save Badge Text', 'az-custom-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Save 20%', 'az-custom-elementor-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'teams_yearly_price_suffix_text',
            [
                'label' => __('Teams Yearly Price Suffix', 'az-custom-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('billed yearly', 'az-custom-elementor-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'teams_button_text',
            [
                'label' => __('Teams Button Text', 'az-custom-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Start Free Trial', 'az-custom-elementor-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        // Agency Plan Card
        $this->add_control(
            'agency_card_title_text',
            [
                'label' => __('Agency Card Title', 'az-custom-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Agency Hub', 'az-custom-elementor-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'agency_card_subtitle_text',
            [
                'label' => __('Agency Card Subtitle', 'az-custom-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Custom solutions for agencies and enterprises', 'az-custom-elementor-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        // Common
        $this->add_control(
            'features_section_title_text',
            [
                'label' => __('Features Section Title', 'az-custom-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Features', 'az-custom-elementor-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        // JavaScript specific texts
        $this->add_control(
            'js_users_suffix_text',
            [
                'label' => __('JS: Users Suffix (e.g., "users")', 'az-custom-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('users', 'az-custom-elementor-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'js_contact_us_quote_text',
            [
                'label' => __('JS: Contact for Quote Text', 'az-custom-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Contact us for a custom quote', 'az-custom-elementor-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'js_initial_user_count_text',
            [
                'label' => __('JS: Initial User Count Text (e.g., "5 users")', 'az-custom-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('5 users', 'az-custom-elementor-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->end_controls_section(); // End UI Text Settings

        // Styling Section
        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Style Settings', 'az-custom-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'primary_color',
            [
                'label' => __('Primary Color', 'az-custom-elementor-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#00D2D2',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $pro_price = $settings['pro_price'];
        $teams_price = $settings['teams_price_per_user'];
        $primary_color = $settings['primary_color'];
?>
        <style>
            .az-pricing-section {
                max-width: 1200px;
                margin: 0 auto;
                padding: 20px;
                width: 100%;
                box-sizing: border-box;
            }

            .az-pricing-header {
                text-align: center;
                margin-bottom: 30px;
            }

            .az-pricing-header h2 {
                font-size: clamp(24px, 5vw, 36px);
                margin-bottom: 15px;
            }

            .az-pricing-header p {
                color: #666;
                font-size: clamp(14px, 3vw, 18px);
                padding: 0 10px;
            }

            .az-pricing-tabs {
                display: flex;
                justify-content: center;
                gap: 5px;
                background: #f2f4f8;
                padding: 5px;
                border-radius: 30px;
                width: fit-content;
                max-width: 100%;
                margin: 0 auto 30px;
                flex-wrap: wrap;
            }

            .az-tab-button {
                padding: 10px 15px;
                background: transparent !important;
                color: #666;
                border: none;
                border-radius: 25px;
                cursor: pointer;
                font-weight: 500;
                transition: all 0.3s ease;
                font-size: clamp(12px, 2.5vw, 16px);
                white-space: nowrap;
            }

            .az-tab-button:hover {
                background: rgba(0, 0, 0, 0.05) !important;
            }

            .az-tab-button.active {
                background: <?php echo $primary_color; ?> !important;
                color: #fff;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            }

            .az-pricing-cards {
                display: none;
                grid-template-columns: 1fr;
                gap: 20px;
                opacity: 0;
                transform: translateY(20px);
                transition: all 0.5s ease;
            }


            .az-pricing-cards.active {
                display: grid;
                opacity: 1;
                transform: translateY(0);
            }

            .az-pricing-card {
                background: white;
                border-radius: 20px;
                padding: 20px;
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
                transition: all 0.3s ease;
                position: relative;
                display: flex;
                flex-direction: column;
            }

            .az-pricing-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
            }

            .az-card-header {
                margin-bottom: 30px;
            }

            .az-card-header h3 {
                font-size: clamp(20px, 4vw, 24px);
                margin: 0;
                color: #333;
            }

            .az-card-header p {
                color: #666;
                margin: 10px 0 0;
            }

            .az-price {
                font-size: clamp(36px, 6vw, 48px);
                font-weight: 700;
                color: #333;
                margin: 20px 0;
                display: flex;
                align-items: baseline;
                flex-wrap: wrap;
            }

            .az-team-price-parent {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }



            .az-team-yearly-price {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
            }

            .az-features li {
                margin: 15px 0;
                padding-left: 30px;
                position: relative;
                list-style: none;
                color: #666;
                font-size: clamp(14px, 2.5vw, 16px);
            }

            .az-button,
            .az-free-trial-btn {
                width: 100%;
                padding: 12px;
                border: none;
                border-radius: 10px;
                background: <?php echo $primary_color; ?>;
                color: white;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                font-size: clamp(14px, 2.5vw, 16px);
                margin-top: auto;
                text-align: center;
            }

            .az-slider-container {
                margin: 30px 0 0;
                position: relative;
            }

            .az-slider {
                width: 100%;
                height: 6px;
                -webkit-appearance: none;
                background: #f0f0f0;
                border-radius: 3px;
                outline: none;
                margin: 20px 0;
            }

            .az-slider::-webkit-slider-thumb {
                -webkit-appearance: none;
                width: 24px;
                height: 24px;
                background: <?php echo $primary_color; ?>;
                border-radius: 50%;
                cursor: pointer;
                transition: all 0.3s ease;
                border: 3px solid white;
                box-shadow: 0 0 0 1px <?php echo $primary_color; ?>;
                position: relative;
            }

            .az-floating-count {
                position: absolute;
                background: <?php echo $primary_color; ?>;
                color: white;
                padding: 4px 8px;
                border-radius: 4px;
                font-size: 14px;
                font-weight: 500;
                transform: translateX(-50%);
                top: -32px;
                transition: left 0.1s ease;
                pointer-events: none;
                white-space: nowrap;
            }

            .az-floating-count:after {
                content: '';
                position: absolute;
                bottom: -4px;
                left: 50%;
                transform: translateX(-50%);
                width: 0;
                height: 0;
                border-left: 5px solid transparent;
                border-right: 5px solid transparent;
                border-top: 5px solid <?php echo $primary_color; ?>;
            }

            .az-user-count {
                text-align: center;
                font-size: 16px;
                color: #666;
                margin: 15px 0;
            }

            .az-save-badge {
                display: inline-block;
                background: <?php echo $primary_color; ?>;
                color: white;
                padding: 6px 12px;
                border-radius: 20px;
                font-size: 14px;
                margin-left: 10px;
                font-weight: 500;
            }

            .az-section-title {
                color: #666;
                text-transform: uppercase;
                font-size: 14px;
                font-weight: 700;
                margin-top: 20px;
                letter-spacing: 1px;
            }

            .az-price-tiers {
                margin-top: 15px;
                display: flex;
                flex-direction: column;
                gap: 5px;
            }

            .az-free-trial-btn {
                background: <?php echo $primary_color; ?>;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 20px;
                font-size: 16px;
                font-weight: 600;
                transition: all 0.3s ease;
                margin-top: 20px;
            }

            .az-free-trial-btn:hover {
                border-radius: 30px;
                transform: translateY(-2px);
                box-shadow: 0 5px 15px <?php echo $primary_color; ?>40;
            }

            .az-team-price-parent {
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
            }

            .az-team-yearly-price {
                display: flex;
                flex-direction: column;
                align-items: flex-end;
            }

            .az-price small {
                font-size: 16px;
                color: #666;
                margin-left: 5px;
            }

            .az-total-price {
                font-size: 20px;
                color: #666;
                margin: 10px 0;
                text-align: center;
            }

            .az-features {
                margin: 0 0 0px 0;
                padding: 0;
                flex-grow: 1;
            }

            .az-features li:before {
                content: "";
                position: absolute;
                left: 0;
                top: 50%;
                transform: translateY(-50%);
                width: 20px;
                height: 20px;
                background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%2300D2D2'%3E%3Cpath d='M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z'/%3E%3C/svg%3E") no-repeat center;
                background-size: contain;
            }

            @media (min-width: 768px) {
                .az-save-badge {
                    margin-left: 10px;
                }
            }

            @media (min-width: 768px) {
                .az-pricing-cards {
                    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                    gap: 30px;
                }
            }

            @media (min-width: 768px) {
                .az-pricing-card {
                    padding: 40px;
                }
            }

            @media (min-width: 768px) {
                .az-team-price-parent {
                    flex-direction: row;
                    align-items: center;
                    justify-content: space-between;
                }
            }

            @media (min-width: 768px) {
                .az-team-yearly-price {
                    align-items: flex-end;
                }
            }
        </style>

        <div class="az-pricing-section">
            <div class="az-pricing-header">
                <h2><?php echo esc_html($settings['main_title_text']); ?></h2>
                <p><?php echo esc_html($settings['main_subtitle_text']); ?></p>
            </div>

            <div class="az-pricing-tabs">
                <button class="az-tab-button active" data-tab="professional"><?php echo esc_html($settings['tab_professional_text']); ?></button>
                <button class="az-tab-button" data-tab="teams"><?php echo esc_html($settings['tab_teams_text']); ?></button>
                <button class="az-tab-button" data-tab="agency"><?php echo esc_html($settings['tab_agency_text']); ?></button>
            </div>

            <!-- Professional Plan -->
            <div class="az-pricing-cards active" id="professional-cards">
                <div class="az-pricing-card">
                    <div class="az-card-header">
                        <h3><?php echo esc_html($settings['pro_card_title_text']); ?></h3>
                        <p><?php echo esc_html($settings['pro_card_subtitle_text']); ?></p>
                    </div>

                    <div class="az-price">
                        $<?php echo esc_html($pro_price); ?><small><?php echo esc_html($settings['pro_price_suffix_text']); ?></small>
                        <span class="az-save-badge"><?php echo esc_html($settings['pro_save_badge_text']); ?></span>
                    </div>
                    <div><?php echo esc_html($settings['pro_billing_info_text']); ?></div>

                    <button class="az-free-trial-btn"><?php echo esc_html($settings['pro_button_text']); ?></button>

                    <div class="az-section-title"><?php echo esc_html($settings['features_section_title_text']); ?></div>
                    <ul class="az-features">
                        <li>No Branding of SyncSignature</li>
                        <li>Up to 10 Professional Signatures</li>
                        <li>Copy/Paste Email Signature</li>
                        <li>Profile Picture Maker</li>
                        <li>PRO templates</li>
                        <li>Email Signature Analytics</li>
                        <li>Advanced template editor</li>
                    </ul>
                    <!-- <button class="az-button">Get Started</button> -->
                </div>
            </div>

            <!-- Teams Plan -->
            <div class="az-pricing-cards" id="teams-cards">
                <div class="az-pricing-card">
                    <div class="az-card-header">
                        <h3><?php echo esc_html($settings['teams_card_title_text']); ?></h3>
                        <p><?php echo esc_html($settings['teams_card_subtitle_text']); ?></p>
                    </div>

                    <div class="az-team-price-parent">
                        <div id="teams-price" class="az-price">
                            $<span id="per-user-price"><?php echo number_format((float)$teams_price, 2); ?></span><small><?php echo esc_html($settings['teams_price_suffix_text']); ?></small>
                        </div>

                        <div class="az-team-yearly-price">
                            <span class="az-save-badge az-team-save-badge"><?php echo esc_html($settings['teams_save_badge_text']); ?></span>
                            <div class="az-team-yearly-price">
                                $<span id="yearly-price">0</span> <?php echo esc_html($settings['teams_yearly_price_suffix_text']); ?>
                            </div>
                        </div>

                    </div>

                    <div class="az-slider-container">
                        <div class="az-floating-count" id="floating-user-count"><?php echo esc_html($settings['js_initial_user_count_text']); ?></div>
                        <input type="range" id="team-user-slider" class="az-slider"
                            min="5" max="100" value="5" step="5">
                    </div>

                    <button id="teams-button" class="az-button"><?php echo esc_html($settings['teams_button_text']); ?></button>

                    <div class="az-section-title"><?php echo esc_html($settings['features_section_title_text']); ?></div>
                    <ul class="az-features">
                        <li>All Professional features</li>
                        <li>Predesigned Team templates</li>
                        <li>Auto Install for Google Workspace</li>
                        <li>Create and update bulk signatures</li>
                        <li>Department wise Signatures</li>
                        <li>Google Workspace Integration</li>
                        <li>Workspace analytics</li>
                    </ul>
                    <!-- <button id="teams-button" class="az-button">Get Started</button> -->
                </div>
            </div>

            <!-- Agency Plan -->
            <div class="az-pricing-cards" id="agency-cards">
                <div class="az-pricing-card">
                    <div class="az-card-header">
                        <h3><?php echo esc_html($settings['agency_card_title_text']); ?></h3>
                        <p><?php echo esc_html($settings['agency_card_subtitle_text']); ?></p>
                    </div>
                    <button class="az-button"><?php echo esc_html($settings['contact_button_text']); ?></button>

                    <div class="az-section-title"><?php echo esc_html($settings['features_section_title_text']); ?></div>
                    <ul class="az-features">
                        <li>All Teams features</li>
                        <li>White Label Solution</li>
                        <li>Custom Domain</li>
                        <li>Priority Support</li>
                        <li>API Access</li>
                        <li>Custom Integration</li>
                        <li>Dedicated Account Manager</li>
                        <li>Custom SLA</li>
                        <li>Advanced Security Features</li>
                    </ul>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Cache DOM elements
                const elements = {
                    tabButtons: document.querySelectorAll('.az-tab-button'),
                    pricingCards: document.querySelectorAll('.az-pricing-cards'),
                    teamSlider: document.getElementById('team-user-slider'),
                    teamUserCount: document.getElementById('floating-user-count'),
                    perUserPrice: document.getElementById('per-user-price'),
                    yearlyPrice: document.getElementById('yearly-price'),
                    teamButton: document.getElementById('teams-button'),
                    floatingCount: document.getElementById('floating-user-count'),
                    teamPriceSection: document.querySelector('.az-team-yearly-price')
                };

                // Tab switching
                elements.tabButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        elements.tabButtons.forEach(btn => btn.classList.remove('active'));
                        elements.pricingCards.forEach(card => card.classList.remove('active'));

                        button.classList.add('active');
                        document.getElementById(`${button.dataset.tab}-cards`).classList.add('active');
                    });
                });

                // Price calculation logic
                const priceTiers = [{
                        min: 70,
                        price: 1.8
                    },
                    {
                        min: 30,
                        price: 2
                    },
                    {
                        min: 0,
                        price: 2.5
                    }
                ];

                function getPricePerUser(users) {
                    return priceTiers.find(tier => users >= tier.min).price;
                }

                function calculatePrice(users) {
                    const pricePerUser = getPricePerUser(users);
                    const monthlyPrice = users * pricePerUser;
                    const yearlyPrice = monthlyPrice * 12 * 0.8; // 20% discount

                    return {
                        perUser: pricePerUser,
                        yearly: yearlyPrice
                    };
                }

                function updateFloatingCount() {
                    const value = parseInt(elements.teamSlider.value);
                    const min = parseInt(elements.teamSlider.min);
                    const max = parseInt(elements.teamSlider.max);
                    const sliderWidth = elements.teamSlider.offsetWidth;
                    const thumbWidth = 24;

                    const range = max - min;
                    const valuePercentage = (value - min) / range;
                    const position = valuePercentage * (sliderWidth - thumbWidth);

                    elements.floatingCount.style.left = `${position + (thumbWidth / 2)}px`;
                    elements.floatingCount.textContent = `${value} <?php echo esc_js($settings['js_users_suffix_text']); ?>`;
                }

                function handleSliderInput() {
                    const users = parseInt(elements.teamSlider.value);
                    elements.teamUserCount.textContent = users;
                    updateFloatingCount();

                    if (users >= 100) {
                        elements.perUserPrice.parentElement.style.display = 'none';
                        elements.yearlyPrice.parentElement.style.display = 'none';
                        elements.teamPriceSection.style.display = 'none';
                        elements.teamButton.textContent = '<?php echo esc_js($settings['js_contact_us_quote_text']); ?>';
                    } else {
                        const prices = calculatePrice(users);

                        elements.perUserPrice.parentElement.style.display = 'flex';
                        elements.yearlyPrice.parentElement.style.display = 'block';
                        elements.teamPriceSection.style.display = 'flex';
                        elements.perUserPrice.textContent = prices.perUser.toFixed(2);
                        elements.yearlyPrice.textContent = prices.yearly.toLocaleString();
                        elements.teamButton.textContent = '<?php echo esc_js($settings['teams_button_text']); ?>';
                    }
                }

                // Event listeners
                if (elements.teamSlider) {
                    elements.teamSlider.addEventListener('input', handleSliderInput);
                    window.addEventListener('resize', updateFloatingCount);

                    // Initialize
                    updateFloatingCount();
                    elements.teamSlider.dispatchEvent(new Event('input'));
                }
            });
        </script>
<?php
    }
}
