<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Items View for [COmponent] Component
 *
 * @package    Philadelphia.Votes
 * @subpackage Components
 * @license        GNU/GPL
 */
class PvcfmanagerViewItems extends JView
{
    /**
     * Items view display method
     * @return void
     **/
    public function display($tpl = null)
    {
        $items      = &$this->get('Data');
        $pagination = &$this->get('Pagination');

        $this->assignRef('items', $items);
        $this->assignRef('pagination', $pagination);

        parent::display($tpl);
    }
}
