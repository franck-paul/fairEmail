<?php

/**
 * @brief fairEmail, an antispam filter plugin for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Plugins
 *
 * @author Franck Paul
 *
 * @copyright Franck Paul carnet.franck.paul@gmail.com
 * @copyright GPL-2.0 https://www.gnu.org/licenses/gpl-2.0.html
 */
$this->registerModule(
    'Fair Email',
    'Fair Email filter for antispam Dotclear plugin',
    'Franck Paul',
    '5.0',
    [
        'date'        => '2003-08-13T13:42:00+0100',
        'requires'    => [['core', '2.36']],
        'permissions' => 'My',
        'priority'    => 200,
        'type'        => 'plugin',

        'details'    => 'https://open-time.net/?q=fairEmail',
        'support'    => 'https://github.com/franck-paul/fairEmail',
        'repository' => 'https://raw.githubusercontent.com/franck-paul/fairEmail/main/dcstore.xml',
        'license'    => 'gpl2',
    ]
);
