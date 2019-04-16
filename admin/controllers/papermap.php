<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Papermap Controller for PVCFManager Component
 *
 * @package    Philadelphia.Votes
 * @subpackage Components
 * @license    GNU/GPL
 */
class PvcfmanagerControllerPapermap extends PvcfmanagerController
{
    /**
     * Bind tasks to methods
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        // Register Extra tasks
        $this->registerTask('add', 'edit');
        $this->registerTask('update', 'save');
    }

    /**
     * Display the edit form
     * @return void
     */
    public function edit()
    {
        JRequest::setVar('view', 'papermap');

        parent::display();
    }

    /**
     * Save a record (and redirect to main page)
     *
     * @return void
     */
    public function save()
    {
        JRequest::checkToken() or jexit('Invalid Token');

        $model = $this->getModel('papermap');

        if ($model->store()) {
            $msg = JText::_('Saved!');
        } else {
            // let's grab all those errors and make them available to the view
            JRequest::setVar('msg', $model->getErrors());

            return $this->edit();
        }

        $record_url = 'index.php?option=com_pvcfmanager&controller=papermap&task=edit&cid[]=';

        $link = 'index.php?option=com_pvcfmanager&controller=papermaps';

        if (JRequest::getVar('save_only')) {
            $link = $record_url . JRequest::getVar('id', '', 'int');
        }

        if (JRequest::getVar('save_and_previous')) {
            $link = $record_url . JRequest::getVar('previous', '', 'int');
        }

        if (JRequest::getVar('save_and_next')) {
            $link = $record_url . JRequest::getVar('next', '', 'int');
        }

        if (JRequest::getVar('save_and_new')) {
            $link = 'index.php?option=com_pvcfmanager&controller=papermap&task=add';
        }

        // Let's go back to the default view
        $this->setRedirect($link, $msg);
    }
    /**
     * Remove record(s)
     * @return void
     */
    public function remove()
    {
        JRequest::checkToken() or jexit('Invalid Token');

        $model = $this->getModel('papermap');
        if (!$model->delete()) {
            $msg = JText::_('Error: One or More Items Could not be Deleted');
        } else {
            $msg = JText::_('Items(s) Deleted');
        }

        $this->setRedirect('index.php?option=com_pvcfmanager&controller=papermaps', $msg);
    }

    /**
     * Cancel editing a record
     * @return void
     */
    public function cancel()
    {
        $msg = JText::_('Operation Cancelled');

        $this->setRedirect('index.php?option=com_pvcfmanager&controller=papermaps', $msg);
    }
}
