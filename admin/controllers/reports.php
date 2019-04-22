<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Reports Controller for PVCFManager Component
 *
 * @package    Philadelphia.Votes
 * @subpackage Components
 * @license    GNU/GPL
 */
class PvcfmanagerControllerReports extends PvcfmanagerController
{
    /**
     * Display the Reports View
     * @return void
     */
    public function display()
    {
        JRequest::setVar('view', 'reports');

        parent::display();
    }

   /**
     * Redirect Edit task to Report Controller
     * @return void
     */
    public function edit()
    {
        $mainframe = JFactory::getApplication();
        $cid       = JRequest::getVar('cid');
        $mainframe->redirect('index.php?option=com_pvcfmanager&controller=report&task=edit&cid=' . $cid[0]);
    }

    /**
     * Redirect Add task to Report Controller
     * @return void
     */
    public function add()
    {
        $mainframe = JFactory::getApplication();
        $mainframe->redirect('index.php?option=com_pvcfmanager&controller=report&task=add&&cid=' . $cid[0]);
    }

    /**
     * Redirect Publish task to Report Controller
     * @return void
     */
    public function publish()
    {
        JRequest::checkToken() or jexit('Invalid Token');

        $model = $this->getModel('Reports');
        $model->publish();
        $this->display();
    }
    
    /**
     * Redirect Unpublish task to Report Controller
     * @return void
     */
    public function unpublish()
    {
        JRequest::checkToken() or jexit('Invalid Token');

        $model = $this->getModel('Reports');
        $model->unpublish();
        $this->display();
    }
}
