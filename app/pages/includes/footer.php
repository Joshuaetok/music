<style>
  /* ============================== FOOTER ====== */
  footer {
    background: var(--color-gray-900);
    padding: 2rem 0;
    box-shadow: inset 0 0.5rem 0.5rem rgba(0, 0, 0, 0.2);
  }

  .footer__socials {
    margin-inline: auto;
    width: fit-content;
    margin-bottom: 2rem;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 1rem;
  }

  .footer__socials a {
    background: var(--color-bg);
    border-radius: 50%;
    width: 2rem;
    height: 2rem;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.3s ease-in-out, color 0.3s ease-in-out;
  }

  .footer__socials a:hover {
    background: var(--color-white);
    color: var(--color-bg);
  }

  .footer__container {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1rem;
  }

  footer h4 {
    color: var(--color-white);
    margin-bottom: 0.6rem;
  }

  footer ul li {
    padding: 0.4rem 0;
    list-style: none;
  }

  footer ul a {
    opacity: 0.75;
    text-decoration: none;
    color: var(--color-white);
    transition: letter-spacing 0.2s ease-in-out, opacity 0.3s ease-in-out;
  }

  footer ul a:hover {
    letter-spacing: 0.1rem;
    opacity: 1;
  }

  .footer__copyright {
    text-align: center;
    padding: 1rem 0;
    border-top: 2px solid var(--color-bg);
    margin-top: 2rem;
    color: var(--color-white);
  }
</style>


    <footer>
     <div class="footer__socials">
      <a href="https://www.youtube.com/@ajalaafrica" target="blank"><i class="uil uil-youtube"></i></a>
      <a href="https://m.facebook.com/AjalaHighlife01" target="blank"><i class="uil uil-facebook-f"></i></a>
      <a href="https://www.instagram.com/ajalaafrica/" target="blank"><i class="uil uil-instagram-alt"></i></a>
      <a href="https://www.tiktok.com/@ajalaafrica" target="blank"><i class="fa-brands fa-tiktok"></i></a>
      <a href="https://twitter.com/ajala_africa/" target="blank"><i class="fa-brands fa-x-twitter"></i></a>
    </div>

    <div class="footer__copyright">
      <small>Copyright &copy; <?= date("Y") ?> AJALA AFRICA</small>  
    </div>
    </footer>
  
</body>

<script src="<?=ROOT?>/assets/js/index.js?35"></script>

<script src="<?=ROOT?>/assets/js/menu-popper.js?35"></script>
	
		<!-- Latest jQuery -->

			<script src="<?=ROOT?>/assets/js/jquery.js"></script>

		<!-- Latest compiled and minified Bootstrap -->
			<script src="<?=ROOT?>/assets/js/bootstrap.min.js"></script>
		<!-- Latest compiled and easing -->	
			<script src="<?=ROOT?>/assets/js/jquery.easing.1.3.min.js"></script>		
		<!-- Latest Modernizr -->	
			<script src="<?=ROOT?>/assets/js/modernizr-2.8.3.min.js"></script>
		<!-- Latest Modernizr -->	
			<script src="<?=ROOT?>/assets/js/jquery.stellar.min.js"></script>
		<!-- Isotope min js -->
			<script src="<?=ROOT?>/assets/js/isotope.pkgd.min.js"></script>
		<!-- Owl-carousel min js  -->
			<script src="<?=ROOT?>/assets/js/owl.carousel.min.js"></script>
		<!-- Lightbox min js  -->
			<script src="<?=ROOT?>/assets/js/lightbox.min.js"></script>
		<!-- Jquery inview js -->
			<script src="<?=ROOT?>/assets/js/jquery.inview.min.js"></script>
		<!-- scrolltopcontrol js -->
			<script src="<?=ROOT?>/assets/js/scrolltopcontrol.js"></script>
		<!-- WOW - Reveal Animations When You Scroll -->
			<script src="<?=ROOT?>/assets/js/wow.min.js"></script>
		<!-- Main js -->
			<script src="<?=ROOT?>/assets/js/mains.js"></script>
    <script src="<?=ROOT?>/assets/js/main.js"></script>
</html>