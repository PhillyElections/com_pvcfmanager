<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

jimport("pvcombo.PVCombo");

if (count(JRequest::getVar('msg', null, 'post'))) {
    foreach (JRequest::getVar('msg', null, 'post') as $msg) {
        JError::raiseWarning(1, $msg);
    }
}
// try to cast to object next
$row = !$this->isNew ? $this->row : JRequest::get('post');

?>
<form action="<?=JRoute::_('index.php?option=com_pvcfmanager');?>" method="post" id="adminForm" name="adminForm" class="form-validate">
    <table cellpadding="0" cellspacing="0" border="0" class="adminform">
        <tbody>
            <tr>
                <td width="200" height="30">
                    <label id="idmsg" for="id">
                        <?=JText::_('ID');?>:
                    </label>
                </td>
                <td>
                    <?php echo $row->id; ?>
                </td>
            </tr>
             <tr>
                <td width="200" height="30">
                    <label id="publishedmsg" for="published">
                        <?=JText::_('PUBLISHED');?>:
                    </label>
                </td>
                <td>
                    <?php echo JHTML::_('select.booleanlist', 'published', 'class="inputbox"', $row->published); ?>
                </td>
            </tr>
            <tr>
                <td width="200" height="30">
                    <label id="class_idmsg" for="class_id">
                        <?=JText::_('CLASS_ID');?>:
                    </label>
                </td>
                <td>

                    <?=JHTML::_('select.genericlist', PVCombo::getsFromObject($this->classes, 'id', 'name', 'Select an entity class'), 'class_id', '', 'idx', 'value', ($row->class_id ? $row->class_id : ''), 'class_id');?>
                </td>
            </tr>
            <tr>
                <td width="200" height="30">
                    <label id="entitymsg" for="entity">
                        <?=JText::_('NAME');?>:
                    </label>
                </td>
                <td>
                    <input type="text" id="entity" name="entity" size="62" value="<?=$row->entity ? $row->entity : $row['entity'];?>" class="input_box required" maxlength="60" classholder="<?=JText::_('NAME PLACEHOLDER');?>" />
                </td>
            </tr>
   
            <tr>
                <td width="200" height="30">
                    <label id="namemsg" for="name">
                        <?=JText::_('NAME');?>:
                    </label>
                </td>
                <td>
                    <input type="text" id="name" name="name" size="62" value="<?=$row->name ? $row->name : $row['name'];?>" class="input_box required" maxlength="60" classholder="<?=JText::_('NAME PLACEHOLDER');?>" />
                </td>
            </tr>
            <tr>
                <td width="200" height="30">
                    <label id="displaymsg" for="display">
                        <?=JText::_('DISPLAY');?>:
                    </label>
                </td>
                <td>
                    <input type="text" id="display" name="display" size="62" value="<?=$row->display ? $row->display : $row['display'];?>" class="input_box required" maxlength="60" classholder="<?=JText::_('DISPLAY PLACEHOLDER');?>" />
                </td>
            </tr>
            <tr>
                <td height="30">&nbsp;</td>
                <td>
                    <input class="button validate" name="save_and_close" type="submit" value="<?=$this->isNew ? JText::_('CREATE') : JText::_('SAVE AND CLOSE');?>" />
                    <input class="button validate" name="save_and_new" type="submit" value="<?=$this->isNew ? JText::_('CREATE AND NEW') : JText::_('SAVE AND NEW');?>" />
<?php
if (!$this->isNew):
?>
                    <input class="button validate" name="save_only" type="submit" value="<?=JText::_('UPDATE');?>" />
                    <input type="hidden" name="task" value="update" />
<?php
    if (($row->id - 1)):
?>
                    <input class="button validate" name="save_and_previous" type="submit" value="<?=JText::_('SAVE AND PREVIOUS');?>" />
                    <input type="hidden" name="previous" value="<?=($row->id - 1);?>" />
<?php
    endif;
    if (($row->id + 1)):
?>
                    <input class="button validate" name="save_and_next" type="submit" value="<?=JText::_('SAVE AND NEXT');?>" />
                    <input type="hidden" name="next" value="<?=($row->id + 1);?>" />
<?php
    endif;
else:
?>
                    <input type="hidden" name="task" value="update" />
<?php
endif;
?>
                    <input type="hidden" name="controller" value="papermap" />
                    <input type="hidden" name="id" value="<?=$row->id;?>" />
          <?=JHTML::_('form.token');?>
                </td>
            </tr>
        </tbody>
    </table>
</form>
