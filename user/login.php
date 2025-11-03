<?php include("header.php"); ?>

  <main class="main">

 

    <!-- Contact 2 Section -->
    <section id="contact-2" class="mt-5 section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Contact Info Boxes -->
       

      </div>

    

      <!-- Contact Form Section (Overlapping) -->
      <div class="container form-container-overlap">
        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
          <div class="col-lg-10">
            <div class="contact-form-wrapper">
              <h2 class="text-center mb-4">Registration Form</h2>

              <form  method="post" >
                <div class="row g-3 w-50 mx-auto">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="input-with-icon">
                        <i class="bi bi-person"></i>
                        <input type="text" class="form-control" name="email" placeholder="Email" required="" value ="<?php     
                          
                          if(isset($_COOKIE['email'])){
                            echo $_COOKIE['email'];
                          }
                                                      ?>">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="input-with-icon">
                        <i class="bi bi-person"></i>
                        <input type="text" class="form-control" name="password" placeholder="Password" required="" value="<?php
                        
                        if(isset($_COOKIE['password'])){
                            echo $_COOKIE['password'];
                          }
                                                    ?>">
                        
                        
             
                      </div>
                    </div>
                  </div>

                   <div class="col-md-12">
                    <div class="form-group">
                      <div class="input-with-icon">
                    
                        <input type="checkbox" class="form-check-input" name="remember" >Remember Me
                      </div>
                    </div>
                  </div>


               

                  

               

                  <!-- <div class="col-12">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                  </div> -->

                  <div class="col-12 text-center">
                    <button type="submit" name="login" class="btn btn-primary btn-submit">LOGIN</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Contact 2 Section -->

  </main>

  <?php include("footer.php");?>