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

if (!defined('DC_RC_PATH')) {
    return;
}

$this->registerModule(
    "Fair Email",                                     // Name
    "Fair Email filter for antispam Dotclear plugin", // Description
    "Franck Paul",                                    // Author
    '0.1.1',                                          // Version
    [
        'requires'    => [['core', '2.13']], // Dependencies
        'permissions' => 'usage,contentadmin',
        'priority'    => 200,
        'type'        => 'plugin'
    ]
);
