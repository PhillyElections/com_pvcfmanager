<?php
defined('_JEXEC') or die('Restricted access');

$pagination = &$this->pagination;
$rows      = $this->rows;
d($this->classes);
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
                    <th width="10%">
                        <?=JText::_('CLASS');?>
                    </th>
                    <th width="10%">
                        <?=JText::_('ENTITY');?>
                    </th>
                    <th width="10%">
                        <?=JText::_('DISPLAY');?>
                    </th>
                    <th width="10%">
                        <?=JText::_('COMMITTEE');?>
                    </th>
                    <th width="1px">
                        <?=JText::_('O');?>
                    </th>
                    <th width="5%">
                        <?=JText::_('Y');?>
                    </th>
                    <th width="10%">
                        <?=JText::_('CREATED');?>
                    </th>
                    <th width="10%">
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
    $link = JRoute::_('index.php?option=com_pvcfmanager&controller=papermap&task=edit&cid[]='.$row->id);

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
                        <a href="<?=$link?>"><?=$row->class_id;?></a>
                    </td>
                    <td>
                        <a href="<?=$link?>"><?=$row->entity;?></a>
                    </td>
                    <td>
                        <a href="<?=$link?>"><?=$row->display;?></a>
                    </td>
                    <td>
                        <?=$row->committee;?>
                    </td>
                    <td>
                        <?=$row->ordinal;?>
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
                    <td colspan="12"><?php echo $pagination->getListFooter(); ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <?=JHTML::_('form.token');?>
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" name="controller" value="papermaps" />
    <?=JHTML::_('form.token');?>
</form>
