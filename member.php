<?php session_start(); ?>
<?php
    $Cid = $_SESSION["username"];
    $username = $_SESSION["username"];
?>
<?php
    $db = mysqli_connect("localhost","root","root") or die("無法開啟MySQL伺服器連接!");
    $dbname = "finalproject";
    if (!mysqli_select_db($db,$dbname)) {
        die("無法開啟$dbname資料庫");
    }
    $sql = "SELECT * FROM customer_table WHERE Cid = '$Cid'";
    $result = mysqli_query($db,$sql);
    $err = mysqli_error($db);
    $num = mysqli_num_rows($result);
    echo $err;
    if($num > 0){
        $row = mysqli_fetch_array($result);
        $Cid = $row["Cid"];
        $CName = $row["CName"];
        $Address = $row["Address"];
        $Phone = $row["Phone"];   
        $Birthday = $row["Birthday"];
    }    
    mysqli_close($db);
?>
<?php
    $db = mysqli_connect("localhost","root","root") or die("無法開啟MySQL伺服器連接!");
    $dbname = "finalproject";
    if (!mysqli_select_db($db,$dbname)) {
        die("無法開啟$dbname資料庫");
    }
    $sql = "SELECT * FROM sales_table WHERE Cid = '$Cid'";
    $result = mysqli_query($db,$sql);
    $err = mysqli_error($db);
    $memBuytimes = mysqli_num_rows($result);
    echo $err;
    if($memBuytimes > 0){
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $memAid[$i] = $row["Aid"];
            $memSDate[$i] = $row["S_Date"];
            $memQuantity[$i] = $row["Quantity"];
            $memDollar[$i] = $row["Dollar_Amount"];
            $i = $i +1;
        }
    }    
    mysqli_close($db);
?>
<?php
    $db = mysqli_connect("localhost","root","root") or die("無法開啟MySQL伺服器連接!");
    $dbname = "finalproject";
    if (!mysqli_select_db($db,$dbname)) {
        die("無法開啟$dbname資料庫");
    }
    $i = 0;
    for ($j=0; $j < $memBuytimes; $j++) { 
        $sql = "SELECT * FROM record_table WHERE Aid = '$memAid[$j]'";
        $result = mysqli_query($db,$sql);
        $err = mysqli_error($db);
        $num = mysqli_num_rows($result);
        echo $err;
        if($num > 0){           
            while ($row = mysqli_fetch_array($result)) {
                $memAName[$i] = $row["AName"];
                $memGenre[$i] = $row["Genre"];
                $memArtist[$i] = $row["Artist"];
                $i = $i +1;
            }
        }
        mysqli_free_result($result); 
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
    .thumbnail
   {
    border:10px solid black;
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
                        <img src="VIP-logo.jpg" class="img-responsive">
                        <div class="caption">
                            <table class="table table-hover">
                                <caption>會員等級說明</caption>
                                <thead>
                                    <tr>
                                        <th>會員等級</th>
                                        <th>享有折扣</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>普通(0)</td>
                                        <td>無折扣</td>
                                    </tr>
                                    <tr>
                                        <td>銅牌(1)</td>
                                        <td>95折</td>
                                    </tr>
                                    <tr>
                                        <td>銀牌(2)</td>
                                        <td>9折</td>
                                    </tr>
                                    <tr>
                                        <td>黃金(3)</td>
                                        <td>85折</td>
                                    </tr>
                                    <tr>
                                        <td>白金(4)</td>
                                        <td>8折</td>
                                    </tr>
                                    <tr>
                                        <td>尊貴(5)</td>
                                        <td>75折</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                 <?php
                    $memVIP= 0;
                    $memScore = 0;
                    if($memBuytimes > 0) {
                        $memtotalDollar = 0;
                        for ($i=0; $i < $memBuytimes; $i++) { 
                            $memtotalDollar = $memtotalDollar + $memDollar[$i];
                        }
                        $memBuytimesCal = $memBuytimes / 5;
                        $memtotalDollarCal = 0;
                        if ($memtotalDollar > 1000) {
                            $memScore = $memScore +1;
                            $memtotalDollarCal = ($memtotalDollar-1000) / 10000;
                        }                        
                        $memScore = ceil($memBuytimesCal) + ceil($memtotalDollarCal);
                        if ($memScore > 5) {
                            $memVIP = $memScore -5;
                        }else{
                            $memVIP = 0;
                        }
                        if ($memVIP > 5) {
                            $memVIP = 5;
                        }                        
                    }
                    
                    for ($k=0; $k < count($GenreStyle); $k++) { 
                        $GenreScore[$k] = 0;
                        for ($i=0; $i < $memBuytimes; $i++) {                           
                            if ($memGenre[$i] == $k) {
                                $GenreScore[$k] = $GenreScore[$k] +1;
                            }
                        }
                    }
                    
                    $GenreScorehigh = 0;
                    $GenreStylehigh = 0;
                    for ($j=0; $j < count($GenreStyle); $j++) { 
                        if ($GenreScorehigh < $GenreScore[$j]) {
                            $GenreScorehigh = $GenreScore[$j];
                            $GenreStylehigh = $j;
                        }
                    }
                ?>
                <div class="col-md-8" id="info">
                        <div class="row">
                            <div class="col-sm-9 form-group">
                                <h3 class="text-center"><b>您的資料</b></br></br></h3>
                                <table class="table table-hover">
                                    <tr>
                                        <td>帳戶名稱</td>
                                        <td><?php echo "$Cid"?></td>
                                    </tr>
                                    <tr>
                                        <td>名字</td>
                                        <td><?php echo "$CName"?></td>
                                    </tr>
                                    <tr>
                                        <td>電話號碼</td>
                                        <td><?php echo "$Phone"?></td>
                                    </tr>
                                    <tr>
                                        <td>生日</td>
                                        <td><?php echo "$Birthday"?></td>
                                    </tr>
                                    <tr>
                                        <td>地址</td>
                                        <td><?php echo "$Address"?></td>
                                    </tr>
                                    <tr>
                                        <td>會員等級</td>
                                        <td style="color:red"><p><?php echo"$memVIP"?></p></td>
                                    </tr>
                                </table>
                                <input type="button" class="btn btn-primary btn-block" value="返回首頁" onclick="self.location.href='index.php'"></input>
                                <form method="post" action="vip.php">
                                    <input type="hidden" name="vip" value="<?php echo "$memVIP";?>">
                                    <input type="hidden" name="genre" value="<?php echo "$GenreStylehigh";?>">
                                    <input type="submit" name="send" value="會員折扣商品" class="btn btn-primary btn-block" style="margin-top:5%;background:orange; ">
                                </form>
                            </div>
                        </div>
                </div>
            </div>
            <div class="row test">
                <div class="col-md-12">
                <h3 class="text-center"><b>購買紀錄</b></h3>
                <?php
                    if ($num > 0) {                            
                        echo "<table class='table table-hover'>";
                        echo "<thead>";
                        echo "<tr>";
                        
                        echo "<th>產品名稱</th>";
                        echo "<th>品牌名稱</th>";
                        
                        echo "<th>購買時間</th>";
                        echo "<th>購買數量</th>";
                        echo "<th>購買金額</th>";                        
                        echo "<tbody>";
                        if($memBuytimes > 0) {
                            $memfavorite = 0;
                            for ($i=0; $i < $memBuytimes; $i++) { 
                                echo "<tr>";
                               
                                echo "<th>$memAName[$i]</th>";
                                echo "<th>$memArtist[$i]</th>";
                                
                              
                                echo "<th>$memSDate[$i]</th>";
                                echo "<th>$memQuantity[$i]</th>";
                                echo "<th>$".$memDollar[$i]."</th>"; 
                                echo "</tr>";
                            }
                            echo "<tr style='color:blue; background:#E6E6F2;'>";
                            echo "<th></th>";
                            echo "<th>總消費次數</th>";
                            echo "<th></th>";
                            
                            echo "<th></th>";
                            echo "<th>$memBuytimes</th>"; 
                            echo "</tr>";
                            echo "<tr style='color:red; background:#FFECEC;'>";
                            echo "<th></th>";
                            echo "<th>總消費金額</th>";
                            echo "<th></th>";
                           
                            echo "<th></th>";
                            echo "<th>$".$memtotalDollar."</th>"; 
                            echo "</tr>";

                        }
                        echo "</tbody>";
                        echo "</table>";
                    }else{
                        echo "<h3>查無結果</h3>";
                    }
                ?>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
