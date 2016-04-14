<?php include_once("header.php")?>
<?php
    $menuID = (isset($_GET['menuID'])) ? $_GET['menuID'] : '';
    $connMenuID = $database->getConnection();
?>
    <!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <?php if(isset($menuID)):?>
                    <?= $menuID; ?>
                <?php else:?>
                    <div class="row">
                        <div class="col-md-8 my_margin-bottom">
                            <!-- Posts
                        ============================================= -->
                            <div id="posts">

                                <div class="entry clearfix">
                                    <div class="entry-image">
                                        <a href="images/portfolio/full/17.jpg" data-lightbox="image"><img class="image_fade" src="images/blog/standard/17.jpg" alt="Standard Post with Image"></a>
                                    </div>
                                    <div class="entry-title">
                                        <h2><a href="blog-single.html">This is a Standard post with a Preview Image</a></h2>
                                    </div>
                                    <ul class="entry-meta clearfix">
                                        <li><i class="icon-calendar3"></i> 10th February 2014</li>
                                        <li><a href="#"><i class="icon-user"></i> admin</a></li>
                                    </ul>
                                    <div class="entry-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, asperiores quod est tenetur in. Eligendi, deserunt, blanditiis est quisquam doloribus voluptate id aperiam ea ipsum magni aut perspiciatis rem voluptatibus officia eos rerum deleniti quae nihil facilis repellat atque vitae voluptatem libero at eveniet veritatis ab facere.</p>
                                        <a href="blog-single.html"class="more-link">Read More</a>
                                    </div>
                                </div>

                                <div class="entry clearfix">
                                    <div class="entry-image">
                                        <a href="images/portfolio/full/21.jpg" data-lightbox="image"><img class="image_fade" src="images/blog/standard/10.jpg" alt="Standard Post with Image"></a>
                                    </div>
                                    <div class="entry-title">
                                        <h2><a href="blog-single.html">This is a Standard post with a Preview Image</a></h2>
                                    </div>
                                    <ul class="entry-meta clearfix">
                                        <li><i class="icon-calendar3"></i> 10th February 2014</li>
                                        <li><a href="#"><i class="icon-user"></i> admin</a></li>
                                    </ul>
                                    <div class="entry-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, asperiores quod est tenetur in. Eligendi, deserunt, blanditiis est quisquam doloribus voluptate id aperiam ea ipsum magni aut perspiciatis rem voluptatibus officia eos rerum deleniti quae nihil facilis repellat atque vitae voluptatem libero at eveniet veritatis ab facere.</p>
                                        <a href="blog-single.html"class="more-link">Read More</a>
                                    </div>
                                </div>

                                <div class="entry clearfix">
                                    <div class="entry-image">
                                        <a href="images/blog/standard/12.jpg" data-lightbox="image"><img class="image_fade" src="images/blog/standard/22.jpg" alt="Standard Post with Image"></a>
                                    </div>
                                    <div class="entry-title">
                                        <h2><a href="blog-single.html">This is a Standard post with a Preview Image</a></h2>
                                    </div>
                                    <ul class="entry-meta clearfix">
                                        <li><i class="icon-calendar3"></i> 10th February 2014</li>
                                        <li><a href="#"><i class="icon-user"></i> admin</a></li>
                                    </ul>
                                    <div class="entry-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, asperiores quod est tenetur in. Eligendi, deserunt, blanditiis est quisquam doloribus voluptate id aperiam ea ipsum magni aut perspiciatis rem voluptatibus officia eos rerum deleniti quae nihil facilis repellat atque vitae voluptatem libero at eveniet veritatis ab facere.</p>
                                        <a href="blog-single.html"class="more-link">Read More</a>
                                    </div>
                                </div>

                            </div><!-- #posts end -->

                            <!-- Pagination
              ============================================= -->
                            <ul class="pager nomargin">
                                <!--                            <li class="previous"><a href="#">&larr; Older</a></li>-->
                                <li class="next"><a href="#">See More &rarr;</a></li>
                            </ul><!-- .pager end -->
                        </div> <!-- end of class col-md-9 -->

                        <div class="col-md-4">
                            <div class="form-group">
                                <div id="api"></div>
                            </div>
                            <div class="form-group my_side_bar">
                                <h3 class="my_side_bar_title">Exchange Rate</h3>
                                <p style="text-align: center;margin-bottom: 10px;">
                                    Exchange Rate in Khmer Riel <br>
                                    March 29, 2016  9:45 am
                                </p>
                                <table class="table table-bordered">
                                    <tr style="background: white;color: black;">
                                        <th>Currency</th>
                                        <th>Bid</th>
                                        <th>Ask</th>
                                    </tr>

                                    <tr>
                                        <td>USD</td>
                                        <td>4,000.00</td>
                                        <td>4,013.00</td>
                                    </tr>

                                    <tr>
                                        <td>THB</td>
                                        <td>113.00</td>
                                        <td>113.90</td>
                                    </tr>

                                    <tr>
                                        <td>EUR</td>
                                        <td>4,428.00</td>
                                        <td>4,534.69</td>
                                    </tr>
                                </table>
                            </div> <!--end of side bar 1-->

                            <!--Apply for your loan now-->
                            <div class="form-group my_side_bar">
                                <h3 class="my_side_bar_title">Apply for Your Loan Now!</h3>
                                <div class="form-group">
                                    <img src="images/index_loan.jpg" alt="">
                                </div>
                                <p style="text-align: center;margin-bottom: 5px;">Financial solutions for your business!</p>
                                <p style="text-align: center; margin-bottom: 0;">
                                    MJQPF Bank is a reliable source to support your business growth and personal need. Please contact us for more information and click here for our Loan Calculator.
                                </p>
                            </div>
                            <!--end of apply for your loan now-->

                            <!--annual report-->
                            <div class="form-group my_side_bar">
                                <h3 class="my_side_bar_title">Annual Report 2016</h3>
                                <div class="form-group">
                                    <img src="" alt="Annual Report Picture">
                                </div>
                                <p style="text-align: center">Above is our latest Annual Report, please click here to download this report and other previous years.</p>
                            </div>
                            <!--end of annual report-->

                            <div class="form-group my_side_bar">
                                <h3 class="my_side_bar_title">Call Center (24/7)</h3>
                                <div class="form-group">
                                    <p style="text-align: center; margin-bottom: 5px;">Any comment or inquiry?</p>
                                    <p style="text-align: center; margin-bottom: 5px;"><i class="fa fa-phone-square"></i> +855 (0)23 223 295</p>
                                    <p style="text-align: center; margin-bottom: 5px"><i class="fa fa-phone-square"></i> +855 (0)11 388 868</p>
                                    <p style="text-align: center; margin-bottom: 0;"><i class="fa fa-envelope-o"></i> info@mjqeducation.edu.kh</p>
                                </div>
                            </div>
                        </div> <!--end of class col-md-3 -->
                    </div> <!--end of class row-->
                <?php endif;?>
            </div> <!-- end of class container clearfix-->
        </div> <!-- end of class content-wrap-->
    </section><!-- #content end -->

<?php include_once("footer.php");?>