
 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
      <img src="{{ (!empty(getSetting('logo'))) ? asset('public/common_img/'.getSetting('logo')) : asset('public/common_img/logo.png') }}" alt="{{env('APP_NAME')}}" class="brand-image"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{env('APP_NAME')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ Auth::guard('siteAdmin')->user()->profile->profile_photo }}" class="img-circle elevation-2" alt="User Image">

        </div>
        <div class="info">
          <a href="{{ route('admin.profile') }}" class="d-block">{{ Auth::guard('siteAdmin')->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.users',2) }}" class="nav-link {{ Request::is('admin/users/2') ? 'active' : '' }}">
            <i class="nav-icon fa fa-user-md" aria-hidden="true"></i>
              <p>
                Doctor
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ route('admin.users',3) }}" class="nav-link {{ Request::is('admin/users/3') ? 'active' : '' }}">
            <i class="nav-icon fa fa-flask" aria-hidden="true"></i>
              <p>
                Pharmacy
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.users',1) }}" class="nav-link {{ Request::is('admin/users/1') ? 'active' : '' }}">
            <i class="nav-icon fa fa-male" aria-hidden="true"></i>
              <p>
                Patients
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.deleted.users',2) }}" class="nav-link {{ Request::is('admin/deleted-users/2') ? 'active' : '' }}">
            <i class="nav-icon fa fa-user-md" aria-hidden="true"></i>
              <p>
                Deleted Doctor
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ route('admin.deleted.users',3) }}" class="nav-link {{ Request::is('admin/deleted-users/3') ? 'active' : '' }}">
            <i class="nav-icon fa fa-flask" aria-hidden="true"></i>
              <p>
                Deleted Pharmacy
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.deleted.users',1) }}" class="nav-link {{ Request::is('admin/deleted-users/1') ? 'active' : '' }}">
            <i class="nav-icon fa fa-male" aria-hidden="true"></i>
              <p>
                Deleted Patients
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.specialties')}}" class="nav-link {{ Request::is('admin/specialties*') ? 'active' : '' }}">
              <i class="nav-icon fa fa-list-alt" aria-hidden="true"></i>
              <p>
                Manage Speciality
                {{-- Speciality or Interest --}}
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.news')}}" class="nav-link {{ Request::is('admin/news*') ? 'active' : '' }}">
              <i class="nav-icon fa fa-newspaper" aria-hidden="true"></i>
              <p>
                News
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.coronavirus')}}" class="nav-link {{ Request::is('admin/coronavirus*') ? 'active' : '' }}">
              <i class="nav-icon fa fa-newspaper" aria-hidden="true"></i>
              <p>
                Coronavirus
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.living_advice')}}" class="nav-link {{ Request::is('admin/living-advice*') ? 'active' : '' }}">
              <i class="nav-icon fa fa-newspaper" aria-hidden="true"></i>
              <p>
                Living Advice
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.cms')}}" class="nav-link {{ Request::is('admin/cms*') ? 'active' : '' }}">
            <i class="nav-icon fa fa-sticky-note" aria-hidden="true"></i>
              <p>
                CMS
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.route')}}" class="nav-link {{ Request::is('admin/route*') ? 'active' : '' }}">
            <i class="nav-icon fa fa-sticky-note" aria-hidden="true"></i>
              <p>
                Manage Route
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.create-set_quick_question_cost')}}" class="nav-link {{ Request::is('admin/set_quick_question_cost/create*') ? 'active' : '' }}">
            <i class="nav-icon fa fa-sticky-note" aria-hidden="true"></i>
              <p>
               Type Quick Question Cost
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.gen_pres_commission')}}" class="nav-link {{ Request::is('admin/set_quick_question_cost/create*') ? 'active' : '' }}">
            <i class="nav-icon fa fa-sticky-note" aria-hidden="true"></i>
              <p>
               General Prescription Cost
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.commission')}}" class="nav-link {{ Request::is('admin/set-commission*') ? 'active' : '' }}">
            <i class="nav-icon fa fa-sticky-note" aria-hidden="true"></i>
              <p>
               Set commission
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.home_page_banner')}}" class="nav-link {{ Request::is('admin/home-page-banner*') ? 'active' : '' }}">
            <i class="nav-icon fa fa-sticky-note" aria-hidden="true"></i>
              <p>
                Home Page Banner
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.faq')}}" class="nav-link {{ Request::is('admin/faq*') ? 'active' : '' }}">
            <i class="nav-icon fa fa-sticky-note" aria-hidden="true"></i>
              <p>
                FAQ
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.h_doc')}}" class="nav-link {{ Request::is('admin/handy-document*') ? 'active' : '' }}">
            <i class="nav-icon fa fa-file" aria-hidden="true"></i>
              <p>
                Handy document
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.c_us')}}" class="nav-link {{ Request::is('admin/contact-us*') ? 'active' : '' }}">
            <i class="nav-icon far fa-address-book" aria-hidden="true"></i>
              <p>
                Contact us
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.payment_history')}}" class="nav-link {{ Request::is('admin/payment-history*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-th-list" aria-hidden="true"></i>
            {{-- <i class="far fa-file-chart-line"></i> --}}
              <p>
                Payment History
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.doctor_wise_payment_history')}}" class="nav-link {{ Request::is('admin/doctor-wise-payment-history*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-th-list" aria-hidden="true"></i>
            {{-- <i class="fas fa-th-list"></i> --}}
              <p>
                Doctor wise Payment History
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.settings') }}" class="nav-link {{ Request::is('admin/settings*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Settings
              </p>
            </a>
          </li>



          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
