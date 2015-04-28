<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="login" content="">
    <meta name="xiaobo" content="">

    <title>学生选课系统</title>

    <!-- Bootstrap Core CSS -->
    <link href='views/css/bootstrap.min.css' rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href='views/css/metisMenu.min.css' rel="stylesheet">

    <!-- Custom CSS -->
    <link href='views/css/sb-admin-2.css' rel="stylesheet">

    <!-- Custom Fonts -->
    <link href='views/css/font-awesome.min.css' rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">学生选课系统</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="controllers/login.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="username" name="username" type="username" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
				<div class="form-group">
                                	<label class="radio-inline">
                                    		<input type="radio" name="role" id="teacher" value="teacher" checked="">教师
                                	</label>
                                	<label class="radio-inline">
                                    		<input type="radio" name="role" id="student" value="student">学生
                                	</label>
                                	<label class="radio-inline">
                                    		<input type="radio" name="role" id="admin" value="admin">管理员
                                	</label>
                            	</div>
                                <input type="submit" class="btn btn-lg btn-success btn-block">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src='views/js/jquery.min.js'></script>

    <!-- Bootstrap Core JavaScript -->
    <script src='views/js/bootstrap.min.js'></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src='views/js/metisMenu.min.js'></script>

    <!-- Custom Theme JavaScript -->
    <script src='views/js/sb-admin-2.js'></script>

</body>

</html>