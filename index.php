<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Inventory System | www.hakkoblogs.com</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<br/><br/><br/><br/><br/><br/>
<div class="container">
    <section id="content">
    <p class="login-box-msg" style="color : red; font-weight: bold;"><?php if (isset($_GET['error'])) {echo 
                  "
                  $_GET[error]
                  ";} else { echo "";} ?></p>
        <form action="proseslogin.php" method="post">
            <h1>Inventory App</h1>
            <div>
                <input type="text" name="username" id="username" placeholder="Username" required="" id="username" autocomplete="off" />
            </div>
            <div>
                <input type="password" name="password" id="password" placeholder="Password" required="" id="password" autocomplete="off" />
            </div>
            <div>
                <input type="submit" value="Log in" />
                <a href="https://www.hakkoblogs.com" style="text-decoration: none;"> www.hakkoblogs.com &copy; 2021</a>
            </div>
        </form><!-- form -->
        
    </section><!-- content -->
</div><!-- container -->
</body>
</html>