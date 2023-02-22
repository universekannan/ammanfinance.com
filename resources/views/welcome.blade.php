<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  
<head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Amman Finance</title>
      <meta content="" name="description">
      <meta content="" name="keywords">
      
        <link rel="stylesheet" href="{!! asset('img/amman.jpeg') !!}" rel="icon">
        <link rel="stylesheet" href="{!! asset('img/amman.jpeg') !!}"  rel="apple-touch-icon">

      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      <!-- Vendor CSS Files -->
        <link rel="stylesheet" href="{!! asset('vendor/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
        <link rel="stylesheet" href="{!! asset('vendor/bootstrap-icons/bootstrap-icons.css') !!}" rel="stylesheet">
        <link rel="stylesheet" href="{!! asset('vendor/aos/aos.css') !!}" rel="stylesheet">
        <link rel="stylesheet" href="{!! asset('vendor/remixicon/remixicon.css') !!}" rel="stylesheet">
        <link rel="stylesheet" href="{!! asset('vendor/swiper/swiper-bundle.min.css') !!}" rel="stylesheet">
        <link rel="stylesheet" href="{!! asset('vendor/glightbox/css/glightbox.min.css') !!}" rel="stylesheet">
        <link rel="stylesheet" href="{!! asset('css/style.css') !!}" rel="stylesheet">
        <link rel="stylesheet" href="{!! asset('css/style1.css') !!}" rel="stylesheet">


      <script>
         $(document).ready(function(){
           $("#myModal").modal('show');
         });
      </script>
      <style>
         .jst{
         text-align: right;
         }
      </style>
   </head>
   <body>
      <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
         <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center">
            <img src="{!! asset('img/amman.jpeg') !!}" alt="">
            <span>Amman Finance</span>
            </a>
            <nav id="navbar" class="navbar">
               <ul>
                  <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
                  <li><a class="nav-link scrollto" href="#about">About us</a></li>
                  <li><a class="nav-link scrollto" href="#services">Services</a></li>
                  <li><a class="nav-link scrollto" href="#contact">Contact us</a></li>
               </ul>
               <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
         </div>
      </header>      <!-- End Header -->
      <!-- ======= Hero Section ======= -->
      <section id="hero" class="hero d-flex align-items-center">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 d-flex flex-column justify-content-center">
                  <h1 data-aos="fade-up">Gold Loans, Deposits and Savings.</h1><b>A gold loan or a loan against gold is a secured loan which customers can avail from Amman Finance in lieu of gold ornaments like gold jewellery. It is the easiest way to fulfil your financial needs. When it comes to taking a gold loan by Amman Finance, you are ensured of complete customer satisfaction. With quick loan disbursals and attractive rates of interests.</b>
                  <div data-aos="fade-up" data-aos-delay="600">
                     <div class="text-center text-lg-start">
                        <a href="About.html" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                        <span>Get Started</span>
                        <i class="bi bi-arrow-right"></i>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6" >
                      <img src="{!! asset('img/leo.jpg') !!}" class="img-fluid" alt=""> 
                  </div>
            </div>
         </div>
      </section>
      <!-- End Hero -->
     <main id="main">
         <!-- ======= About Section ======= -->
         <section id="about" class="about">
            <div class="container" data-aos="fade-up" id="gst">
               <div class="row gx-0">
                 
                  <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                     <div class="img-fluid" id="img-mobileAbout">
                        <script src="  ../unpkg.com/%40lottiefiles/lottie-player%401.6.1/dist/lottie-player.js"></script>
                        <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_kv7kbdzp.json"  background="transparent.html"  speed="1"  loop  autoplay></lottie-player>
                     </div>
                     <img src="{!! asset('img/photo.jpg') !!}" class="img-fluid" alt=""> 
                  </div>
				   <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                     <div class="content">
                        <!-- <h3>Who We Are</h3> --> 
                        <h2 style="margin-top: 22px;font-size: 40px;">About Us</h2>
                        <p style="text-align: justify;">
                            AMMAN Finance's Gold Loan is a one-stop solution for all your financial needs. You can get a Loan against Gold for a variety of purposes, including business, personal, education, medical, agriculture and others. With our simple documentation process, you can easily avail a Gold Loan against your gold jewellery up to Rs 1 crore. AMMAN Finance offers attractive interest rates on Gold Loan and ensures complete safety of your jewellery. No need to worry about EMIs. Repay your loan easily at the end of the loan tenure.


                        </p>
                        <div class="text-center text-lg-start">
                           <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                             <span>Read More</span>
                             <i class="bi bi-arrow-right"></i>
                           </a>
                           </div> 
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- End About Section -->
		  <section id="services" class="services">
            <div class="container" data-aos="fade-up">
               <header class="section-header">
                  <h2></h2>
                  <p>Services</p>
               </header>
               <div class="row gy-4">
                  <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                     <div class="service-box blue">
                        <i class="ri-discuss-line icon"></i>
                        <h3>Quick Loan Disbursal</h3>
                        <p></p>
                        <a href="PhDLevelWorks.html" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                     <div class="service-box orange">
                        <i class="ri-discuss-line icon"></i>
                        <h3>Minimal Documentation</h3>
                        <p></p>
                        <a href="PGLevelWorks.html" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                     <div class="service-box green">
                        <i class="ri-discuss-line icon"></i>
                        <h3>Maximum value for gold</h3>
                        <p></p>
                        <a href="UG%20Level%20Works.html" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
                     </div>
                  </div>
                  
                 
                  
                  
                  
         </section>
		  
		  <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
               <header class="section-header">
                  <h2></h2>
                  <p>Contact Us</p>
               </header>
               <div class="row gy-4">
                  <div class="col-lg-6">
                     <div class="row gy-4">
                        <div class="col-md-6">
                           <div class="info-box">
                              <i class="bi bi-geo-alt"></i>
                              <h3>Address</h3>
                              <p>1/24, Piramanavilai<br>Usarathukudieruppu(Po) <br> Thoothukudi(Dist),<br> Tamil Nadu - 628 703.</p>
                              <hr>
                              
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="info-box">
                              <i class="bi bi-telephone"></i>
                              <h3>Call Us</h3>
                              <p>04639 - 254255 </p>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="info-box">
                              <i class="bi bi-envelope"></i>
                              <h3>Email Us</h3>
                              <p>whiteangelpublishers@gmail.com<br>research@whiteangelpublishers.com <br>wap.research2017@gmail.com</p>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="info-box">
                              <i class="bi bi-clock"></i>
                              <h3>Open Hours</h3>
                              <p>Monday - Friday<br>9:00AM - 05:00PM</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <!-- <form action="mail_handler.php" method="post" name="form" class="php-email-form"> -->
                        <form method="post" autocomplete="off" name="google-sheet" class="php-email-form">
                        <div class="row gy-4">
                           <div class="col-md-6">
                              <input type="text" name="Name" class="form-control" placeholder="Your Name" required>
                           </div>
                           <div class="col-md-6 ">
                              <input type="email" class="form-control" name="Email" placeholder="Your Email" required>
                           </div>
                           <div class="col-md-12">
                              <input type="text" class="form-control" name="Subject" placeholder="Subject" required>
                           </div>
                           <div class="col-md-12">
                              <textarea class="form-control" name="Message" rows="6" placeholder="Message" required></textarea>
                           </div>
                           <div class="col-md-12 text-center">
                              <div class="loading">Loading</div>
                             
                              <div class="sent-message">Your message has been sent. Thank you!</div>
                              <button type="submit" name="submit">Send Message</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <script>
               const scriptURL = 'https://script.google.com/macros/s/AKfycbyiB7f_IEETpFh_EtCQipHoPT-yKIzKqDcgUDu75uVAC6DDRWRmazx94TckL-l3piDV/exec'
               const form = document.forms['google-sheet']
             
               form.addEventListener('submit', e => {
                 e.preventDefault()
                 fetch(scriptURL, { method: 'POST', body: new FormData(form)})
                   .then(response => alert("Thanks for Contacting us..! We Will Contact You Soon..."))
                   
                   .catch(error => console.error('Error!', error.message))
                   
               })
             </script>
         </section>
      </main>
	    <footer id="footer" class="footer">
         <div class="footer-top">
            <div class="container">
               <div class="row gy-4">
			   
                  <div class="col-lg-4 col-md-12 footer-info">
                    <h4>Contact Us</h4>
                     <p>
                        1/24, Piramanavilai, <br>
                        Usarathukudieruppu(Po),<br> Thoothukudi(Dist),<br>
                        Tamil Nadu - 628 703.<br><br>
                     </p>
                     <div class="social-links mt-3">
                        <a href="https://twitter.com/GuidanceWap?s=03" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="https://www.facebook.com/WAP-Research-Guidance-348056656481005/?ti=as" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/invites/contact/?i=r7wpd8y59b0u&amp;utm_content=lkc3emz" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin bx bxl-linkedin"></i></a>
                     </div>
                  </div>
                  <div class="col-lg-2 col-6 footer-links">
                     <h4>Useful Links</h4>
                     <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="About.html">About</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="Services.html">Services</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="Career.html">Career</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="blog.html">Blog</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="ContactUs.html">Contact</a></li>
                     </ul>
                  </div>
                  <div class="col-lg-2 col-6 footer-links">
                     <h4>Our Services</h4>
                     <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="PhDLevelWorks.html">PhD Level Works</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="PGLevelWorks.html">PG Level Works</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="UG%20Level%20Works.html">UG Level Works</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="MonologuePrinting.html">Monologue Printing</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="ProofReading%26EditingServices.html">Proof reading and Editing Services</a></li>
                     </ul>
                  </div>
                  <div class="col-lg-4 col-md-12 footer-contact text-center text-md-start">
                     <h4>Contact Us</h4>
                     <p>
                        <strong>Phone:</strong> 04639 - 254255<br> 
                        <strong>Email:</strong>rajendranindian1980@gmail.com<br>
                        
                     </p>
                  </div>
               </div>
            </div>
         </div>
         <div class="container">
            <div class="copyright">
               &copy; Copyright <strong><span>whiteAngelpublishers</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
               Designed by <a href="https://selvainfotech.co.in/">GalaxyTechPark,Nagercoil</a>
            </div>
         </div>
      </footer>
      <!-- End Footer -->
      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
      <!-- End #main -->
      <!-- ======= Footer ======= -->
        <script rel="stylesheet" href="{!! asset('vendor/bootstrap/js/bootstrap.bundle.js') !!}"></script>
        <script rel="stylesheet" href="{!! asset('vendor/aos/aos.js') !!}"></script>
        <script rel="stylesheet" href="{!! asset('vendor/php-email-form/validate.js') !!}"></script>
        <script rel="stylesheet" href="{!! asset('vendor/swiper/swiper-bundle.min.js') !!}"></script>
        <script rel="stylesheet" href="{!! asset('vendor/purecounter/purecounter.js') !!}"></script>
        <script rel="stylesheet" href="{!! asset('vendor/isotope-layout/isotope.pkgd.min.js') !!}"></script>
        <script rel="stylesheet" href="{!! asset('vendor/glightbox/js/glightbox.min.js') !!}"></script>
        <script rel="stylesheet" href="{!! asset('js/main.js') !!}"></script>
        <script rel="stylesheet" href="{!! asset('js/script1.js') !!}"></script>

   </body>
</html>