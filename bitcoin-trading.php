<?php include("./phpIncludes/custom/bitcoin-trading.php")?>
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
    <link rel="stylesheet" href="css/custom/bitcoin-trading.css">

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
    <?php include ('include/header.php');?>
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

                <div class="row">
                    <div class="home-content__button">
                        <div class="col-xs-6 col-xs-push-6">
                            <a href="#bitcoin-deposit"><button class="btn btn-animatedbg">Bitcoin Deposit</button></a>
                        </div>
                    </div>

                    <div class="home-content__button">
                        <div class="col-xs-6 col-xs-push-6">
                            <a href="#bitcoin-exchange"><button class="btn btn-animatedbg">Bitcoin Exchange</button></a>
                        </div>
                    </div>
                    <ul class="home-social">
                        <li>
                            <a href="#0"><i class="fab fa-facebook-f" aria-hidden="true"></i><span>Facebook</span></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-twitter" aria-hidden="true"></i><span>Twiiter</span></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-instagram" aria-hidden="true"></i><span>Instagram</span></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-behance" aria-hidden="true"></i><span>Behance</span></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-dribbble" aria-hidden="true"></i><span>Dribbble</span></a>
                        </li>
                    </ul>
                </div>


                <!-- end home-content__main -->



    </section>
    <section id="bitcoin-deposit" class="s-about target-section">

        <div class="row section-header" data-aos="fade-up">
            <div class="col-full">
                <img src="images/icon.png" alt="image" /><br><br><br>
                <h3 class="subhead text-center">THINGS YOU NEED TO KNOW </h3><Br>

                <p class="">
                    1. Deposit BTC: to our <span style="Color:green">Bit2Naira Wallet</span>
                </p>
                <p>
                    2. Sell BTC; You can sell BTC at any time you feel rate is good
                </p>
                <p>
                    3. BTC/USD rate is averaged by BITMEX,BITFINEX, BITSTAMP , BLOCKCHAIN
                </p>
                <hr>

            </div>
        </div>

        <div class="row">
            <div class="col-twelve tab-full">
                <h3 style="text-align:center">SELL BITCOIN <span id="errorMessage"></span> <img src="./images/spinner.gif" class="preloader" alt=""> </h3>
                <form>
                    <div>
                        <label for="sampleInput">Total Amount Bitcoin</label>
                        <input class="full-width" type="text" placeholder="Total BTC Amount" id="inputBitcoinAmount" required>
                    </div>
                    <div>
                        <label for="sampleInput">Pay via Blockchain</label>
                        <input class="full-width" type="text" disabled value="1M8sCwgwRJgLrq3BX5tawMT9fxKbAjyJE2">
                    </div>
                    <div>
                        <label for="sampleInput">Pay via Paxful</label>
                        <input class="full-width" type="text" disabled value="3N5HPMBU3hDC9sFXypmyX7y2thMFJtThM7">
                    </div>
                    <div>
                        <label for="sampleInput">Transaction Id</label>
                        <input class="full-width" type="text" placeholder="Total BTC Amount" id="inputTransactionID" required/>
                    </div>
                    <div>
                        <label for="exampleMessage">User Remarks</label>
                        <input class="full-width" type="text" placeholder="Your remark/Optional" id="inputRemarks"/>
                    </div>

                    <button class="btn--primary full-width" id="sellButton">Submit</button>
                </form>
                <hr>
            <hr>
            </div>
        </div>
        
        <br>

        <div class="row" >
            <div class="col-twelve tab-full">
                <h3 style="text-align:center">PURCHASE BITCOIN <span id="<?php echo $spanID?>" class="spanErr"><?php echo $spanData?></span> <img src="./images/spinner.gif" class="preloader1" alt=""></h3>
                <form enctype="multipart/form-data" method="post" action="bitcoin-trading.php">
                    <div>
                        <label for="sampleInput">Total Amount in Naira</label>
                        <input class="full-width" type="text" placeholder="Total Naira Amount" name="inputNairaAmountP" id="inputNairaAmountPD" required/>
                    </div>
                    <div>
                        <label for="sampleInput">Proof of Payment</label>
                        <input class="full-width" type="file" name="inputPOP" id="inputPOPD" required/>
                    </div>
                    <div>
                        <label for="sampleInput">Total Amount in Bitcoin</label>
                        <input class="full-width" type="text" placeholder="Total BTC Amount" name="inputBitcoinAmountP" id="inputBitcoinAmountPD"  required/>
                    </div>
                    <div>
                        <label for="exampleMessage">User Remarks</label>
                        <input class="full-width" type="text" placeholder="Your remark/Optional" name="inputRemarksP" id="inputRemarksPD"/>
                    </div>

                    <button class="btn--primary full-width" name="submit" type="submit">Submit</button>

                </form>
                <hr>
            <hr>
            </div>
        </div>
        

       



        <!-- end about-process -->

    </section>
    <!-- end s-about -->
    <section id="bitcoin-exchange" class="s-about target-section">

        <div class="row section-header" data-aos="fade-up">
            <div class="col-full">
                <h3 class="subhead text-center">THINGS YOU NEED TO KNOW </h3>
                <p class="">
                    1. Deposit BTC: to our <span style="Color:green">Bit2Naira Wallet</span>
                </p>
                <p>
                    2. Sell BTC; You can sell BTC at any time you feel rate is good
                </p>
                <p>
                    3. BTC/USD rate is averaged by BITMEX,BITFINEX, BITSTAMP , BLOCKCHAIN
                </p>
                <hr>

            </div>
        </div>

        <div class="row">
            <div class="col-six tab-full">
                <h3 style="color:green">Bitcoin Exchange</h3>
                <h3>Bitcoin Sold</h3>
                <h4 class="text-center">Bitcoin Trading</h4>
                <table class="table color-table primary-table" id="ju">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Total Amount</th>
                            <th>Price(per 1 $)</th>

                        </tr>
                    </thead>
                    <tbody class="cer">
                        <tr>
                            <td>1</td>
                            <td>>=$10</td>
                            <td>150</td>

                        </tr>
                        <tr>
                            <td>2</td>
                            <td>>=$15</td>
                            <td>250</td>

                        </tr>
                        <tr>
                            <td>3</td>
                            <td>>=$25</td>
                            <td>350</td>

                        </tr>
                        <tr>
                            <td>4</td>
                            <td>>=$25</td>
                            <td>450</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>>=$50</td>
                            <td>550</td>
                        </tr>
                    </tbody>
                </table>
                
            </div>


        </div>
        </div>
        <!-- end about-process -->

    </section>
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
    <script src="js/custom/bitcoin-trading.js"></script>


</body>

</html>