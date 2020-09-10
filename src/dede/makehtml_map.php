<?php
/**
 * 生成网站地图
 *
 * @version        $Id: makehtml_map.php 1 11:17 2010年7月19日Z tianya $
 * @package        DedeCMS.Administrator
 * @copyright      Copyright (c) 2007 - 2020, DesDev, Inc.
 * @license        http://help.dedecms.com/usersguide/license.html
 * @link           http://www.dedecms.com
 */
require_once(dirname(__FILE__)."/config.php");
require_once(DEDEINC."/sitemap.class.php");
require_once(DEDEINC."/dedetag.class.php");

if(empty($dopost))
{
    ShowMsg("参数错误!","-1");
    exit();
}

$serviterm=empty($serviterm)? "" : $serviterm;
$sm = new SiteMap();
$maplist = $sm->GetSiteMap($dopost);
if($dopost=="site")
{
    $murl = $cfg_cmspath."/data/sitemap.html";
    $tmpfile = $cfg_basedir.$cfg_templets_dir."/plus/sitemap.htm";
}
else
{
    $murl = $cfg_cmspath."/data/rssmap.html";
    $tmpfile = $cfg_basedir.$cfg_templets_dir."/plus/rssmap.htm";
}
$dtp = new DedeTagParse();
$dtp->LoadTemplet($tmpfile);
$dtp->SaveTo($cfg_basedir.$murl);
$dtp->Clear();
echo "<a href='$murl' target='_blank'>成功更新文件: $murl 浏览...</a>";
exit();