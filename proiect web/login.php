
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
<link rel="icon" href="./image/logo.png" sizes="32x32" />
<link rel="icon" href="./image/logo.png" sizes="192x192" />
<body class="dark-scheme ">


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
<div class="spatiu"></div>







<div class="login-form">
<div class="container4">
    <div class="forms">
        <div class="form1 login">
            <span class="title">Login</span>

            <form action="login_conf.php" method="post" onsubmit="return validateEmail()">
                <div class="input-field">
                    <input type="email" id="email1" name="email" placeholder="Enter your email" required>
                    <i class="uil uil-envelope icon">
                      <svg fill="#fff" height="25px" width="35px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                         viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
                      <path id="Mail" d="M58.0034485,8H5.9965506c-3.3136795,0-5.9999995,2.6862001-5.9999995,6v36c0,3.3137016,2.6863203,6,5.9999995,6
                        h52.006897c3.3137016,0,6-2.6862984,6-6V14C64.0034485,10.6862001,61.3171501,8,58.0034485,8z M62.0034485,49.1108017
                        L43.084549,30.1919994l18.9188995-12.0555992V49.1108017z M5.9965506,10h52.006897c2.2056007,0,4,1.7943001,4,4v1.7664003
                        L34.4677505,33.3134003c-1.4902,0.9492989-3.3935013,0.9199982-4.8495998-0.0703011L1.9965508,14.4694996V14
                        C1.9965508,11.7943001,3.7910507,10,5.9965506,10z M1.9965508,16.8852005L21.182251,29.9251003L1.9965508,49.1108017V16.8852005z
                         M58.0034485,54H5.9965506c-1.6473999,0-3.0638998-1.0021019-3.6760998-2.4278984l20.5199013-20.5200024l5.6547985,3.843401
                        c1.0859013,0.7383003,2.3418007,1.1083984,3.5995998,1.1083984c1.1953011,0,2.3925018-0.3339996,3.4463005-1.0048981
                        l5.8423996-3.7230015l20.2961006,20.2961025C61.0673485,52.9978981,59.6508713,54,58.0034485,54z"/>
                      </svg></i>
                </div>
                <div class="input-field">
                    <input type="password" name="password" class="password" placeholder="Enter your password" required>
                    <i class="uil uil-lock icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35px" height="25px"fill="#fff" viewBox="0 0 50 50">
                      <path d="M 25 2 C 17.832484 2 12 7.8324839 12 15 L 12 21 L 8 21 C 6.3550302 21 5 22.35503 5 24 L 5 47 C 5 48.64497 6.3550302 50 8 50 L 42 50 C 43.64497 50 45 48.64497 45 47 L 45 24 C 45 22.35503 43.64497 21 42 21 L 38 21 L 38 15 C 38 7.8324839 32.167516 2 25 2 z M 25 4 C 31.086484 4 36 8.9135161 36 15 L 36 21 L 14 21 L 14 15 C 14 8.9135161 18.913516 4 25 4 z M 8 23 L 42 23 C 42.56503 23 43 23.43497 43 24 L 43 47 C 43 47.56503 42.56503 48 42 48 L 8 48 C 7.4349698 48 7 47.56503 7 47 L 7 24 C 7 23.43497 7.4349698 23 8 23 z M 13 34 A 2 2 0 0 0 11 36 A 2 2 0 0 0 13 38 A 2 2 0 0 0 15 36 A 2 2 0 0 0 13 34 z M 21 34 A 2 2 0 0 0 19 36 A 2 2 0 0 0 21 38 A 2 2 0 0 0 23 36 A 2 2 0 0 0 21 34 z M 29 34 A 2 2 0 0 0 27 36 A 2 2 0 0 0 29 38 A 2 2 0 0 0 31 36 A 2 2 0 0 0 29 34 z M 37 34 A 2 2 0 0 0 35 36 A 2 2 0 0 0 37 38 A 2 2 0 0 0 39 36 A 2 2 0 0 0 37 34 z"></path>
                  </svg></i>
                    <i class="uil uil-eye-slash showHidePw"><svg width="35px" height="25px" xmlns="http://www.w3.org/2000/svg"fill="#fff" x="0px" y="50px" fill-rule="evenodd" clip-rule="evenodd"><path d="M8.137 15.147c-.71-.857-1.146-1.947-1.146-3.147 0-2.76 2.241-5 5-5 1.201 0 2.291.435 3.148 1.145l1.897-1.897c-1.441-.738-3.122-1.248-5.035-1.248-6.115 0-10.025 5.355-10.842 6.584.529.834 2.379 3.527 5.113 5.428l1.865-1.865zm6.294-6.294c-.673-.53-1.515-.853-2.44-.853-2.207 0-4 1.792-4 4 0 .923.324 1.765.854 2.439l5.586-5.586zm7.56-6.146l-19.292 19.293-.708-.707 3.548-3.548c-2.298-1.612-4.234-3.885-5.548-6.169 2.418-4.103 6.943-7.576 12.01-7.576 2.065 0 4.021.566 5.782 1.501l3.501-3.501.707.707zm-2.465 3.879l-.734.734c2.236 1.619 3.628 3.604 4.061 4.274-.739 1.303-4.546 7.406-10.852 7.406-1.425 0-2.749-.368-3.951-.938l-.748.748c1.475.742 3.057 1.19 4.699 1.19 5.274 0 9.758-4.006 11.999-8.436-1.087-1.891-2.63-3.637-4.474-4.978zm-3.535 5.414c0-.554-.113-1.082-.317-1.562l.734-.734c.361.69.583 1.464.583 2.296 0 2.759-2.24 5-5 5-.832 0-1.604-.223-2.295-.583l.734-.735c.48.204 1.007.318 1.561.318 2.208 0 4-1.792 4-4z"/></svg></i>
                </div>

                <div class="checkbox-text">
                    <div class="checkbox-content">
                        <input type="checkbox" id="logCheck">
                        <label for="logCheck" class="text">Remember me</label>
                    </div>
                    
                    <a href="#" class="text">Forgot password?</a>
                </div>
                <button type="submit" class="button-style1 input-field">Login</button>
                <?php
                if (isset($_GET['result']) && $_GET['result'] == 'error') {
                    echo '<div class="error">Invalid email or password!</div>';
                }
                ?>
            </form>

            <div class="login-signup">
                <span class="text">Not a member?
                    <a href="#" class="text signup-link">Signup Now</a>
                </span>
            </div>
        </div>
            <div class="form1 signup">
    <span class="title">Registration</span>

    <form name="signupForm" action="signup.php" method="post" onsubmit="return validateForm()">
        <div class="input-field">
            <input type="text" name="username" placeholder="Enter your name" required>
            <i class="uil uil-user"><svg class="svg-icon" style="width: 35px; height: 25px;vertical-align: middle;fill: #fff;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M843.282963 870.115556c-8.438519-140.515556-104.296296-257.422222-233.908148-297.14963C687.881481 536.272593 742.4 456.533333 742.4 364.088889c0-127.241481-103.158519-230.4-230.4-230.4S281.6 236.847407 281.6 364.088889c0 92.444444 54.518519 172.183704 133.12 208.877037-129.611852 39.727407-225.46963 156.634074-233.908148 297.14963-0.663704 10.903704 7.964444 20.195556 18.962963 20.195556l0 0c9.955556 0 18.299259-7.774815 18.962963-17.73037C227.745185 718.506667 355.65037 596.385185 512 596.385185s284.254815 122.121481 293.357037 276.195556c0.568889 9.955556 8.912593 17.73037 18.962963 17.73037C835.318519 890.311111 843.946667 881.019259 843.282963 870.115556zM319.525926 364.088889c0-106.287407 86.186667-192.474074 192.474074-192.474074s192.474074 86.186667 192.474074 192.474074c0 106.287407-86.186667 192.474074-192.474074 192.474074S319.525926 470.376296 319.525926 364.088889z"  /></svg></i>
        </div>
        <div class="input-field">
            <input type="email" name="email" placeholder="Enter your email" required>
            <i class="uil uil-envelope icon"><svg fill="#fff" height="25px" width="35px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
              viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
           <path id="Mail" d="M58.0034485,8H5.9965506c-3.3136795,0-5.9999995,2.6862001-5.9999995,6v36c0,3.3137016,2.6863203,6,5.9999995,6
             h52.006897c3.3137016,0,6-2.6862984,6-6V14C64.0034485,10.6862001,61.3171501,8,58.0034485,8z M62.0034485,49.1108017
             L43.084549,30.1919994l18.9188995-12.0555992V49.1108017z M5.9965506,10h52.006897c2.2056007,0,4,1.7943001,4,4v1.7664003
             L34.4677505,33.3134003c-1.4902,0.9492989-3.3935013,0.9199982-4.8495998-0.0703011L1.9965508,14.4694996V14
             C1.9965508,11.7943001,3.7910507,10,5.9965506,10z M1.9965508,16.8852005L21.182251,29.9251003L1.9965508,49.1108017V16.8852005z
              M58.0034485,54H5.9965506c-1.6473999,0-3.0638998-1.0021019-3.6760998-2.4278984l20.5199013-20.5200024l5.6547985,3.843401
             c1.0859013,0.7383003,2.3418007,1.1083984,3.5995998,1.1083984c1.1953011,0,2.3925018-0.3339996,3.4463005-1.0048981
             l5.8423996-3.7230015l20.2961006,20.2961025C61.0673485,52.9978981,59.6508713,54,58.0034485,54z"/>
           </svg></i>
        </div>
        <div class="input-field">
            <input type="password" name="password" class="password" placeholder="Create a password" required>
            <i class="uil uil-lock icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35px" height="25px"fill="#fff" viewBox="0 0 50 50">
              <path d="M 25 2 C 17.832484 2 12 7.8324839 12 15 L 12 21 L 8 21 C 6.3550302 21 5 22.35503 5 24 L 5 47 C 5 48.64497 6.3550302 50 8 50 L 42 50 C 43.64497 50 45 48.64497 45 47 L 45 24 C 45 22.35503 43.64497 21 42 21 L 38 21 L 38 15 C 38 7.8324839 32.167516 2 25 2 z M 25 4 C 31.086484 4 36 8.9135161 36 15 L 36 21 L 14 21 L 14 15 C 14 8.9135161 18.913516 4 25 4 z M 8 23 L 42 23 C 42.56503 23 43 23.43497 43 24 L 43 47 C 43 47.56503 42.56503 48 42 48 L 8 48 C 7.4349698 48 7 47.56503 7 47 L 7 24 C 7 23.43497 7.4349698 23 8 23 z M 13 34 A 2 2 0 0 0 11 36 A 2 2 0 0 0 13 38 A 2 2 0 0 0 15 36 A 2 2 0 0 0 13 34 z M 21 34 A 2 2 0 0 0 19 36 A 2 2 0 0 0 21 38 A 2 2 0 0 0 23 36 A 2 2 0 0 0 21 34 z M 29 34 A 2 2 0 0 0 27 36 A 2 2 0 0 0 29 38 A 2 2 0 0 0 31 36 A 2 2 0 0 0 29 34 z M 37 34 A 2 2 0 0 0 35 36 A 2 2 0 0 0 37 38 A 2 2 0 0 0 39 36 A 2 2 0 0 0 37 34 z"></path>
          </svg></i>
        </div>
        <div class="input-field">
            <input type="password" name="confirm_password" class="password" placeholder="Confirm a password" required>
            <i class="uil uil-lock icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35px" height="25px"fill="#fff" viewBox="0 0 50 50">
              <path d="M 25 2 C 17.832484 2 12 7.8324839 12 15 L 12 21 L 8 21 C 6.3550302 21 5 22.35503 5 24 L 5 47 C 5 48.64497 6.3550302 50 8 50 L 42 50 C 43.64497 50 45 48.64497 45 47 L 45 24 C 45 22.35503 43.64497 21 42 21 L 38 21 L 38 15 C 38 7.8324839 32.167516 2 25 2 z M 25 4 C 31.086484 4 36 8.9135161 36 15 L 36 21 L 14 21 L 14 15 C 14 8.9135161 18.913516 4 25 4 z M 8 23 L 42 23 C 42.56503 23 43 23.43497 43 24 L 43 47 C 43 47.56503 42.56503 48 42 48 L 8 48 C 7.4349698 48 7 47.56503 7 47 L 7 24 C 7 23.43497 7.4349698 23 8 23 z M 13 34 A 2 2 0 0 0 11 36 A 2 2 0 0 0 13 38 A 2 2 0 0 0 15 36 A 2 2 0 0 0 13 34 z M 21 34 A 2 2 0 0 0 19 36 A 2 2 0 0 0 21 38 A 2 2 0 0 0 23 36 A 2 2 0 0 0 21 34 z M 29 34 A 2 2 0 0 0 27 36 A 2 2 0 0 0 29 38 A 2 2 0 0 0 31 36 A 2 2 0 0 0 29 34 z M 37 34 A 2 2 0 0 0 35 36 A 2 2 0 0 0 37 38 A 2 2 0 0 0 39 36 A 2 2 0 0 0 37 34 z"></path>
          </svg></i>
            <i class="uil uil-eye-slash showHidePw"><svg width="35px" height="25px" xmlns="http://www.w3.org/2000/svg"fill="#fff" fill-rule="evenodd" clip-rule="evenodd"><path d="M8.137 15.147c-.71-.857-1.146-1.947-1.146-3.147 0-2.76 2.241-5 5-5 1.201 0 2.291.435 3.148 1.145l1.897-1.897c-1.441-.738-3.122-1.248-5.035-1.248-6.115 0-10.025 5.355-10.842 6.584.529.834 2.379 3.527 5.113 5.428l1.865-1.865zm6.294-6.294c-.673-.53-1.515-.853-2.44-.853-2.207 0-4 1.792-4 4 0 .923.324 1.765.854 2.439l5.586-5.586zm7.56-6.146l-19.292 19.293-.708-.707 3.548-3.548c-2.298-1.612-4.234-3.885-5.548-6.169 2.418-4.103 6.943-7.576 12.01-7.576 2.065 0 4.021.566 5.782 1.501l3.501-3.501.707.707zm-2.465 3.879l-.734.734c2.236 1.619 3.628 3.604 4.061 4.274-.739 1.303-4.546 7.406-10.852 7.406-1.425 0-2.749-.368-3.951-.938l-.748.748c1.475.742 3.057 1.19 4.699 1.19 5.274 0 9.758-4.006 11.999-8.436-1.087-1.891-2.63-3.637-4.474-4.978zm-3.535 5.414c0-.554-.113-1.082-.317-1.562l.734-.734c.361.69.583 1.464.583 2.296 0 2.759-2.24 5-5 5-.832 0-1.604-.223-2.295-.583l.734-.735c.48.204 1.007.318 1.561.318 2.208 0 4-1.792 4-4z"/></svg></i>
        </div>

        <div class="checkbox-text">
            <div class="checkbox-content">
                <input type="checkbox" id="termCon" required>
                <label for="termCon" class="text">I accept all terms and conditions</label>
            </div>
        </div>
        <button type="submit" class="button-style1 input-field">Signup</button>
        <div class="error" id="errorMessage"></div>
    </form>



    <div class="login-signup">
        <span class="text">Already a member?
            <a href="#" class="text login-link">Login Now</a>
        </span>
    </div>
</div>
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

<script src='./login.js'></script>
</body>
</html>