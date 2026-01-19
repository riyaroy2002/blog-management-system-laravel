 <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
     <div class="app-brand demo">

         <a href="#" class="app-brand-link">
             <span class="app-brand-logo demo">
                 <img src="{{ asset('assets/images/line-dec.png') }}" alt="Blood Donation Logo" style="max-height: 40px;">
             </span>
             <span class="app-brand-text demo menu-text fw-bolder ms-2 text-uppercase">BMS</span>
         </a>

         <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
             <i class="bx bx-chevron-left bx-sm align-middle"></i>
         </a>
     </div>

     <div class="menu-inner-shadow"></div>
     <ul class="menu-inner py-1">

         <li class="menu-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">
             <a href="{{ route('admin.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-home-circle"></i>
                 <div>Dashboard</div>
             </a>
         </li>

         {{-- <li class="menu-item {{ request()->routeIs('admin.cms.*') ? 'active' : '' }}">
             <a href="{{ route('admin.cms.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-save"></i>
                 <div>CMS</div>
             </a>
         </li>

         <li class="menu-item {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
             <a href="{{ route('admin.categories.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-save"></i>
                 <div>Categories</div>
             </a>
         </li> --}}

         <li class="menu-item {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
             <a href="{{ route('admin.posts.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-save"></i>
                 <div>Posts</div>
             </a>
         </li>

         <li class="menu-item {{ request()->routeIs('admin.comments.*') ? 'active' : '' }}">
             <a href="{{ route('admin.comments.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-save"></i>
                 <div>Comments</div>
             </a>
         </li>

         <li class="menu-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
             <a href="{{ route('admin.users.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-save"></i>
                 <div>Users</div>
             </a>
         </li>

          <li class="menu-item {{ request()->routeIs('admin.authors.*') ? 'active' : '' }}">
             <a href="{{ route('admin.authors.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-save"></i>
                 <div>Authors</div>
             </a>
         </li>

     </ul>
 </aside>
