<?php
// source: C:\wampe\www\AX_3\app\components\Members/templates/default.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('2700593321', 'html')
;
// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIMacros::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
$iterations = 0; foreach ($flashes as $flash) { ?>
    <div class="flash <?php echo Latte\Runtime\Filters::escapeHtml($flash->type, ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; } ?>
<table>
    
<?php $iterations = 0; foreach ($users as $row) { ?><ul class="resuti">
 <tr>  
    <td class="num"><li><?php echo Latte\Runtime\Filters::escapeHtml($row->id, ENT_NOQUOTES) ?></li></td>
    <td class="ema"><li><?php echo Latte\Runtime\Filters::escapeHtml($row->email, ENT_NOQUOTES) ?></li></td>
    <td class="pas"><li>HASH</li></td>
    <td class="nam"><li><?php echo Latte\Runtime\Filters::escapeHtml($row->name, ENT_NOQUOTES) ?></li></td>
    <td class="rol"><li><?php echo Latte\Runtime\Filters::escapeHtml($row->role, ENT_NOQUOTES) ?></li></td>
    <td class="rol"><li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_presenter->link("Cms:delet", array('id'=>$row->id)), ENT_COMPAT) ?>
"><img src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/css/delete.png"></a></li></td>
    
   
</tr>    
</ul>
<?php $iterations++; } ?>
</table>