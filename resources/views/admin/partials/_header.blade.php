  
  <nav class="navbar navbar-default" data-spy="affix" data-offset-top="197" style="color: red;  background-color: #000000; " role="navigation" >
            <div class="container-fluid">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-container">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class=" ">Menu</span>
                    </button>
                    <a class="navbar-brand" href="/">
                        <img src="/images/logo.png" alt="logo" height="30px" />
                    </a>
                    
                </div>
                 @if (Auth::guest())
                <div class="collapse navbar-collapse header" id="navbar-container"  style="text-align:center;">
                    <ul class="nav navbar-nav nav-pills navbar-left">

                 <li> &nbsp;&nbsp;&nbsp;&nbsp;</li>
                <li><a href="{{ route('login') }}">Login or Register</a></li>
             </ul>

         </div>
                  

                @else 
                    <div class="collapse navbar-collapse header" id="navbar-container"  style="text-align:center;">
                   <ul class="nav navbar-nav nav-pills navbar-left">
                        <li class="{{ Request::is('/')? "active" :"" }}"><a href="/"><i  class="fa fa-home"></i> Ahabanza</a></li>
                        
<!-- ++++++++++++++ -->
                           <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"aria-expanded="false"> <span class="fa fa-archive"></span> Ibidukikije<span class="caret">  </span></a>
                            <ul class="dropdown-menu">
                          
                                 <li><a href="#"><span class="fa fa-list-ol"></span> Ubwoko bw'inyamaswa z'inyagasozi ziboneka mu Rwanda</a></li>
                                 <li role="separator" class="divider"></li>

                                 <li><a href="#"><span class="fa fa-list-ol"></span> Ubwoko bw'Amatungo buba mu Rwanda</a></li>
                                 <li role="separator" class="divider"></li>

                                 <li><a href="#"><span class="fa fa-list-ol"></span> Ubwoko bw'inyamaswa ziba mu amazi ziboneka mu Rwanda</a></li>
                                 <li role="separator" class="divider"></li>
                                 <li><a href="#"><span class="fa fa-list-ol"></span> Ubwoko bw'inyoni buboneka mu Rwanda</a></li>
                                 <li role="separator" class="divider"></li>

                                 <li><a href="#"><span class="fa fa-list-ol"></span> Ubwoko bw'ibimera & Ibiti biboneka mu Rwanda</a></li>
                                 <li role="separator" class="divider"></li>

                                 <li><a href="#"><span class="fa fa-list-ol"></span> Imigezi & Ibiyaga biri mu Rwanda</a></li>
                                 <li role="separator" class="divider"></li>

                                <li><a href="#"><span class="fa fa-list-ol"></span> Urutonde rw'ibirunga n'imisozi biri mu Rwanda </a></li>
                                <!--  <li role="separator" class="divider"></li> -->
                            </ul>
                 </li>
                       
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"aria-expanded="false"> <span class="fa fa-book"></span> Ubukungu<span class="caret">  </span></a>
                            <ul class="dropdown-menu">
                                

                                <li><a href="#"><span class="fa fa-industry"></span>  Urutonde rw'inganda ziri mu Rwanda</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li ><a href="#"><span class="fa fa-building"></span> Urutonde rw'amahoteli ari mu Rwanda</a></li>

                                <li role="separator" class="divider"></li>
                                <li ><a href="#"> Urutonde rw'imyuga ibyara inyugu ikorerwa mu rwanda</a></li>

                                <li role="separator" class="divider"></li>
                                <li ><a href="#"> Urutonde rw'amasoko aba mu Rwanda</a></li> 

                                <li role="separator" class="divider"></li>
                                <li ><a href="#"> Ikoranabuhanga mu Rwanda</a></li>

                            </ul>
                        </li>
                 <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"aria-expanded="false"> <span class="fa fa-book"></span> Ubuzima<span class="caret">  </span></a>
                            <ul class="dropdown-menu">
                                

                                <li><a href="#">  Inama ku ndwara zitandukanye</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li ><a href="#"><span class="fa fa-hospital-o"></span> Urutonde rw'ibitaro nibigonderabuzima biri mu Rwanda</a></li>
                                <li role="separator" class="divider"></li>
                                <li ><a href="#"> Politike y'ubuzima mu Rwanda</a></li>

                            </ul>
                        </li>

                       <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"aria-expanded="false"> <span class="fa fa-book"></span> Amateka<span class="caret">  </span></a>
                            <ul class="dropdown-menu">
                                

                                <li><a href="#">  Uko u Rwanda rwayoborwaga mu gihe cy'Ubwami</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li ><a href=""><span class="fa fa-list-ol"></span> Urutonde rw'Abami bayoboye u rwanda</a></li>

                                <li role="separator" class="divider"></li>
                                <li><a href="#">  Uduce Nyaburanga</a>
                                </li>

                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"aria-expanded="false"> <span class="fa fa-book"></span> Umuco<span class="caret">  </span></a>
                            <ul class="dropdown-menu">
                                

                                <li><a href="{{route('ibikoresho.index')}}"><span class="fa fa-list"></span> Ibikoresho Gakondo</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li ><a href=" {{route('imyambaro.index')}}"><span class="fa fa-list"></span> Imyambaro Gakondo</a></li>
                                
                                 <li role="separator" class="divider"></li>
                                <li ><a href="#"><span class="fa fa-list"></span> Ibyiciro by'Intwari</a></li>

                                <li role="separator" class="divider"></li>
                                <li ><a href="#"><span class="fa fa-list"></span> Indangagaciro na Kirazira</a></li>

                                 <li role="separator" class="divider"></li>
                                <li ><a href="{{ route('ntibavuga.index')}}"><span class="fa fa-list"></span> Ntibavuga Bavuga</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"aria-expanded="false"> <span class="fa fa-book"></span> Ururimi<span class="caret">  </span></a>
                            <ul class="dropdown-menu">
                                <li ><a href="#"> Urutonde rw'ibihekane Bikoreshwa mu Kinyarwanda</a></li>
                                <li role="separator" class="divider"></li>

                                <label style="margin-left: 20px; margin-top: 5px;">IMIGANI</label>
                                <!-- <li role="separator" class="divider"></li> -->
                                <li ><a href="#"> Imigani migufi</a></li>
                               <!--  <li role="separator" class="divider"></li> -->
                                <li ><a href="#"> Imigani Miremire</a></li>
                               <!--  <li role="separator" class="divider"></li> -->
                                <li ><a href="#"> Indi migani</a></li>

                                <li ><a href="#"> Inshoberamahanga</a></li>

                                <li role="separator" class="divider"></li>
                                <label style="margin-left: 20px; margin-top: 5px;">IBISAKUZO</label>
                                <br>
                                <li role="separator" class="divider"></li>
                                <li ><a href="#"> Ibisakuzo nuko Byicwa</a></li>
                                <li role="separator" class="divider"></li>
                                <li ><a href="#"> Ibindi ugomba kumenya</a></li>

                            </ul>
                        </li>
                 <li><a href="#"><span class="fa fa-cart-plus"></span> ISOKO</a></li>    
             </ul>
                 <ul class="nav navbar-nav nav-pills navbar-right">
                     
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"aria-expanded="false"> Ikaze: &nbsp;
                           {{ Auth::user()->username }} <span class="caret">  </span></a> 
                            
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('profile/myProfile')}}"> <span class="fa fa-user-circle-o"></span> Umwirindoro wange</a></li>

                                @role('superadmin|admin|editor|author')
                                 <li role="separator" class="divider"></li>
                                <li><a href="/mastrAdmin/admin/dashboard"> <span class="fa fa-file-zip-o"></span> Dashboard</a></li>
                                 <li role="separator" class="divider"></li>

                                 <li>
                                    <a href="{{ route('carousels.create')}}"><span class="fa fa-camera"></span> &nbsp;Add Carousel Image</a>
                                </li>
                                 <li role="separator" class="divider"></li>

                                 <li>
                                    <a href="{{ route('gallery.create')}}"><span class="fa fa-camera"></span> &nbsp;Add Gallery Images</a>
                                </li>
                                 <li role="separator" class="divider"></li>
                                <li><a href="{{ route('ntibavuga.create') }}"><span class="fa fa-edit"></span> Create a Ntibavuga Bavuga</a></li>
                                 <li role="separator" class="divider"></li>
                        <li>
                           @role('superadmin|admin|editor')
                           <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" style="color: red;">
                                   <span class="fa fa-minus-circle"></span> Logout
                            </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                  </form>
                           @endrole
                       </li>
                                <li role="separator" class="divider"></li>
                                 <li><a href="{{ route('ibikoresho.create') }}"><span class="fa fa-edit"></span> Create Ibikoresho Gakondo</a></li>
                                <li><a href="{{ route('posts.create') }}"><span class="fa fa-edit"></span> Create a Post</a></li>
                                <li role="separator" class="divider"></li>
                          @endrole

                                 @role('superadmin|admin')
                                 <li><a href="{{ route('pubs.create') }}"><span class="fa fa-edit"></span> Create a Publicity</a></li>
                                <li role="separator" class="divider"></li>
                                 <li><a href="{{ route('news.create') }}"><span class="fa fa-edit"></span> Create a Web Announcement</a></li>
                                <br>
                                @endrole

                                <li role="separator" class="divider"></li>
                                
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Sohokamo
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                           </ul>
                        </li>        
                    </ul>
                </div>
                @endif
            </div>
       </nav>
