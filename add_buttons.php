<?php

/**
 * Main plugin file to extend Roundcube's abstract plugin class.
 *
 * @see https://github.com/roundcube/roundcubemail/wiki/Plugin-API
 * @license SPDX-License-Identifier: GPL-3.0-or-later
 * @copyright SPDX-FileCopyrightText: foundata GmbH <https://foundata.com>
 */


/**
 * Plugin class to extend different menus / navigation bars with additional buttons.
 */
class add_buttons extends rcube_plugin
{
    function init()
    {
        // get plugin config
        $this->load_config();

        // load skin-specific stylesheets (if any)
        $stylesheet_path = $this->local_skin_path() . '/add_button.css';
        //if (file_exists($stylesheet_path)) {
            $this->include_stylesheet($stylesheet_path);
        //}

        // switches to control if a shared resource has (not) to be included
        $included_fontawesome_v5 = false;
        $included_fontawesome_v6 = false;

        foreach (rcube::get_instance()->config->get('add_buttons', array()) as $index => $button_item) {

            // set defaults
            if (empty($button_item['type'])) {
                $button_item['type'] = 'link';
            }
            if (empty($button_item['container'])) {
                $button_item['container'] = 'taskbar';
            }
            if (empty($button_item['onclick'])) {
                $button_item['onclick'] = ''; // emtpy string will prevent adding the attribute
            }

            // check data
            //
            // Currently supported Roundcube containers: 'taskbar', 'toolbar', 'messagemenu'.
            // You can search for '<roundcube:container name="' in a template to check if they are
            // existing when adding support for new templates and add additional checks here if there
            // are edge cases.
            if (!in_array($button_item['type'], array('link')) ||
                !in_array($button_item['container'], array('taskbar', 'toolbar', 'messagemenu'))) {
                rcmail::log_bug('Invalid item in "add_buttons" config: Skipping buttom item '. $index);
                continue;
            }

            $content = $button_item['label'];

            /* FIXME To be implemented
            // userdefined inline SVG icon
            if (isset($button_item['icon_inline']) && $button_item['icon_inline'] !== '') {
                // FIXME

            // Heroicons v2 icon
            } elseif (isset($button_item['icon_heroicons_v2']) && $button_item['icon_heroicons_v2'] !== '') {
                // FIXME
            } */

            // Font Awesome v5 icon
            // FIXME <i> element is disabled with mobile view
            if (isset($button_item['icon_fontawesome_v5']) && $button_item['icon_fontawesome_v5'] !== '') {
                if ($included_fontawesome_v5 === false) {
                    // FIXME this is just a temporary resource during development / PoC. It has
                    //       to be replaced with a local copy if we are sure to use FA this way.
                    $this->include_stylesheet('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
                    $included_fontawesome_v5 = true;
                }
                $content = '<i class="' . $button_item['icon_fontawesome_v5'] . '"></i> ' . $content;

            // Font Awesome v6 icon
            // FIXME <i> element is disabled in mobile view
            } elseif (isset($button_item['icon_fontawesome_v6']) && $button_item['icon_fontawesome_v6'] !== '') {
                if ($included_fontawesome_v6 === false) {
                    // FIXME this is just a temporary resource during development / PoC. It has
                    //       to be replaced with a local copy if we are sure to use FA this way.
                    $this->include_stylesheet('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css');
                    $included_fontawesome_v6 = true;
                }
                $content = '<i class="' . $button_item['icon_fontawesome_v6'] . '"></i> ' . $content;
            }

            // https://docs.roundcube.net/doc/phpdoc/classes/rcube_plugin.html#method_add_button
            $this->add_button(
                // parameters (as used in skin templates), parameters with empty string as
                // value are getting ignored automatically.
                array(
                    'type' => $button_item['type'],
                    'content' => $content,
                    'href' => $button_item['href'],
                    'target' => $button_item['target'],
                    'class' => 'add_button',
                    'classSel' => 'selected',
                    'innerclass' => 'inner',
                    'onclick' => $button_item['onclick'],
                ),
                // target container to add the button to
                $button_item['container']
            );


        }
    }
}
