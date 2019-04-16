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
                    <input type="text" id="number" name="number" size="62" value="<?=$cycle->number ? $cycle->number : $cycle['number'];?>" class="input_box required" maxlength="60" cycleholder="<?=JText::_('CYCLE NUMBER PLACEHOLDER');?>" />
                </td>
            </tr>
            <tr>
                <td width="200" height="30">
                    <label id="namemsg" for="number">
                        <?=JText::_('CYCLE NAME');?>:
                    </label>
                </td>
                <td>
                    <input type="text" id="name" name="name" size="62" value="<?=$cycle->name ? $cycle->name : $cycle['name'];?>" class="input_box required" maxlength="60" cycleholder="<?=JText::_('CYCLE NAME PLACEHOLDER');?>" />
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
if (($cycle->id - 1)):
?>
                    <input class="button validate" name="save_and_previous" type="submit" value="<?=JText::_('SAVE AND PREVIOUS');?>" />
                    <input type="hidden" name="next" value="<?=($cycle->id - 1);?>" />
<?php
endif;
if (($cycle->id + 1)):
?>
                    <input class="button validate" name="save_and_next" type="submit" value="<?=JText::_('SAVE AND NEXT');?>" />
                    <input type="hidden" name="next" value="<?=($cycle->id + 1);?>" />
<?php
endif;
else:
?>
                    <input type="hidden" name="task" value="create" />
<?php
endif;
?>
                    <input type="hidden" name="controller" value="cycle" />
                    <input type="hidden" name="id" value="<?=$cycle->id;?>" />
          <?=JHTML::_('form.token');?>
                </td>
            </tr>
        </tbody>
    </table>
</form>
