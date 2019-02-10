<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
  case "add":
    if(!empty($_POST["quantity"])) {
      $productBypId = $db_handle->runQuery("SELECT * FROM Product WHERE pId='" . $_GET["pId"] . "'");
      $itemArray = array($productBypId[0]["pId"]=>array('productName'=>$productBypId[0]["productName"], 'pId'=>$productBypId[0]["pId"], 'quantity'=>$_POST["quantity"], 'productPrice'=>$productBypId[0]["productPrice"]));
      
      if(!empty($_SESSION["cart_item"])) {
        if(in_array($productBypId[0]["pId"],array_keys($_SESSION["cart_item"]))) {
          foreach($_SESSION["cart_item"] as $k => $v) {
              if($productBypId[0]["pId"] == $k) {
                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                  $_SESSION["cart_item"][$k]["quantity"] = 0;
                }
                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
              }
          }
        } else {
          $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
        }
      } else {
        $_SESSION["cart_item"] = $itemArray;
      }
    }
  break;
  case "remove":
    if(!empty($_SESSION["cart_item"])) {
      foreach($_SESSION["cart_item"] as $k => $v) {
          if($_GET["pId"] == $k)
            unset($_SESSION["cart_item"][$k]);        
          if(empty($_SESSION["cart_item"]))
            unset($_SESSION["cart_item"]);
      }
    }
  break;
  case "empty":
    unset($_SESSION["cart_item"]);
  break;  
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>SAY UNCLE! | #1 ANTIBACTERIAL ODOR-KILLING SPONGE</title>
<link rel="shortcut icon" href="images/logo-icon.png" />
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
<link rel="stylesheet" type="text/css" href="css/w3.css">
<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
<!-- <script type="text/javascript" src="js/bootstrap.js"></script> -->
<!-- <script type="text/javascript" src="js/scrollDownButton.js"></script> -->
<!-- <script type="text/javascript" src="js/jquery-3.3.1.js"></script> -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- <script type="text/javascript" src="js/smoothScroll.js"></script> -->
<!-- quantity -->
<script type="text/javascript" src="js/qty.js"></script>
<!-- quantity -->
<!-- Google reCAPTCHA -->
<script src='https://www.google.com/recaptcha/api.js'></script>
<!-- Google reCAPTCHA -->
<!-- Social sidebar -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css">
<script type="text/javascript" src="js/jquery.floating-share.js"></script>
<!-- Social sidebar -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Say Uncle, ANTIBACTERIAL, SPONGE, therealsayuncle.com, say uncle sponge" />
<!-- smooth scroll -->
<script>
$('a[href^="#"]').on('click', function(event) {

    var target = $(this.getAttribute('href'));

    if( target.length ) {
        event.preventDefault();
        $('html, body').stop().animate({
            scrollTop: target.offset().top
        }, 1000);
    }
});
</script>
<!-- smooth scroll -->
<!-- email signups -->
<script>
<!--
/* wording of your error and thank you messages */
var thankyou="Awesome! You are on the list!";

function signup(thisform) {
  $("#submit, #myResponse").hide(); // Hide the buttom and the message
  $("#loading").show();       // show the loading image.
  params=$("#subform").serialize();
  $.post("optIn.php", params, function(response ){
    //alert(response); //may need to activate this line for debugging.
      $("#loading").hide();
    $("#myResponse").html(thankyou); //Writes the "Thank you" message that comes from optIn.php and styles it.
    $('#myResponse').css({display:'inline',color:'#fdca54'})
    $("#submit").show();
    }
  )
return false;
}
//-->
</script>
<!-- email signups -->
</head>
<body>

<?php include 'include/social_media_sidebar.php'; ?>

  <div class="banner" id="home">
    <img style="width: 100%; height: 100%;" src="images/home cover.jpg">
  </div>
    <!-- <div class="clearfix"></div> -->
  <!-- </div> -->
  <!-- <section id="section04" class="demo">
    <a href="#body"><span></span>Scroll</a>
  </section> -->

<div id="body">
<!-- subscribe -->
<div class="subscribe" id="subscribe">
  <div class="container3">
    <div class="subscribe1">
      <h4>"THE UNCLE"<br>The First Real Antibacterial Sponge.<br>Be the first to get "THE UNCLE"!</h4>
    </div>
    <div class="subscribe2">
      <form onsubmit="return signup(this);return false;" method="post" name="subform" id="subform" action="optIn.php">
        <input class="text" type="text" required id="fName" name="fName" value="" placeholder="First Name">
        <input class="text" type="text" required id="lName" name="lName" value="" placeholder="Last Name">
        <input class="text" type="email" required id="email" name="email" value="" placeholder="Email Address">
        <input class="submit" type="submit" id="submit" name="submit" value="Sign Me Up!" data-sitekey="6Lcrq10UAAAAAF2AFTad0F5vDFKLuenMLOtS9YhE">
        <div style="width:100%"><span id="Error" style="color:red;display:none;"></span></div>
        <div id="myResponse" style="DISPLAY:none;"></div>  
      </form>

      <script type="text/javascript">
        var wasSubmitted = false;    
          function signup(this){
            if(!wasSubmitted) {
              wasSubmitted = true;
              return wasSubmitted;
            }
            return false;
          }    
      </script>
    </div>
  <div class="clearfix"></div>
  </div>
</div>
<!-- subscribe -->

<!-- navbar -->
<?php include 'include/header.php'; ?>
<!-- navbar -->

<div class="container1">
  <img style="width: 100%;" src="images/meet the say uncle sponge.jpeg">
  <hr>
  <img style="width: 100%;" src="images/let's get to the nerdy stuff.png">
</div>
<hr>
<div class="meet_the_family" id="meet_the_family">
  <h1 class="meet_theFamily">Meet the Family</h1>
  <img style="width: 100%;" src="images/say uncle portrait with auntie.png">
</div>
<hr>
<!-- the uncle -->
<div class="container2" id="the_uncle"><!-- id="product-section" -->
    <div class="row">
      <div class="col-md-6">

        <?php
          $product_array = $db_handle->runQuery("SELECT * FROM Product WHERE pId = '1'");
        if (!empty($product_array)) { 
          foreach($product_array as $key=>$value){
        ?>
      
        <div class="w3-content" style="max-width:1200px">
          <img src="<?php echo $product_array[$key]["productImage"]; ?>" style="width:100%">
        </div>
      </div>
      
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-12">
              <h1 class="product_name"><?php echo $product_array[$key]["productName"]; ?></h1>
              <h4 style="color:#7db84b;">Antibacterial Technology</h4>
              <p class="description">
              "My silver fibers kill 'Bac' and his smelly friends."<br><br>"I am the world's first gunk-free sponge! (gunk: noun: filthy, sticky, or greasy bacteria)"<br><br>"I have three functional layers, with a silver layer in the middle."<br><br>"My silver layer eliminates 99.9% bacteria in the sponge."<br><br>"Positively charged silver ions keep me fresh and smelling oh so good and you get to see my pretty little face every time you use me!"
              </p>
              <div class="row">
                <div class="col-md-12 bottom-rule">
                  <h2 class="product-price"></h2>
                </div>
              </div><!-- end row -->
              <!-- <p style="color: #fff; font-size: 2em;">* Sooooo Reasonably Priced!<br><br>For an additional $500 we will throw in the tie and glasses! 😜</p> -->
         </div>
        </div><!-- end row-->

        <?php
         }
        }
        ?>

      </div>
    </div><!-- end row -->
</div><!-- end container -->
<!-- the uncle -->
<hr>
<!-- the nephew -->
<div class="container2" id="the_nephew">
    <div class="row">
      <div class="col-md-6">

        <?php
          $product_array = $db_handle->runQuery("SELECT * FROM Product WHERE pId = '2'");
        if (!empty($product_array)) { 
          foreach($product_array as $key=>$value){
        ?>

        <div class="w3-content" style="max-width:1200px">
          <img src="<?php echo $product_array[$key]["productImage"]; ?>" style="width:100%">
        </div>
      </div>

      <div class="col-md-6">
        <div class="row">
          <div class="col-md-12">
              <h1 class="product_name"><?php echo $product_array[$key]["productName"]; ?></h1>
              <h4 style="color:#7db84b;">Antibacterial Technology</h4>
              <p class="description">
              The Nephew is our limited edition sponge.<br><br>"I’m bigger than “The Uncle", so I can handle heavier workloads!"<br><br>"I have the same silver lining, so I’ll smell just as fresh as my relatives!”
              </p>
              <div class="row">
                <div class="col-md-12 bottom-rule">
                  
                </div>
              </div><!-- end row -->

              <?php
               }
              }
              ?>

          </div>
        </div><!-- end row-->
      </div>
    </div><!-- end row --> 
</div><!-- end container -->
<!-- the nephew -->
<hr>

<!-- the auntie -->
<div class="container2" id="the_auntie">
    <div class="row">
      <div class="col-md-6">
        
        <?php
          $product_array = $db_handle->runQuery("SELECT * FROM Product WHERE pId = '4'");
        if (!empty($product_array)) { 
          foreach($product_array as $key=>$value){
        ?>
        
        <div class="w3-content" style="max-width:1200px">
          <img src="<?php echo $product_array[$key]["productImage"]; ?>" style="width:100%">
        </div>
      </div>
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-12">
              <h1 class="product_name"><?php echo $product_array[$key]["productName"]; ?></h1>
              <h4 style="color:#7db84b;">Antibacterial Technology</h4>
              <p class="description">
              "I run the family business.”<br><br>"I am the heavy duty sponge - there is no job I can’t handle!”<br><br>"My curves make me a perfect fit for everyone.”<br><br>“I have the same blingy silver lining as the rest of my family, which eliminates 99.9% of all of that horrible bacteria, and of course will keep me smelling so very nice and fresh.”
              </p>
              <div class="row">
                <div class="col-md-12 bottom-rule">
                </div>
              </div><!-- end row -->

              <?php
               }
              }
              ?> 
          </div>
        </div><!-- end row-->
      </div>
    </div><!-- end row -->
</div><!-- end container -->
<!-- the auntie -->
<hr>

<!-- the cousins -->
<div class="container2" id="the_cousins">
    <div class="row">
      <div class="col-md-6">
        
        <?php
          $product_array = $db_handle->runQuery("SELECT * FROM Product WHERE pId = '3'");
        if (!empty($product_array)) { 
          foreach($product_array as $key=>$value){
        ?>
        
        <div class="w3-content" style="max-width:1200px">
          <img src="<?php echo $product_array[$key]["productImage"]; ?>" style="width:100%">
        </div>
      </div>

      <div class="col-md-6">
        <div class="row">
          <div class="col-md-12">
              <h1 class="product_name"><?php echo $product_array[$key]["productName"]; ?></h1>
              <h4 style="color:#7db84b;">Antibacterial Technology</h4>
              <p class="description">
              "My silver fibers kill 'Bac' and his smelly friends."<br><br>"I am the most awesome gunk-free kitchen towel ever!" (gunk: noun: ”filthy, stinky and covered with greasy bacteria”)<br><br>"My silver fibers eliminates 99.9% of the bacteria in me!”<br><br>"Positively charged silver ions keep me fresh and smelling oh so good!"
              </p>
              <div class="row">
                <div class="col-md-12 bottom-rule">

                </div>
              </div><!-- end row -->

              <?php
               }
              }
              ?>
          </div>
        </div><!-- end row-->
      </div>
    </div><!-- end row --> 
    
</div><!-- end container -->
<!-- the cousins -->

<!-- footer -->
<?php include 'include/footer.php'; ?>
<!-- footer -->
</div><!-- body -->
</body>
</html>