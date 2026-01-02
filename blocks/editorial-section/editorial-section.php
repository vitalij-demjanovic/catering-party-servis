<?php
/**
 * Editorial section template.
 *
 * @param array $block The block settings and attributes.
 */

$text = get_field('text');
$button = get_field('button');
$primary_image = get_field('primary_image');
$secondary_image = get_field('secondary_image');
$third_image = get_field('third_image');

?>

<section class="editorial-section position-relative">
    <div class="container">
        <div class="editorial-section__content">
            <?php if ($text) : ?>
                <?= wp_kses_post($text); ?>
            <?php endif; ?>
            <?php if ($button) : ?>
                <a href="<?= esc_url($button['url']); ?>" class="btn-primary btn-primary-arrow-right"><?= esc_html($button['title']); ?></a>
            <?php endif; ?>
        </div>
    </div>
    <div class="editorial-section__images">
        <?php if ($primary_image) : ?>
            <?= wp_get_attachment_image($primary_image['ID'], 'full', '', array('class' => 'editorial-section__image--primary') ); ?>
        <?php endif; ?>
        <?php if ($third_image) : ?>
            <?= wp_get_attachment_image($third_image['ID'], 'full', '', array('class' => 'editorial-section__image--third') ); ?>
        <?php endif; ?>
        <?php if ($secondary_image) : ?>
            <?= wp_get_attachment_image($secondary_image['ID'], 'full', '', array('class' => 'editorial-section__image--secondary') ); ?>
        <?php endif; ?>
    </div>
</section>