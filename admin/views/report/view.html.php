<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Report View for PVCFManager Component
 *
 * @package    Philadelphia.Votes
 * @subpackage Components
 * @license    GNU/GPL
 */
class PvcfmanagerViewReport extends JView
{
    /**
     * display method of Item view
     * @return void
     **/
    public function display($tpl = null)
    {

        $report = &$this->get('Data');

        $isNew = ($report->id < 1);

        $text = $isNew ? JText::_('New') : JText::_('Edit');
        JToolBarHelper::title(JText::_('Report') . ': <small><small>[ ' . $text . ' ]</small></small>');
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

        $this->assignRef('report', $report);
        $this->assignRef('isNew', $isNew);

        parent::display($tpl);
    }
}
