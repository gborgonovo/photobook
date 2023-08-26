<!doctype html>
<html>
<head>
	<title>{$title}</title>
	<meta charset="UTF-8">
	<!-- Page format: https://github.com/cognitom/paper-css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.min.css">
	<link rel="stylesheet" href="css/{$stylesheet|default:'style.css'}" type="text/css" />
</head>
<body class="{$format}">
{for $ipage=$firstpage to $lastpage}
	{assign var=page value=$pages[$ipage]}
	{if (isset($page.pn))}
		{$pn = $page.pn}
	{else}
		{assign var=pn value=$pn+1}
	{/if}

	{if in_array($ipage,$pagerange)}
	<section class="sheet padding-10mm {$page.class|default:''}">
		{foreach $page.frames as $frame}
		
			{if $frame.type eq 'image'}
			<div class="picture {$frame.class|default:''}" style="width: {$frame.hdim|default:'auto'}; height: {$frame.vdim|default:'auto'}; left: {$frame.xpos|default:'0'}; top: {$frame.ypos|default:'0'}; transform: rotate({$frame.rot|default:'0deg'});">
				<img src="{if (isset($frame.dsphoto))}{$dsphoto_url|default:''}{$frame.dsphoto}{else}{$frame.data}{/if}" style="{if isset($frame.hzoom)}width: {$frame.hzoom}; {/if}{if isset($frame.vzoom)}height: {$frame.vzoom}; {/if}{if isset($frame.hpan)}margin-left: {$frame.hpan}; {/if}{if isset($frame.vpan)}margin-top: {$frame.vpan}; {/if}" />
				{if isset($frame.dida)}<div class="dida">{$frame.dida}</div> {/if}
			</div>
			{elseif $frame.type eq 'text'}
			<div class="textbox {$frame.class|default:''}" style="width: {$frame.hdim|default:'auto'}; height: {$frame.vdim|default:'auto'}; left: {$frame.xpos|default:'0'}; top: {$frame.ypos|default:'0'}; transform: rotate({$frame.rot|default:'0deg'}); text-align: {$frame.align|default:'left'};">
				{$frame.data}
			</div>
			{else}
			None
			{/if}

		{/foreach}
		{if ( !isset($page.print_pn) || $page.print_pn ) }<div class="pn {$lr[$pn%2]}">{$pn}</div>{/if}
	
	</section>
	{/if}
{/for}
</body>
</html>

