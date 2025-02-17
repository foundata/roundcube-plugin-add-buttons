<?php

/**
 * Example config file for the "add_buttons" plugin.
 *
 * Save a copy of this file as /plugins/add_buttons/config.inc.php and adapt
 * as needed.
 *
 * @license SPDX-License-Identifier: GPL-3.0-or-later
 * @copyright SPDX-FileCopyrightText: foundata GmbH (https://foundata.com)
 */


$config['add_buttons'] = array(

    // FA5 is only half the size of FA6, use if possible.
    array(
        'href' => 'https://foundata.com/',
        'target' => '_blank',
        'label' => 'foundata',
        'icon_fontawesome_v5' => 'fas fa-external-link-alt',
    ),

    array(
        'href' => 'https://foundata.com/',
        'target' => '_blank',
        'label' => 'foundata',
        'icon_fontawesome_v6' => 'fa-solid fa-up-right-from-square',
    ),

    array(
        'href' => 'https://foundata.com/',
        'target' => '_blank',
        'label' => 'foundata',
        'icon_inline' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" /></svg>',
    ),
);


