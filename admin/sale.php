<?php session_start(); ?>
<?php
    $username = $_SESSION["username"];
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
        opacity: 0.9;
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
        padding-bottom: 20%;
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
                    <?php if ($_SESSION['username'] != null) {
                        echo "<li><a href='member.php'>$username</a></li>";
                    }?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">存貨資料<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="record.php">存貨查詢</a></li>
                            <li><a href="recordinventory.php">現有存貨</a></li>
                        </ul>
                    </li>
                    <li><a href="sale.php">銷貨紀錄</a></li>
                    <li><a href="purchase.php">訂貨紀錄</a></li>
                    <li><a href="logout.php">登出系統</a></li>
                    <li><a href="http://www.hlh.com.tw/#index"><span class="glyphicon glyphicon-info-sign"></span></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <img src="headerLogo.jpg" style="width:20%;height:20%;">
        <h3 style="padding-left:35%;"><b>銷貨資料查詢</b></br></br></h3>
        <div class="row test">
            <div class="col-md-3">
            </div>
            <div class="col-md-9">
                    <div class="row">
                        <form method="post" action="saleresult.php">
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="Cid" name="Cid" placeholder="顧客ID" type="text" required>
                        </div>
                        <div class="col-sm-2 form-group">
                            <input class="btn btn-primary btn-block" type="submit" value="查詢"></input>
                        </div>
                        </form>
                    </div>
                    <div class="row" style="margin-top:1%;">
                        <form method="post" action="saleresult.php">
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="Aid" name="Aid" placeholder="商品ID" type="text" required>
                        </div>
                        <div class="col-sm-2 form-group">
                            <input class="btn btn-primary btn-block" type="submit" value="查詢"></input>
                        </div>
                        </form>
                    </div>
                    <div class="row" style="margin-top:1%;">
                        <form method="post" action="saleresult.php">
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="SDate" name="SDate" placeholder="銷售日期" type="date" required>
                        </div>
                        <div class="col-sm-2 form-group">
                            <input class="btn btn-primary btn-block" type="submit" value="查詢"></input>
                        </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</body>

</html>
