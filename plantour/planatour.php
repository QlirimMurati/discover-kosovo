<?php
  session_start();
?>

<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Registration Form</title>
  <link rel="stylesheet" href="../menu.css">
  <script src="../sweetalert.js"></script>
  <link rel="stylesheet" href="../scroll-up-button.css">
  <script src="../scroll-up.js"></script>
  <link rel="stylesheet" href="style.css">
  <?php 
  include('form_process.php');
  ?>

</head>

<body>
  <header class="mainheader"> 
        <nav>
          <div class="simg">
            <a  href="mailto:qlirimmurati@gmail.com">
              <img id="secureEmail" src="../images/menu/gmail.png" alt="gmail">
            </a>
            <a href="https://facebook.com">
              <img src="../images/menu/facebook.png"  alt="facebook">
            </a>
            <a href="https://twitter.com/">
             <img src="../images/menu/twitter.png"  alt="twitter">
           </a>
         </div>
      <ul>
        <li><a href="../index.html"> HOME</a></li>
          <li><a href="../about/about-kosovo.html"> ABOUT KOSOVO</a></li>
          <li> <a href="../discover/discover.html"> DISCOVER</a>
            <ul>
              <li><a href="nature.html">DESTINATIONS</a></li>
              <li><a href="../discover/activities/activities.php">ACTIVITIES</a></li>
            </ul>
          </li>
          <li class="active"><a href="login.php">PLAN A TOUR</a></li>
          <li><a href="../contact/contact.php">CONTACT US</a></li>
      </ul>

  </nav>  
</header>



<div id="foto" style="color:#fff; width:50px;text-align: left; font-size: 100px; padding: 80px 40px; margin-left: 30px; float: left; ">Plan your tour</div>

<div id="userBar">
  <span id="logoutLabel">
    <form action="logout.php">
      <button type="submit" name="submit">
        Logout
      </button>
    </form>
  </span> 
  <span id="userLabel">
  <?php 
      if (isset($_SESSION['ufirstname']) and isset($_SESSION['ulastname'])) {
          echo $_SESSION['ufirstname']." ".$_SESSION['ulastname'];
      }
      else{
        header("Location: login.php");
        exit();
      }
  ?>
  </span> 
</div>


<!-- Butoni per scroll up -->
<button onclick="topFunction()" id="Btn"  title="Go to top"><p></p></button>

<div class="container" >
  <section class="planatour">
    <h1>Plan a tour</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">  

            <h2 style="color:#694551; font-weight: bold; font-size: 17px;">Step one</h2>
        <div class="tour personal_info">

             <h3 style="font-weight: bolder; font-size: 15px">Your Personal Information</h3>

                      <div class="flex">
                             <fieldset>
                                  <input type="text" name="username" id="username" placeholder="Your Name" value="<?= $name ?>" >
                                        </br>
                                  <span class="error"><?= $name_error ?></span>
                           </fieldset>


                            <fieldset >
                                  <input type="text" name="lastname" id="lastname" placeholder="Your Lastname"
                                  value="<?= $lname ?>" />
                                       </br>
                                  <span class="error" ><?= $lname_error ?></span>
                            </fieldset>
                     </div>

                            <fieldset>
                                  <input type="text"  name="phone" id="phonenr" placeholder="Your phone number" value="<?= $phone ?>" />
                                  </br>
                                  <span class="error" ><?= $phone_error ?></span>
                            </fieldset>


                            <fieldset>
                                   <input type="text" name="address" value="<?= $address ?>" placeholder="Your Address">
                                   <span class="error"><?= $address_error ?></span>
                            </fieldset>


                            <fieldset>
                                 <input type="text" name="zipcode" id="zipcode" value="<?= $zipcode ?>" placeholder="Zip code">
                                 <br/>
                                 <span class="error"><?= $zipcode_error ?></span>
                            </fieldset>

                            <br/>

                            <fieldset>
                                <h3 style="font-size: 15px; padding-bottom: 10px;">A photo of you, for identification</h3>
                                <input type="file" name="file_img" accept="image/*"><br/>
                                <span class="error"><?= $foto_error ?></span>
                            </fieldset>

        </div>

                   
             <br/>
             <h2 style="color:#694551; font-weight: bold; font-size: 17px">Step two</h2>
        <div class="tour planning">

                         <h3 style="font-weight: bolder; font-size: 15px">Tour plannig</h3>

                                </br>
                                <h3>Transportation type</h3>

                              <fieldset> 
                                    <select name="ttype">
                                        <option disabled selected value>   select an option  </option>
                                        <option value="Native">I'm native</option>
                                        <option value="Bus">Bus</option>
                                        <option value="Car">Car</option>
                                        <option value="Airplane">Airplane</option>
                                    </select>
                                    <span class="error"><?= $ttype_error ?></span>
                              </fieldset>     

                                <h3>How long your staying</h3>

                                <div class="flex">
                                    <fieldset>
                                        <input type="date" name="datefirst" value="<?= $datefirst ?>" placeholder="date" id="datefirst"></br>
                                        <span class="error"><?= $datefirst_error ?></span>
                                    </fieldset>

                                    <p style="margin-top: 15px;">to</p>

                                  <fieldset >
                                        <input type="date" name="datelast" value="<?= $datelast ?>" placeholder="date" id="datelast"></br>
                                        <span class="error"><?= $datelast_error ?></span>
                                    </fieldset>
                                </div>
                                

                                  <h3>The city you want to visit</h3>
                              <fieldset>
                                  <select name="visit" onchange="optionchange()"> 
                                      <option disabled selected value value="1">   select an option  </option>
                                      <option value="Prishtine">Prishtine</option>
                                      <option value="Vushtrri">Vushtrri</option>
                                      <option value="Gjilan">Gjilan</option>
                                      <option value="Gjakove">Gjakove</option>
                                      <option value="Prishtine">Peje</option>
                                      <option value="Vushtrri">Rugove</option>
                                      <option value="Gjilan">Prizren</option>
                                      <option value="Gjakove">Ferizaj</option>
                                  </select>
                                <span class="error"><?= $visit_error ?></span>
                            </fieldset>

                               <fieldset >
                                       <h3 style="display: inline; font-weight: bold;font-size: 15px;">Total price: </h3> <input type="text" name="price" value=""  id="price" style="width: 50px; display: inline">
                               </fieldset>
                               
                               <textarea name="textarea" id="">More informations</textarea>

         </div>

                   
           </br>
          <h2 style="color:#694551; font-weight: bold; font-size: 17px">Step three</h2>
        <div class="tour carddetails">

                          <div style="display: flex;justify-content: space-between;">
                              <h3 style="font-weight: bolder; font-size: 15px;">Payment details</h3>
                              <img src="../images/card.png" alt="" height="30px" width="200px">
                          </div>

                          <br/>

                            <h3>Your card number</h3>
                            <fieldset>
                                <input type="text" name="cardnumber" value="<?= $cardnum ?>" placeholder="Valid card number" id="cardnum">
                                <span class="error"><?= $cardnum_error ?></span>
                            </fieldset>


                            <fieldset>
                                <input type="text" name="cardholder" value="<?= $cholder ?>" placeholder="Card holder" id="cardholder">
                                <span class="error"><?= $cholder_error ?></span>
                            </fieldset>



                      <div class="flex"> 
                               <fieldset>
                                     <h3>Expiration date</h3>  
                                      <input type="text" name="expirationdate" id="expdate" value="<?= $expdate ?>" placeholder="mm/yyyy" id="expdate" > 
                                      <br/>
                                      <span class="error"><?= $expdate_error ?></span>
                                </fieldset>

                                <fieldset>
                                      <h3>Security code</h3>
                                      <input type="text" name="securitycode" id="CCV" value="<?= $seccode ?>" placeholder="CVC" >
                                      <br/>
                                      <span class="error" ><?= $seccode_error ?></span>     
                                </fieldset>
                       </div>

       </div>

                  <div class="check">
                              <p class="terms" >
                                <label>
                                  <input type="checkbox" name="accept" id="accept">
                                  I accept Terms & Conditions
                                </label>
                                <p class="submit"><input type="submit" name="submit" value="Submit"></p>
                              </p>

                             </br>
                            <span class="error" ><?= $accept_error ?></span>
                    </div>
   
    </form>
  </section>
 </div>

<script type="text/javascript">
  function optionchange(){
    var randnum=Math.floor(Math.random() * (400 + 1)) + 100;
    document.getElementById('price').setAttribute("value",randnum+" $");
  }
</script>

  <div class="footer">
    <p> Copyright &copy  2017-2018. All Rights Reserved </p>
  </div>

  </body>
  </html>