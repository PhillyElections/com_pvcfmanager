<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Onlineitems Controller for [COmponent] Component
 *
 * @package    Philadelphia.Votes
 * @subpackage Components
 * @license    GNU/GPL
 */
class PvcfmanagerControllerOnlineitems extends PvcfmanagerController
{
    /**
     * Display the Onlineitems View
     * @return void
     */
    public function display()
    {
        JRequest::setVar('view', 'onlineitems');

        parent::display();
    }

    /**
     * Redirect Edit task to Onlineitem Controller
     * @return void
     */
    public function edit()
    {
        $mainframe = JFactory::getApplication();
        $cid       = JRequest::getVar('cid');
        $mainframe->redirect('index.php?option=com_pvcfmanager&controller=onlineitem&task=edit&cid=' . $cid[0]);
    }

    public function publish()
    {
        JRequest::checkToken() or jexit('Invalid Token');

        $model = $this->getModel('Onlineitems');
        $model->publish();
        $this->display();
    }

    public function unpublish()
    {
        JRequest::checkToken() or jexit('Invalid Token');

        $model = $this->getModel('Onlineitems');
        $model->unpublish();
        $this->display();
    }
}
