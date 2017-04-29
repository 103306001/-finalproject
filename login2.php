<?php session_start(); ?>
<?php
    $Cid = $_POST["name"];
    $CPassword = $_POST["password"];
    $db = mysqli_connect("localhost","root","root") or die("無法開啟MySQL伺服器連接!");
    $dbname = "finalproject";
    if (!mysqli_select_db($db,$dbname)) {
        die("無法開啟$dbname資料庫");
    }
    $sql = "SELECT * FROM customer_table WHERE Cid = '$Cid' AND CPassword = '$CPassword'";
    $result = mysqli_query($db,$sql);
    $num = mysqli_num_rows($result);
    mysqli_close($db);
    if($num > 0)
    {
        $_SESSION['username'] = $Cid;
        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
    }
    else
    {
        $_SESSION['username'] = null;
        echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
    }
?>
    <!DOCTYPE html>
    <html lang="en">
    <meta charset="utf-8">

    <head>
        <title>產銷資訊系統</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style type="text/css">
        /* Add a dark background color with a little bit see-through */
        
        .navbar {
            margin-bottom: 0;
            background-color: #2d2d30;
            border: 0;
            font-size: 11px !important;
            letter-spacing: 4px;
        
        }
        /* Add a gray color to all navbar links */
        
        .navbar li a,
        .navbar .navbar-brand {
            color: #d5d5d5 !important;
        }
        /* On hover, the links will turn white */
        
        .navbar-nav li a:hover {
            color: #fff !important;
        }
        /* The active link */
        
        .navbar-nav li.active a {
            color: #fff !important;
            background-color: #29292c !important;
        }
        /* Remove border color from the collapsible button */
        
        .navbar-default .navbar-toggle {
            border-color: transparent;
        }
        /* Dropdown */
        
        .open .dropdown-toggle {
            color: #fff;
            background-color: #555 !important;
        }
        /* Dropdown links */
        
        .dropdown-menu li a {
            color: #000 !important;
        }
        /* On hover, the dropdown links will turn red */
        
        .dropdown-menu li a:hover {
            background-color: blue !important;
        }
        
        .container {
            padding-top: 5%;
            background: #ffffff;
            padding-bottom: 26%;
        }
        
        body {
            background: #2d2d30;
        }
        </style>
    </head>

    <body>
         <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><b>恆隆行</b></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">

                    <?php if (isset($_SESSION['username'])) {
                        echo "<li><a href='member.php'>$username</a></li>";
                    }else{
                        echo "<li><a href='login.php'>會員登入</a></li>";
                        echo "<li><a href='joinus.php'>加入我們</a></li>";
                    }
                    ?>
                    <li><a href='index.php'>Home</a></li>
                    <li><a href="shop.php">商品清單</a></li>
                    <?php if (isset($_SESSION['username'])) {
                        echo "<li><a href='logout.php'>會員登出</a></li>";
                    }
                    ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">MORE
            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="adminlogin.php">管理員登入</a></li>                           
                        </ul>
                    </li>
                    <li><a href="http://www.hlh.com.tw/#index"><span class="glyphicon glyphicon-info-sign"></span></a></li>
                </ul>
            </div>
        </div>
    </nav>
    
        <div class="container">
             <img src="headerLogo.jpg">
            <h3 style="margin-left:37%;"><b>會員登入</b></br></br></h3>
            <div class="row test">
                <div class="col-md-3"></div>
                <div class="col-md-5">
                    <?php 
                    if($num > 0)
                        {
                            echo '<h2><b>登入成功!</b></h2>';
                        }else{
                            echo '<h2 style="color:red;"><b>登入失敗!</b></h2>';
                        };
                    ?>
                </div>
                <div class="col-md-4">
                    <p>聯絡我們</p>
                    <p><span class="glyphicon glyphicon-map-marker"></span>臺北市松山區敦化南路一段7號8樓</p>
                    <p><span class="glyphicon glyphicon-phone"></span>Phone: 0800-000-802</p>
                </div>
            </div>
        </div>
    </body>

    </html>
