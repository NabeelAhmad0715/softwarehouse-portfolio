<footer class="iq-footer4">
    <div class="container-fluid">
       <div class="row overview-block-ptb2">
          <div class="col-lg-4 col-md-6 col-sm-6 iq-mtb-20">
             <div class="logo">
                <img id="footer_logo_img" class="img-fluid" src="{{ asset('/images/loader.png') }}" alt="Cloudily">
                <div class="iq-font-white iq-mt-15">Cloudily offers software development consulting services for businesses, startups, and enterprises. Partner with a reliable software development company to scale up your engineering capacity.
                  The seasoned professionals and industry veterans that lead our teams and departments. Cloudily is driven by the profound experience and business acumen that these gifted individuals share with us every day.</div>
             </div>
          </div>
          <div class="col-lg-2 col-md-6 col-sm-6 iq-mtb-20">
             <div class="contact-bg">
                <h5 class="small-title iq-tw-6 iq-font-white iq-mb-30">Menu</h5>
                <ul class="iq-contact">
                   <li>
                      <i class="ion-ios-location-outline"></i>
                      <p>397 Pinner Road, Harrow Greater London, United Kingdom, HA1 4HN</p>
                   </li>
                   <li>
                      <i class="ion-ios-telephone-outline"></i>
                      <p>+44(0)7861699453</p>
                   </li>
                   <li>
                      <i class="ion-ios-email-outline"></i>
                      <p><a class="text-primary" href="mailto:info@cloudily.uk">info@cloudily.uk</a></p>
                   </li>
                </ul>
             </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 iq-mtb-20">
            <h5 class="small-title iq-tw-6 iq-font-white iq-mb-20">Menu</h5>
            <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-6">
                  <ul class="menu">
                     <li><a href="{{ route('pages.home') }}">Home</a></li>
                     <li><a href="{{ route('pages.about-us') }}">About Us</a></li>
                     <li><a href="{{ route('pages.contact-us') }}">Contact us</a></li>
                     <li><a href="{{ route('pages.portfolio') }}">Portfolio</a></li>
                  </ul>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-6">
                  <ul class="menu">
                     <li><a href="{{ route('pages.services') }}">Services</a></li>
                     <li><a href="{{ route('pages.blogs') }}">Blogs</a></li>
                     <li><a href="{{ route('pages.latest-news') }}">Our Latest News</a></li>
                     <li><a href="{{ route('pages.jobs') }}">Careers</a></li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-sm-12 iq-mtb-15">
            <h5 class="small-title iq-tw-6 iq-font-white">Drop Hello</h5>
            <div id="success-message" class="alert {{ session('alert-class', 'alert-info') }} border-0 alert-dismissible" style="display: none">
               <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
               Thank you your request has been submitted successfully!
           </div>
            <form action="#" method="post" id="hello-form">
               @csrf
               <div class="form">
                  <div class="col iq-pall iq-mb-10">
                     <input type="text" id="name" name="name" class="form-control" placeholder="Full name">
                  </div>
                  <div class="col iq-pall iq-mb-10">
                     <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                  </div>
                  <div class="col iq-pall iq-mb-10">
                     <input type="tel" id="phone" name="phone" class="form-control" placeholder="Phone">
                  </div>
                  <div class="col iq-pall iq-mb-10">
                     <textarea class="form-control" id="comment" name="comment" placeholder="Message" rows="3"></textarea>
                  </div>
                  <div class="button iq-mt-10 iq-mr-0 d-none" id="loader" style="background: white;padding: 0 70px;">
                     <img style="width: 42px;" src="{{ asset('images/loader.png') }}" alt="Cloudily" />
                  </div>
                  <div class="col iq-pall text-right">
                     <button id="submit-form" name="submit" type="submit" value="Send" class="button iq-mt-10 iq-mr-0">Send Message</button>
                  </div>
               </div>
            </form>
         </div>
       </div>
       <hr>
       <div class="row overview-block-ptb2">
          <div class="col-lg-6 col-md-6 col-sm-12">
             <ul class="link">
                <li class="d-inline-block iq-mr-20"><a href="#">Term and Condition</a></li>
                <li class="d-inline-block"><a href="#"> Privacy Policy</a></li>
             </ul>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
             <div class="iq-copyright">
                Copyright 
                <span id="copyright">
                   <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script>
                </span>
                <a href="#">Cloudily</a> All Rights Reserved 
             </div>
          </div>
       </div>
    </div>
 </footer>