<?php
defined('_JEXEC') or die('Restricted access');

$pagination = &$this->pagination;
$cycles      = $this->cycles;

?>
<form action="<?=JRoute::_('index.php?option=com_pvcfmanager');?>" method="post" name="adminForm" id="adminForm">
    <div id="editcell">
        <table class="adminlist">
            <thead>
                <tr>
                    <th width="1px">
                        <?=JText::_('ID');?>
                    </th>
                    <th width="1px">
                        <input type="checkbox" name="toggle" value="" onclick="checkAll(<?=count($cycles);?>);" />
                    </th>
                    <th width="1px">
                        P
                    </th>
                   <th width="5%">
                        <?=JText::_('CYCLE NUMBER');?>
                    </th>
                    <th width="20%">
                        <?=JText::_('CYCLE NAME');?>
                    </th>
                    <th width="10%">
                        <?=JText::_('CREATED');?>
                    </th>
                    <th width="10%">
                        <?=JText::_('UPDATED');?>
                    </th>
                    <th width="auto">&nbsp;
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php
$k = 0;
for ($i = 0, $n = count($cycles); $i < $n; $i++) {
    $row     = &$cycles[$i];
    $checked = JHTML::_('grid.id', $i, $row->id);
    $published = JHTML::_('grid.published', $row, $i);
    $link = JRoute::_('index.php?option=com_pvcfmanager&controller=cycle&task=edit&cid[]='.$row->id);

            ?>
                <tr class="<?="row$k";?>">
                    <td>
                        <?=$row->id;?>
                    </td>
                    <td>
                        <?=$checked;?>
                    </td>
                    <td>
                        <?=$published;?>
                    </td>
                    <td>
                        <a href="<?=$link?>"><?=$row->number;?></a>
                    </td>
                    <td>
                        <a href="<?=$link?>"><?=$row->name;?></a>
                    </td>
                    <td>
                        <a href="<?=$link?>"><?=$row->created;?></a>
                    </td>
                    <td>
                        <a href="<?=$link?>"><?=$row->updated;?></a>
                    </td>
                    <td>
                        <a href="<?=$link?>">&nbsp;</a>
                    </td>
                </tr>
            <?php
$k = 1 - $k;
}
?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8"><?php echo $pagination->getListFooter(); ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <?=JHTML::_('form.token');?>
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" name="controller" value="cycle" />
    <?=JHTML::_('form.token');?>
</form>
