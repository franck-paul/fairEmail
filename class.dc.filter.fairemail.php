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

class dcFilterFairEmail extends dcSpamFilter
{
    public $name    = 'Fair Email';
    public $has_gui = false;
    public $active  = false;

    public function __construct($core)
    {
        parent::__construct($core);
    }

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
        $blog = &$this->core->blog;

        if ($blog->getComments([
            'comment_email'     => $email,  // searched email
            'comment_status'    => 1,       // published comment
            'comment_trackback' => 0        // not a trackback
        ], true)->f(0) > 0) {
            // Mail already used in previous published comment, not a spam
            return false;
        }
    }
}
