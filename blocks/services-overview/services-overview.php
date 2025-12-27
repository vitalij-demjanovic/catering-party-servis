<?php
/**
 * Services overview template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$services = get_field('services');

?>

<section class="services-overview">
    <div class="container">
        <?php if ($title): ?>
            <h2 class="section-title"><?= esc_html($title); ?></h2>
        <?php endif; ?>
    </div>
    <div class="container">
        <?php if ($services): ?>
        <div class="services-list">
            <?php foreach ($services as $index => $service): ?>
                <?php if ($service['service_name']): ?>
                    <button type="button" data-tab="<?= esc_attr($index); ?>" class="service-tab-button <?= $index === 0 ? 'active' : ''; ?>"> <?= esc_html($service['service_name']); ?></button>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
            <div class="services-content">
                <?php foreach ($services as $index => $service): ?>
                    <div data-tab="<?= esc_attr($index); ?>" class="services-content__item <?= $index === 0 ? 'active' : ''; ?>">
                        <?php if ($service['service_name']): ?>
                            <h3 class="service-tab-name"> <?= esc_html($service['service_name']); ?></h3>
                        <?php endif; ?>
                        <?php if ($service['description']): ?>
                            <p class="service-tab-description"><?= esc_html($service['description']); ?></p>
                        <?php endif; ?>
                        <?php if ($service['service_link']): ?>
                            <a
                                    href="<?= esc_url($service['service_link']['url']); ?>"
                                    class="btn-primary btn-primary-arrow-right service-tab-link"
                                    <?= !empty($service['service_link']['target']) ? 'target="' . esc_attr($service['service_link']['target']) . '"' : ''; ?>
                            >
                                <?= esc_html($service['service_link']['title']); ?>
                            </a>
                        <?php endif; ?>
                        <div class="service-grid-layout">
                            <?php if ($service['what_it_includes']): ?>
                                <div class="service-grid-layout__includes">
                                    <h4><?php echo __('Čo to zahŕňa', 'catering-party-servis'); ?></h4>
                                    <?= wp_kses_post($service['what_it_includes']); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($service['cards']): ?>
                                <?php foreach ($service['cards'] as $index => $card): ?>
                                    <div class="service-card card-layout__<?= esc_attr($card['layout']); ?> card-grid__<?= esc_attr($index); ?>">
                                        <?php if ($card['image']): ?>
                                            <?= wp_get_attachment_image($card['image']['ID'], 'full'); ?>
                                        <?php endif; ?>
                                        <?php if ($card['number']): ?>
                                            <span><?= esc_html($card['number']); ?></span>
                                        <?php endif; ?>
                                        <?php if ($card['label']): ?>
                                            <p><?= esc_html($card['label']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>


