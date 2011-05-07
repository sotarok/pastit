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

        if ($this->af->get('format') == 'raw') {
            $this->has_default_header = false;
            $this->use_layout = false;
            $this->forward_path = 'none.tpl';
            $this->header(array('Content-Type' => 'text/plain'));
            echo $paste['content'];
            return;
        }

        //error_log(var_export($paste, true));
        list($content, $type) = $pm->getSyntaxHighlightedContent($paste['content'], $paste['content_type']);
        $paste['content_type'] = $type;
        $this->af->setApp('paste', $paste);
        $this->af->setAppNe('content', $content);
    }
}

