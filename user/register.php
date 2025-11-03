<?php include("header.php"); ?>

  <main class="main">

   

    <!-- Contact 2 Section -->
    <section id="contact-2" class="mt-5 section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

 
       
      </div>

      

      <!-- Contact Form Section (Overlapping) -->
      <div class="container form-container-overlap">
        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
          <div class="col-lg-10">
            <div class="contact-form-wrapper">
              <h2 class="text-center mb-4">Get in Touch</h2>

             <form  method="post" id="reclick">
                <div class="row g-3 w-50 mx-auto">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="input-with-icon">
                        <i class="bi bi-person"></i>
                        <input type="text" class="form-control" name="fname" placeholder="First Name" id="fname">
                        <b id="fnerr"></b>
                        <!-- <b><?php   if($fname == ""){
                    echo "plz fillup..!";
                }  ?></b> -->
                      </div>
                    </div>
                  </div>


                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="input-with-icon">
                        <i class="bi bi-person"></i>
                        <input type="text" class="form-control" name="lname" placeholder="last Name" id="lname">
                        <b id="lnerr"></b>
                  
                      </div>
                    </div>
                  </div>

<!-- </div> -->


                   <!-- <div class="row g-3 ">  -->
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="input-with-icon">
                        <i class="bi bi-person"></i>
                        <input type="text" class="form-control" name="email" placeholder="Email" id="email">
                          <b id="emailerr"></b>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="input-with-icon">
                        <i class="bi bi-person"></i>
                        <input type="password" class="form-control" name="password" placeholder="Password" id="password">
                          <b id="passerr"></b>
                      </div>
                    </div>
                  </div>

                  


                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="input-with-icon">
                        <i class="bi bi-person"></i>
                        <input type="text" class="form-control" name="mobile" placeholder="Mobile" id="mobile">
                           <b id="moberror"></b>
                      </div>
                    </div>
                  </div>

                 
                 
   </div>
                  

               

                  <!-- <div class="col-12">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                  </div> -->

                  <div class="col-12 text-center">
                    <button type="submit" name="register" class="btn btn-primary btn-submit mt-5">REGISTER</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
     

 

    </section><!-- /Contact 2 Section -->

  </main>

  <?php include("footer.php");?>