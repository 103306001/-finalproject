<?php session_start(); ?>
<?php
    $username = $_SESSION["username"];
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
        $thisAName = $row["AName"];
        $thisAid = $row["Aid"];
        $thisPrice = $row["Price"];


        mysqli_free_result($result);
    }    
    mysqli_close($db);
?>

<?php
    $db = mysqli_connect("localhost","root","root") or die("無法開啟MySQL伺服器連接!");
    $dbname = "finalproject";
    if (!mysqli_select_db($db,$dbname)) {
        die("無法開啟$dbname資料庫");
    }
    $sql = "SELECT * FROM purchase_table WHERE Aid = '$thisAid'";
    $result = mysqli_query($db,$sql);
    $err = mysqli_error($db);
    $num = mysqli_num_rows($result);
    echo $err;
    if($num > 0){
        $row = mysqli_fetch_array($result);
        $thisMid = $row["Mid"];
        mysqli_free_result($result);
    }    
    mysqli_close($db);
?>
<?php
    $db = mysqli_connect("localhost","root","root") or die("無法開啟MySQL伺服器連接!");
    $dbname = "finalproject";
    if (!mysqli_select_db($db,$dbname)) {
        die("無法開啟$dbname資料庫");
    }
    $sql = "SELECT * FROM record_table WHERE Artist = '$Artist'";
    $result = mysqli_query($db,$sql);
    $err = mysqli_error($db);
    $numAlbum = mysqli_num_rows($result);
    echo $err;
    if($numAlbum > 0){
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $Aid[$i] = $row["Aid"];
            $AName[$i] = $row["AName"];
            $i = $i + 1;
        }
        mysqli_free_result($result);
    }    
    mysqli_close($db);
?>
<?php
    $db = mysqli_connect("localhost","root","root") or die("無法開啟MySQL伺服器連接!");
    $dbname = "finalproject";
    if (!mysqli_select_db($db,$dbname)) {
        die("無法開啟$dbname資料庫");
    }
    for ($j=0; $j < $numAlbum; $j++) { 
        $Albumid = $Aid[$j];     
        $sql = "SELECT * FROM sales_table WHERE Aid = '$Albumid'";
        $result = mysqli_query($db,$sql);
        $err = mysqli_error($db);
        echo $err;
        $num = mysqli_num_rows($result);
        if($num > 0){
            $total = 0;
            while ($row = mysqli_fetch_array($result)) {
                $Quantity = $row["Quantity"];
                $total = $total + $Quantity;
            }
            mysqli_free_result($result);
        }
        $AlbumAmount[$j] = $total; 
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
            padding: 90px 80px;
            background: #ffffff;
        }
        
        #info {
            padding-left: 1%;
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
        <div class="bg-1">
            <div class="container">
                <div class="row test">                            
                    <h3 class="text-center"><b><?php echo "$thisAName";?></b></br></br></h3>
                    <p class="text-center"><b><?php echo "$Artist";?></b></br></br></p>
                    <div class="col-md-8" id="info">
                        <div class="row">
                            <div class="col-sm-11 form-group">                    
                             <div class="thumbnail">
                                <img src="http://localhost/finalproject-master/merchandise/<?php echo "$NO";?>.jpg" class="img-responsive" style="height:200px">
                                <!--　　1) (T+L)期內的平均需求量=(24+5)×200＝5800件

　　                                    2) (T+L)期內的需求變動標準差=135(件)

　　                                    3)目標庫存水平：Q0＝5800+1.96×135＝6065件

　　                                    4)訂購批量：Q＝6065—500=5565件-->
                            </div>
                                <table class="table table-hover">
                                    <?php
                                        echo "<tr>";
                                        echo "<td>商品ID</td>";
                                        echo "<td>商品名稱</td>";
                                        echo "<td>銷售數</td>";
                                        echo "</tr>";



                                        

                                        $nnum = 6195;
                                        $B_Date = 10 ;
                                        $A_Date = 60 ;
                                        $P_Date = $A_Date - ceil($B_Date*0.9*$NO) ;
                                        

                                        $totalSale = 0;  

                                        for ($k=0; $k < $numAlbum; $k++) { 
                                            echo "<tr>";
                                            echo "<td>$Aid[$k]</td>";
                                            echo "<td>$AName[$k]</td>";
                                            echo "<td>$AlbumAmount[$k]</td>";
                                            echo "</tr>";
                                            $totalSale = $totalSale + $AlbumAmount[$k];
                                        }
                                        $predict[0] = $AlbumAmount[0];
                                        for ($k=1; $k <= $numAlbum; $k++) { 
                                            $predict[$k] = $predict[$k-1] + 0.15*($AlbumAmount[$k-1] - $predict[$k-1]);
                                        }
                                        $nnum = $nnum + $NO*13;
                                        $current_predict = round($predict[$numAlbum]);
                                        $aver = 100;
                                        $a = 62*$aver ;
                                        $b = round(sqrt($a));
                                        $c = $a + 1.96*$b;
                                        $EOQ = $c - $nnum;
                                        $d = floor($EOQ);
                                        if($d < 0){
                                            $d=0;
                                        }

                                        echo "<tr style='color:blue; background:#E6E6F2;'>";
                                        echo "<td></td>";
                                        echo "<td>總銷售數</td>";
                                        echo "<td >$totalSale</td>";
                                        echo "</tr>";
                                       
                                        echo "<td></td>";
                                        echo "<td>本期估計訂購數</td>";
                                        echo "<td >$d</td>";
                                        echo "</tr>";
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" id="order">
                        <form method="post" action="order2.php">
                            <div class="row">
                                <div class="col-sm-10 form-group">
                                <label for="Aid">商品ID</label>
                                <input class="form-control" id="Aid" name="Aid" value="<?php echo "$thisAid";?>" type="text" required>
                                </div>
                            </div>
                            <div class="row" style="margin-top:1%;">
                                <div class="col-sm-10 form-group">
                                <label for="Aid">供應商ID</label>
                                <input class="form-control" id="Mid" name="Mid" value="<?php echo "$thisMid";?>" type="text" required>
                                </div>
                            </div>
                            <div class="row" style="margin-top:1%;">
                                <div class="col-sm-10 form-group">
                                <label for="Aid">訂購日期</label>
                                <?php
                                    $getDate= date("Y-m-d");
                                ?>
                                <input class="form-control" id="PDate" name="PDate" value="<?php echo "$getDate";?>" type="date" required>
                                </div>
                            </div>
                            <div class="row" style="margin-top:1%;">
                                <div class="col-sm-10 form-group">
                                <label for="Aid">訂購數量</label>
                                <input class="form-control" id="Quantity" name="Quantity" value="<?php echo "$d";?>" type="text" required>
                                </div>
                            </div>
                            <div class="row" style="margin-top:1%;">
                                <div class="col-sm-10 form-group">
                                <label for="Aid">訂購金額</label>
                                <input class="form-control" id="Dollar" name="Dollar" value="<?php echo round($thisPrice*$d*0.5);?>" type="text" required>
                                </div>
                            </div>
                            <div class="row" style="margin-top:3%;">
                                <input class="btn btn-primary btn-block" type="submit" value="確認訂購"></input>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
