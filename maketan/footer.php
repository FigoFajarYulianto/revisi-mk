<!-- footer -->
<link rel="stylesheet" href="style_footer.css">
<link rel="stylesheet" href="style_detail.css">
<?php include 'sendemail.php'; ?>
  <div class="footer">
    <div class="footer-content">

      <div class="footer-section about">
        <h1 class="logo-text"><span>MAKE</span>TAN</h1>
        <p>
            Web Maketan merupakan web alternatif untuk para petani dan orang-orang yang ingin membeli
            sebuah produk yang dibutuhkan. dimana di Web Maketan meyediakan sebuah produk 
            seperti hasil pertanian, obat-obatan untuk tanaman pertanian, alat pertanian, dan benih cikal bakal 
            tanaman pertanian.

        </p>
        <div class="contact">
          <span><i class="fas fa-envelope"></i> &nbsp; devanferdiansyah22@gmail.com</span>
        </div>
        <div class="socials">
          <a href="https://www.facebook.com/rajih.kharissuha/"><i class="fab fa-facebook"></i></a>
          <a href="https://www.instagram.com/figo_fajar_y/?hl=en"><i class="fab fa-instagram"></i></a>
          <a href="https://twitter.com/Rifqi_RE?s=08"><i class="fab fa-twitter"></i></a>
          <a href="https://youtube.com/channel/UCQGuoMsmuyCEyhrLQTS12XQ"><i class="fab fa-youtube"></i></a>
        </div>
      </div>

      <div class="footer-section links">
        <h2>Hubungi Kami</h2>
        <br>
        <ul>
          <a href="https://bit.ly/3ooyooh">
            <li style="font-size: 15px;"><i class="fas fa-phone"></i> Figo : 081331562302</li>
          </a>
          <a href="https://bit.ly/2Xm0gxw">
            <li style="font-size: 15px;"><i class="fas fa-phone"></i> Rosyid : 087761675825</li>
          </a>
          <a href="https://bit.ly/3bnRwiI">
            <li style="font-size: 15px;"><i class="fas fa-phone"></i> Rajih : 082339584778</li>
          </a>
          <a href="https://bit.ly/2K4kb0Y">
            <li style="font-size: 15px;"><i class="fas fa-phone"></i> Ica : 082233066740</li>
          </a>
          <a href="https://bit.ly/35qzkkx">
            <li style="font-size: 15px;"><i class="fas fa-phone"></i> Devan : 081216096820</li>
          </a>
        </ul>
      </div>
      
      
      <div class="footer-section contact-form">
        <h2>KOMENTAR</h2>
        <?php echo $alert; ?>
        <br>
        <form class="contact" action="" method="post">
          <input type="text" name="name" class="text-box contact-input" placeholder="name" required>
          <input type="email" name="email" class="text-box contact-input" placeholder="Your email address..." required>
          <textarea name="message" rows="5" class="text-input contact-input" placeholder="Your message..." required></textarea>
          <input type="submit" name="submit" class="btn btn-big contact-btn" style="margin-top: -5px; color:white;" value="Send">
          </input>
        </form>
      </div>

    </div>

    <div class="footer-bottom">
      &copy; sawah.co.id | by Maketan
    </div>
  </div>

  <script type="text/javascript">
  if(window.history.replaceState){
    window.history.replaceState(null, null, window.location.href);
  }
  </script>
  <!-- // footer -->