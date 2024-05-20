<?php

register_deactivation_hook(__FILE__, 'whats_icon_desativado');

function whats_icon_desativado()
{
    delete_option('whats_icon_ddi');
    delete_option('whats_icon_ddd');
    delete_option('whats_icon_number');
    delete_option('whats_icon_text');
    delete_option('whats_icon_position');
    delete_option('whats_icon_bottom_px');
    delete_option('whats_icon_side_px');
}
