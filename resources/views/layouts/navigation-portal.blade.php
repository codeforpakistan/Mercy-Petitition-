<nav aria-label="Main">
    <ul class="nav flex-column mt-2 has-active-border active-on-top">

                  {{-- <li class="nav-item-caption">
                    <span class="fadeable pl-3">MAIN</span>
                    <span class="fadeinable mt-n2 text-125">&hellip;</span>
                  </li> --}}



                  <li class="nav-item {{isset($menu) ? ($menu=='dashboard' ? 'active open' : '') : ''}}">

                    <a href="{{route('portal.dashboard')}}" class="nav-link {{isset($menu) ? ($menu=='dashboard' ? '' : 'collapsed') : 'collapsed'}}">
                    <i class="nav-icon fas fa-tachometer-alt" style="color:#fff"></i>
                      <span class="nav-text fadeable text-secondary">
                              <span style="color:#fff">Dashboard</span>
                      </span>


                    </a>

                    <b class="sub-arrow"></b>

                    </li>



                  <li class="nav-item">

                    <a href="#" class="nav-link dropdown-toggle collapsed">
                      <i class="nav-icon fa fa-cube" style="color:#fff"></i>
                      <span class="nav-text fadeable">
                  	  <span>Profile</span>
                      </span>

                      <b class="caret fa fa-angle-left rt-n90"></b>

                      <!-- or you can use custom icons. first add `d-style` to 'A' -->
                      <!--
                  	 	<b class="caret d-n-collapsed fa fa-minus text-80"></b>
                  	 	<b class="caret d-collapsed fa fa-plus text-80"></b>
                  	 -->
                    </a>

                    <div class="hideable submenu collapse">
                      <ul class="submenu-inner" style="background-color:#160C47">
                        <li class="nav-item">
                          <span class="nav-text">
                  				  <span>
                                       <!-- the user avatar and image -->
              <div class="sidebar-section-item pt-2 fadeable-left fadeable-top">
                <div class="fadeinable">
                    <img class="mr-2 radius-round border-2 brc-primary-tp3 p-1px" src="{{ Auth::user()->picture ?? asset('..\assets\image\avatar\avatar4.png')}}" width="36" alt="Natalie's Photo">
                    {{ Auth::user()->name }}
                </div>

                <div class="fadeable hideable">
                  <div class="py-2 d-flex flex-column align-items-center">
                    @auth
                    <img class="mr-2 radius-round border-2 brc-primary-tp3 p-1px" src="{{ Auth::user()->picture ?? asset('..\assets\image\avatar\avatar4.png')}}" width="36" alt="Natalie's Photo">
                    <span style="color: #fff">{{ Auth::user()->name }}</span>

                    @endauth

                    @guest
                    <img alt="Natalie's avatar" src="assets/image/avatar/avatar2.png" class="p-2px border-2 brc-primary-m2 radius-round" />
                       <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endguest

                  </div>
                </div>
              </div>
                            </span>
                            </span>
                          </a>
                        </li>
                        <li class="nav-item">
                        <a href="" class="nav-link">
                            <span class="nav-text">
                  				  <span> Change Password </span>
                            </span>
                          </a>
                        </li>
                        @auth

                        <li class="nav-item">
                          <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"  class="nav-link">
                           {{ __('Logout') }}
                            <span class="nav-text">
                  				  <span>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                             </form>

                            </span>
                            </span>
                          </a>
                        </li>
                        @endauth
                      </ul>
                    </div>

                    <b class="sub-arrow"></b>

			<b class="sub-arrow"></b>
		</li>

        <b class="sub-arrow"></b>

<b class="sub-arrow"></b>
</li>


@can('user-list')

<li class="nav-item {{isset($menu) ? ($menu=='system_setting' ? 'active open' : '') : ''}}">
<a href="#" id="system_setting" class="nav-link dropdown-toggle {{isset($menu) ? ($menu=='system_setting' ? '' : 'collapsed') : 'collapsed'}}">
        <i class="nav-icon fa fa-cube" style="color:#fff"></i>
        <span class="nav-text fadeable">
                <span>System Setting</span>
        </span>
        <b class="caret fa fa-angle-left rt-n90"></b>
</a>
<div class="hideable submenu collapse {{isset($menu) ? ($menu=='system_setting' ? 'show' : '') : ''}}">
        <ul class="submenu-inner" style="background-color:#160C47">
                <li class="nav-item {{isset($sub_menu) ? ($sub_menu=='roles' ? 'active' : '') : ''}}">
                        <a href="{{route('portal.roles.index')}}" class="nav-link">
                                <span class="nav-text">
                                        <span>Roles</span>
                                </span>
                        </a>
                </li>
               
               
                <li class="nav-item {{isset($sub_menu) ? ($sub_menu=='users' ? 'active' : '') : ''}}">
                        <a href="{{route('portal.users.index')}}" class="nav-link">
                            <span class="nav-text">
                                <span>Users</span>
                            </span>
                        </a>
                    </li>
         
  <li class="nav-item {{isset($sub_menu) ? ($sub_menu=='Permission' ? 'active' : '') : ''}}">
    <a href="{{url('permissions')}}" class="nav-link">
        <span class="nav-text">
            <span>Permission</span>
        </span>
    </a>
</li>

<li class="nav-item {{isset($sub_menu) ? ($sub_menu=='physicalstatus' ? 'active' : '') : ''}}">
    <a href="{{route('physicalstatus.index')}}" class="nav-link">
            <span class="nav-text">
                    <span>Physical Status</span>
            </span>
    </a>
</li>
        </ul>
</div>
<b class="sub-arrow"></b>
</li>

@endcan
<li class="nav-item {{isset($menu) ? ($menu=='SearchPetition' ? 'active open' : '') : ''}}">

        <a href="{{route('petitionsearchform')}}" class="nav-link {{isset($menu) ? ($menu=='SearchPetition' ? '' : 'collapsed') : 'collapsed'}}">
        <i class="nav-icon fa fa-cube" style="color:#fff"></i>
        <span class="nav-text fadeable">
        <span>Petiton Search</span>
        </span>
        
        
        </a>
        
        <b class="sub-arrow"></b>
        
        </li>
        <li class="nav-item {{isset($menu) ? ($menu=='Accepted' ? 'active open' : '') : ''}}">
        
                <a href="{{route('accepted')}}" class="nav-link {{isset($menu) ? ($menu=='Accepted' ? '' : 'collapsed') : 'collapsed'}}">
                <i class="nav-icon fa fa-cube" style="color:#fff"></i>
                  <span class="nav-text fadeable">
                          <span>Accepted Petition</span>
                  </span>
        
        
                </a>
        
                <b class="sub-arrow"></b>
        
                </li>
                <li class="nav-item {{isset($menu) ? ($menu=='Rejected' ? 'active open' : '') : ''}}">
        
                        <a href="{{route('rejected')}}" class="nav-link {{isset($menu) ? ($menu=='Rejected' ? '' : 'collapsed') : 'collapsed'}}">
                        <i class="nav-icon fa fa-cube" style="color:#fff"></i>
                          <span class="nav-text fadeable">
                                  <span>Rejected Petition</span>
                          </span>
        
        
                        </a>
        
                        <b class="sub-arrow"></b>
        
                        </li>

@can('jail-supt-list')
<!-- <li class="nav-item {{isset($menu) ? ($menu=='IGP' ? 'active open' : '') : ''}}">
<a href="#" id="IGP" class="nav-link dropdown-toggle {{isset($menu) ? ($menu=='IGP' ? '' : 'collapsed') : 'collapsed'}}">
        <i class="nav-icon fa fa-cube"></i>
        <span class="nav-text fadeable">
                <span>IGP</span>
        </span>
        <b class="caret fa fa-angle-left rt-n90"></b>
</a>
<div class="hideable submenu collapse {{isset($menu) ? ($menu=='IGP' ? 'show' : '') : ''}}">
        <ul class="submenu-inner">
        <li class="nav-item {{isset($sub_menu) ? ($sub_menu=='Petition' ? 'active' : '') : ''}}">
                        <a href="{{route('Petition.index')}}" class="nav-link">
                                <span class="nav-text">
                                        <span>Petition list</span>
                                </span>
                        </a>
                </li>



        </ul>
</div>
<b class="sub-arrow"></b>
</li> -->

<li class="nav-item {{isset($menu) ? ($menu=='IGP' ? 'active open' : '') : ''}}">

        <a href="{{route('Petition.index')}}" class="nav-link {{isset($menu) ? ($menu=='IGP' ? '' : 'collapsed') : 'collapsed'}}">
        <i class="nav-icon fa fa-cube" style="color:#fff"></i>
        <span class="nav-text fadeable">
        <span>Petition list</span>
        </span>


        </a>

        <b class="sub-arrow"></b>

        </li>
        <li class="nav-item {{isset($menu) ? ($menu=='homeremarks' ? 'active open' : '') : ''}}">

                <a href="{{route('remarksfromhome')}}" class="nav-link {{isset($menu) ? ($menu=='homeremarks' ? '' : 'collapsed') : 'collapsed'}}">
                <i class="nav-icon fa fa-cube" style="color:#fff"></i>
                <span class="nav-text fadeable">
                <span>Remarks from home</span>
                </span>


                </a>

                <b class="sub-arrow"></b>

                </li>
@endcan
@can('HomeDepartment-list')

<!-- <li class="nav-item {{isset($menu) ? ($menu=='HomeDepartment' ? 'active open' : '') : ''}}">
<a href="#" id="HomeDepartment" class="nav-link dropdown-toggle {{isset($menu) ? ($menu=='HomeDepartment' ? '' : 'collapsed') : 'collapsed'}}">
<i class="nav-icon fa fa-cube"></i>
<span class="nav-text fadeable">
        <span>Home department</span>
</span>
<b class="caret fa fa-angle-left rt-n90"></b>
</a>
<div class="hideable submenu collapse {{isset($menu) ? ($menu=='HomeDepartment' ? 'show' : '') : ''}}">
<ul class="submenu-inner">
<li class="nav-item {{isset($sub_menu) ? ($sub_menu=='homedept' ? 'active' : '') : ''}}">
                <a href="{{route('homedept.index')}}" class="nav-link">
                        <span class="nav-text">
                                <span>homepage</span>
                        </span>
                </a>
        </li>


</ul>

</div>
<b class="sub-arrow"></b>
</li> -->
<li class="nav-item {{isset($menu) ? ($menu=='HomeDepartment' ? 'active open' : '') : ''}}">

<a href="{{route('homedept.index')}}" class="nav-link {{isset($menu) ? ($menu=='HomeDepartment' ? '' : 'collapsed') : 'collapsed'}}">
<i class="nav-icon fa fa-cube" style="color:#fff"></i>
<span class="nav-text fadeable">
<span>HomeDepartment list</span>
</span>


</a>

<b class="sub-arrow"></b>

</li>

        <li class="nav-item {{isset($menu) ? ($menu=='HomeDepartments' ? 'active open' : '') : ''}}">

                <a href="{{route('remarksfrominterior')}}" class="nav-link {{isset($menu) ? ($menu=='HomeDepartments' ? '' : 'collapsed') : 'collapsed'}}">
                <i class="nav-icon fa fa-cube" style="color:#fff"></i>
                <span class="nav-text fadeable">
                <span>Remarks from interior</span>
                </span>


                </a>

                <b class="sub-arrow"></b>

                </li>

@endcan
@can('interior-list')

<li class="nav-item {{isset($menu) ? ($menu=='InteriorMinitries' ? 'active open' : '') : ''}}">

        <a href="{{route('InteriorMinstry.index')}}" class="nav-link {{isset($menu) ? ($menu=='InteriorMinitries' ? '' : 'collapsed') : 'collapsed'}}">
        <i class="nav-icon fa fa-cube" style="color:#fff"></i>
          <span class="nav-text fadeable">
                  <span>Interior Ministry</span>
          </span>


        </a>

        <b class="sub-arrow"></b>

        </li>
        <li class="nav-item {{isset($menu) ? ($menu=='Remarksfromhrd' ? 'active open' : '') : ''}}">

                <a href="{{route('InteriorMinstry.hrd')}}" class="nav-link {{isset($menu) ? ($menu=='Remarksfromhrd' ? '' : 'collapsed') : 'collapsed'}}">
                <i class="nav-icon fa fa-cube" style="color:#fff"></i>
                  <span class="nav-text fadeable">
                          <span>Remarks from HRD</span>
                  </span>


                </a>

                <b class="sub-arrow"></b>

                </li>




 @endcan
 @can('HumanRightDepartment-list')
 <li class="nav-item {{isset($menu) ? ($menu=='HumanRightDepartments' ? 'active open' : '') : ''}}">

        <a href="{{route('HumanRight.index')}}" class="nav-link {{isset($menu) ? ($menu=='HumanRightDepartments' ? '' : 'collapsed') : 'collapsed'}}">
        <i class="nav-icon fa fa-cube" style="color:#fff"></i>
          <span class="nav-text fadeable">
                  <span>HumanRight list</span>
          </span>


        </a>

        <b class="sub-arrow"></b>

        </li>
        @endcan
</nav>
