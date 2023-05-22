<?php
/**
 * @brief fairEmail, a plugin for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Plugins
 *
 * @author Jean-Christian Denis, Franck Paul and contributors
 *
 * @copyright Jean-Christian Denis, Franck Paul
 * @copyright GPL-2.0 https://www.gnu.org/licenses/gpl-2.0.html
 */
declare(strict_types=1);

namespace Dotclear\Plugin\fairEmail;

use dcBlog;
use dcCore;
use Dotclear\Plugin\antispam\SpamFilter;

class AntispamFilterFairEmail extends SpamFilter
{
    public $name    = 'Fair Email';
    public $has_gui = false;
    public $active  = false;

    protected function setInfo()
    {
        $this->description = __('Fair Email spam filter');
    }

    public function getStatusMessage($status, $comment_id)
    {
        return sprintf(__('Filtered by %s.'), $this->guiLink());
    }

    public function isSpam($type, $author, $email, $site, $ip, $content, $post_id, &$status)
    {
        if (($email != '') && dcCore::app()->blog->getComments([
            'comment_email'     => $email,                      // searched email
            'comment_status'    => dcBlog::COMMENT_PUBLISHED,   // published comment
            'comment_trackback' => 0,                           // not a trackback
        ], true)->f(0) > 0) {
            // Mail already used in previous published comment, not a spam
            return false;
        }
    }
}
