<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Class View for PVCFManager Component
 *
 * @package    Philadelphia.Votes
 * @subpackage Components
 * @license    GNU/GPL
 */
class PvcfmanagerViewClass extends JView
{
    /**
     * display method of Item view
     * @return void
     **/
    public function display($tpl = null)
    {
        $row = &$this->get('Data');

        $isNew = ($row->id < 1);

        $text = $isNew ? JText::_('New') : JText::_('Edit');
        JToolBarHelper::title(JText::_('Class') . ': <small><small>[ ' . $text . ' ]</small></small>');
        if ($isNew) {
            JToolBarHelper::save('save', 'Register');
            JToolBarHelper::cancel('cancel', 'Close');
            // We'll use a separate template for new items: default_add
            // $tpl = 'add';
        } else {
            // for existing items the button is renamed `close`
            JToolBarHelper::save('save', 'Update');
            JToolBarHelper::cancel('cancel', 'Close');
        }

        $this->assignRef('row', $row);
        $this->assignRef('isNew', $isNew);

        parent::display($tpl);
    }
}
