<?php
$BASE_URL	=	$_COOKIE['url'];
$USER       =   $_COOKIE['user'];
$courceid   =   $_GET['courceid'];
if($USER == "")
{

    $BASE_URL   =   'http://'.$_SERVER['HTTP_HOST']."/elective/";
    header("refresh:2;url=$BASE_URL");
    echo "您还没有登陆...<br>2秒后自动跳转至登陆页面";
    exit;

}
$teaid      =  $_COOKIE['user'];

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="管理员" content="">
    <meta name="xiaobo" content="">

    <title>学生选课系统-<?php echo $teaid;?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $BASE_URL.'views/css/bootstrap.min.css'; ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo $BASE_URL.'views/css/metisMenu.min.css'; ?>" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo $BASE_URL.'views/css/timeline.css';?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $BASE_URL.'views/css/sb-admin-2.css';?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo $BASE_URL.'views/css/morris.css';?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $BASE_URL.'views/css/font-awesome.min.css';?>" rel="stylesheet" type="text/css">

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
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">学生选课系统</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i><?php echo $teaid;?>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo $BASE_URL.'views/changepassword.php?rol=tea&id='.$teaid; ?>"><i class="fa fa-gear fa-fw"></i>修改密码</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo $BASE_URL;?>"><i class="fa fa-sign-out fa-fw"></i>退出</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>

            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="active">
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>选课信息<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php
                                    require_once('../models/mysql.php');
                                    $TEA        =   new MySQL(1);
                                    $cour       =   $TEA->GetTeacherCourcename($teaid);
                                    foreach($cour as $couid=>$name)
                                    {
                                        $URL    =   $BASE_URL."views/teacourse.php?courceid=$couid";
                                        $cname  =   $name['coursename'];
                                        echo "<li><a href=\"$URL\">$cname</a></li>";
                                    }
                                ?>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>提交成绩<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php
                                require_once('../models/mysql.php');
                                $TEA        =   new MySQL(1);
                                $cour       =   $TEA->GetTeacherCourcename($teaid);
                                foreach($cour as $couid=>$name)
                                {
                                    $URL    =   $BASE_URL."views/addscore.php?courceid=$couid";
                                    $cname  =   $name['coursename'];
                                    echo "<li><a href=\"$URL\">$cname</a></li>";
                                }
                            ?>
                            </ul>
                        </li>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header"></h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            已选修该课程的同学
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>学号</th>
                                            <th>姓名</th>
                                            <th>院系</th>
                                            <th>年级</th>
                                            <th>班级</th>
                                            <th>成绩</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            require_once('../models/mysql.php');
                                            $ELE        =   new MySQL(1);
                                            $courses    =   $ELE->GetCourceInfo($teaid,$courceid);
                                            foreach($courses as $stuid=>$info)
                                            {
                                                $stuname            =   $info['stuname'];
                                                $departname         =   $info['departname'];
                                                $stuGrade           =   $info['stuGrade'];
                                                $stuClass           =   $info['stuClass'];
                                                $score              =   $info['score'];

                                                echo "<tr><td>$stuid</td>";
                                                echo "<td>$stuname</td>";
                                                echo "<td>$departname</td>";
                                                echo "<td>$stuGrade</td>";
                                                echo "<td>$stuClass</td>";
                                                echo "<td>$score</td></tr>";


                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo $BASE_URL.'views/js/jquery.min.js';?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $BASE_URL.'views/js/bootstrap.min.js';?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo $BASE_URL.'views/js/metisMenu.min.js';?>"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo $BASE_URL.'views/js/raphael-min.js';?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo $BASE_URL.'views/js/sb-admin-2.js';?>"></script>
</body>
</html>
