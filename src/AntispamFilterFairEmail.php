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
    /** @var string Filter name */
    public $name = 'Fair Email';

    /** @var bool Filter has settings GUI? */
    public $has_gui = false;

    /** @var bool Is filter active? */
    public $active = false;

    /**
     * Sets the filter description.
     */
    protected function setInfo()
    {
        $this->description = __('Fair Email spam filter');
    }

    /**
     * This method returns filter status message. You can overload this method to
     * return a custom message. Message is shown in comment details and in
     * comments list.
     *
     * @param      string  $status      The status
     * @param      int     $comment_id  The comment identifier
     *
     * @return     string  The status message.
     */
    public function getStatusMessage(string $status, ?int $comment_id)
    {
        return sprintf(__('Filtered by %s.'), $this->guiLink());
    }

    /**
     * This method should return if a comment is a spam or not. If it returns true
     * or false, execution of next filters will be stoped. If should return nothing
     * to let next filters apply.
     *
     * Your filter should also fill $status variable with its own information if
     * comment is a spam.
     *
     * @param      string  $type     The comment type (comment / trackback)
     * @param      string  $author   The comment author
     * @param      string  $email    The comment author email
     * @param      string  $site     The comment author site
     * @param      string  $ip       The comment author IP
     * @param      string  $content  The comment content
     * @param      int     $post_id  The comment post_id
     * @param      string  $status   The comment status
     */
    public function isSpam(string $type, ?string $author, ?string $email, ?string $site, ?string $ip, ?string $content, ?int $post_id, string &$status)
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
