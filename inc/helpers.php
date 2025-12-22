<?php
function theme_format_phone_for_tel( $phone ) {
    return preg_replace('/\s+/', '', $phone);
}
