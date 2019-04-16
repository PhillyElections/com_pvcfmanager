<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

if (count(JRequest::getVar('msg', null, 'post'))) {
    foreach (JRequest::getVar('msg', null, 'post') as $msg) {
        JError::raiseWarning(1, $msg);
    }
}
d('cycle: in default form', $this);
// try to cast to object next
$cycle = !$this->isNew ? $this->cycle : JRequest::get('post');

?>
<form action="<?=JRoute::_('index.php?option=com_pvcfmanager');?>" method="post" id="adminForm" name="adminForm" class="form-validate">
    <table cellpadding="0" cellspacing="0" border="0" class="adminform">
        <tbody>
            <tr>
                <td width="200" height="30">
                    <label id="namemsg" for="number">
                        <?=JText::_('CYCLE NUMBER');?>:
                    </label>
                </td>
                <td>
                    <input type="text" id="number" name="number" size="62" value="<?=$cycle->number ? $cycle->number : $cycle['number'];?>" class="input_box required" maxlength="60" placeholder="<?=JText::_('CYCLE NUMBER PLACEHOLDER');?>" />
                </td>
            </tr>
            <tr>
                <td width="200" height="30">
                    <label id="namemsg" for="number">
                        <?=JText::_('CYCLE NAME');?>:
                    </label>
                </td>
                <td>
                    <input type="text" id="name" name="name" size="62" value="<?=$cycle->name ? $cycle->name : $cycle['name'];?>" class="input_box required" maxlength="60" placeholder="<?=JText::_('CYCLE NAME PLACEHOLDER');?>" />
                </td>
            </tr>
            <tr>
                <td height="30">&nbsp;</td>
                <td>
                    <button class="button validate" type="submit"><?=$this->isNew ? JText::_('SUBMIT') : JText::_('UPDATE');?></button>
                    <input type="hidden" name="task" value="<?=$this->isNew ? 'save' : 'update';?>" />
                    <input type="hidden" name="controller" value="cycle" />
                    <input type="hidden" name="id" value="<?=$cycle->id;?>" />
                    <?=JHTML::_('form.token');?>
                </td>
            </tr>
        </tbody>
    </table>
</form>
