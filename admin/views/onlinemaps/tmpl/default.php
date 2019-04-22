<?php
defined('_JEXEC') or die('Restricted access');

$pagination = &$this->pagination;
$rows      = $this->rows;
d($this->classes)
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
                        <input type="checkbox" name="toggle" value="" onclick="checkAll(<?=count($rows);?>);" />
                    </th>
                    <th width="1px">
                        P
                    </th>
                    <th width="15%">
                        <?=JText::_('FILER');?>
                    </th>
                    <th width="15%">
                        <?=JText::_('CLASS');?>
                    </th>
                    <th width="1px">
                        <?=JText::_('CMT');?>
                    </th>
                    <th width="1px">
                        <?=JText::_('O');?>
                    </th>
                    <th width="4%">
                        <?=JText::_('Y');?>
                    </th>
                    <th width="12%">
                        <?=JText::_('CREATED');?>
                    </th>
                    <th width="12%">
                        <?=JText::_('UDPATED');?>
                    </th>
                    <th width="auto">
                        &nbsp;
                    </th>
                </tr>
            </thead>
            <tbody>

            <?php
$k = 0;
for ($i = 0, $n = count($rows); $i < $n; $i++) {
    $row     = &$rows[$i];
    $checked = JHTML::_('grid.id', $i, $row->id);
    $published = JHTML::_('grid.published', $row, $i);
    $link = JRoute::_('index.php?option=com_pvcfmanager&controller=onlinemap&task=edit&cid[]='.$row->id);

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
                        <a href="<?=$link?>"><?=$row->filer;?></a>
                    </td>
                    <td>
                        <a href="<?=$link?>"><?=$row->class;?></a>
                    </td>
                    <td>
                        <?=$row->committee ? "yes": "no";?>
                    </td>
                    <td>
                        <?=$row->ordinal ? $row->ordinal : '';?>
                    </td>
                    <td>
                        <?=$row->year;?>
                    </td>
                    <td>
                        <?=$row->created;?>
                    </td>
                    <td>
                        <?=$row->updated;?>
                    </td>
                    <td>
                        &nbsp;
                    </td>
                </tr>
            <?php
$k = 1 - $k;
}
?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="11"><?php echo $pagination->getListFooter(); ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <?=JHTML::_('form.token');?>
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" name="controller" value="onlinemaps" />
    <?=JHTML::_('form.token');?>
</form>
