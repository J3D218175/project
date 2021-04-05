<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   <!-- <meta http-equiv="refresh" content="5;url="/>-->
    <title>Admin HMKI</title>

    <!--JQuery JS-->
    <script src="js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">HMKI</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Top Navigation: Left Menu -->
        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="<?=$baseurl;?>"><i class="fa fa-home fa-fw"></i> Website</a></li>
        </ul>

        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <?=$userdata['username'];?> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="<?=$adminurl;?>index.php?p=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- Sidebar -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <ul class="nav" id="side-menu">
                    <li>
                    <a href="<?=$adminurl;?>" class="active"><i class="fa fa-dashboard fa-fw"></i>  Galeri </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i>  Anggota<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?=$adminurl;?>index.php?p=tambah-anggota">  Tambah Anggota</a>
                            </li>
                            <li>
                                <a href="<?=$adminurl;?>index.php?p=data-anggota">  Data Anggota</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i>  Artikel<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?=$adminurl;?>index.php?p=tambah-artikel">  Tambah Artikel</a>
                            </li>
                            <li>
                                <a href="<?=$adminurl;?>index.php?p=data-artikel">  Data Artikel</span></a>
                            </li>
                            <li>
                                <a href="<?=$adminurl;?>index.php?p=lampiran">  Lampiran</span></a>
                            </li>
                        </ul>
                    </li>
<!--                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i>  Kategori<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<$adminurl;?>index.php?p=tambah-kategori">  Tambah Kategori</a>
                            </li>
                            <li>
                                <a href="<=$adminurl;?>index.php?p=data-kategori">  Data Kategori</span></a>
                            </li>
                        </ul>
                    </li>-->
                </ul>

            </div>
        </div>
    </nav>
