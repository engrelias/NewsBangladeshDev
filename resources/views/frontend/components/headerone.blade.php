    <!-- HeaderOne Section start  -->
    <main class="header-one" id="headerOne">

         <!-- Top Header -->
        @include('frontend.components.top-header')


        <!-- Bottom Header -->
        @include('frontend.components.bottom-header')


        <!-- Main Navigation -->
        @include('frontend.components.nav')



        <!-- nav icon content section start -->
        <div style="background: #282634;" class="offcanvas offcanvas-start" tabindex="-1" id="sidebarMenu">
            
                <div class="offcanvas-header" style="background-color: #05152E;">
                <div class="offcanvas-title" style="color: #fff;">
                    <img width="150px" src="assets/img/logo.jpg" alt="">
                </div>

                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                        <i style="background-color:#403B40;border: 1px solid #fff; color: #B2A308; padding: 10px; border-radius: 50%;"
                        class="fas fa-home me-2"></i>হোম
                        </a>
                    </li>

                    <!-- Sidebar myWallet item -->
                    <li class="nav-item">
                        <a class="nav-link text-white d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse"
                        data-bs-target="#myWallet"
                        role="button"
                        aria-expanded="false"
                        aria-controls="myWallet">
                        <div>
                            <i class="fas fa-wallet me-2" style="background-color:#403B40;border:1px solid #fff;color:#B2A308;padding:10px;border-radius:50%;"></i>
                          বাংলাদেশ
                        </div>
                        <i class="fas fa-chevron-down transition" id="walletChevron"></i>
                        </a>

                        <div class="collapse ms-4" id="myWallet">
                        <ul class="navbar-nav">
                            <li class="nav-item sub-manu d-flex">
                            <a class="nav-link text-white" href="add_deposit.html">
                                <i style="color: #ffe500; padding-right: 5px;" class="fa-solid fa-grip-vertical"></i>  <span>বরিশাল</span> 
                            </a></li>

                            <li class="nav-item sub-manu d-flex">
                            <a class="nav-link text-white" href="add_fund.html">
                                <i style="color: #ffe500; padding-right: 5px;" class="fa-solid fa-grip-vertical"></i>  <span>রাজশাহী</span> 
                            </a></li>

                            <li class="nav-item sub-manu d-flex"><a class="nav-link text-white" href="withdrew_fund.html">
                            <i style="color: #ffe500; padding-right: 5px;" class="fa-solid fa-grip-vertical"></i>  <span>খুলনা</span> 
                            </a></li>

                            <li class="nav-item sub-manu d-flex"><a class="nav-link text-white" href="transfer_fund.html">
                            <i style="color: #ffe500; padding-right: 5px;" class="fa-solid fa-grip-vertical"></i>  <span>ঢাকা</span> 
                            </a></li>


                        </ul>
                        </div>

                    </li>

                    <!-- Sidebar myBusiness item -->
                    <li class="nav-item">
                        <a class="nav-link text-white d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse"
                        data-bs-target="#myBusiness"
                        role="button"
                        aria-expanded="false"
                        aria-controls="myBusiness">
                        <div>
                            <i style="background-color:#403B40;border: 1px solid #fff; color: #B2A308; padding: 10px; border-radius: 50%;" class="fas fa-briefcase me-2"></i>
                            জাতীয়
                        </div>
                        <i class="fas fa-chevron-down transition" id="businessChevron"></i>
                        </a>

                        <div class="collapse ms-4" id="myBusiness">
                            <ul class="navbar-nav">

                                <li class="nav-item sub-manu d-flex">
                                <a class="nav-link text-white" href="my_rank.html">
                                    <i style="color: #ffe500; padding-right: 5px;" class="fa-solid fa-grip-vertical"></i>  <span>রাজনীতি</span> 
                                </a></li>

                                <li class="nav-item sub-manu d-flex">
                                <a class="nav-link text-white" href="my_level.html">
                                    <i style="color: #ffe500; padding-right: 5px;" class="fa-solid fa-grip-vertical"></i>  <span>আইন-আদালত</span> 
                                </a></li>


                            </ul>
                        </div>

                    </li>

                    
                    <!-- Sidebar chatagram item -->
                    <li class="nav-item">
                        <a class="nav-link text-white d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse"
                        data-bs-target="#myChatgram"
                        role="button"
                        aria-expanded="false"
                        aria-controls="myChatgram">
                            <div>
                                <i style="background-color:#403B40;border: 1px solid #fff; color: #B2A308; padding: 10px; border-radius: 50%;" 
                                class="fas fa-briefcase me-2"></i>
                                চট্টগ্রাম
                            </div>
                            <i class="fas fa-chevron-down transition" id="businessChevron"></i>
                        </a>

                        <div class="collapse ms-4" id="myChatgram">
                            <ul class="navbar-nav">


                                <!-- ✅ Submenu with nested collapse -->
                                <li class="nav-item sub-manu">
                                    <a class="nav-link text-white d-flex justify-content-between align-items-center"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#dokkinChattagram"
                                    role="button"
                                    aria-expanded="false"
                                    aria-controls="dokkinChattagram">
                                        <div>
                                            <i style="color: #ffe500; padding-right: 5px;" 
                                            class="fa-solid fa-grip-vertical"></i>  
                                            <span>দক্ষিণ চট্টগ্রাম</span>
                                        </div>
                                        <i class="fas fa-chevron-down small"></i>
                                    </a>

                                    <div class="collapse ms-4" id="dokkinChattagram">
                                        <ul class="navbar-nav">
                                            <li class="nav-item">
                                                <a class="nav-link text-white" href="#">বাঁশখালী</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-white" href="#">লোহাগাড়া</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-white" href="#">সাতকানিয়া</a>
                                            </li>
                                               <li class="nav-item">
                                                <a class="nav-link text-white" href="#">বোয়ালখালী</a>
                                            </li>
                                               <li class="nav-item">
                                                <a class="nav-link text-white" href="#">পটিয়া</a>
                                            </li>
                                               <li class="nav-item">
                                                <a class="nav-link text-white" href="#">চন্দনাইশ</a>
                                            </li>
                                               <li class="nav-item">
                                                <a class="nav-link text-white" href="#">কর্ণফুলী</a>
                                            </li>
                                               </li>
                                               <li class="nav-item">
                                                <a class="nav-link text-white" href="#">আনোয়ারা</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <!-- ✅ End Submenu -->


                                <!-- ✅ Submenu with nested collapse -->
                                <li class="nav-item sub-manu">
                                    <a class="nav-link text-white d-flex justify-content-between align-items-center"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#uttorChattagram"
                                    role="button"
                                    aria-expanded="false"
                                    aria-controls="uttorChattagram">
                                        <div>
                                            <i style="color: #ffe500; padding-right: 5px;" 
                                            class="fa-solid fa-grip-vertical"></i>  
                                            <span>উত্তর চট্টগ্রাম</span>
                                        </div>
                                        <i class="fas fa-chevron-down small"></i>
                                    </a>

                                    <div class="collapse ms-4" id="uttorChattagram">
                                        <ul class="navbar-nav">
                                            <li class="nav-item">
                                                <a class="nav-link text-white" href="#">মিরসরাই</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-white" href="#">সীতাকুণ্ড</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-white" href="#">ফটিকছড়ি</a>
                                            </li>
                                               <li class="nav-item">
                                                <a class="nav-link text-white" href="#">হাটহাজারী</a>
                                            </li>
                                               <li class="nav-item">
                                                <a class="nav-link text-white" href="#">সন্দ্বীপ</a>
                                            </li>
                                               <li class="nav-item">
                                                <a class="nav-link text-white" href="#">রাঙ্গুনিয়া</a>
                                            </li>
                                               <li class="nav-item">
                                                <a class="nav-link text-white" href="#">রাউজান</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <!-- ✅ End Submenu -->

                                <!-- ✅ Submenu with nested collapse -->
                                <li class="nav-item sub-manu">
                                    <a class="nav-link text-white d-flex justify-content-between align-items-center"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#coxBazar"
                                    role="button"
                                    aria-expanded="false"
                                    aria-controls="coxBazar">
                                        <div>
                                            <i style="color: #ffe500; padding-right: 5px;" 
                                            class="fa-solid fa-grip-vertical"></i>  
                                            <span>কক্সবাজার</span>
                                        </div>
                                        <i class="fas fa-chevron-down small"></i>
                                    </a>

                                    <div class="collapse ms-4" id="coxBazar">
                                        <ul class="navbar-nav">
                                            <li class="nav-item">
                                                <a class="nav-link text-white" href="#">পেকুয়া</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-white" href="#">টেকনাফ</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-white" href="#">চকরিয়া</a>
                                            </li>
                                               <li class="nav-item">
                                                <a class="nav-link text-white" href="#">কুতুবদিয়া</a>
                                            </li>
                                               <li class="nav-item">
                                                <a class="nav-link text-white" href="#">কক্সবাজার সদর</a>
                                            </li>
                                               <li class="nav-item">
                                                <a class="nav-link text-white" href="#">মহেশখালী</a>
                                            </li>
                                               <li class="nav-item">
                                                <a class="nav-link text-white" href="#">উখিয়া</a>
                                            </li>
                                               </li>
                                               <li class="nav-item">
                                                <a class="nav-link text-white" href="#">রামু</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <!-- ✅ End Submenu -->

                        


                                     <!-- ✅ Submenu with nested collapse -->
                                <li class="nav-item sub-manu">
                                    <a class="nav-link text-white d-flex justify-content-between align-items-center"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#banndorbon"
                                    role="button"
                                    aria-expanded="false"
                                    aria-controls="banndorbon">
                                        <div>
                                            <i style="color: #ffe500; padding-right: 5px;" 
                                            class="fa-solid fa-grip-vertical"></i>  
                                            <span>বান্দরবান</span>
                                        </div>
                                        <i class="fas fa-chevron-down small"></i>
                                    </a>

                                    <div class="collapse ms-4" id="banndorbon">
                                        <ul class="navbar-nav">
                                            <li class="nav-item">
                                                <a class="nav-link text-white" href="#">রুমা</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-white" href="#">আলীকদম</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-white" href="#">থানচি</a>
                                            </li>
                                               <li class="nav-item">
                                                <a class="nav-link text-white" href="#">নাইক্ষ্যংছড়ি</a>
                                            </li>
                                               <li class="nav-item">
                                                <a class="nav-link text-white" href="#">লামা</a>
                                            </li>
                                               <li class="nav-item">
                                                <a class="nav-link text-white" href="#">বান্দরবান সদর</a>
                                            </li>
                                
                                        </ul>
                                    </div>
                                </li>
                                <!-- ✅ End Submenu -->

                         
                                <!-- ✅ Submenu with nested collapse -->
                                <li class="nav-item sub-manu">
                                    <a class="nav-link text-white d-flex justify-content-between align-items-center"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#rangamati"
                                    role="button"
                                    aria-expanded="false"
                                    aria-controls="rangamati">
                                        <div>
                                            <i style="color: #ffe500; padding-right: 5px;" 
                                            class="fa-solid fa-grip-vertical"></i>  
                                            <span>রাঙামাটি</span>
                                        </div>
                                        <i class="fas fa-chevron-down small"></i>
                                    </a>

                                    <div class="collapse ms-4" id="rangamati">
                                        <ul class="navbar-nav">
                                            <li class="nav-item">
                                                <a class="nav-link text-white" href="#">রাঙামাটি সদর</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-white" href="#">কাপ্তাই</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-white" href="#">নানিয়ারচর</a>
                                            </li>
                                               <li class="nav-item">
                                                <a class="nav-link text-white" href="#">জুরাছড়ি</a>
                                            </li>
                                               <li class="nav-item">
                                                <a class="nav-link text-white" href="#">কাউখালী</a>
                                            </li>
                                               <li class="nav-item">
                                                <a class="nav-link text-white" href="#">রাজস্থলী</a>
                                            </li>
                                               <li class="nav-item">
                                                <a class="nav-link text-white" href="#">বিলাইছড়ি</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-white" href="#">বাঘাইছড়ি</a>
                                            </li>
                                         
                                               <li class="nav-item">
                                                <a class="nav-link text-white" href="#">বরকল</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <!-- ✅ End Submenu -->

                                      <!-- ✅ Submenu with nested collapse -->
                                <li class="nav-item sub-manu">
                                    <a class="nav-link text-white d-flex justify-content-between align-items-center"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#khagrachari"
                                    role="button"
                                    aria-expanded="false"
                                    aria-controls="khagrachari">
                                        <div>
                                            <i style="color: #ffe500; padding-right: 5px;" 
                                            class="fa-solid fa-grip-vertical"></i>  
                                            <span>খাগড়াছড়ি</span>
                                        </div>
                                        <i class="fas fa-chevron-down small"></i>
                                    </a>

                                    <div class="collapse ms-4" id="khagrachari">
                                        <ul class="navbar-nav">
                                            <li class="nav-item">
                                                <a class="nav-link text-white" href="#">খাগড়াছড়ি সদর</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-white" href="#">গুইমারা</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-white" href="#">পানছড়ি</a>
                                            </li>
                                               <li class="nav-item">
                                                <a class="nav-link text-white" href="#">মহালছড়ি</a>
                                            </li>
                                               <li class="nav-item">
                                                <a class="nav-link text-white" href="#">দীঘিনালা</a>
                                            </li>
                                               <li class="nav-item">
                                                <a class="nav-link text-white" href="#">মাটিরাঙা</a>
                                            </li>
                                               <li class="nav-item">
                                                <a class="nav-link text-white" href="#">মানিকছড়ি</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-white" href="#">লক্ষীছড়ি</a>
                                            </li>
                                         
                                               <li class="nav-item">
                                                <a class="nav-link text-white" href="#">রামগড়</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <!-- ✅ End Submenu -->

                            </ul>
                        </div>
                    </li>



                    <!-- Sidebar cInternational item -->
                    <li class="nav-item">
                        <a class="nav-link text-white d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse"
                        data-bs-target="#myInternational"
                        role="button"
                        aria-expanded="false"
                        aria-controls="myInternational">
                        <div>
                            <i style="background-color:#403B40;border: 1px solid #fff; color: #B2A308; padding: 10px; border-radius: 50%;" class="fas fa-globe me-2"></i>
                            আন্তর্জাতিক
                        </div>
                        </a>

                    </li>


                    <!-- Sidebar mySport item -->
                    <li class="nav-item">
                    <a class="nav-link text-white d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse"
                        data-bs-target="#mySport"
                        role="button"
                        aria-expanded="false"
                        aria-controls="mySport">
                        <div>
                            <i style="background-color:#403B40;border: 1px solid #fff; color: #B2A308; padding: 10px; border-radius: 50%;" class="fas fa-futbol me-2"></i>
                            খেলা
                        </div>
                        <i class="fas fa-chevron-down transition" id="communityChevron"></i>
                    </a>

                    <div class="collapse ms-4" id="mySport">
                        <ul class="navbar-nav">
                        <li class="nav-item sub-manu d-flex">
                            <a class="nav-link text-white" href="mycommunity.html">
                            <i style="color: #ffe500; padding-right: 5px;" class="fa-solid fa-grip-vertical"></i>  <span>ফুটবল</span> 
                            </a></li>

                        <li class="nav-item sub-manu d-flex">
                            <a class="nav-link text-white" href="mycommunity.html">
                            <i style="color: #ffe500; padding-right: 5px;" class="fa-solid fa-grip-vertical"></i>  <span>ক্রিকেট</span> 
                            </a></li>

                        </ul>
                    </div>

                    </li>


                    <!-- Sidebar myEducation item -->
                    <li class="nav-item">
                    <a class="nav-link text-white d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse"
                        data-bs-target="#myEducation"
                        role="button"
                        aria-expanded="false"
                        aria-controls="myEducation">
                        <div>
                        <i style="background-color:#403B40;border: 1px solid #fff; color: #B2A308; padding: 10px; border-radius: 50%;" class="fas fa-briefcase me-2"></i>
                        শিক্ষাঙ্গন
                        </div>
                        <i class="fas fa-chevron-down transition" id="workChevron"></i>
                    </a>

                    <div class="collapse ms-4" id="myEducation">
                        <ul class="navbar-nav">
                        <li class="nav-item sub-manu d-flex">
                            <a class="nav-link text-white" href="worker_job_history.html">
                            <i style="color: #ffe500; padding-right: 5px;" class="fa-solid fa-grip-vertical"></i>  <span>স্বাস্থ্য ও চিকিৎসা</span> 
                            </a></li>

                        <li class="nav-item sub-manu d-flex">
                            <a class="nav-link text-white" href="pending_job_history.html">
                            <i style="color: #ffe500; padding-right: 5px;" class="fa-solid fa-grip-vertical"></i>  <span>শিল্প ও সাহিত্য</span> 
                            </a></li>
                        
                        <li class="nav-item sub-manu d-flex">
                            <a class="nav-link text-white" href="approved_job_history.html">
                            <i style="color: #ffe500; padding-right: 5px;" class="fa-solid fa-grip-vertical"></i>  <span>চাকরি</span> 
                            </a></li>

                        <li class="nav-item sub-manu d-flex">
                            <a class="nav-link text-white" href="canceled_job_history.html">
                            <i style="color: #ffe500; padding-right: 5px;" class="fa-solid fa-grip-vertical"></i>  <span>ক্যাম্পাস </span> 
                            </a>
                        </li>
                        </ul>
                    </div>

                    </li>



                    <!-- Sidebar cBusinees item -->
                    <li class="nav-item">
                        <a class="nav-link text-white d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse"
                        data-bs-target="#myBusinees"
                        role="button"
                        aria-expanded="false"
                        aria-controls="myBusinees">
                        <div>
                            <i style="background-color:#403B40;border: 1px solid #fff; color: #B2A308; padding: 10px; border-radius: 50%;" class="fas fa-chart-line me-2"></i>
                            ব্যবসা-বাণিজ্য
                        </div>
                        </a>

                    </li>


                    <!-- Sidebar mySupport item -->
                    <li class="nav-item">
                    <a class="nav-link text-white d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse"
                        data-bs-target="#mySupport"
                        role="button"
                        aria-expanded="false"
                        aria-controls="mySupport">
                        <div>
                        <i style="background-color:#403B40;border: 1px solid #fff; color: #B2A308; padding: 10px; border-radius: 50%;" class="fas fa-tv me-2"></i>
                            বিনোদন
                        </div>
                        <i class="fas fa-chevron-down transition" id="supportChevron"></i>
                    </a>

                    <div class="collapse ms-4" id="mySupport">
                        <ul class="navbar-nav">
                        <li class="nav-item sub-manu d-flex">
                            <a class="nav-link text-white" href="support_list.html">
                            <i style="color: #ffe500; padding-right: 5px;" class="fa-solid fa-grip-vertical"></i>  <span>লাইফস্টাইল</span> 
                            </a></li>

                        <li class="nav-item sub-manu d-flex">
                            <a class="nav-link text-white" href="all_support.html">
                            <i style="color: #ffe500; padding-right: 5px;" class="fa-solid fa-grip-vertical"></i>  <span>জব কর্নার</span> 
                            </a></li>

                        <li class="nav-item sub-manu d-flex">
                            <a class="nav-link text-white" href="support.html">
                            <i style="color: #ffe500; padding-right: 5px;" class="fa-solid fa-grip-vertical"></i>  <span>ফিচার</span> 
                            </a></li>

                        </ul>
                    </div>

                    </li>

                    <!-- Sidebar myBusinessPpt item -->
                    <li class="nav-item">
                    <a class="nav-link text-white d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse"
                        data-bs-target="#myBusinessPpt"
                        role="button"
                        aria-expanded="false"
                        aria-controls="myBusinessPpt">
                        <div>
                        <i style="background-color:#403B40;border: 1px solid #fff; color: #B2A308; padding: 10px; border-radius: 50%;" class="fas fa-cloud-upload-alt me-2"></i>
                                সংগঠন সংবাদ
                        </div>
                        <i class="fas fa-chevron-down transition" id="businesspptChevron"></i>
                    </a>

                    <div class="collapse ms-4" id="myBusinessPpt">
                        <ul class="navbar-nav">
                        <li class="nav-item sub-manu d-flex">
                            <a class="nav-link text-white" href="#">
                            <i style="color: #ffe500; padding-right: 5px;" class="fa-solid fa-grip-vertical"></i>  <span>মিডিয়া ও গণমাধ্যম</span> 
                            </a>
                        </li>
                            <li class="nav-item sub-manu d-flex">
                            <a class="nav-link text-white" href="#">
                            <i style="color: #ffe500; padding-right: 5px;" class="fa-solid fa-grip-vertical"></i>  <span>প্রেস ব্রিফিং</span> 
                            </a>
                        </li>
                            <li class="nav-item sub-manu d-flex">
                            <a class="nav-link text-white" href="#">
                            <i style="color: #ffe500; padding-right: 5px;" class="fa-solid fa-grip-vertical"></i>  <span>মুখোমুখি</span> 
                            </a>
                        </li>
                            <li class="nav-item sub-manu d-flex">
                            <a class="nav-link text-white" href="#">
                            <i style="color: #ffe500; padding-right: 5px;" class="fa-solid fa-grip-vertical"></i>  <span>মতামত</span> 
                            </a>
                        </li>
                        </ul>
                    </div>

                    </li>

                     

                </ul>
                </div>
        </div>
        <!-- nav icon content section  end-->

        

        <!-- Breaking News Ticker -->
        @include('frontend.components.breaking')

        
    </main>
    <!-- HeaderOne Section End  -->