<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
			

	<!-- Footer -->
<footer class="full-width">
    <div class="full-width links-map">
        <div class="container">
            <div>
                <img src="http://127.0.0.1:8000/images/Logo-white.png" width="80" />
                <p class="full-width">Unadulterated, Unpretentious, Unbothered, Unapologetic, Whatever Comes to mind, Uncensored, all me. It's Whatever, Lyzz</p>
            </div>
            <div>
                <h2 class="full-width title2"><span>QUICK LINKS</span></h2>
                <ul>
                    <li><a href="http://127.0.0.1:8000">Home</a></li>
                    <li><a href="http://127.0.0.1:8000/blogs">Blog</a></li>
                    <li><a href="http://127.0.0.1:8000/contact-us">Contact</a></li>
                </ul>
            </div>
            <div>
                <h2 class="full-width title2"><span>CONTACT INFO</span></h2>
                <div class="full-width address">
              		<p><strong>Phone:</strong><br>In Your Hands or Back Pocket I Suppose</p>
                    <p><strong>Address:</strong><br /> Somewhere in My Mind</p>
                    <p><strong>Email :</strong><br /><a href="mailto:Lyzz@WhateverLyzz.com">Lyzz@WhateverLyzz.com</a></p>
                </div>
            </div>
            <div class="flex_p">
                <img src="http://127.0.0.1:8000/images/img.png" class="full-width" style="max-width: 275px;margin-bottom: 5px;" />
				<p style="font-size:12px;padding:0!important;">(we don't own the rights to this image)</p>
            </div>
        </div>
    </div>
    <div class="copyright">© Copyright 2020 Whatever Lyzz.</div>
    <div class="social-icons w_100">
        <a href=""><i class="icon-facebook" target="_blank"></i></a>
        <a href="https://www.linkedin.com/company/whateverlyzz" target="_blank"><i class="icon-linkedin"></i></a>
        <a href="https://twitter.com/WhateverLyzz" target="_blank"><i class="icon-twitter"></i></a>
		<a href="https://www.instagram.com/whateverlyzz/" target="_blank"><i class="icon-instagram"></i></a>
    </div>
</footer>

<script type="text/javascript" src="http://127.0.0.1:8000/js/jquery.min.js"></script>
<script type="text/javascript" src="http://127.0.0.1:8000/js/jquery.bxslider.js"></script>
<script type="text/javascript" src="http://127.0.0.1:8000/js/script.js"></script>

    <script type="text/javascript" src="http://127.0.0.1:8000/js/blog.js"></script>
    <script>
        $(document).ready(function() {

            var list_length = $('#blog-pages-container > div');
            var index_no;
            var tot_length = list_length.length - 1;

            for (i = 0; i < list_length.length; i++) {
                $('#pageNumbers').append("<a>" + (i + 1) + "</a>");
            }

            $('#pageNumbers a:first-child').addClass('selected');

            function check_prev(index_no) {
                if (index_no == 0) {
                    $('#prev-btn').attr('disabled', 'disabled');
                } else {
                    $('#prev-btn').removeAttr('disabled');
                }
            };

            function check_next(index_no) {
                if (index_no == tot_length) {
                    $('#next-btn').attr('disabled', 'disabled');
                } else {
                    $('#next-btn').removeAttr('disabled');
                }
            };

            $('.blog-pagination-controls a').click(function() {
                $('.blog-pagination-controls a').removeClass('selected');
                $(this).addClass('selected');
                var num = $(this).text() - 1;
                $('#blog-pages-container > div').removeClass('current');
                $('#blog-pages-container > div').eq(num).addClass('current');
                var index_no = $('#blog-pages-container  > div.current').index();
                check_prev(index_no);
                check_next(index_no);
            });

            $('#prev-btn').click(function() {

                /* Change page*/
                var currentPage = $('#blog-pages-container  > div.current');
                $('#blog-pages-container > div').removeClass('current');
                $(currentPage).prev().addClass('current');
                var index_no = $('#blog-pages-container > div.current').index();

                /* Change Number*/
                var currentNum = $('.blog-pagination-controls a.selected');
                $('.blog-pagination-controls a').removeClass('selected');
                $(currentNum).prev().addClass('selected');

                setTimeout(function(){
                    $('html, body').animate({ scrollTop: 0 },1200);
                },200);

                check_prev(index_no);
                check_next(index_no);
            });

            $('#next-btn').click(function() {

                /* Change page*/
                var currentPage = $('#blog-pages-container > div.current');
                $('#blog-pages-container > div').removeClass('current');
                $(currentPage).next().addClass('current');
                var index_no = $('#blog-pages-container > div.current').index();

                /* Change Number*/
                var currentNum = $('.blog-pagination-controls a.selected');
                $('.blog-pagination-controls a').removeClass('selected');
                $(currentNum).next().addClass('selected');

                setTimeout(function(){
                    $('html, body').animate({ scrollTop: 0 },1200);
                },200);

                check_next(index_no);
                check_prev(index_no);
            });

        });

    </script>

<?php wp_footer(); ?>

</body>
</html>
