<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Prata&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="main-header">
    <div class="container">
        <div class="navbar-1">
            <div>
                <a href="#" class="menu-btn btn-primary">Menu</a>
            </div>
            <div class="navbar-brand">
                <?php
                if (function_exists('get_field')) {
                    $logo = get_field('main_logo', 'option');

                    if ($logo) {
                        echo '<a href="' . esc_url(home_url('/')) . '" title="Logo">';
                        echo wp_get_attachment_image($logo['ID'], 'full', '', array('class' => ''));
                        echo '</a>';
                    }
                }
                ?>
            </div>
            <div>
                <?php
                $phone = get_field('header_phone', 'option');

                if (!empty($phone['url'])) :
                    ?>
                    <a
                            href="<?= esc_url($phone['url']); ?>"
                            class="contact-btn btn-primary"
                            <?= !empty($phone['target']) ? 'target="'. esc_attr($phone['target']) .'"' : ''; ?>
                    >
                        Kontakt
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>