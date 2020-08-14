<div class="col-md-3" style="background-color:white; color: #557b71;"> 
<!--     <div class="col-xs-12" > -->
          <ul class="nav nav-pills nav-stacked" >
<hr>
              @role('superadmin|admin')
                <li><a href="{{ route('users.index') }} "><span class="fa fa-users"></span> &nbsp;Manage Users</a></li>
                <li><a href="{{ route('management.index') }} "><span class="fa fa-user-secret"></span> &nbsp;Manage The Workers</a></li>
                @role('superadmin')
                <li><a href="{{ route('department.index') }} ">
                  <span class="fa fa-balance-scale"></span> &nbsp;Manage The Departments</a></li>
                  @endrole
              @endrole
              
             <!-- ++++++++++++++++++++++++Start+++++++++++++++++++++++++++++ -->
             <hr>
              <h3>Manage Posts</h3>
              <li><a href="{{ url('mastrAdmin/admin/dashboard')}} "><span class="fa fa-edit"></span> &nbsp;Manage the Messages </a></li>
              
                <li><a href="{{ route('posts.index') }} "><span class="fa fa-folder"></span> &nbsp;Manage Posts</a>
                </li>

                <li><a href="{{ url('chat/forum/chatcomment') }} "><span class="fa fa-comments">'s</span> &nbsp;Manage Chats</a>
                </li>

                <hr>
                <h3>Ibidukikije</h3>
                <li> <a href="{{ route('animal.index') }} "><span class="fa fa-folder-open">'s</span> &nbsp;Manage Animals</a></li>
                <li> <a href="{{ route('tree.index') }} "><span class="fa fa-folder-open">'s</span> &nbsp;Manage Trees</a></li>
                <hr>
                <h3>Ubukerugendo</h3>
                <li> <a href="{{ url('/all/rwandan/all_biggest_parks') }} "><span class="fa fa-folder-open">'s</span> &nbsp;Manage Parks</a></li>
                <li> <a href="{{ url('/all/rwandan/all_museums') }} "><span class="fa fa-folder-open">'s</span> &nbsp;Manage Museums</a></li>
                <li> <a href="{{ url('lacs/river/') }} "><span class="fa fa-folder-open">'s</span> &nbsp;Manage Lacs</a></li>
                <li> <a href="{{ url('volcano/mountain') }} "><span class="fa fa-folder-open">'s</span> &nbsp;Manage Volcano/Mountain</a></li>
                <hr>
                <h3>Amateka</h3>

                <li><a href="{{ route('abami.index')}} "><span class="fa fa-archive">'s</span> &nbsp;Manage Abami</a>
                </li>
                <li><a href="# "><span class="fa fa-archive">'s</span> &nbsp;Manage Heroes Categories</a>
                </li>
                <li><a href="{{route('insigamigani.index')}}"><span class="fa fa-folder-open">'s</span> &nbsp;Manage Insigamigani</a>
                </li>

                <li><a href="{{ url('amateka/all/uduce_nyaburanga') }} "><span class="fa fa-folder-open">'s</span> &nbsp;Manage Ahantu Nyaburanga</a>
                </li>

                

                <hr>
                <h3>Umuco & Kirazira</h3>
                <li><a href="{{ url('gakondo/all/ibikoresho_gakondo') }} "><span class="fa fa-archive">'s</span> &nbsp;Manage Ibikoresho Gakondo</a>
                </li>
                <li><a href="{{ url('gakondo/all/imyambaro_gakondo') }} "><span class="fa fa-archive">'s</span> &nbsp;Manage Imyambaro Gakondo</a>
                </li>
                <li><a href="#"><span class="fa fa-archive">'s</span> &nbsp;Indangagaciro na Kirazira</a>
                </li>
               <!-- +++++++++++++++End +++++++++++++++++++++++++ -->
               <hr>
                <h3>Ururimi</h3>

                <li><a href="{{ url('ntibavuga/bavuga/allntibavuga') }} "><span class="fa fa-archive">'s</span> &nbsp;Manage Ntibavuga Bavuga</a>
                </li>
                
                <li><a href="{{ url('ururimi/all/sakwe_sakwe') }} "><span class="fa fa-archive">'s</span> &nbsp;Manage Sakwe Sakwe</a>
                </li>
                <li><a href="{{ url('ururimi/all/imigani_yose') }} "><span class="fa fa-archive">'s</span> &nbsp;Manage Imigani Miremire</a>
                </li>
                <li><a href="{{ url('ururimi/all/imiganimigu_yose') }} "><span class="fa fa-archive">'s</span> &nbsp;Manage Imigani Migufi</a>
                </li>
                <li><a href="#"><span class="fa fa-archive">'s</span> &nbsp;Indangagaciro na Kirazira</a>
                </li>
                <!-- ++++++++++++++++++ -->

         @role('superadmin')
              <hr style="background-color:black; height: 3px;">
              <h3>Roles and Permission</h3>
              <li><a href="{{route('roles.index')}}"><span class="fa fa-tags"></span> &nbsp;Roles</a>
              </li>
              <li><a href="{{route('permissions.index')}}"><span class="fa fa-pencil"></span> &nbsp;Permissions</a>
              </li>
          @endrole

            @role('superadmin')

              <hr style="background-color:black; height: 3px;">

              <h3>Categories Creation</h3>
              <li><a href="{{ url('ikiciro/category') }}"><span class="fa fa-file"></span> &nbsp;Manage Post Categories</a></li>
              <li><a href="{{ url('gallery/gallerycategory') }}"><span class="fa fa-folder"></span> &nbsp;Manage Gallery Categories</a></li>
              <li><a href="{{ route('ntibavugacategory.index') }}"><span class="fa fa-list"></span> &nbsp;Manage Ntibavuga Bavuga Categories</a></li>
               <li><a href="{{ route('animalcategory.index') }}"><span class="fa fa-list"></span> &nbsp;Manage Animals Categories</a></li>

               <li><a href="{{ route('treecategory.index') }}"><span class="fa fa-list"></span> &nbsp;Manage Trees Categories</a></li>

               <li><a href="{{ route('king_categories.index') }}"><span class="fa fa-list"></span> &nbsp;Manage Kings Categories</a></li>
            @endrole
               
                   <hr style="background-color:black; height: 3px;">
            
              <h3>Gallery & Carousel</h3>
              <li><a href="{{ route('carousels.index')}}"><span class="fa fa-edit"></span> &nbsp;Manage Carousel Image</a>
              </li>
               
                <li><a href="{{ url('gallery/images')}}"><span class="fa fa-tasks"></span> &nbsp;Manage Photos Gallery</a>
                </li>
              
              @role('superadmin|admin')
              <hr style="background-color:black; height: 3px;">
              <h3>Announcement & Publicities</h3>
              <li><a href="{{route('news.index')}}"><span class="fa fa-envelope"></span> &nbsp;Manage All Announcements of the Users</a></li>

              <li><a href="{{ route('pubs.index')}}"><span class="fa fa-tags"></span> &nbsp;Manage The Publicities</a></li>
              @endrole
               <hr style="background-color:black; height: 3px;">
       </ul> 
           
<!--               </div>-->
         <!--  </div> -->
     </div>
