<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Papermaps View for PVCFManager Component
 *
 * @package    Philadelphia.Votes
 * @subpackage Components
 * @license    GNU/GPL
 */
class PvcfmanagerViewPapermaps extends JView
{
    /**
     * Papermaps view display method
     * @return void
     **/
    public function display($tpl = null)
    {
        JToolBarHelper::title(JText::_('PVCFManager Papermaps Manager'), 'generic.png');
        JToolBarHelper::deleteList();
        JToolBarHelper::editListX();
        JToolBarHelper::addNewX();

        d($this);
        $papermaps  = &$this->get('Data');
        $pagination = &$this->get('Pagination');

        $this->assignRef('papermaps', $papermaps);
        $this->assignRef('pagination', $pagination);

        parent::display($tpl);
    }
}
