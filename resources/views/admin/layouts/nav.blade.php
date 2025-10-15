<aside class="sidebar">
  <button type="button" class="sidebar-close-btn">
    <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
  </button>
  <div>
    <a href="{{route('admin.dashboard')}}" class="sidebar-logo">
      <img src="{{asset('admin/assets/images/logo.png')}}" alt="site logo" class="light-logo">
      <img src="{{asset('admin/assets/images/logo-light.png')}}" alt="site logo" class="dark-logo">
      <img src="{{asset('admin/assets/images/logo-icon.png')}}" alt="site logo" class="logo-icon">
    </a>
  </div>
  <div class="sidebar-menu-area">
    <ul class="sidebar-menu" id="sidebar-menu">

      <li>
        <a href="{{route('admin.dashboard')}}">
          <span>Dashboard</span>
        </a>
      </li>


      <li class="sidebar-menu-group-title">Components</li>

      
      <li class="dropdown">
        <a href="javascript:void(0)">
          <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
          <span>Manage Users</span> 
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="{{route('admin.users')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> All users
            </a>
          </li>
        </ul>
      </li>


      {{-- <li class="dropdown">
        <a href="javascript:void(0)">
          <iconify-icon icon="solar:wallet-outline" class="menu-icon"></iconify-icon> 
          <span>Manage Wallet </span> 
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="deposit-fund.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Deposit fund
            </a>
          </li>
          <li>
            <a href="deposit-history.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>Deposit History
            </a>
          </li>
          <li>
            <a href="pending-fund-req.html"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i>Pending fund req
            </a>
          </li>
          <li>
            <a href="approve-fund-req.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>Fund req History
            </a>
          </li>
          <li>
            <a href="pending-withdraw.html"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i>Pending Withdraw
            </a>
          </li>
          <li>
            <a href="withdraw-history.html"><i class="ri-circle-fill circle-icon text-primary-300 w-auto"></i>Withdraw History
            </a>
          </li>
        </ul>
      </li> --}}


      <li class="dropdown">
        <a href="javascript:void(0)">
          <iconify-icon icon="line-md:clipboard" class="menu-icon"></iconify-icon>
          <span>Categories</span>
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="{{route('categories.index')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Category List</a>
          </li>
        </ul>
      </li>


      <li class="dropdown">
        <a href="javascript:void(0)">
          <iconify-icon icon="mdi:assistant" class="menu-icon"></iconify-icon>
          <span>Manage News</span>
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="{{route('news.index')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>News List</a>
          </li>
          

        </ul>
      </li>


      <li class="dropdown">
        <a href="javascript:void(0)">
          <iconify-icon icon="tabler:device-gamepad-3" class="menu-icon"></iconify-icon>
          <span>HomePage</span>
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="{{route('admin.homepage')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Section List</a>
          </li>
        </ul>
      </li>  


      <li class="dropdown">
        <a href="javascript:void(0)">
          <iconify-icon icon="mdi:marketplace-outline" class="menu-icon"></iconify-icon>
         <span>Manage Market</span> 
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="wallet.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Business List</a>
          </li>
        </ul>
      </li>


      <li class="dropdown">
        <a href="javascript:void(0)">
          <iconify-icon icon="mdi:clipboard-text-history-outline"  class="menu-icon" ></iconify-icon>
          <span>All History</span>
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="referral-history.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Referral History</a>
          </li>
          <li>
            <a href="rank-history.html"><i class="ri-circle-fill circle-icon text-warning-600 w-auto"></i>Rank History</a>
          </li>
          <li>
            <a href="level-history.html"><i class="ri-circle-fill circle-icon text-danger-600 w-auto"></i>Level History</a>
          </li>
          <li>
            <a href="roylity-history.html"><i class="ri-circle-fill circle-icon text-success-600 w-auto"></i>Roylity History</a>
          </li>
          <li>
            <a href="matrix-history.html"><i class="ri-circle-fill circle-icon text-success-100 w-auto"></i>Matrix History</a>
          </li>
          <li>
            <a href="nft-history.html"><i class="ri-circle-fill circle-icon text-warning-300 w-auto"></i>NFT History</a>
          </li>
          <li>
            <a href="otp-withdraw.html"><i class="ri-circle-fill circle-icon text-danger-200 w-auto"></i>OTP Withdraw</a>
          </li>
        </ul>
      </li>


      <li class="dropdown">
        <a href="javascript:void(0)">
          <iconify-icon icon="ic:sharp-support-agent"  class="menu-icon"></iconify-icon>
          <span>All Support</span>
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="live-support.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Live Support</a>
          </li>
          <li>
            <a href="pending-support.html"><i class="ri-circle-fill circle-icon text-warning-600 w-auto"></i> Pending Support</a>
          </li>
          <li>
            <a href="completed-support.html"><i class="ri-circle-fill circle-icon text-success-600 w-auto"></i> Completed Support</a>
          </li>
        </ul>
      </li>


      <li class="dropdown">
        <a href="javascript:void(0)">
          <iconify-icon icon="mdi:bell-badge-outline" class="menu-icon"></iconify-icon>
          <span>Notifications</span>
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="notification-list.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Notice List</a>
          </li>
       
          <li>
            <a href="add-notice.html"><i class="ri-circle-fill circle-icon text-danger-600 w-auto"></i>Add Notice</a>
          </li>
        </ul>
      </li>
      

      <li >
        <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <iconify-icon icon="ic:twotone-logout" class="menu-icon"></iconify-icon>
         <span>Logout</span> 
        </a>
      </li>


      
    </ul>
  </div>
</aside>