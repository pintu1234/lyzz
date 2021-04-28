
</div>
<!-- Footer -->
<footer class="full-width">
    <div class="full-width links-map">
        <div class="container">
            <div>
                <img src="{{ asset('images/Logo-white.png') }}" width="80" />
                <p class="full-width">Unadulterated, Unpretentious, Unbothered, Unapologetic, Whatever Comes to mind, Uncensored, all me. It's Whatever, Lyzz</p>
            </div>
            <div>
                <h2 class="full-width title2"><span>QUICK LINKS</span></h2>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('blog.list') }}">Blog</a></li>
                    <li><a href="{{ route('blog.contactus') }}">Contact</a></li>
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
                <img src="{{ asset('images/img.png') }}" class="full-width" style="max-width: 275px;margin-bottom: 5px;" />
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

<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.bxslider.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

@stack('scripts')
</body>
</html>