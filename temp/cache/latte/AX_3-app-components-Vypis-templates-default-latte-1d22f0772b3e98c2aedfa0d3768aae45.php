<?php
// source: C:\wampe\www\AX_3\app\components\Vypis/templates/default.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('2413041070', 'html')
;
// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIMacros::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
?>
<div class="form_form">
<?php $_l->tmp = $_control->getComponent("form"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ?>
</div>
<?php $iterations = 0; foreach ($users as $row) { ?><ul class="resut">
   
    <li class="next"><?php echo Latte\Runtime\Filters::escapeHtml($row->jmeno, ENT_NOQUOTES) ?></li>
    <li class="next"><?php echo Latte\Runtime\Filters::escapeHtml($row->mesto, ENT_NOQUOTES) ?></li>
    <li class="next"><?php echo Latte\Runtime\Filters::escapeHtml($row->stat, ENT_NOQUOTES) ?></li>
    <li class="next"><?php echo Latte\Runtime\Filters::escapeHtml($row->mesic, ENT_NOQUOTES) ?></li>
    <li class="next"><?php echo Latte\Runtime\Filters::escapeHtml($row->typ, ENT_NOQUOTES) ?></li>
    <li class="next"><?php echo Latte\Runtime\Filters::escapeHtml($row->rok, ENT_NOQUOTES) ?></li>
    
</ul>
<?php $iterations++; } 