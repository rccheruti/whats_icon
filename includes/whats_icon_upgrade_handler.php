<?php
add_action('upgrader_process_complete', 'whats_icon_atualizado', 10, 2);

function whats_icon_atualizado($upgrader_object, $options)
{
    if ($options['action'] == 'update' && $options['type'] == 'plugin') {
        $plugin_slug = 'whats_icon/whats_icon.php';
        if (in_array($plugin_slug, $options['plugins'])) {
            $old_plugin_path = WP_PLUGIN_DIR . '/whats_icon';
            if (is_dir($old_plugin_path)) {
                require_once ABSPATH . 'wp-admin/includes/file.php';
                WP_Filesystem();
                global $wp_filesystem;
                $wp_filesystem->delete($old_plugin_path, true);
            }
        }
    }
}
