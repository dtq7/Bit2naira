<?php include("./phpIncludes/custom/user-center.php")?>
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
    <link rel="stylesheet" href="css/custom/user-center.css">

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

       

        <div class="row">
            <div class="col-six tab-full" id="Details_Information">
                <h3>Account Information</h3>
                <ul>
                    <li>EMAIL :
                        <?php echo $email ?>
                    </li>
                    <li>USERNAME :
                        <?php echo $currentUser?>
                    </li>
                    <li>BITCOIN WALLET ADDRESS :
                        <?php echo $bitcoinWalletAddress?>
                    </li>
                    <li>BANK NAME :
                        <?php echo $bankName?>
                    </li>
                    <li>BANK ACCOUNT NUMBER :
                        <?php echo $bankAccountNumber?>
                    </li>
                    <li>BANK ACCOUNT NAME :
                        <?php echo $bankAccountName?>
                    </li>
                    <li>BIT2NAIRA ACCOUNT NUMBER :
                        <?php echo $bit2NairaAccountNumber?>
                    </li>
                    <li>BIT2NAIRA ACCOUNT BALANCE :
                        <?php echo $bit2NairaAccountBalance?> Naira
                    </li>
                </ul>



            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-six tab-full">
                <h3>Complete User Information <span id="<?php echo $spanID?>" class="spanErr"><?php echo $spanData?></span></h3>
                <form action="user-center.php" method="post">
                    <div>
                        <label for="sampleRecipientInput">Select a Bank</label>
                        <div class="cl-custom-select">
                            <select class="full-width" name="inputBankName">
                                <option value="<?php echo $bankName?>" disabled selected style="display:none"><?php echo $bankName?></option>
                                <option value="Access Bank">Access Bank</option>
                                <option value="Citibank">Citibank</option>
                                <option value="Diamond">Diamond</option>
                                <option value="Ecobank">Ecobank</option>
                                <option value="Fidelity">Fidelity</option>
                                <option value="FirstBank">FirstBank</option>
                                <option value="First city monument">First city monument</option>
                                <option value="GTB">GTB</option>
                                <option value="Heritage Bank">Heritage Bank</option>
                                <option value="Keystone Bank">Keystone Bank</option>
                                <option value="Polaris Bank">Polaris Bank</option>
                                <option value="Providus Bank">Providus Bank</option>
                                <option value="Stanbic IBTC">Stanbic IBTC</option>
                                <option value="Standard Chatered Bank">Standard Chatered Bank</option>
                                <option value="Sterling Bank">Sterling Bank</option>
                                <option value="Skye">Skye</option>
                                <option value="Suntrust Bank">Suntrust Bank</option>
                                <option value="UBA">UBA</option>
                                <option value="Union Bank">Union Bank</option>
                                <option value="United Bank of Africa">United Bank of Africa</option>
                                <option value="Unity Bank">Unity Bank</option>
                                <option value="Wema Bank">Wema Bank</option>
                                <option value="Zenith Bank">Zenith Bank</option>
                            </select>
                        </div>

                        <label for="exampleMessage">Bank Account Name</label>
                        <input class="full-width" value=" <?php echo $bankAccountName?>" type="text" name="inputBankAccountName" placeholder="Bank Account Name"  />

                        <label for="exampleMessage">Bank Account Number</label>
                        <input class="full-width" value="<?php echo $bankAccountNumber?>" type="text" name="inputBankAccountNumber" placeholder="Bank Account Number" />

                        <label for="exampleMessage">Bitcoin Wallet Address</label>
                        <input class="full-width" value="<?php echo $bitcoinWalletAddress?>" type="text" name="inputBitcoinWalletAddress" placeholder="Bitcoin Wallet Address"  />


                        <button class="btn--primary full-width" type="submit" name="submit">Update Information</button>

                    </div>

                </form>


            </div>
        </div>
        <hr>
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
    <script src="js/custom/user-center.js"></script>

</body>

</html>