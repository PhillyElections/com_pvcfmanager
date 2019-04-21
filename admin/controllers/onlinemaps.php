<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Onlinemaps Controller for PVCFManager Component
 *
 * @package    Philadelphia.Votes
 * @subpackage Components
 * @license    GNU/GPL
 */
class PvcfmanagerControllerOnlinemaps extends PvcfmanagerController
{
    /**
     * Display the Onlinemaps View
     * @return void
     */
    public function display()
    {
        // if 'raw' isn't explicit, set to 'html'
        $view = $this->getView('onlinemaps', JRequest::getWord('format', 'html'));
        $view->setModel($this->getModel('Onlinemaps'), true);
        $view->setModel($this->getModel('Classes'), true);


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
        $mainframe->redirect('index.php?option=com_pvcfmanager&controller=onlinemap&task=edit&cid=' . $cid[0]);
    }

    public function add()
    {
        $mainframe = JFactory::getApplication();
        $mainframe->redirect('index.php?option=com_pvcfmanager&controller=onlinemap&task=add&&cid=' . $cid[0]);
    }

    public function publish()
    {
        JRequest::checkToken() or jexit('Invalid Token');

        $model = $this->getModel('Onlinemaps');
        $model->publish();
        $this->display();
    }

    public function unpublish()
    {
        JRequest::checkToken() or jexit('Invalid Token');

        $model = $this->getModel('Onlinemaps');
        $model->unpublish();
        $this->display();
    }
}
