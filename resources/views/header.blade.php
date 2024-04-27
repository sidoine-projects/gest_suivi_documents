   <!-- Start finlance_header area -->
   <header class="finlance_header header_v1">
       <div class="container-fluid">
           <div class="top_header">
               <div class="row align-items-center">
                   <div class="col-lg-6 d-none d-lg-block">
                       <div class="top_left">
                           <span><i class="fa fa-phone-volume" aria-hidden="true"></i><a href="tel:+229 67 75 02 50">+229 67 75 02 50</a></span>
                           <span><i class="far fa-envelope"></i><a href="mailto:info@star-labs.org">info@star-labs.org</a></span>
                       </div>
                   </div>
                   <div class="col-lg-6 col-12">
                       <div class="top_right d-flex align-items-center">
                           <ul class="social">
                               <li><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
                               <li><a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a></li>
                               <li><a href="https://dribble.com/"><i class="fab fa-dribbble"></i></a></li>
                               <li><a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a></li>
                               <li><a href="https://www.google.com/"><i class="fab fa-google-plus-g"></i></a></li>
                               <li><a href="https://www.instagram.com/"><i class="fab fa-instagram iconpicker-component"></i></a></li>
                           </ul>
                           <!-- 
                            <div class="dropdown">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="fas fa-globe"></i>English
                                    </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href='https://codecanyon.kreativdev.com/plusagency/car'>English</a>
                                    <a class="dropdown-item" href='https://codecanyon.kreativdev.com/plusagency/car'>Portuguese</a>
                                    <a class="dropdown-item" href='https://codecanyon.kreativdev.com/plusagency/car'>Turkish</a>
                                    <a class="dropdown-item" href='https://codecanyon.kreativdev.com/plusagency/car'>عربى</a>
                                </div>
                            </div> -->

                           <ul class="login">
                               <li><a href="#">Blog</a></li>
                           </ul>

                       </div>
                   </div>
               </div>
           </div>
           <div class="header_navigation" >
               <div class="site_menu">
                   <div class="row align-items-center">
                       <div class="col-lg-2 col-sm-12">
                           <div class="brand">
                               <a href="./"><img data-src="{{ asset('assets/front/img/logostarlabs.png') }}" class=" img-fluid lazy" alt=""></a>
                           </div>
                       </div>
                       <div class="col-lg-8">
                           <div class="primary_menu">
                               <nav class="main-menu ">
                                   <ul>
                                       <li><a href="./" target="_self">Accueil</a></li>
                                       <li><a class="scrollto" href="./#qui_somme_nous" target="_self">Qui sommes nous ?</a></li>

                                       <li class="menu-item-has-children">

                                           <a href="#" target="_self">Service</a>

                                           <ul class="sub-menu">

                                               <li class="submenus">
                                                   <a href="#" target="_self">Solution Numérique</a>
                                                   <ul style="z-index: 0;">
                                                       <li><a href="{{ route('pack') }}" target="_self">Développment web & mobile</a></li>
                                                       <!-- <li><a href="cart.html" target="_self">Cart</a></li> -->
                                                   </ul>
                                               </li>
                                               <!-- <li class="submenus">
                                                   <a href="#" target="_self">Etudes & Assistances</a>
                                                   <ul style="z-index: 0;">
                                                       <li class="submenus"><a href="#" target="_self">Level 3-1</a>
                                                           <ul style="z-index: 0;">
                                                               <li class="submenus"><a href="#" target="_self">Level 4-1</a>
                                                                   <ul style="z-index: 0;">
                                                                       <li><a href="#" target="_self">Level 5-1</a></li>
                                                                       <li><a href="#" target="_self">Level 5-2</a></li>
                                                                       <li><a href="#" target="_self">Level 5-3</a></li>
                                                                   </ul>
                                                               </li>
                                                               <li class="submenus"><a href="#" target="_self">Level 4-2</a>
                                                                   <ul style="z-index: 0;">
                                                                       <li><a href="#" target="_self">Level 5-4</a></li>
                                                                       <li><a href="#" target="_self">Level 5-5</a></li>
                                                                   </ul>
                                                               </li>
                                                           </ul>
                                                       </li>
                                                       <li><a href="#" target="_self">Level 3-2</a></li>
                                                       <li><a href="#" target="_self">Level 3-3</a></li>
                                                   </ul>
                                               </li> -->
                                               <li>
                                                   <a href="courses.html" target="_self">Etudes & Assistances</a>
                                               </li>
                                               <li>
                                                   <a href="courses.html" target="_self">Cloud & Sécurité</a>
                                               </li>
                                               <li>
                                                <a href="{{ route('training') }}" target="_self">Formations</a>
                                            </li>
                                           </ul>
                                       </li>
                                       <li><a href="#team" target="_self">Equipe</a></li>
                                       <li><a href="#partner" target="_self">Nos partenaires</a></li>
                                       <!-- <li><a href="contact.html" target="_self">Réalisations</a></li> -->
                                   </ul>
                               </nav>
                           </div>
                       </div>
                       <div class="col-lg-2">
                           <div class="button_box">
                               <a href="{{ route('contact') }}" class="finlance_btn">Contactez-nous</a>
                           </div>
                       </div>
                       <div class="col-sm-12">
                           <div class="mobile_menu"></div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </header>
   <!-- End finlance_header area -->