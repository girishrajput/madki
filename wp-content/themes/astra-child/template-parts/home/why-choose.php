<?php
/**
 * Why Choose Madki Section Template - Red-Toned Accent Style
 * 
 * @package Astra_Child
 */

if (!defined('ABSPATH')) {
    exit;
}

$section_title    = get_field('why_choose_title') ?: __('Why Choose Madki Masala', 'astra-child');
$section_subtitle = get_field('why_choose_subtitle') ?: __('Uncompromising purity, rich heritage, and superior grinding standards.', 'astra-child');
$features         = get_field('why_choose_features') ?: get_field('features');

if ( empty( $features ) || ! is_array( $features ) ) {
    $features = array(
        array(
            'title'       => __( '100% Pure & Unadulterated', 'astra-child' ),
            'description' => __( 'Sourced directly from certified farms with zero artificial colors or added fillers.', 'astra-child' ),
            'icon_symbol' => '🌿',
        ),
        array(
            'title'       => __( 'Low-Temperature Grinding', 'astra-child' ),
            'description' => __( 'Processed under controlled temperatures to retain essential volatile oils and natural aroma.', 'astra-child' ),
            'icon_symbol' => '⚙️',
        ),
        array(
            'title'       => __( 'Rigorous Quality Checks', 'astra-child' ),
            'description' => __( 'Tested across multi-level quality parameters ensuring safety, consistency, and compliance.', 'astra-child' ),
            'icon_symbol' => '🛡️',
        ),
        array(
            'title'       => __( 'Trusted B2B Partner', 'astra-child' ),
            'description' => __( 'Reliable supply chain, customized packaging sizes, and dedicated distributor support.', 'astra-child' ),
            'icon_symbol' => '🤝',
        ),
    );
}
?>

<!-- Red-Toned Why Choose Section -->
<section id="why-choose" class="why-choose-section" style="position: relative; background: linear-gradient(135deg, #8B0000 0%, #A93226 50%, #7B241C 100%); color: #FFFFFF; padding: 80px 0; overflow: hidden;">
    
    <!-- Subtle Background Overlay -->
    <div style="position: absolute; top:0; left:0; right:0; bottom:0; background: radial-gradient(circle at center, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0.4) 100%); pointer-events: none;"></div>

    <div class="ast-container" style="position: relative; z-index: 2;">
        
        <!-- Section Header -->
        <div style="text-align: center; margin-bottom: 50px;">
            <span style="font-size: 0.85rem; font-weight: 700; letter-spacing: 1.5px; color: #FCA5A5; text-transform: uppercase; display: block; margin-bottom: 8px;">
                <?php _e( 'Our Core Promise', 'astra-child' ); ?>
            </span>
            <h2 style="font-size: 2.6rem; font-weight: 800; color: #FFFFFF !important; margin: 0 0 12px 0;"><?php echo esc_html($section_title); ?></h2>
            <p style="font-size: 1.05rem; color: #FEE2E2; max-width: 620px; margin: 0 auto; line-height: 1.6;"><?php echo esc_html($section_subtitle); ?></p>
        </div>

        <!-- Features Grid -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 24px;">
            <?php foreach ($features as $feature) : 
                $title       = $feature['title'] ?? '';
                $description = $feature['description'] ?? '';
                $icon        = $feature['icon'] ?? '';
                $icon_symbol = $feature['icon_symbol'] ?? '✨';
                $icon_url    = !empty($icon) ? astra_child_get_image_url($icon) : '';
            ?>
                <div style="background: rgba(255, 255, 255, 0.08); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.15); border-radius: 16px; padding: 32px 24px; transition: transform 0.25s ease, background 0.25s ease;">
                    <div style="font-size: 2.2rem; margin-bottom: 16px;">
                        <?php if (!empty($icon_url)) : ?>
                            <img src="<?php echo $icon_url; ?>" alt="<?php echo esc_attr($title); ?>" width="50" height="50" style="object-fit: contain;">
                        <?php else : ?>
                            <span><?php echo esc_html($icon_symbol); ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <h3 style="font-size: 1.25rem; font-weight: 700; color: #FFFFFF !important; margin: 0 0 10px 0;"><?php echo esc_html($title); ?></h3>
                    <p style="font-size: 0.92rem; color: #FEE2E2; line-height: 1.65; margin: 0;"><?php echo esc_html($description); ?></p>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>