 <!-- PARTNERS -->
 <div id="sns_partners" class="wrap">
                <div class="container">
                    <div class="slider-wrap">
                        <div class="partners_slider_in">
                            <div id="partners_slider1" class="our_partners owl-carousel owl-theme owl-loaded" style="display: inline-block">
                                <?php
                                $galerias = new Clases\Galerias();
                                $imgsFooter = new Clases\Imagenes();
                                $galeriasData = $galerias->list('');
                                foreach ($galeriasData as $gal) {
                                    $imgsFooter->set("codigo",$gal['cod']);
                                    $imgFooter = $imgsFooter->view();    
                                ?>
                                    <div class="item">
                                        <a class="banner11" href="#" target="_blank">
                                            <img alt="" src="<?=URL. '/' . $imgFooter['ruta'] ?>">
                                        </a>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- AND PARTNERS -->

           <!-- FOOTER -->
            <div id="sns_footer" class="footer_style vesion2 wrap">
                <div id="sns_footer_top" class="footer">
                    <div class="container">
                        <div class="container_in">
                            <div class="row">
                                <div class="col-md-3 col-sm-12 col-xs-12 column0">
                                    <div class="contact_us">
                                        <h6>Contact us</h6>
                                        <ul class="fa-ul">
                                            <li class="pd-right">
                                                <i class="fa-li fa fw fa-home"> </i>
                                                8888 South Avenue Street, New York
                                            </li>
                                            <li>
                                                <i class="fa-li fa fw fa-phone"> </i>
                                                <p>(12) 3 456 7896</p>
                                                <p>(12) 3 456 7895</p>
                                            </li>
                                            <li>
                                                <i class="fa-li fa fw fa-envelope"> </i>
                                                <p>
                                                    <a href="mailto:info@yourdomain.com">info@yourdomain.com</a>
                                                </p>
                                                <p>
                                                    <a href="mailto:info@yourdomain.com">info@yourdomain.com</a>
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-phone-12 col-xs-6 col-sm-3 col-md-2 column column1">
                                    <h6>Service</h6>
                                    <ul>
                                        <li>
                                            <a href="#">rices & Currencies</a>
                                        </li>
                                        <li>
                                            <a href="#">Secure Payment</a>
                                        </li>
                                        <li>
                                            <a href="#">Delivery Times & Costs</a>
                                        </li>
                                        <li>
                                            <a href="#">Returns & Exchanges</a>
                                        </li>
                                        <li>
                                            <a href="#">FAQ's</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-phone-12 col-xs-6 col-sm-3 col-md-2 column column2">
                                    <h6>account</h6>
                                    <ul>
                                        <li>
                                            <a href="#">My account</a>
                                        </li>
                                        <li>
                                            <a href="#">Wishlist</a>
                                        </li>
                                        <li>
                                            <a href="#">Order history</a>
                                        </li>
                                        <li>
                                            <a href="#">Specials</a>
                                        </li>
                                        <li>
                                            <a href="#">Gift vouchers</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-phone-12 col-xs-6 col-sm-3 col-md-2 column column3">
                                    <h6>information</h6>
                                    <ul>
                                        <li>
                                            <a href="#">My account</a>
                                        </li>
                                        <li>
                                            <a href="#">Wishlist</a>
                                        </li>
                                        <li>
                                            <a href="#">Order history</a>
                                        </li>
                                        <li>
                                            <a href="#">Specials</a>
                                        </li>
                                        <li>
                                            <a href="#">Gift vouchers</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-phone-12 col-xs-6 col-sm-3 col-md-3 column column4">
                                    <div class="subcribe-footer">
                                        <div class="block_border block-subscribe">
                                            <div class="block_head">
                                                <h6>Newsletter</h6>
                                                <p>Register your email for news</p>
                                            </div>
                                            <form id="newsletter-validate-detail">
                                                <div class="block_content">
                                                    <div class="input-box">
                                                        <div class="input_warp">
                                                            <input id="newsletter" class="input-text required-entry validate-email" type="text" title="Sign up for our newsletter" placeholder="Your email here" name="email">
                                                        </div>
                                                        <div class="button_warp">
                                                            <button class="button gfont" title="Subcribe" type="submit">
                                                                <span>
                                                                    <span>Subscribe</span>
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="sns_footer_bottom" class="footer">
                    <div class="container">
                        <div class="row">
                            <div class="bottom-pd1 col-sm-6">
                                <div class="sns-copyright">
                                    © 2015 Magento Demo Store. All Rights Reserved. Developer by
                                    <a title="" data-original-title="Visit SNSTheme.Com!" data-toggle="tooltip" href="http://www.snstheme.com/">SNSTheme.Com</a>
                                </div>
                            </div>
                            <div class="bottom-pd2 col-sm-6">
                                <div class="payment">
                                    <img src="<?=URL?>/assets/images/sns_paymal.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- AND FOOTER -->