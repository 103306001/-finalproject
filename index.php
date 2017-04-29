<?php session_start(); ?>
<?php
    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
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
    
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
            <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
    <script src="assets/js/main.js"></script>
    
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
    
    .carousel-inner img {
        -webkit-filter: grayscale(90%);
        filter: grayscale(90%);
        /* make all photos black and white */
        width: 50%;
        /* Set width to 100% */
        margin: auto;
    }
    
    .carousel-caption h3 {
        color: #fff !important;
    }
    
    @media (max-width: 600px) {
        .carousel-caption {
            display: none;
            /* Hide the carousel text when the screen is less than 600 pixels wide */
        }
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
    
          <section id="banner">
                        <div class="inner">
                            <h2>Heng Leong Hang 恆隆行貿易股份有限公司</h2>
                            <p>五十七年家電品牌<br />
                            提供合適的商品，讓人們享受進化的舒適生活<br />
                            
                            
                        </div>
                        <a href="#one" class="more scrolly">Learn More</a>
                    </section>


    <section id="one" class="wrapper style1 special">
                        <div class="inner">
                            <header class="major">
                                <h2>一切，從這裡開始</h2>
                                <p>關於我們  關於生活<br />
                                進化，從產品開始</p>
                            </header>
                            
                        </div>
                    </section

    <section id="two" class="wrapper alt style2">
                        <section class="spotlight">
                            <div class="image"><img src="images/pic01.jpeg" alt="" /></div><div class="content">
                                <h2>環境淨化</h2>
                                <p>為了打造更好的居家環境<br>從思考生活本質出發<br>以獨特、創新且高效的科技<br>將自然的純淨元素重新帶回生活中。</p>
                                <h2>dyson<br />
                                Honeywell<br />
                                TWINBIRD<br />
                                coway</h2>

                            </div>
                        </section>
                        <section class="spotlight">
                            <div class="image"><img src="images/pic02.png" alt="" /></div><div class="content">
                                <h2>享食進化</h2>
                                <p>享食，蘊藏了各種樣貌<br>我們將時尚、樂活與新鮮融入其中<br>讓飲食型態更個性化、多變與趣味<br>不只美味提升＿品味俱進。</p>
                                 <h2>bodum<br />
                                sodastream<br />
                                FoodSaver<br />
                                Oster<br />
                                CORKCICLE</h2>

                            </div>
                        </section>
                        <section class="spotlight">
                            <div class="image"><img src="images/pic03.jpg" alt="" /></div><div class="content">
                                <h2>身●美進化</h2>
                                <p>清楚掌握身體密碼<br>感受煥新般的個人魅力<br>以睿智方式寵愛自己<br>由內至外顧慮到每個關鍵環節。</p>

                                <h2>BRAUN<br />
                                Oral-B<br />
                                no!no!<br />
                                YA-MAN<br />
                                niTTO<br />
                                Sunbeam</h2>

                            </div>
                        </section>
                         <section class="spotlight">
                            <div class="image"><img src="images/pic04.jpg" alt="" /></div><div class="content">
                                <h2>能源進化</h2>
                                <p>在講求隨身、便利的能源時代<br>我們提供更快速、充沛且持久的<br>隨身能源為未來的美好生活帶<br>來充足能量。</p>

                                <h2>Panasonic</h2>
                            </div>
                        </section>
                    </section>

                   <footer id="footer">
                        <ul class="icons">
                            
                            <li><a href="https://www.facebook.com/HengStyle.tw/?__mref=message_bubble" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                           
                            <li><a href="mailto:103306001@nccu.edu.tw" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
                        </ul>
                        <ul class="copyright">
                            <li>&copy; NCCU MIS</a></li>
                        </ul>
                    </footer>

           
                  
</body>

</html>