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
    '3.0',
    [
        'requires'    => [['core', '2.28']],
        'permissions' => dcCore::app()->auth->makePermissions([
            dcAuth::PERMISSION_USAGE,
            dcAuth::PERMISSION_CONTENT_ADMIN,
        ]),
        'priority' => 200,
        'type'     => 'plugin',

        'details'    => 'https://open-time.net/?q=fairEmail',
        'support'    => 'https://github.com/franck-paul/fairEmail',
        'repository' => 'https://raw.githubusercontent.com/franck-paul/fairEmail/master/dcstore.xml',
    ]
);
