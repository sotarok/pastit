<?php
/**
 *  Paste/View.php
 *
 *  @author     {$author}
 *  @package    Pastit
 *  @version    $Id: 3746a141b08f7277ff5d5367023b2f4f12139878 $
 */

/**
 *  paste_view view implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Pastit
 */
class Pastit_View_PasteView extends Pastit_ViewClass
{
    /** @var boolean  layout template use flag   */
    public $use_layout = true;

    /**
     *  preprocess before forwarding.
     *
     *  @access public
     */
    public function preforward()
    {
        $pm = $this->backend->getManager('paste');
        $um = $this->backend->getManager('user');
        $paste = $pm->getPaste($this->af->get('id'));

        if (empty($paste)) {
            self::error(404);
            return;
        }

        $this->af->setApp('embed_code', sprintf('<iframe src="%sembed/%s"></iframe>', $this->config->get('url'), $paste['id']));
        $this->af->setApp('user', $um->getUser($paste['user_id']));

        list($content, $type) = $pm->getSyntaxHighlightedContent($paste['content'], $paste['content_type']);
        $paste['content_type'] = $type;
        $this->af->setApp('paste', $paste);
        $this->af->setAppNe('content', $content);
    }
}

