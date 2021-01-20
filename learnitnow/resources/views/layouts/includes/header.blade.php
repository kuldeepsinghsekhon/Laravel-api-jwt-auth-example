<div class="header">
		<div class="container container_cw">
			<div class="navbar-topline">
				<a href="{{ url('/')}}">
				<div class="logo_sec">
					<img src="{{ asset('images/logo.png') }}">
				</div>
				</a>
				<div class=" top-right">
				<form method="get" action="{{ route('courses.search')}}">
					<div class="input-group ">
					<!-- <input class="form-control py-2" type="text" placeholder="Search for the course or skill you want to learn" id="example-search-input">--> 
						<input id="example-search-input" class="form-control py-2" name="name" type="text" placeholder="Search for the course or skill you want to learn">
						<span class="input-group-append">
							<button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i>
							</button>
                     	</span>
					</div>
					</form>
					<ul class="list-inline list-unstyled addres_sec">
						<li class="left-li"><i class="fa fa-phone"></i>(02) 8884 2858</li>
						<li class="left-li"><i class="fa fa-envelope"></i>enquiry@hinsw.com.au</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="navbar-bottom_line">
			<div class="container container_cw">
				<nav class="navbar navbar-expand-md custom-navbar navbar-dark"> <a href="{{url('/register')}}">Enroll Now!</a>
					<button class="navbar-toggler navbar-toggler-right custom-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> <span class="navbar-toggler-icon "></span>
					</button>
					<div class="collapse navbar-collapse " id="collapsibleNavbar">
						<ul class="navbar-nav ml-auto ">
						
						@if (!Auth::guest() && (Auth::user()->role == 'admin'))
						<li class="nav-item"> <a class="nav-link" href="{{ url('/overview') }}"> Dashboard  </a>
							</li>
							@endif
							<li class="nav-item"> <a class="nav-link" href="{{ url('/') }}"> Home  </a>
							</li>
								
								
								<li class="nav-item dropdown dmenu crs_dp">
							<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
							   Courses  
							</a>
							@php $categories=\App\Models\Coursecategory::all();
							@endphp
							<div class="dropdown-menu sm-menu crdp_mid">
							@foreach($categories as $categori)
							  <a class="dropdown-item" href="{{url('/category'.'/'.$categori->id)}}">{{$categori->name}}</a>
							  
							  @endforeach
							</div>
						  </li>
							@if (Route::has('login'))
							@auth
							<li class="nav-item"> <a class="nav-link" href="/mycourses"> My Courses </a></li>
							<li class="nav-item"> <a class="nav-link" href="/user/profile"> Student Info  </a>
							@endif
							@endif
							
							</li>

				@if (Route::has('login'))
                    @auth
					<li class="nav-item">
					<a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
					</li>
                    @else
						<li class="nav-item"> <a class="nav-link" href="{{ route('login') }}">Login</a>
						</li>
                    @endif
            @endif
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>