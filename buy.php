<?php session_start(); ?>
<?php
    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
    }   
?>
<?php
    $NO = $_GET["NO"];
    $db = mysqli_connect("localhost","root","root") or die("無法開啟MySQL伺服器連接!");
    $dbname = "finalproject";
    if (!mysqli_select_db($db,$dbname)) {
        die("無法開啟$dbname資料庫");
    }
    $sql = "SELECT * FROM record_table WHERE NO = '$NO'";
    $result = mysqli_query($db,$sql);
    $err = mysqli_error($db);
    $num = mysqli_num_rows($result);
    echo $err;
    if($num > 0){
        $row = mysqli_fetch_array($result);
        $Artist = $row["Artist"];
        $Aid = $row["Aid"];
        $AName = $row["AName"];
        $Released = $row["Released"];   
        $Price = $row["Price"]; 
        $Judgement = $row["Judgement"]; 
    }
    mysqli_close($db);
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
            padding: 120px 80px;
            background: #ffffff;
        }
        
        #info {
            padding-left: 10%;
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
        <div class="bg-1">
            <div class="container">
                <div class="row test">
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo "merchandise/$NO.jpg";?>" class="img-responsive">
                            <div class="caption">
                                <p><?php echo "$Judgement"?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8" id="info">
                            <div class="row">
                                <div class="col-sm-9 form-group">
                                    <h3 class="text-center"><b><?php echo "$AName";?></b></br></br></h3>
                                    <form method="post" action="confirmbuy.php">
                                        <table class="table table-hover">
                                            
                                            <tr>
                                                <td>品牌名稱</td>
                                                <td>
                                                    <?php echo "$Artist";?>
                                                </td>
                                            </tr>
                                           
                                        
                                           
                                            <tr>
                                                <td>價格</td>
                                                <td style="color:red;">$
                                                    <?php echo "$Price";?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>數量</td>
                                                <td>
                                                    <input class="form-control" id="amount" name="amount" value="1" min="1" type="number" style="width:30%;" required>
                                                </td>
                                            </tr>
                                        </table>
                                        <input type="hidden" name="Aid" value="<?php echo "$Aid";?>">
                                        <input type="hidden" name="price" value="<?php echo "$Price";?>">
                                        <input class="btn btn-primary btn-block" type="submit" value="確認購買"></input>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
