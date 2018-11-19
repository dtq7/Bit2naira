<?php include("./phpIncludes/custom/wallet.php")?>
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
    <link rel="stylesheet" href="css/custom/wallet.css">
    
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
    <?php include ('include/header.php');?> <!-- end s-header -->
    <section id="home" class="s-home page-hero target-section" data-parallax="scroll" data-image-src="images/vb.jpg" data-natural-width=3000 data-natural-height=2000 data-position-y=center>

        <div class="shadow-overlay"></div>

        <div class="home-content">

            <div class="row home-content__main">

                <h1><span style="color:green">
                Bit2Naira </span><br>
                Easy Way to trade your <br>
                Bitcoins and Gift Cards
                </h1><hr>
            
                 <div class="row">
                    <div class="home-content__button">
                   <div class="col-xs-6 col-xs-push-6">
                    <a href="#cash-withdrawal"><button class="btn btn-animatedbg">Cash Withdrawal</button></a>
                  </div>
              </div>

                 
          </div>

                
<!-- end home-content__main -->


        
    </section> 
    <section id="cash-withdrawal" class="s-about target-section">
         
        <div class="row section-header" data-aos="fade-up">
            <div class="col-full">
                <img src="images/iconsd.png" alt="image"/><br><br>
                <p class="">
                1. The minimum amount withdraw is 2000 naira
                </p>
                <hr>
                
            </div>
        </div>

      

        <div class="row">
            <div class="col-six tab-full">
                <h3>Cash Balance</h3>
                <form>
                    <div>
                            <label for="exampleMessage">Cash withdrawal <span id="errorMessage"></span> <img src="./images/spinner.gif" class="preloader" alt=""></label>
                            <input class="full-width" type="text" placeholder="input the amount you want to withdraw" id="inputAmount"/>
                            <button class="btn--primary full-width" id="withdrawButton">Withdraw</button>

                    </div>

                </form>

                
            </div>
            </div> <hr>                   
                                  <!-- end about-process -->

    </section>
     <!-- end s-about -->
    <section id="bank-account" class="s-about target-section">
         
        <div class="row section-header" data-aos="fade-up">
            <div class="col-full">
                <h3 class="subhead text-center">THINGS YOU NEED TO KNOW </h3><Br>
                <p class="">
                1. The minimum amount withdraw is 2000 naira
                </p>
                <hr>
                
            </div>
        </div>

                    
                                  <!-- end about-process -->

    </section>
    <footer>
        <div class="row">
            <div class="col-full cl-copyright">
                <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Bit2Naira
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
                    <div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title=
                    "Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title=
                    "Zoom in/out"></button>
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
                </div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> <button class="pswp__button pswp__button--arrow--right" title=
                "Next (arrow right)"></button>
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
    <script src="js/custom/wallet.js"></script>
    
</body>
</html>