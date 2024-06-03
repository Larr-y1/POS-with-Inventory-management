<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pos system</title>

    <!--------------- FAVICON ---------------->
    <link rel="shortcut icon" href="{{asset('assets/website/images/favicon.svg')}}" type="image/svg+xml">

     <!--------------- STYLESHEET ---------------->
     <link rel="stylesheet" href="{{ asset('assets/website/css/style.css')}}">

    <!--------------- GOOGLEFONTS ---------------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
    href="https://fonts.googleapis.com/css2?family=Mulish:wght@600;700;900&family=Quicksand:wght@400;500;600;700&display=swap"
    rel="stylesheet">
</head>
<body>

    <header class="header " data-header>
        <div class="container">
<div class="textLogo" style="display: flex;align-items:center">
  <img src="{{ asset('assets/website/images/favicon.svg') }}"  alt="Pos logo" style="margin-right: -45px"> 
          <h1 style="margin: 0">SingleCart</h1>
</div>          
            <button class="menu-toggle-btn" data-nav-toggle-btn>
                <ion-icon name="menu-outline"></ion-icon>
            </button>

            <nav class="navbar">
                <ul class="navbar-list">
                    <li>
                        <a href="#hero" class="navbar-link">Home</a>
                    </li>
                    <li>
                      <a href="#about" class="navbar-link">About</a>
                  </li>
                  <li>
                    <a href="#contact" class="navbar-link">Contact us</a>
                </li>
                    <li>
                        <a href="#features" class="navbar-link">Features</a>
                    </li>
                    <li>
                        <a href="#blog" class="navbar-link">Blog</a>
                    </li>
                   
                </ul>    

                <div class="header-actions">
                    <a href="{{ route('dashboard.login') }}" class="header-action-link">Log in</a>
          
                    <a href="{{route('dashboard.register')}}" class="header-action-link">Register</a>
                  </div>
            </nav>

        </div>
    </header>
     <!--------------- END OF HEADER ---------------->


    <main>
        <article>

         <!--------------- HERO ---------------->
         <section class="hero" id="hero">
            <div class="container">
                <div class="hero-content">
                   <h1 class="h1 hero-tittle">
                    Business grow strategy is our mission
                   </h1> 

                   <p >
                    <h3 class="hero-text">Elevating Business Efficiency, One Transaction at a Time!</h3>
                   </p>
                   <br>
                   <p class="form-text">
                   A comprehensive solution designed to streamline operations and drive growth. Seamlessly manage sales, inventory, and customer experiences through intuitive interfaces and robust analytics. Unleash your potential with SingleCart.
                   </p>

                   
                </div>
                <figure class="hero-banner">
                    <img src="{{ asset('assets/website/images/hero-banner.png') }}"  alt="Hero image">
                </figure>
            </div>
         </section>
        <!--------------- END OF HERO ---------------->

        <!--------------- ABOUT ---------------->
        <section class="about" id="about">
          
            <div class="container">
              

                <div class="about-content">

                  <div class="about-icon">
                    <ion-icon name="cube"></ion-icon>
                  </div>

                  <h2 class="h2 h2 about-tittle">
                    About SingleCart Business Suite
                  </h2>
                  <br>

                  <p class="about-text">
                    At SingleCart, we are dedicated to transforming businesses through innovation and efficiency. With a passion for seamless operations, we offer a suite of cutting-edge tools that empower entrepreneurs to rise to new heights. Our mission is to provide intuitive solutions that streamline processes, drive growth, and elevate customer experiences.
                  </p>

                  <button class="btn btn-outline">
                    Learn More
                  </button>

                </div>
                
                <ul class="about-list">
                    <li>
                        <div class="about-card">
                            <div class="card-icon">
                                <ion-icon name="thumbs-up"></ion-icon>
                            </div>

                            <h3 class="h3 card-tittle">
                                Easy To Use
                            </h3>

                            <p class="card-text">
                              Streamline sales, optimize inventory, informed decisions for growth.
                            </p>

                        </div>
                    </li>
                    <li>
                        <div class="about-card">
                            <div class="card-icon">
                                <ion-icon name="trending-up"></ion-icon>
                            </div>

                            <h3 class="h3 card-tittle">
                                Grow Your Revenue
                            </h3>

                            <p class="card-text">
                              Unleash Insights, Uncover Success.
                              360-degree insights fuel strategic success for your business.
                            </p>

                        </div>
                    </li>
                    <li>
                        <div class="about-card">
                            <div class="card-icon">
                                <ion-icon name="shield-checkmark"></ion-icon>
                            </div>

                            <h3 class="h3 card-tittle">
                                Analytics Security
                            </h3>

                            <p class="card-text">
                              Seamless Scalability, Boundless Potential
                            </p>

                        </div>
                    </li>
                    <li>
                        <div class="about-card">
                            <div class="card-icon">
                                <ion-icon name="server"></ion-icon>
                            </div>

                            <h3 class="h3 card-tittle">
                                Data Privacy
                            </h3>

                            <p class="card-text">
                              Scale your business seamlessly from startup to enterprise success.
                            </p>

                        </div>
                    </li>
                </ul>
              </div>
              
          </div>
            </div>
          </div>
         
        </section>
        <!--------------- END OF ABOUT ---------------->

        <!---------------  Contact ---------------->
        <section class="section app" aria-label="app" id="contact">
          <div class="container">
  
            <figure class="app-banner">
              <img src="{{asset('assets/website/images/Business deal-pana.png')}}" width="449" height="400" loading="lazy" alt="app banner" class="w-100">
            </figure>
  
            <div class="app-content">
  
              <h3 class="section-subtitle">Get in Touch with us so Easy.Got questions or ready to elevate your business? Connect with us!
                Email: info@SingleCart.com. Our dedicated team is here to assist you on your journey to success.</h3>
  
              <h2 class="h2 section-title">CONTACT US NOW IF YOU HAVE ANY QUESTION</h2>
  
              <p class="section-text">
                <ul class="contact-list">
    
                  <li>
                    <a href="mailto:support@website.com" class="contact-link">
                      <ion-icon name="mail-outline"></ion-icon>
    
                      <span>: support@SingleCart.com</span>
                    </a>
                  </li>
    
                  <li>
                    <a href="#" class="contact-link">
                      <ion-icon name="globe-outline"></ion-icon>
    
                      <span>: www.SingleCart.com</span>
                    </a>
                  </li>
    
                  <li>
                    <a href="tel:+254757777412" class="contact-link">
                      <ion-icon name="call-outline"></ion-icon>
    
                      <span>: (+254) 757 777 412</span>
                    </a>
                  </li>
    
                  <li>
                    <div class="contact-link">
                      <ion-icon name="time-outline"></ion-icon>
    
                      <span>: 9:00 AM - 6:00 PM</span>
                    </div>
                  </li>
                  <br>
    
    
                </ul>
              </p>
  
            </div>
  
          </div>
        </section>
                <!---------------END OF cCONTACTS ---------------->

        
                <section class="section feature" id="features" aria-label="features">
                  <div class="container">
                   <br>
                    <h2 class="h2 section-title">Awesome Features</h2>
          
                    <ul class="feature-list">
          
                      <li class="feature-item">
                        <div class="feature-card">
          
                          <div class="card-icon">
                            <ion-icon name="create" aria-hidden="true"></ion-icon>
                          </div>
          
                          <h3 class="h3 card-title">Easy to Edit</h3>
          
                          <p class="card-text">
                            Easily accessible menus and options for quick item selection and pricing.
                          </p>
          
                        </div>
                      </li>
          
                      <li class="feature-item">
                        <div class="feature-card">
          
                          <div class="card-icon">
                            <ion-icon name="shield-checkmark" aria-hidden="true"></ion-icon>
                          </div>
          
                          <h3 class="h3 card-title">Fully Secure</h3>
          
                          <p class="card-text">
                            Implements secure payment processing and safeguards against fraud.
                          </p>
          
                        </div>
                      </li>
          
                      <li class="feature-item">
                        <div class="feature-card">
          
                          <div class="card-icon">
                            <ion-icon name="settings" aria-hidden="true"></ion-icon>
                          </div>
          
                          <h3 class="h3 card-title">Customer Insights</h3>
          
                          <p class="card-text">
                            Build a customer database, allowing personalized promotions .
                          </p>
          
                        </div>
                      </li>
          
                      <li class="feature-item">
                        <div class="feature-card">
          
                          <div class="card-icon">
                            <ion-icon name="cube" aria-hidden="true"></ion-icon>
                          </div>
          
                          <h3 class="h3 card-title">Multi-Functionality</h3>
          
                          <p class="card-text">
                            Performs various tasks, such as invoicing, tracking, and loyalty programs.
                          </p>
          
                        </div>
                      </li>
          
                    </ul>

                    <ul class="feature-list">
          
                      <li class="feature-item">
                        <div class="feature-card">
          
                          <div class="card-icon">
                            <ion-icon name="bar-chart" aria-hidden="true"></ion-icon>
                          </div>
          
                          <h3 class="h3 card-title">Intuitive Interface</h3>
          
                          <p class="card-text">
                          SingleCart  boasts a user-friendly interface, simplifying sales by providing a straightforward design ensuring swift adoption and reduces training time.
                          </p>
          
                        </div>
                      </li>
          
                      <li class="feature-item">
                        <div class="feature-card">
          
                          <div class="card-icon">
                            <ion-icon name="card" aria-hidden="true"></ion-icon>
                          </div>
          
                          <h3 class="h3 card-title">Offline Mode</h3>
          
                          <p class="card-text">
                            Maintain operations even without an internet connection, ensuring your business can continue to serve customers without disruptions.
                          </p>
          
                        </div>
                      </li>
          
                      <li class="feature-item">
                        <div class="feature-card">
          
                          <div class="card-icon">
                            <ion-icon name="wallet" aria-hidden="true"></ion-icon>
                          </div>
          
                          <h3 class="h3 card-title">Inventory Management</h3>
          
                          <p class="card-text">
                            Stay stocked and organized with real-time updates and enable informed restocking decisions, optimizing efficiency in supply chain operations.
                          </p>
          
                        </div>
                      </li>
          
                      <li class="feature-item">
                        <div class="feature-card">
          
                          <div class="card-icon">
                            <ion-icon name="rocket" aria-hidden="true"></ion-icon>
                          </div>
          
                          <h3 class="h3 card-title">Reporting and Analytics</h3>
          
                          <p class="card-text">
                            Access comprehensive, data-driven reports on sales, inventory turnover, and essential metrics, facilitating informed business decisions.
                          </p>
          
                        </div>
                      </li>
          
                    </ul>
          
                  </div>
                </section>


         <!--------------- FEATURES ---------------->
         <section class="features" id="features">
            <div class="container">
    
              <h2 class="h2 section-title">Easy Steps To Get Started</h2>
    
              <p class="section-text">
                Embark on your journey with SingleCart. Seamlessly set up, explore features, and transform your business operations. Elevate efficiency and growth today.
              </p>
    
              <div class="features-wrapper">
    
                <figure class="features-banner">
                  <img src="{{asset('assets/website/images/features-img-1.png')}}" alt="illustration art">
                </figure>
    
                <div class="features-content">
    
                  <p class="features-content-subtitle">
                    <ion-icon name="sparkles"></ion-icon>
    
                    <span>Step 1</span>
                  </p>
    
                  <h3 class="features-content-title">
                    Register <strong>/</strong> Create account<strong>
                  </h3>
    
                  <p class="features-content-text">
                    Create your SingleCart account by providing essential business details. Start your journey toward streamlined operations and growth..
                    We do the work you <strong>stay focused</strong> on <strong>your customers.</strong>
                  </p>
                  <br>
                  
                  <p class="features-content-subtitle">
                    <ion-icon name="sparkles"></ion-icon>
    
                    <span>Step 2</span>
                  </p>
    
                  <h3 class="features-content-title">
                    Set Up & Customize Your Space
                  </h3>
    
                  <p class="features-content-text">
                    Customize your menu, add products, and configure preferences to match your business needs. Our guided setup ensures a smooth transition.
                  </p>
    
                 
                </div>
    
              </div>
    
              <div class="features-wrapper">
    
                <figure class="features-banner">
                  <img src="{{asset('assets/website/images/features-img-2.png')}}" alt="illustration art">
                </figure>
    
                <div class="features-content">

                  <p class="features-content-subtitle">
                    <ion-icon name="sparkles"></ion-icon>
    
                    <span>Step 3</span>
                  </p>
    
                  <h3 class="features-content-title">
                    Start Growing
                  </h3>
    
                  <p class="features-content-text">
                    Dive into Rizetrack's intuitive interface, utilizing its robust features for sales, inventory, and analytics. Make informed decisions to elevate your business.
                  </p>
    
                  <ul class="features-list">
    
                    <li class="features-list-item">
                      <ion-icon name="rocket-outline"></ion-icon>
                      <p>
                        We do the work you <strong>stay focused</strong> on <strong>your customers.</strong>
                      </p>
    
                    </li>
                    
                  </ul>
    
                  <div class="btn-group">
                    <button class="btn btn-primary">Welcomer</button>
    
                    <button class="btn btn-secondary">User</button>
                  </div>
    
                </div>
    
              </div>
    
            </div>
          </section>
         <!--------------- END OF FEATURES ---------------->

         <!--------------- BLOG ---------------->
         <section class="blog" id="blog">
            <div class="container">
    
              <h2 class="h2 section-title">Our Tips And Latest News</h2>
    
              <p class="section-text">
                Et harum quidem rerum facilis est et expedita distinctio nam libero tempore cum soluta nobis eligendi
                cumque.
              </p>
    
              <ul class="blog-list">
    
                <li>
                  <div class="blog-card">
    
                    <figure class="blog-banner">
                      <img src="{{(asset('assets/website/images/Business Plan-amico.png'))}}" alt="Best Traveling Place">
                    </figure>
    
                    <div class="blog-meta">
    
                      <span>
                        <ion-icon name="calendar-outline"></ion-icon>
    
                        <time datetime="2021-04-10">February 21 2024</time>
                      </span>
    
                      <span>
                        <ion-icon name="person-outline"></ion-icon>
    
                        <p>admin</p>
                      </span>
    
                    </div>
    
                    <h3 class="blog-title">Best Business Planning</h3>
    
                    <p class="blog-text">
                      Integer ante arcu accumsan a consectetuer eget posuere mauris praesent adipiscing phasellus
                      ullamcorper ipsum rutrum
                      punc.
                    </p>
    
                    <a href="#" class="blog-link-btn">
                      <span>Learn More</span>
    
                      <ion-icon name="chevron-forward-outline"></ion-icon>
                    </a>
    
                  </div>
                </li>
    
                <li>
                  <div class="blog-card">
    
                    <figure class="blog-banner">
                      <img src="{{asset('assets/website/images/Business Plan-pana.png')}}" alt="Private Meeting Room">
                    </figure>
    
                    <div class="blog-meta">
    
                      <span>
                        <ion-icon name="calendar-outline"></ion-icon>
    
                        <time datetime="2021-04-10">February 21 2024</time>
                      </span>
    
                      <span>
                        <ion-icon name="person-outline"></ion-icon>
    
                        <p>admin</p>
                      </span>
    
                    </div>
    
                    <h3 class="blog-title">Private Meeting Room</h3>
    
                    <p class="blog-text">
                      Integer ante arcu accumsan a consectetuer eget posuere mauris praesent adipiscing phasellus
                      ullamcorper ipsum rutrum
                      punc.
                    </p>
    
                    <a href="#" class="blog-link-btn">
                      <span>Learn More</span>
    
                      <ion-icon name="chevron-forward-outline"></ion-icon>
                    </a>
    
                  </div>
                </li>
    
                <li>
                  <div class="blog-card">
    
                    <figure class="blog-banner">
                      <img src="{{asset('assets/website/images/At the office-amico.png')}}" alt="The Best Business Ideas">
                    </figure>
    
                    <div class="blog-meta">
    
                      <span>
                        <ion-icon name="calendar-outline"></ion-icon>
    
                        <time datetime="2021-04-10">February 21 2024</time>
                      </span>
    
                      <span>
                        <ion-icon name="person-outline"></ion-icon>
    
                        <p>admin</p>
                      </span>
    
                    </div>
    
                    <h3 class="blog-title">The Best Business Ideas</h3>
    
                    <p class="blog-text">
                      Integer ante arcu accumsan a consectetuer eget posuere mauris praesent adipiscing phasellus
                      ullamcorper ipsum rutrum
                      punc.
                    </p>
    
                    <a href="#" class="blog-link-btn">
                      <span>Learn More</span>
    
                      <ion-icon name="chevron-forward-outline"></ion-icon>
                    </a>
    
                  </div>
                </li>
    
              </ul>
    
            </div>
          </section>
         <!--------------- END OF BLOG ---------------->

        
        </article>
    </main>

        <!--------------- FOOTER---------------->
        <footer>

            <div class="footer-top">
              <div class="container">
        
                <div class="footer-brand">
                  <div class="textLogo" style="display: flex;align-items:center">
                    <img src="{{ asset('assets/website/images/favicon.svg') }}"  alt="Pos logo" style="margin-right: -45px"> 
                            <h2 style="margin: 0">SingleCart</h2>
                  </div>          
                  
                  <p class="footer-text">
                    A comprehensive solution designed to streamline operations and drive growth. Seamlessly manage sales, inventory, and customer experiences through intuitive interfaces and robust analytics. Unleash your potential with SingleCart
                  </p>
        
                  <ul class="social-list">
        
                    <li>
                      <a href="#" class="social-link">
                        <ion-icon name="logo-facebook"></ion-icon>
                      </a>
                    </li>
        
                    <li>
                      <a href="#" class="social-link">
                        <ion-icon name="logo-twitter"></ion-icon>
                      </a>
                    </li>
        
                    <li>
                      <a href="#" class="social-link">
                        <ion-icon name="logo-instagram"></ion-icon>
                      </a>
                    </li>
        
                    <li>
                      <a href="#" class="social-link">
                        <ion-icon name="logo-linkedin"></ion-icon>
                      </a>
                    </li>
        
                  </ul>
        
                </div>
        
                <div class="footer-link-box">
        
                  <ul class="footer-list">
        
                    <li>
                      <p class="footer-item-title">PRIVACY & TOS</p>
                    </li>
        
                    <li>
                      <a href="#" class="footer-link">Terms of service</a>
                    </li>
        
                    <li>
                      <a href="#" class="footer-link">Privacy Policy</a>
                    </li>
        
                    <li>
                      <a href="#" class="footer-link">Cookies Policy</a>
                    </li>
        
                    <li>
                      <a href="#" class="footer-link">About Us</a>
                    </li>
        
                    <li>
                      <a href="#" class="footer-link">FAQ</a>
                    </li>
        
                  </ul>
        
                  <ul class="footer-list">
        
                    <li>
                      <p class="footer-item-title">NAVIGATE</p>
                    </li>
        
                    <li>
                      <a href="#" class="footer-link">Home</a>
                    </li>
        
                    <li>
                      <a href="#" class="footer-link">Create Account</a>
                    </li>
        
                    <li>
                      <a href="#" class="footer-link">Documentation</a>
                    </li>
        
                    <li>
                      <a href="#" class="footer-link">Features</a>
                    </li>
        
                  </ul>
        
                  <ul class="footer-list">
        
                    <li>
                      <p class="footer-item-title">SUPPORT</p>
                    </li>
        
                    <li>
                      <a href="#" class="footer-link">Developers</a>
                    </li>
        
                    <li>
                      <a href="#" class="footer-link">Support</a>
                    </li>
        
                    <li>
                      <a href="#" class="footer-link">Customer Service</a>
                    </li>
        
                    <li>
                      <a href="#" class="footer-link">Get Started</a>
                    </li>
        
                    <li>
                      <a href="#" class="footer-link">Guide</a>
                    </li>
        
                  </ul>
        
                </div>
        
              </div>
            </div>
        
            <div class="footer-bottom">
              <div class="container">
                <p class="copyright">
                  &copy; 2024 <a href="">SingleCart.inc</a>. All Right Reserved
                </p>
              </div>
            </div>
        
          </footer>
        <!--------------- END OF FOOTER---------------->










     <!--------------- CUSTOM SHEET ---------------->
    <script src="{{asset('assets/Dashboard/js/main.dashboard.js')}}"></script>

     <!--------------- IONICONS ---------------->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  
</body>
</html>