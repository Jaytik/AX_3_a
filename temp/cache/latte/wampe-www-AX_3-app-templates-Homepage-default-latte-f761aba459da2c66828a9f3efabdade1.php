<?php
// source: C:\wampe\www\AX_3\app/templates/Homepage/default.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('3296240616', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbafd635e4db_content')) { function _lbafd635e4db_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;$iterations = 0; foreach ($flashes as $flash) { ?>
    <div class="flash <?php echo Latte\Runtime\Filters::escapeHtml($flash->type, ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; } ?>
<h3 class="cente">Obecný výpis všech osob</h3>
<table>


<?php $iterations = 0; foreach ($users as $row) { ?><ul class="resuti">
  <tr>
    <td class="num"><li><?php echo Latte\Runtime\Filters::escapeHtml($row->id, ENT_NOQUOTES) ?></li></td>
    <td class="nam"><li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:detail", array('id'=>$row->id)), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($row->jmeno, ENT_NOQUOTES) ?></a></li></td>
    <td class="pas"><li><?php echo Latte\Runtime\Filters::escapeHtml($row->plat, ENT_NOQUOTES) ?></li></td>
    
    <td class="pas"><li><?php echo Latte\Runtime\Filters::escapeHtml($row->mesto, ENT_NOQUOTES) ?></li></td>
    <td class="pas"><li><?php echo Latte\Runtime\Filters::escapeHtml($row->kraj, ENT_NOQUOTES) ?></li></td>
    <td class="pas"><li><?php echo Latte\Runtime\Filters::escapeHtml($row->stat, ENT_NOQUOTES) ?></li></td>
    <td class="rol"><li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:detail", array('id'=>$row->id)), ENT_COMPAT) ?>
"><img src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/css/icon.png"></a></li></td>
  </tr> 
</ul>
<?php $iterations++; } ?>
 
</table>
    
    
</div>


<?php
}}

//
// end of blocks
//

// template extending

$_l->extends = empty($_g->extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $_g->extended = TRUE;

if ($_l->extends) { ob_start();}

// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIMacros::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agency - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="/AX/www/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/AX/www/css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

   
<div class="table">
<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 