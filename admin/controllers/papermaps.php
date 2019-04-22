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
        // if 'raw' isn't explicit, set to 'html'
        $view = $this->getView('papermaps', JRequest::getWord('format', 'html'));
        $view->setModel($this->getModel('Papermaps'), true);
        $view->setModel($this->getModel('Classes'), true);

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

    /**
     * Redirect Add task to Onlinemap Controller
     * @return void
     */
    public function add()
    {
        $mainframe = JFactory::getApplication();
        $mainframe->redirect('index.php?option=com_pvcfmanager&controller=papermap&task=add&&cid=' . $cid[0]);
    }

    /**
     * Redirect Publish task to Onlinemap Controller
     * @return void
     */
    public function publish()
    {
        JRequest::checkToken() or jexit('Invalid Token');

        $model = $this->getModel('Papermaps');
        $model->publish();
        $this->display();
    }

    /**
     * Redirect Unpublish task to Onlinemap Controller
     * @return void
     */
    public function unpublish()
    {
        JRequest::checkToken() or jexit('Invalid Token');

        $model = $this->getModel('Papermaps');
        $model->unpublish();
        $this->display();
    }
}
