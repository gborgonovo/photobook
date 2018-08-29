<?php
$realpath = getcwd();

require_once ($realpath.'/include/functions.php');	// Manage Functions
require($realpath.'/include/smarty/Smarty.class.php');	// Manage Templating
require_once ($realpath.'/include/spyc/Spyc.php');	// Manage YAML

$smarty = new Smarty();

$smarty->setTemplateDir($realpath.'/include/smarty/templates');
$smarty->setCompileDir($realpath.'/include/smarty/templates_c');
$smarty->setCacheDir($realpath.'/include/smarty/cache');
$smarty->setConfigDir($realpath.'/include/smarty/configs');


$pn = 0;

$range = isset($_GET['p'])?$_GET['p']:'0-100';
$pagerange = parsenumbers($range);

$yaml = Spyc::YAMLLoad ($_GET['pb'].'.yaml');

$pages = $yaml['pages'];
reset($pages);
$smarty->assign('firstpage', key($pages));         // move the internal pointer to the end of the array
end($pages);
$smarty->assign('lastpage', key($pages));          // fetches the key of the element pointed to by the internal pointer
reset($pages);

$smarty->assign('title', $yaml['title']);
$smarty->assign('format', $yaml['format']);
$smarty->assign('stylesheet', $yaml['stylesheet']);
$smarty->assign('dsphoto_url', $yaml['dsphoto_url']);


$smarty->assign('lr', array('pari','dispari'));
$smarty->assign('pn', 0);
$smarty->assign('pagerange', $pagerange);
$smarty->assign('pages', $pages);
$smarty->display('template.tpl.php');


?>

