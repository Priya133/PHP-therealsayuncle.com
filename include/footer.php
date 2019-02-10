<footer class="container_footer py-5 footer_bg text-white">
  <div class="row">
    <div class="col-12 col-md">
      <img class="footer_logo" src="images/Logo V1.0-01.png" height="30" />
      <small class="d-block mb-3 text-white">
        &copy; <?php
          $fromYear = 2018; 
          $thisYear = (int)date('Y'); 
            echo $fromYear . (($fromYear != $thisYear) ? '-' . $thisYear : '')
        ;?> SAY UNCLE<i>!</i> | All Rights Reserved.
      </small>
      <a href="https://www.facebook.com/therealsayuncle/"><img height="30px" src="images/social media icons/social-logo-facebook.jpg"></a>
      <a href="https://www.instagram.com/therealsayuncle"><img height="30px" src="images/social media icons/social-logo-instagram.jpg"></a>
      <!-- <a href=""><img height="30px" src="images/social media icons/social-logo-snapchat.jpg"></a> -->
      <a href="https://twitter.com/therealsayuncle"><img height="30px" src="images/social media icons/social-logo-twitter.jpg"></a>
      <a href="https://www.youtube.com/channel/UCEb6aY-j_7hnTOpmat3UvIg?view_as=subscriber"><img height="30px" src="images/social media icons/social-logo-youtube.jpg"></a>
    </div>
    
  </div>
</footer>