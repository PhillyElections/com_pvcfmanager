<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Cycle View for PVCFManager Component
 *
 * @package    Philadelphia.Votes
 * @subpackage Components
 * @license    GNU/GPL
 */
class PvcfmanagerViewCycle extends JView
{
    /**
     * display method of Item view
     * @return void
     **/
    public function display($tpl = null)
    {
        $cycle = &$this->get('Data');

        $isNew = ($cycle->id < 1);

        $text = $isNew ? JText::_('New') : JText::_('Edit');
        JToolBarHelper::title(JText::_('Cycle') . ': <small><small>[ ' . $text . ' ]</small></small>');
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

        $this->assignRef('cycle', $cycle);
        $this->assignRef('isNew', $isNew);

        parent::display($tpl);
    }
}
