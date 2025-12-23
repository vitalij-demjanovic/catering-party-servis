<?php
/**
 * Hero banner 1 template.
 *
 * @param array $block The block settings and attributes.
 */


$image          = get_field('hero_image');
$text           = get_field('text');
$button_primary = get_field('button_primary');
$button_second  = get_field('button_secondary');

$show_benefits  = get_field('show_benefits');
$benefits_title = get_field('benefits_title');
$benefits_list  = get_field('benefits_list');

?>

<section class="hero-banner-1">
    <div class="container">
        <div class="position-lg-relative bg-wrapper">
            <?php if ($image): ?>
                <div class="hero-banner-1__image">
                    <?= wp_get_attachment_image($image['ID'], 'full'); ?>
                </div>
            <?php endif; ?>
            <div class="hero-banner-1__content">
                <?php if ($text): ?>
                    <?= wp_kses_post($text); ?>
                <?php endif; ?>
                <?php if ($button_primary || $button_second): ?>
                    <div class="hero-banner-1__actions d-flex flex-column flex-sm-row align-items-center justify-content-center">
                        <?php if ($button_primary): ?>
                            <a
                                    href="<?= esc_url($button_primary['url']); ?>"
                                    class="btn-tertiary btn-tertiary-arrow-right"
                                    <?= !empty($button_primary['target']) ? 'target="' . esc_attr($button_primary['target']) . '"' : ''; ?>
                            >
                                <?= esc_html($button_primary['title']); ?>
                            </a>
                        <?php endif; ?>
                        <?php if ($button_second): ?>
                            <a
                                    href="<?= esc_url($button_second['url']); ?>"
                                    class="btn-tertiary btn-tertiary-arrow-right mt-3 mt-sm-0 ms-sm-3"
                                    <?= !empty($button_second['target']) ? 'target="' . esc_attr($button_second['target']) . '"' : ''; ?>
                            >
                                <?= esc_html($button_second['title']); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if ($show_benefits): ?>
                <div class="hero-banner-1__benefits d-xl-flex align-items-center justify-content-between">
                    <span><?= esc_html($benefits_title); ?></span>
                    <div class="swiper list-benefits">
                        <div class="swiper-wrapper">
                            <?php foreach ($benefits_list as $item): ?>
                                <di class="swiper-slide d-flex align-items-center">
                                    <?php if ($item['benefit_image']): ?>
                                        <div class="benefit-image d-flex align-items-center justify-content-center">
                                            <?= wp_get_attachment_image($item['benefit_image']['ID'], 'full'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($item['benefit_text']): ?>
                                        <p class="mb-0"><?= esc_html($item['benefit_text']); ?></p>
                                    <?php endif; ?>
                                </di>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
