<?php

/**
 * Example config file for the "add_buttons" plugin.
 *
 * Save a copy of this file as /plugins/add_buttons/config.inc.php and adapt
 * as needed.
 *
 * @license SPDX-License-Identifier: GPL-3.0-or-later
 * @copyright SPDX-FileCopyrightText: foundata GmbH <https://foundata.com>
 */


$config['add_buttons'] = array(

    array(
        // mandatory
        //'type' => 'link',
        //'container' => 'taskbar',
        'href' => 'https://foundata.com/',
        'target' => '_blank',
        'label' => 'foundata',
        // FIXME To be implemented: 'icon_inline' => '<svg ...',
        // FA5 is only half the size of FA6, use if possible.
        'icon_fontawesome_v5' => 'fas fa-external-link-alt',
        //'icon_fontawesome_v6' => 'fa-solid fa-up-right-from-square',
        // FIXME To be implemented: 'icon_heroicons_v2' => 'foobar.svg',
    ),

);


