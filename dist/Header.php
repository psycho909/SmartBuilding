<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>SmartBuilding</title>
	<link href="<?= $urlName ?>/css/reset.css" rel="stylesheet">
	<link href="<?= $urlName ?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= $urlName ?>/css/fontawesome.css" rel="stylesheet">
	<link href="<?= $urlName ?>/css/bootstrap-datepicker3.standalone.min.css" rel="stylesheet">
	<link href="<?= $urlName ?>/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link href="<?= $urlName ?>/css/jquery.cxcalendar.css" rel="stylesheet">
	<link href="<?= $urlName ?>/css/index.css" rel="stylesheet">
	<script src="<?= $urlName ?>/js/lib/jquery-3.1.1.min.js"></script>
	<script src="<?= $urlName ?>/js/popper.min.js"></script>
	<script src="<?= $urlName ?>/js/bootstrap.min.js"></script>
	<script src="<?= $urlName ?>/js/bootstrap-datepicker.min.js"></script>
    <script src="<?= $urlName ?>/js/bootstrap-datepicker.zh-TW.min.js"></script>
	<script src="<?= $urlName ?>/js/jquery.dataTables.min.js"></script>
    <script src="<?= $urlName ?>/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= $urlName ?>/js/jquery.cxcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
</head>

<?php
	require 'lib/DBAccess.class.php';
    require 'config/config.admin.php';
?>
<body class="d-flex">
    <div class="sidemenu">
        <div class="sidemenu-wrapper">
            <div class="sidemenu-title my-4">
                <i class="fab fa-optin-monster"></i>
                <span><?=$conf['sysname']?></span>
            </div>
            <ul class="sidemenu-nav">
                <li>
                    <a href="<?= $urlName ?>/kpi.php" class="d-flex sidemenu-link align-items-center" title="效能管理" data-type="index">
                        <i class="far fa-chart-bar"></i>
                        <span>效能管理</span>
                    </a>
                </li>
                <li>
                    <a href="<?= $urlName ?>/assets.php" class="d-flex sidemenu-link align-items-center" title="資產管理" data-type="assets">
                        <i class="fas fa-book"></i>
                        <span>資產管理</span>
                    </a>
                </li>
                <li>
                    <a href="<?= $urlName ?>/org.php" class="d-flex sidemenu-link align-items-center" title="組織管理" data-type="org">
                        <i class="fas fa-users"></i>
                        <span>組織管理</span>
                    </a>
                </li>
                <li>
                    <a href="<?= $urlName ?>/operation.php" class="d-flex sidemenu-link align-items-center" title="維運管理" data-type="operation">
                        <i class="far fa-address-book"></i>
                        <span>維運管理</span>
                    </a>
                </li>
                <li>
                    <a href="<?= $urlName ?>/longTerm-repairs/budget.php" class="d-flex sidemenu-link align-items-center" title="長期維護" data-type="longTerm-repairs">
                        <i class="far fa-address-book"></i>
                        <span>長期修繕</span>
                    </a>
                </li>
                <li>
                    <a href="<?= $urlName ?>/apartment.php" class="d-flex sidemenu-link align-items-center" title="社區資料" data-type="apartment">
                        <i class="fas fa-home"></i>
                        <span>社區管理</span>
                    </a>
                </li>
                <li>
                    <a href="<?= $urlName ?>/files.php" class="d-flex sidemenu-link align-items-center" title="社區檔案庫" data-type="files">
                        <i class="far fa-folder"></i>
                        <span>社區檔案庫</span>
                    </a>
                </li>
                <li>
                    <a href="<?= $urlName ?>/profile.php" class="d-flex sidemenu-link align-items-center" title="個人資料" data-type="profile">
                        <i class="far fa-smile"></i>
                        <span>個人資料</span>
                    </a>
                </li>
                <li>
                    <a href="<?= $urlName ?>/system.php" class="d-flex sidemenu-link align-items-center" title="個人資料" data-type="system">
                        <i class="fas fa-cog"></i>
                        <span>作業紀錄</span>
                    </a>
                </li>                
                <li>
                    <a href="<?= $urlName ?>/logout.php" class="d-flex sidemenu-link align-items-center" title="登出">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>登出</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="content-main container-fluid">
        <div class="row p-2">
            <div class="col-12">
                <div class="content-header">
                    <i class="slide-toggle-btn fas fa-outdent"></i>
                </div>
            </div>
        </div>
        <div class="row p-3 content-wrapper">
            <div class="col-12 content-wrapper-col">