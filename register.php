<?php include("./phpIncludes/custom/register.php")?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Bit2Naira</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/custom/register.css">

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="icon" href="favicon.png" type="image/x-icon">

</head>


<body id="top">

    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader" class="dots-jump">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>


    <!-- header
    ================================================== -->
    <!-- end s-header -->
    <section id="home" class="s-home page-hero target-section" data-parallax="scroll" data-image-src="images/vb.jpg"
        data-natural-width=3000 data-natural-height=2000 data-position-y=center>

        <div class="shadow-overlay"></div>

        <div class="home-content">

            <div class="row home-content__main">

                <h1><span style="color:green">
                        Bit2Naira </span><br>
                    Easy Way to trade your <br>
                    Bitcoins and Gift Cards
                </h1>
                <hr>

                <!-- end home-content__main -->



    </section>
    <section class="s-about target-section">

        <div class="row" id="Register_Form">
            <div class="col-six tab-full">
                <div class="<?php echo $completionStyle?>">Your sign up was succesful. <a href="./index.php#login">Proceed</a> to login</div>
                <h3><span style="color:green">Bit2Naira</span> | Join</h3>
                <form method="post" action="register.php#Register_Form">
                    <div>
                        <label for="name">Name<span class="Register_Error" id="usernameErr"><?php echo $errUsername ?></span></label>
                        <input class="<?php echo $usernameBorder;?>" id="inputName" type="text" placeholder="Your Name" name="username" value="<?php echo $usernameVal;?>" required>
                        
                    </div>
                    <div>
                        <label for="password">Email<span class="Register_Error" id="emailErr"><?php echo $errEmail ?></span></label>
                        <input class="<?php echo $emailBorder;?>" id="inputEmail" type="email" placeholder="Your Email" name="email" value="<?php echo $emailVal;?>" required />
                        
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input class="full-width" type="password" placeholder="Your password" name="password" required />
                    </div>
                    <div>
                        <label for="password">Confirm Password <span class="Register_Error" id="passowrdErr"> <?php echo $passwordMismatch ?></span></label>
                        <input class="<?php echo $passwordBorder;?>" id="inputPassword" type="password" placeholder="Confirm password" name="Cpassword"
                            required />
                            
                    </div>
                    <button class="btn--primary full-width" type="submit" id="insert" name="submit">Sign Up</button>

                </form>


            </div>
        </div>
        <hr>
        <!-- end about-process -->

    </section>
    <!-- end s-about -->

    <footer>
        <div class="row">
            <div class="col-full cl-copyright">
                <span>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> Bit2Naira
            </div>
        </div>

        <div class="cl-go-top">
            <a class="smoothscroll" title="Back to Top" href="#top"></a>
        </div>
    </footer>


    <!-- photoswipe background
    ================================================== -->
    <div aria-hidden="true" class="pswp" role="dialog" tabindex="-1">

        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">

            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <button class="pswp__button pswp__button--share" title="Share"></button> <button class="pswp__button pswp__button--fs"
                        title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>

        </div>

    </div><!-- end photoSwipe background -->


    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="js/custom/register.js"></script>

</body>

</html>