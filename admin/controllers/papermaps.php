<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Papermaps Controller for PVCFManager Component
 *
 * @package    Philadelphia.Votes
 * @subpackage Components
 * @license    GNU/GPL
 */
class PvcfmanagerControllerPapermaps extends PvcfmanagerController
{
    /**
     * Display the Papermaps View
     * @return void
     */
    public function display()
    {
        JRequest::setVar('view', 'papermaps');

        parent::display();
    }

    /**
     * Redirect Edit task to Onlinemap Controller
     * @return void
     */
    public function edit()
    {
        $mainframe = JFactory::getApplication();
        $cid       = JRequest::getVar('cid');
        $mainframe->redirect('index.php?option=com_pvcfmanager&controller=papermap&task=edit&cid=' . $cid[0]);
    }

    public function add()
    {
        $mainframe = JFactory::getApplication();
        $mainframe->redirect('index.php?option=com_pvcfmanager&controller=papermap&task=add&&cid=' . $cid[0]);
    }

    public function publish()
    {
        JRequest::checkToken() or jexit('Invalid Token');

        $model = $this->getModel('Papermaps');
        $model->publish();
        $this->display();
    }

    public function unpublish()
    {
        JRequest::checkToken() or jexit('Invalid Token');

        $model = $this->getModel('Papermaps');
        $model->unpublish();
        $this->display();
    }
}
