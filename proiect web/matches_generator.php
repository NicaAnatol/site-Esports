<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "subscribe";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['EMAIL'];
    $result = '';
    $check_stmt = $conn->prepare("SELECT * FROM subscription WHERE email = ?");
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        $result = 'exists';
    } else {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $insert_stmt = $conn->prepare("INSERT INTO subscription (email) VALUES (?)");
            $insert_stmt->bind_param("s", $email);

            if ($insert_stmt->execute()) {
                $result = 'success';
            } else {
                $result = 'error';
            }

            $insert_stmt->close();
        } else {
            $result = 'invalid';
        }
    }

    $check_stmt->close();
    $conn->close();

    header("Location: " . $_SERVER['PHP_SELF'] . "?result=$result");
    exit();
}
?>

<!doctype html>
<html lang="en-US">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <link rel="profile" href="">
  <title>GG games</title>
<link rel='stylesheet'  href='style.css' media='all' />
<script src='https://code.jquery.com/jquery-1.12.4.min.js?ver=1.12.4' id='jquery-core-js'></script>
</script>
<link rel="icon" href="./logo.png" sizes="32x32" />
<link rel="icon" href="./logo.png" sizes="192x192" />
<body class="dark-scheme ">
<style>
  .match-item .game-team {
    width: 75%;
  }
  .match-item .game-team .logo img {
    display: block;
    max-width: 500px;
    max-height: 500px;
}
.match-item .game-team .title {
    font-size: 30px;
}
.match-item .game-team .points {
    font-size: 40px;
}
.match-item .game-team .sep {
    font-size: 70px;
    margin:0px 30px;
}
.match-item .game-team .item {
    height: auto;
    padding: 10px;
}
.match-item .game-team .item:hover {
    height: auto;
    padding: 10px;
}
.event-box {
  padding: 10px;
  height: 100%;
  background:none!important;
}
.teamlogo {
    width: 300px !important;
    height: 300px !important;
}
.create{
  background-image: url(./image/esports.jpg);
  background-repeat: no-repeat; 
  background-position: center;
  background-size:cover;
}
.event-name {
    position: absolute; 
    font-size: 60px;
    color: white; 
    font-weight: bold; 
    padding: 5px; 
    z-index:10;
    top:120px;
    text-transform: uppercase;
  }
#openVideoButton{
  background: none;
}
   #videoContainer {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
            background: black;
        }
        #videoWrapper {
            position: relative;
            background: black;
        }
        #closeSVG {
            position: absolute;
            top:-50px;
            right:-50px;
            cursor: pointer;
        }
        iframe {
            width: 1400px;
            height: 800px;
            z-index:9999;
            background: black;
        }
        @media (max-width: 1500px) {
          iframe {
    width: 1100px;
    height: 700px;
}
        }
        @media (max-width: 1200px) {
          .teamlogo {
    width: 200px !important;
    height: 200px !important;
}
iframe {
    width: 800px;
    height: 600px;
}
}
@media (max-width: 980px) {
iframe {
    width: 650px;
    height: 400px;
}}
@media (max-width: 768px) {
          .teamlogo {
    width: 150px !important;
    height: 150px !important;
}
}
@media (max-width: 575.98px) {
  .teamlogo {
    width: 100px !important;
    height: 100px !important;
}
.match-item .game-team{
    width:100%;
  }
}

</style>
<div id="page">
    <div id="loading1" class="loading1">
      <div class="curburile">
        <div class="curburile-animatie">
        <div id="cub1" class="cuburi-animatie"></div>
        <div id="cub2"class="cuburi-animatie"></div>
        <div id="cub4"class="cuburi-animatie"></div>
        <div id="cub3"class="cuburi-animatie"></div>
      </div></div></div>
    
      <header class="site-header">
        <div class="container">
            <div class="row navbar">
                <div class="logo-block size-auto">
                    <div>
                        <a href="home.php"><img class="light" src="./image/logo.png" width="100px" alt="GG games"></a>
                    </div>
                </div>
                <div class="right size-auto">
                    <nav class="navigation visible_menu" id="navigation">
                        <ul class="menu">
                            <li class="current-menu-item current_page_item current-menu-ancestor menu-item-has-children">
                                <a href="home.php"><span>Home</span></a>
                                <ul class="sub-menu">
                                    <li class="current-menu-item current_page_item"><a href="home.php"><span>Gaming</span></a></li>
                                    <li><a href="on_work.php"><span>Streaming</span></a></li>
                                    <li><a href="on_work.php"><span>eSport</span></a></li>
                                    <li><a href="on_work.php"><span>Categories</span></a></li>
                                    <li><a href="on_work.php"><span>Game Developers</span></a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="on_work.php"><span>Blog</span></a>
                                <ul class="sub-menu">
                                    <li><a href="on_work.php"><span>Games</span></a></li>
                                    <li><a href="on_work.php"><span>News</span></a></li>
                                    <li><a href="on_work.php"><span>Gaming Setups</span></a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="on_work.php"><span>Gallery</span></a>
                                <ul class="sub-menu">
                                    <li><a href="on_work.php"><span>Tournaments</span></a></li>
                                    <li><a href="on_work.php"><span>Trades</span></a></li>
                                    <li><a href="on_work.php"><span>Giweaway</span></a></li>
                                    <li class="menu-item-has-children">
                                        <a href="on_work.php"><span>Other</span></a>
                                        <ul class="sub-menu">
                                            <li><a href="on_work.php"><span>On work</span></a></li>
                                            <li><a href="on_work.php"><span>Cs go</span></a></li>
                                            <li><a href="on_work.php"><span>Dota 2</span></a></li>
                                            <li><a href="on_work.php"><span>Fortnite</span></a></li>
                                            <li><a href="on_work.php"><span>Pubg</span></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#"><span>Pages</span></a>
                                <ul class="sub-menu">
                                    <li><a href="on_work.php"><span>About Us</span></a></li>
                                    <li><a href="on_work.php"><span>Coming Soon</span></a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children ">
                                <a href="on_work.php"><span>Shop</span></a>
                                <ul class="sub-menu">
                                    <li><a href="on_work.php"><span>Coming Soon</span></a></li>
                                    <li><a href="profile.php"><span>My account</span></a></li>
                                </ul>
                            </li>
                            <li><a href="contact_us.php"><span>Contacts</span></a></li>
                            <li ><a href="login.php"><div class="button-style2 "><span>Login</span></div></a></li>
                        </ul>
                    </nav>
                    <div class="nav-butter visible_menu" ><span></span><span></span><span></span></div>
                </div>
                <div class="sidebar-butter" ><span></span><span></span><span></span></div>
            </div>
        </div>
    </header>  
      
        <div>
    <div>
      <div class="header-space"></div>

<div id="scroll"></div>








<?php
if (isset($_GET['id'])) {
    $match_id = intval($_GET['id']);
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM league_data WHERE id = ?");
    $stmt->bind_param("i", $match_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        function convertToEmbedLink($link) {
            return str_replace('watch?v=', 'embed/', $link);
        }

        $embed_link = convertToEmbedLink($row['youtube_link']);
      } else {
        echo "Nu s-au găsit date pentru meciul specificat.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "ID-ul meciului nu a fost specificat.";
}
?>





<div class="create">
    <div class="match-item event-box" data-category="<?php echo $row['categorie']; ?>" style="display: flex !important; justify-content: center!important; align-items: center!important;">
        <div class="event-name"><?php echo $row['league_name']; ?></div>
        <div class="game-team">
            <div class="item">
                <div class="logo"><img src="<?php echo $row['team1_image']; ?>" class="teamlogo" title="<?php echo $row['team1_name']; ?>" alt="<?php echo $row['team1_name']; ?>"></div>
                <div class="title"><?php echo $row['team1_name']; ?></div>
                <div class="points"><?php echo $row['team1_score']; ?></div>
            </div>
            <div class="sep">
                <button id="openVideoButton">
                    <svg viewBox="0 0 24 24">
                        <path d="M 8 5 L 8 19 L 19 12 z"></path>
                    </svg>
                </button>
            </div>
            <div class="item">
                <div class="logo"><img src="<?php echo $row['team2_image']; ?>" class="teamlogo" title="<?php echo $row['team2_name']; ?>" alt="<?php echo $row['team2_name']; ?>"></div>
                <div class="title"><?php echo $row['team2_name']; ?></div>
                <div class="points"><?php echo $row['team2_score']; ?></div>
            </div>
        </div>
    </div>
</div>



<div id="videoContainer">
                <div id="videoWrapper">
                    <svg id="closeSVG" viewBox="0 0 50 50">
                        <path d="M 7.7070312 6.2929688 L 6.2929688 7.7070312 L 23.585938 25 L 6.2929688 42.292969 L 7.7070312 43.707031 L 25 26.414062 L 42.292969 43.707031 L 43.707031 42.292969 L 26.414062 25 L 43.707031 7.7070312 L 42.292969 6.2929688 L 25 23.585938 L 7.7070312 6.2929688 z"></path>
                    </svg>
                    <iframe id="youtubeVideo" src="<?php echo $embed_link; ?>" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>

</div>
<footer class="site-footer ">
              <div class="scroll-to-top-button" onclick="scrollToSection('scroll')"><span>back to top</span></div>
            <div class="container">
        <div class="row">
          <div class=" sizem3">
                          <div class="site-logo"><a href="home.php" data-magic-cursor="link"><img class="light" src="./image/logo.png" width="100px" alt="GG games"></a></div>
            <div  class="widget ">	
              		
            <form action="#" method="post" id="emailForm">
    <div class="subscribe-form">
        <div class="input-row">
            <input type="email" name="EMAIL" class="input" placeholder="Enter your email" required />
        </div>
        <button type="submit">
            <svg fill="currentColor" height="20px" width="20px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330" xml:space="preserve">
                <path id="XMLID_27_" d="M15,180h263.787l-49.394,49.394c-5.858,5.857-5.858,15.355,0,21.213C232.322,253.535,236.161,255,240,255
                s7.678-1.465,10.606-4.394l75-75c5.858-5.857,5.858-15.355,0-21.213l-75-75c-5.857-5.857-15.355-5.857-21.213,0
                c-5.858,5.857-5.858,15.355,0,21.213L278.787,150H15c-8.284,0-15,6.716-15,15S6.716,180,15,180z"/>
            </svg>
            <span>Subscribe</span>
        </button>
        <div id="message"></div>
    </div>
</form>
    <div id="message"></div>
</div>

            </div>
                      <div class=" sizes4 sizem3" >
              <div class="address"><h6 class="widget-title ">Address</h6><div ><p>Chisinau strada Vasile Lupu 8 <br /><strong>Open:</strong> 9:30 AM 11:30PM</p>
<div class="contact-row">
	<div class="label">Phone:</div>
	<div class="value">+40-123-456-789</div>
</div>
<div class="contact-row">
	<div class="label">Email:</div>
	<div class="value">anatol.nica00@e-uvt.ro</div>
</div></div></div>
<div class="social_media">
  <ul class="social-icons">
      <a href="#">
        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M20 1C21.6569 1 23 2.34315 23 4V20C23 21.6569 21.6569 23 20 23H4C2.34315 23 1 21.6569 1 20V4C1 2.34315 2.34315 1 4 1H20ZM20 3C20.5523 3 21 3.44772 21 4V20C21 20.5523 20.5523 21 20 21H15V13.9999H17.0762C17.5066 13.9999 17.8887 13.7245 18.0249 13.3161L18.4679 11.9871C18.6298 11.5014 18.2683 10.9999 17.7564 10.9999H15V8.99992C15 8.49992 15.5 7.99992 16 7.99992H18C18.5523 7.99992 19 7.5522 19 6.99992V6.31393C19 5.99091 18.7937 5.7013 18.4813 5.61887C17.1705 5.27295 16 5.27295 16 5.27295C13.5 5.27295 12 6.99992 12 8.49992V10.9999H10C9.44772 10.9999 9 11.4476 9 11.9999V12.9999C9 13.5522 9.44771 13.9999 10 13.9999H12V21H4C3.44772 21 3 20.5523 3 20V4C3 3.44772 3.44772 3 4 3H20Z" fill="currentColor"/>
        </svg></a>
      <a href="#">
        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M19.7828 3.91825C20.1313 3.83565 20.3743 3.75444 20.5734 3.66915C20.8524 3.54961 21.0837 3.40641 21.4492 3.16524C21.7563 2.96255 22.1499 2.9449 22.4739 3.11928C22.7979 3.29366 23 3.6319 23 3.99986C23 5.08079 22.8653 5.96673 22.5535 6.7464C22.2911 7.40221 21.9225 7.93487 21.4816 8.41968C21.2954 11.7828 20.3219 14.4239 18.8336 16.4248C17.291 18.4987 15.2386 19.8268 13.0751 20.5706C10.9179 21.3121 8.63863 21.4778 6.5967 21.2267C4.56816 20.9773 2.69304 20.3057 1.38605 19.2892C1.02813 19.0108 0.902313 18.5264 1.07951 18.109C1.25671 17.6916 1.69256 17.4457 2.14144 17.5099C3.42741 17.6936 4.6653 17.4012 5.6832 16.9832C5.48282 16.8742 5.29389 16.7562 5.11828 16.6346C4.19075 15.9925 3.4424 15.1208 3.10557 14.4471C2.96618 14.1684 2.96474 13.8405 3.10168 13.5606C3.17232 13.4161 3.27562 13.293 3.40104 13.1991C2.04677 12.0814 1.49999 10.5355 1.49999 9.49986C1.49999 9.19192 1.64187 8.90115 1.88459 8.71165C1.98665 8.63197 2.10175 8.57392 2.22308 8.53896C2.12174 8.24222 2.0431 7.94241 1.98316 7.65216C1.71739 6.3653 1.74098 4.91284 2.02985 3.75733C2.1287 3.36191 2.45764 3.06606 2.86129 3.00952C3.26493 2.95299 3.6625 3.14709 3.86618 3.50014C4.94369 5.36782 6.93116 6.50943 8.78086 7.18568C9.6505 7.50362 10.4559 7.70622 11.0596 7.83078C11.1899 6.61019 11.5307 5.6036 12.0538 4.80411C12.7439 3.74932 13.7064 3.12525 14.74 2.84698C16.5227 2.36708 18.5008 2.91382 19.7828 3.91825ZM10.7484 9.80845C10.0633 9.67087 9.12171 9.43976 8.09412 9.06408C6.7369 8.56789 5.16088 7.79418 3.84072 6.59571C3.86435 6.81625 3.89789 7.03492 3.94183 7.24766C4.16308 8.31899 4.5742 8.91899 4.94721 9.10549C5.40342 9.3336 5.61484 9.8685 5.43787 10.3469C5.19827 10.9946 4.56809 11.0477 3.99551 10.9046C4.45603 11.595 5.28377 12.2834 6.66439 12.5135C7.14057 12.5929 7.49208 13.0011 7.49986 13.4838C7.50765 13.9665 7.16949 14.3858 6.69611 14.4805L5.82565 14.6546C5.95881 14.7703 6.103 14.8838 6.2567 14.9902C6.95362 15.4727 7.65336 15.6808 8.25746 15.5298C8.70991 15.4167 9.18047 15.6313 9.39163 16.0472C9.60278 16.463 9.49846 16.9696 9.14018 17.2681C8.49626 17.8041 7.74425 18.2342 6.99057 18.5911C6.63675 18.7587 6.24134 18.9241 5.8119 19.0697C6.14218 19.1402 6.48586 19.198 6.84078 19.2417C8.61136 19.4594 10.5821 19.3126 12.4249 18.6792C14.2614 18.0479 15.9589 16.9385 17.2289 15.2312C18.497 13.5262 19.382 11.1667 19.5007 7.96291C19.51 7.71067 19.6144 7.47129 19.7929 7.29281C20.2425 6.84316 20.6141 6.32777 20.7969 5.7143C20.477 5.81403 20.1168 5.90035 19.6878 5.98237C19.3623 6.04459 19.0272 5.94156 18.7929 5.70727C18.0284 4.94274 16.5164 4.43998 15.2599 4.77822C14.6686 4.93741 14.1311 5.28203 13.7274 5.89906C13.3153 6.52904 13 7.51045 13 8.9999C13 9.28288 12.8801 9.5526 12.6701 9.74221C12.1721 10.1917 11.334 9.92603 10.7484 9.80845Z" fill="currentColor"/>
        </svg></a>
      <a href="#">
        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 18C15.3137 18 18 15.3137 18 12C18 8.68629 15.3137 6 12 6C8.68629 6 6 8.68629 6 12C6 15.3137 8.68629 18 12 18ZM12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16Z" fill="currentColor"/>
        <path d="M18 5C17.4477 5 17 5.44772 17 6C17 6.55228 17.4477 7 18 7C18.5523 7 19 6.55228 19 6C19 5.44772 18.5523 5 18 5Z" fill="currentColor"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.65396 4.27606C1 5.55953 1 7.23969 1 10.6V13.4C1 16.7603 1 18.4405 1.65396 19.7239C2.2292 20.8529 3.14708 21.7708 4.27606 22.346C5.55953 23 7.23969 23 10.6 23H13.4C16.7603 23 18.4405 23 19.7239 22.346C20.8529 21.7708 21.7708 20.8529 22.346 19.7239C23 18.4405 23 16.7603 23 13.4V10.6C23 7.23969 23 5.55953 22.346 4.27606C21.7708 3.14708 20.8529 2.2292 19.7239 1.65396C18.4405 1 16.7603 1 13.4 1H10.6C7.23969 1 5.55953 1 4.27606 1.65396C3.14708 2.2292 2.2292 3.14708 1.65396 4.27606ZM13.4 3H10.6C8.88684 3 7.72225 3.00156 6.82208 3.0751C5.94524 3.14674 5.49684 3.27659 5.18404 3.43597C4.43139 3.81947 3.81947 4.43139 3.43597 5.18404C3.27659 5.49684 3.14674 5.94524 3.0751 6.82208C3.00156 7.72225 3 8.88684 3 10.6V13.4C3 15.1132 3.00156 16.2777 3.0751 17.1779C3.14674 18.0548 3.27659 18.5032 3.43597 18.816C3.81947 19.5686 4.43139 20.1805 5.18404 20.564C5.49684 20.7234 5.94524 20.8533 6.82208 20.9249C7.72225 20.9984 8.88684 21 10.6 21H13.4C15.1132 21 16.2777 20.9984 17.1779 20.9249C18.0548 20.8533 18.5032 20.7234 18.816 20.564C19.5686 20.1805 20.1805 19.5686 20.564 18.816C20.7234 18.5032 20.8533 18.0548 20.9249 17.1779C20.9984 16.2777 21 15.1132 21 13.4V10.6C21 8.88684 20.9984 7.72225 20.9249 6.82208C20.8533 5.94524 20.7234 5.49684 20.564 5.18404C20.1805 4.43139 19.5686 3.81947 18.816 3.43597C18.5032 3.27659 18.0548 3.14674 17.1779 3.0751C16.2777 3.00156 15.1132 3 13.4 3Z" fill="currentColor"/>
        </svg></a>
     
  </ul>
</div></div>
                      <div class=" sizes4 sizem3">
              		<div  class=" recent_entries">		<h6 class="widget-title">Recent Posts</h6>		<ul>
			        				<li>
					<a href="#">News</a>
											<span class="post-date">November 15, 2024</span>
          				</li>
			        				<li>
					<a href="#">Events</a>
											<span class="post-date">April 22, 2024</span>
          				</li>
			        				<li>
					<a href="#">Blog</a>
											<span class="post-date">April 10, 2024</span>
          				</li>
					</ul>
		</div>            </div>
                      <div class="sizes4 sizem3">
              <div  class=" recent_entries pages">
                <h6>Categories</h6><ul>
                  <li>
                     <a href="home.php">Gaming</a></li>
                     <li>
                      <a href="on_work.php">Esport</a>
                    </li>
                    <li>
                      <a href="on_work.php">About us</a>
                    </li>
                    <li>
                      <a href="on_work.php">Coming soon</a>
                    </li>
                    <li>
                      <a href="contact_us.php">Contacts</a>
                    </li>
                  </ul>
                </div>
                          </div>
                  </div>
                  

    </footer>
  </div>
<script src='./contact_us.js'></script>
<script>
</script>
</body>

</html>
