<nav aria-label="Main">
                <ul class="nav flex-column mt-2 has-active-border active-on-top">

                  {{-- <li class="nav-item-caption">
                    <span class="fadeable pl-3">MAIN</span>
                    <span class="fadeinable mt-n2 text-125">&hellip;</span>
                  </li> --}}


                  {{-- <li class="nav-item active">
                    <a href="html/dashboard.html" class="nav-link">
                      <i class="nav-icon fa fa-tachometer-alt"></i>
                      <span class="nav-text fadeable">
                  	  <span>Dashboard</span>
                      </span>
                    </a>
                    <b class="sub-arrow"></b>
                  </li> --}}

                  <li class="nav-item">

                    <a href="#" class="nav-link dropdown-toggle collapsed">
                      <i class="nav-icon fa fa-cube"></i>
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
                      <ul class="submenu-inner">
                        <li class="nav-item">
                          <span class="nav-text">
                  				  <span>
                                       <!-- the user avatar and image -->
              <div class="sidebar-section-item pt-2 fadeable-left fadeable-top">
                <div class="fadeinable">
                  <img alt="Natalie's avatar" src="assets/image/avatar/avatar3.jpg" width="48" class="p-2px border-2 brc-primary-tp2 radius-round" />
                </div>

                <div class="fadeable hideable">
                  <div class="py-2 d-flex flex-column align-items-center">
                    @auth
                      <img alt="Natalie's avatar" src="assets/image/avatar/avatar.png" class="p-2px border-2 brc-primary-m2 radius-round" />
                      {{ Auth::user()->name }}

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
                          <a href="href="{{ route('logout') }}"
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
@can('user-list')

		<li class="nav-item {{isset($menu) ? ($menu=='system_setting' ? 'active open' : '') : ''}}">
			<a href="#" id="system_setting" class="nav-link dropdown-toggle {{isset($menu) ? ($menu=='system_setting' ? '' : 'collapsed') : 'collapsed'}}">
					<i class="nav-icon fa fa-cube"></i>
					<span class="nav-text fadeable">
							<span>System Setting</span>
					</span>
					<b class="caret fa fa-angle-left rt-n90"></b>
			</a>
			<div class="hideable submenu collapse {{isset($menu) ? ($menu=='system_setting' ? 'show' : '') : ''}}">
					<ul class="submenu-inner">
							<li class="nav-item">
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
              <li class="nav-item">
                <a href="{{url('permissions')}}" class="nav-link">
                    <span class="nav-text">
                        <span>Permission</span>
                    </span>
                </a>
            </li>
					</ul>
			</div>
			<b class="sub-arrow"></b>
		</li>
        @endcan
        <li class="nav-item {{isset($menu) ? ($menu=='system_setting' ? 'active open' : '') : ''}}">
            <a href="#" id="system_setting" class="nav-link dropdown-toggle {{isset($menu) ? ($menu=='system_setting' ? '' : 'collapsed') : 'collapsed'}}">
                    <i class="nav-icon fa fa-cube"></i>
                    <span class="nav-text fadeable">
                            <span>IGP</span>
                    </span>
                    <b class="caret fa fa-angle-left rt-n90"></b>
            </a>
            <div class="hideable submenu collapse {{isset($menu) ? ($menu=='system_setting' ? 'show' : '') : ''}}">
                    <ul class="submenu-inner">
                            <li class="nav-item">
                                    <a href="{{route('Petition.index')}}" class="nav-link">
                                            <span class="nav-text">
                                                    <span>Petition list</span>
                                            </span>
                                    </a>
                            </li>
                  
              
                    </ul>
            </div>
            <b class="sub-arrow"></b>
        </li>
@can('HomeDepartment-list')

<li class="nav-item {{isset($menu) ? ($menu=='system_setting' ? 'active open' : '') : ''}}">
    <a href="#" id="system_setting" class="nav-link dropdown-toggle {{isset($menu) ? ($menu=='system_setting' ? '' : 'collapsed') : 'collapsed'}}">
            <i class="nav-icon fa fa-cube"></i>
            <span class="nav-text fadeable">
                    <span>Home department</span>
            </span>
            <b class="caret fa fa-angle-left rt-n90"></b>
    </a>
    <div class="hideable submenu collapse {{isset($menu) ? ($menu=='system_setting' ? 'show' : '') : ''}}">
            <ul class="submenu-inner">
                    <li class="nav-item">
                            <a href="{{route('homedept.index')}}" class="nav-link">
                                    <span class="nav-text">
                                            <span>homepage</span>
                                    </span>
                            </a>
                    </li>


	</ul>

</div>
<b class="sub-arrow"></b>
</li>
@endcan
@can('interior-list')
<li class="nav-item {{isset($menu) ? ($menu=='system_setting' ? 'active open' : '') : ''}}">
    <a href="#" id="system_setting" class="nav-link dropdown-toggle {{isset($menu) ? ($menu=='system_setting' ? '' : 'collapsed') : 'collapsed'}}">
            <i class="nav-icon fa fa-cube"></i>
            <span class="nav-text fadeable">
                    <span>Interior Ministry</span>
            </span>
            <b class="caret fa fa-angle-left rt-n90"></b>
    </a>
    <div class="hideable submenu collapse {{isset($menu) ? ($menu=='system_setting' ? 'show' : '') : ''}}">
            <ul class="submenu-inner">
                    <li class="nav-item">
                            <a href="{{route('InteriorMinstry.index')}}" class="nav-link">
                                    <span class="nav-text">
                                            <span>Interior</span>
                                    </span>
                            </a>
                    </li>


	</ul>

</div>
<b class="sub-arrow"></b>
</li>
@endcan
</nav>

							{{-- <li class="nav-item {{isset($sub_menu) ? ($sub_menu=='users' ? 'active' : '') : ''}}">
									<a href="{{route('portal.users.index')}}" class="nav-link">
											<span class="nav-text">
													<span>Users</span>
											</span>
									</a>
              </li> --}}
              {{-- <li class="nav-item">
                <a href="{{url('permissions')}}" class="nav-link">
                    <span class="nav-text">
                        <span>Permission</span>
                    </span>
                </a>
            </li> --}}


{{-- @endcan --}}
