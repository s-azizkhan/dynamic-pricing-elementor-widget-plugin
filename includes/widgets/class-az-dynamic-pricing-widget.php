<?php
class Az_Dynamic_Pricing_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'az_dynamic_pricing';
    }

    public function get_title() {
        return __( 'Dynamic Pricing', 'az-custom-elementor-widget' );
    }

    public function get_icon() {
        return 'eicon-price-table';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function register_controls() {
        // Professional Plan Settings
        $this->start_controls_section(
            'professional_section',
            [
                'label' => __( 'Professional Plan Settings', 'az-custom-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'pro_price',
            [
                'label' => __( 'Professional Plan Price ($)', 'az-custom-elementor-widget' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 10,
            ]
        );

        $this->end_controls_section();

        // Teams Plan Settings
        $this->start_controls_section(
            'teams_section',
            [
                'label' => __( 'Teams Plan Settings', 'az-custom-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'teams_price_per_user',
            [
                'label' => __( 'Teams Price per User ($)', 'az-custom-elementor-widget' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 2,
            ]
        );

        $this->end_controls_section();

        // Contact Button Settings
        $this->start_controls_section(
            'contact_section',
            [
                'label' => __( 'Contact Button Settings', 'az-custom-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'contact_button_text',
            [
                'label' => __( 'Contact Button Text', 'az-custom-elementor-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Contact Us',
            ]
        );

        $this->end_controls_section();

        // Styling Section
        $this->start_controls_section(
            'style_section',
            [
                'label' => __( 'Style Settings', 'az-custom-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'primary_color',
            [
                'label' => __( 'Primary Color', 'az-custom-elementor-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#00D2D2',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $pro_price = $settings['pro_price'];
        $teams_price = $settings['teams_price_per_user'];
        $primary_color = $settings['primary_color'];
        ?>
        <style>
            .az-pricing-section {
                max-width: 1200px;
                margin: 0 auto;
                padding: 40px 20px;
            }
            .az-pricing-header {
                text-align: center;
                margin-bottom: 40px;
            }
            .az-pricing-header h2 {
                font-size: 36px;
                margin-bottom: 15px;
            }
            .az-pricing-header p {
                color: #666;
                font-size: 18px;
            }
            .az-pricing-tabs {
                display: flex;
                justify-content: center;
                gap: 10px;
                margin: 30px 0;
                background: #f2f4f8;
                padding: 8px;
                border-radius: 30px;
                width: fit-content;
                margin: 0 auto 40px;
            }
            .az-tab-button {
                padding: 12px 24px;
                background: transparent;
                color: #666;
                border: none;
                border-radius: 25px;
                cursor: pointer;
                font-weight: 500;
                transition: all 0.3s ease;
                font-size: 16px;
            }
            .az-tab-button:hover {
                background: rgba(0,0,0,0.05);
            }
            .az-tab-button.active {
                background: <?php echo $primary_color; ?>;
                color: #fff;
                box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            }
            .az-pricing-cards {
                display: none;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 30px;
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
                padding: 40px;
                box-shadow: 0 10px 40px rgba(0,0,0,0.05);
                transition: all 0.3s ease;
                position: relative;
                display: flex;
                flex-direction: column;
            }
            .az-pricing-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 50px rgba(0,0,0,0.1);
            }
            .az-card-header {
                margin-bottom: 30px;
            }
            .az-card-header h3 {
                font-size: 24px;
                margin: 0;
                color: #333;
            }
            .az-card-header p {
                color: #666;
                margin: 10px 0 0;
            }
            .az-price {
                font-size: 48px;
                font-weight: 700;
                color: #333;
                margin: 20px 0;
                display: flex;
                align-items: baseline;
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
                margin: 0 0 30px 0;
                padding: 0;
                flex-grow: 1;
            }
            .az-features li {
                margin: 15px 0;
                padding-left: 30px;
                position: relative;
                list-style: none;
                color: #666;
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
            .az-button {
                width: 100%;
                padding: 15px;
                border: none;
                border-radius: 10px;
                background: <?php echo $primary_color; ?>;
                color: white;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                font-size: 16px;
                margin-top: auto;
            }
            .az-button:hover {
                background: black;
                color: white;
                border-radius: 30px;
                transform: translateY(-2px);
                box-shadow: 0 5px 15px <?php echo $primary_color; ?>40;
            }
            .az-slider-container {
                margin: 30px 0;
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
                top: -24px;
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
        </style>

        <div class="az-pricing-section">
            <div class="az-pricing-header">
                <h2>Pricing</h2>
                <p>Get started in minutes. Save up to 25% off the annual plan</p>
            </div>

            <div class="az-pricing-tabs">
                <button class="az-tab-button active" data-tab="professional">Professional</button>
                <button class="az-tab-button" data-tab="teams">Teams</button>
                <button class="az-tab-button" data-tab="agency">Agency Hub</button>
            </div>

            <!-- Professional Plan -->
            <div class="az-pricing-cards active" id="professional-cards">
                <div class="az-pricing-card">
                    <div class="az-card-header">
                        <h3>Professional</h3>
                        <p>Perfect for individual professionals</p>
                    </div>
                    
                    <div class="az-price">
                        $<?php echo $pro_price; ?><small>/month</small>
                        <span class="az-save-badge">Save 25%</span>
                    </div>
                    <div>Billed yearly</div>

                    <div class="az-section-title">Features</div>
                    <ul class="az-features">
                        <li>No Branding of SyncSignature</li>
                        <li>Up to 10 Professional Signatures</li>
                        <li>Copy/Paste Email Signature</li>
                        <li>Profile Picture Maker</li>
                        <li>PRO templates</li>
                        <li>Email Signature Analytics</li>
                        <li>Advanced template editor</li>
                    </ul>
                    <button class="az-button">Get Started</button>
                </div>
            </div>

            <!-- Teams Plan -->
            <div class="az-pricing-cards" id="teams-cards">
                <div class="az-pricing-card">
                    <div class="az-card-header">
                        <h3>Teams</h3>
                        <p>Best for teams with more than 5 members</p>
                    </div>

                    <div id="teams-price" class="az-price">
                        $<span id="per-user-price">2.5</span><small>/user/month</small>
                        <span class="az-save-badge">Save 20%</span>
                    </div>


                    <div>
                        $<span id="yearly-price">0</span> billed yearly
                    </div>
                    
                    <div class="az-slider-container">
                        <div class="az-floating-count" id="floating-user-count">5 users</div>
                        <input type="range" id="team-user-slider" class="az-slider" 
                               min="5" max="100" value="5" step="5">
                    </div>

                    <div class="az-section-title">Features</div>
                    <ul class="az-features">
                        <li>All Professional features</li>
                        <li>Predesigned Team templates</li>
                        <li>Auto Install for Google Workspace</li>
                        <li>Create and update bulk signatures</li>
                        <li>Department wise Signatures</li>
                        <li>Google Workspace Integration</li>
                        <li>Workspace analytics</li>
                    </ul>
                    <button id="teams-button" class="az-button">Get Started</button>
                </div>
            </div>

            <!-- Agency Plan -->
            <div class="az-pricing-cards" id="agency-cards">
                <div class="az-pricing-card">
                    <div class="az-card-header">
                        <h3>Agency Hub</h3>
                        <p>Custom solutions for agencies and enterprises</p>
                    </div>

                    <div class="az-section-title">Features</div>
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
                    <button class="az-button"><?php echo $settings['contact_button_text']; ?></button>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Tab switching
                const tabButtons = document.querySelectorAll('.az-tab-button');
                const pricingCards = document.querySelectorAll('.az-pricing-cards');
                
                tabButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        tabButtons.forEach(btn => btn.classList.remove('active'));
                        pricingCards.forEach(card => card.classList.remove('active'));
                        
                        button.classList.add('active');
                        document.getElementById(`${button.dataset.tab}-cards`).classList.add('active');
                    });
                });

                // Teams pricing calculation
                const teamSlider = document.getElementById('team-user-slider');
                const teamUserCount = document.getElementById('floating-user-count');
                const perUserPrice = document.getElementById('per-user-price');
                const yearlyPrice = document.getElementById('yearly-price');
                const teamButton = document.getElementById('teams-button');
                const floatingCount = document.getElementById('floating-user-count');

                function calculatePrice(users) {
                    // Determine price per user based on tier
                    let pricePerUser;
                    if (users >= 70) {
                        pricePerUser = 1.8;
                    } else if (users >= 30) {
                        pricePerUser = 2;
                    } else {
                        pricePerUser = 2.5;
                    }

                    // Calculate monthly and yearly prices
                    const monthlyPrice = users * pricePerUser;
                    const yearlyPrice = monthlyPrice * 12;
                    const discountedYearlyPrice = yearlyPrice * 0.8; // 20% discount

                    return {
                        perUser: pricePerUser,
                        yearly: discountedYearlyPrice
                    };
                }

                function updateFloatingCount(slider, floatingCount) {
                    const value = parseInt(slider.value);
                    const min = parseInt(slider.min);
                    const max = parseInt(slider.max);
                    const sliderWidth = slider.offsetWidth;
                    const thumbWidth = 24; // Width of the slider thumb
                    
                    // Calculate position percentage
                    const range = max - min;
                    const valuePercentage = (value - min) / range;
                    const position = valuePercentage * (sliderWidth - thumbWidth);
                    
                    // Set the floating count position and text
                    floatingCount.style.left = `${position + (thumbWidth / 2)}px`;
                    floatingCount.textContent = `${value} users`;
                }

                teamSlider?.addEventListener('input', () => {
                    const users = parseInt(teamSlider.value);
                    teamUserCount.textContent = users;
                    updateFloatingCount(teamSlider, floatingCount);
                    
                    if (users >= 100) {
                        perUserPrice.parentElement.style.display = 'none';
                        yearlyPrice.parentElement.style.display = 'none';
                        teamButton.textContent = '<?php echo $settings['contact_button_text']; ?>';
                    } else {
                        const prices = calculatePrice(users);
                        
                        perUserPrice.parentElement.style.display = 'flex';
                        yearlyPrice.parentElement.style.display = 'block';
                        perUserPrice.textContent = prices.perUser.toFixed(2);
                        yearlyPrice.textContent = prices.yearly.toLocaleString();
                        teamButton.textContent = 'Get Started';
                    }
                });

                // Update floating count on window resize
                window.addEventListener('resize', () => {
                    if (teamSlider) {
                        updateFloatingCount(teamSlider, floatingCount);
                    }
                });

                // Trigger initial calculation and floating count position
                if (teamSlider) {
                    updateFloatingCount(teamSlider, floatingCount);
                    teamSlider.dispatchEvent(new Event('input'));
                }
            });
        </script>
        <?php
    }
}
