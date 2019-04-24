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

$object = new stdClass();
$id = "id";
$name = "name";
$object->$id="online";
$object->$name="online";
$source[]=$object;
$object = new stdClass();
$object->$id="paper";
$object->$name="paper";
$source[]=$object;

d($row, $source, $this->classes, $this->cycles);
var_dump($source);
var_dump($this->classes);
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
                    <?=JHTML::_('select.genericlist', PVCombo::getsFromObject($this->classes, 'id', 'name', 'Select an filer class'), 'class_id', '', 'idx', 'value', ($row->class_id ? $row->class_id : ''), 'class_id');?>
                </td>
            </tr>
            <tr>
                <td width="200" height="30">
                    <label id="cycle_idmsg" for="cycle_id">
                        <?=JText::_('CYCLE_ID');?>:
                    </label>
                </td>
                <td>
                    <?=JHTML::_('select.genericlist', PVCombo::getsFromObject($this->cycles, 'id', 'name', 'Select a cycle'), 'cycle_id', '', 'idx', 'value', ($row->cycle_id ? $row->cycle_id : ''), 'cycle_id');?>
                </td>
            </tr>
            <tr>
                <td width="200" height="30">
                    <label id="sourcemsg" for="source">
                        <?=JText::_('SOURCE');?>:
                    </label>
                </td>
                <td>
                    <?=JHTML::_('select.genericlist', PVCombo::getsFromObject($sources, 'id', 'name', 'Select a source'), 'source', '', 'idx', 'value', ($row->source ? $row->source : ''), 'source');?>
                </td>
            </tr>
            <tr>
                <td width="200" height="30">
                    <label id="numbermsg" for="number">
                        <?=JText::_('REPORT NUMBER');?>:
                    </label>
                </td>
                <td>
                    <input type="text" id="number" name="number" size="62" value="<?=$row->number ? $row->number : $row['number'];?>" class="input_box required" maxlength="60" classholder="<?=JText::_('REPORT NUMBER PLACEHOLDER');?>" />
                </td>
            </tr>
            <tr>
                <td width="200" height="30">
                    <label id="namemsg" for="name">
                        <?=JText::_('REPORT NAME');?>:
                    </label>
                </td>
                <td>
                    <input type="text" id="name" name="name" size="62" value="<?=$row->name ? $row->name : $row['name'];?>" class="input_box required" maxlength="60" classholder="<?=JText::_('REPORT NAME PLACEHOLDER');?>" />
                </td>
            </tr>
            <tr>
                <td width="200" height="30">
                    <label id="displaymsg" for="display">
                        <?=JText::_('REPORT DISPLAY');?>:
                    </label>
                </td>
                <td>
                    <input type="text" id="display" name="display" size="62" value="<?=$row->display ? $row->display : $row['display'];?>" class="input_box required" maxlength="60" classholder="<?=JText::_('REPORT NAME PLACEHOLDER');?>" />
                </td>
            </tr>
  `source` varchar(10) NOT NULL DEFAULT '',
  `filer` varchar(255) NOT NULL DEFAULT '',
  `reporturl` varchar(255) NOT NULL DEFAULT '',
  `year` smallint(4) NOT NULL DEFAULT 0,
  `cycle_overrride_id` int(10) unsigned NOT NULL DEFAULT 0,
  `display` varchar(255) NOT NULL DEFAULT '',
  `committee` smallint(4) NOT NULL DEFAULT 0,
  `ordinal` smallint(4) NOT NULL DEFAULT 0,
  `reporttype` varchar(255) NOT NULL DEFAULT '',
  `reportid` varchar(255) NOT NULL DEFAULT '',
  `published` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `checked_out` int(10) unsigned NOT NULL DEFAULT 0,
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',

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
                    <input type="hidden" name="controller" value="report" />
                    <input type="hidden" name="id" value="<?=$row->id;?>" />
          <?=JHTML::_('form.token');?>
                </td>
            </tr>
        </tbody>
    </table>
</form>
