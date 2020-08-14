 <!-- Left NavigationBar  -->
        <nav id="sidebar">
            <div class="sidebar-header" style="margin-top: 10px;">
                <p><a href="/" >
                    <img src="/images/logo.png" height="100px" alt="logo"  />
                    </a>
                </p>
            </div>

            <ul class="list-unstyled components">
               <li class="{{ Request::is('/')? "active" :"" }}"><a href="/"><i  class="fa fa-home" style="font-size: 20px;"></i> AHABANZA</a></li>
                        
                           <!-- <li class="dropdown"> -->
                            <p data-target="#ibidukikije" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <span class="fa fa-folder-open"></span> IBIDUKIKIJE <span class="fa fa-plus-circle">  </span></p>
                            <!-- <ul class="collapse list-unstyled in" id="ibidukikije"> -->
                            <ul class="collapse list-unstyled" id="ibidukikije">

                                 <li><a href="{{ url('/animal/all/all_mammalia')}}"><span class="fa fa-list-ol"></span> Inyamaswa zi nyamabere ziboneka mu Rwanda</a></li>

                                 <li role="separator" class="divider"></li>
                                 <li><a href="{{ url('/animal/all/all_birds')}}"><span class="fa fa-list-ol"></span> Ubwoko bw'ibiguruka/ inyoni buboneka mu Rwanda</a></li>

                                 <li role="separator" class="divider"></li>
                                 <li><a href="{{ url('/animal/all/all_fishes')}}"><span class="fa fa-list-ol"></span> Inyamaswa ziba mu amazi ziboneka mu Rwanda</a></li>
                                 <li role="separator" class="divider"></li>

                                 <li><a href="{{ url('/animal/all/all_reptiles')}}"><span class="fa fa-list-ol"></span> Ubwoko bw'ibikururanda buri mu Rwanda</a></li>
                                 <li role="separator" class="divider"></li>

                                 <li><a href="{{ url('/animal/all/all_insects')}}"><span class="fa fa-list-ol"></span> Ubwoko bw'inigwahabiri buri mu Rwanda</a></li>
                                 <li role="separator" class="divider"></li>
                                 <li style="text-align: center;">IBIMERA/ IBITI</li>
                                 <li><a href="{{url('tree/all/all_bigTrees')}}"><span class="fa fa-list-ol"></span> Amoko y'ibiti bifite uruti rukomeye</a></li>
                                 <li role="separator" class="divider"></li>
                                 <li><a href="{{url('tree/all/all_smallTrees')}}"><span class="fa fa-list-ol"></span> Amoko y'ibiti / ibimera bifite uruti rworoshye</a></li>

                                 <li role="separator" class="divider"></li>
                                 <li><a href="{{url('tree/all/all_grasses')}}"><span class="fa fa-list-ol"></span> Amoko y'ibyatsi</a></li>
                                <!--  <li role="separator" class="divider"></li> -->
                            </ul>
                 <!-- </li> -->
                       <p data-target="#ubukerarugendo" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <span class="fa fa-list"></span> IBYANYA BY'UBUKERARUGENDO <span class="fa fa-plus-circle">  </span></p>
                            <ul class="collapse list-unstyled " id="ubukerarugendo">
                                

                                <li><a href="{{ route('parks.index')}}"><span class="fa fa-folder-open"></span>  Pariki zitandukanye zo mu Rwanda</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li ><a href="{{ route('museums.index')}}"><span class="fa fa-building"></span> Inzu Ndangamurage</a></li>
                                <li role="separator" class="divider"></li>

                                 <li><a href="#"><span class="fa fa-list-ol"></span> Imigezi & Ibiyaga biri mu Rwanda</a></li>
                                 <li role="separator" class="divider"></li>

                    <li title="Ibirunga/ Imisozi" data-toggle="popover" id="volcano_hills" data-placement="right" data-trigger="focus" data-content=" 
                    <div class='well'>
                        <strong style='color:black;'> Ibirunga/ Imisozi</strong>
              <p><a href='#' class='btn btn-success btn-lg'> Ibirunga </a></p>
              <p><a href='#' class='btn btn-success btn-lg'> Imisozi </a></p>
          </div>
              " data-html="true"  style="margin-bottom: 3px;">

                    <a href="#" ><span class="fa fa-list-ol"></span> Urutonde rw'ibirunga n'imisozi biri mu Rwanda </a></li>
                            </ul>
                        <!-- <li class="dropdown"> -->
                            <p data-target="#ubukungu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <span class="fa fa-book"></span> UBUKUNGU <span class="fa fa-plus-circle">  </span></p>
                            <ul class="collapse list-unstyled " id="ubukungu">
                                

                                <li><a href="#"><span class="fa fa-industry"></span>  Urutonde rw'inganda ziri mu Rwanda</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li ><a href="#"><span class="fa fa-building"></span> Urutonde rwa hoteli ziri mu Rwanda</a></li>

                                <li role="separator" class="divider"></li>
                                <li ><a href="#"> Urutonde rw'imyuga ibyara inyugu ikorerwa mu rwanda</a></li>

                                <li role="separator" class="divider"></li>
                                <li ><a href="#"> Urutonde rw'amasoko aba mu Rwanda</a></li> 

                                <!-- <li role="separator" class="divider"></li>
                                <li ><a href="#"> Ikoranabuhanga mu Rwanda</a></li>
 -->
                            </ul>
                        <!-- </li> -->
                 <!-- <li class="dropdown"> -->
                            <p data-target="#ubuzima" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <span class="fa fa-stethoscope"></span> UBUZIMA <span class="fa fa-minus-circle">  </span></p>
                            <ul class="collapse list-unstyled in" id="ubuzima"> 

                                <li><a href="#"><span class="fa fa-user-md" style="font-size: 20px;"></span>  Inama ku ndwara zitandukanye</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <!-- <li ><a href="#"><span class="fa fa-hospital-o" style="font-size: 20px;"></span> Urutonde rw'ibitaro n'ibigonderabuzima biri mu Rwanda</a></li> -->
                                <!-- <li role="separator" class="divider"></li>
                                <li ><a href="#"> Politike y'ubuzima mu Rwanda</a></li> -->

                            </ul>

                            <p data-target="#politike" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <span class="fa fa-certificate"></span> POLITIKE <span class="fa fa-plus-circle">  </span></p>
                            <ul class="collapse list-unstyled " id="politike"> 

                                <li><a href="#"><span class="fa fa-balance-scale" style="font-size: 20px;"></span>  Amashyaka yemewe mu Rwanda</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li ><a href="#"><span class="fa fa-bell-o" style="font-size: 20px;"></span> Indirimbo yubahiriza igihugu</a></li>
                                <li role="separator" class="divider"></li>
                                <li ><a href="#"><span class="fa fa-flag"></span> Ibendera n'ikirangantego by'u Rwanda</a></li>

                            </ul>
                        <!-- </li> -->

                       <!--  <li class="dropdown"> -->
                            <p data-target="#amateka" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <span class="fa fa-archive"></span> AMATEKA <span class="fa fa-plus-circle">  </span></p>
                            <ul class="collapse list-unstyled in" id="amateka">

                                <!-- <li><a href="#"><span class="fa fa-archive"></span>  Uko u Rwanda rwayoborwaga mu gihe cy'abami</a>
                                </li>
                                <li role="separator" class="divider"></li> -->
                                <li ><a href="{{url('/amateka/all/all_kings')}}"><span class="fa fa-list-ol"></span> Urutonde rw'abami </a></li>

                                <li role="separator" class="divider"></li>
                                <li title="Ibyiciro by'Intwari" data-toggle="popover" id="intwari" data-placement="right" data-trigger="focus" data-content=" 
                    <div class='well'>
                        <strong style='color:black;'> Ibyiciro by'intwari</strong>
              <p>1. <a href='#' class='btn btn-info btn-lg'> Imena </a></p>
              <p>2. <a href='#' class='btn btn-info btn-lg'> Imanzi </a></p>
              <p>3. <a href='#' class='btn btn-info btn-lg'> Ingenzi </a></p>
          </div>
              " data-html="true" style='color: red;'>




                                    <a href="#"><span class="fa fa-list"></span> Ibyiciro by'intwari</a></li>

                                <li role="separator" class="divider"></li>
                                 <li ><a href="{{ url('amateka/all/insigamigani_zose')}}"><span class="fa fa-folder-open"></span> Insigamigani</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href=" {{ route('ahantu_nyaburanga.index')}} "><span class="fa fa-archive"></span> Uduce nyaburanga</a>
                                </li>

                            </ul>
                       <!--  </li> -->

                        <!-- <li class="dropdown"> -->
                            <p data-target="#umuco" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <span class="fa fa-folder"></span> UMUCO <span class="fa fa-minus-circle">  </span></p>
                            <ul class="collapse list-unstyled in" id="umuco">
                                

                                <li><a href=" {{route('ibikoresho.index')}} "><span class="fa fa-list"></span> Ibikoresho Gakondo</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li ><a href=" {{route('imyambaro.index')}}"><span class="fa fa-list"></span> Imyambaro Gakondo</a></li>

                                <li ><a href="#"><span class="fa fa-list"></span> Indangagaciro na kirazira</a></li>

                                <!-- <li role="separator" class="divider"></li>
                                <li ><a href="#"><span class="fa fa-list"></span> Gushyingira bya kinyarwanda</a></li>
 -->
                            </ul>
                        <!-- </li> -->
                        <!-- <li class="dropdown"> -->
                            <p data-target="#ururimi" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <span class="fa fa-language"></span> URURIMI <span class="fa fa-minus-circle">  </span></p>
                            <ul class="collapse list-unstyled in" id="ururimi">
                                <li role="separator" class="divider"></li>
                                <li ><a href=" {{ route('ntibavuga.index')}} "><span class="fa fa-list"></span> Ntibavuga Bavuga</a></li>
                                <li role="separator" class="divider"></li>
                                <li ><a href="#"><span class="fa fa-language" style="font-size: 20px;"></span> Urutonde rw'ibihekane</a></li>
                                <li role="separator" class="divider"></li>
                                
                                <!-- <li ><a href="#"><span class="fa fa-list"></span> Ubuvanganzo</a></li> -->

                                <li role="separator" class="divider"></li>
                                
                                <li ><a href="#"><span class="fa fa-list"></span> Urwenya</a></li>

                                <label style="margin-left: 16px; margin-top: 5px;">IMIGANI & IBISAKUZO</label>
                                <!-- <li role="separator" class="divider"></li> -->
                                 <li ><a href="{{route('imigani_miremire.index')}}"> Imigani miremire</a></li>

                                <li ><a href="{{route('imigani_migufi.index')}}"> Imigani migufi</a></li>
                               <!--  <li role="separator" class="divider"></li> -->

                                <!-- <li role="separator" class="divider"></li>
                                <label style="margin-left: 16px; margin-top: 5px; text-align: center;">IBISAKUZO</label>
                                <br> -->
                                <li role="separator" class="divider"></li>
                                <li ><a href="{{ route('ibisakuzo.index')}}"> Ibisakuzo nuko byicwa</a></li>
                                <li role="separator" class="divider"></li>
                                <!-- <li ><a href="#"> Ibindi ugomba kumenya</a></li> -->

                            </ul>
                 <li> &nbsp;&nbsp;&nbsp;&nbsp;</li>
                 <li> &nbsp;&nbsp;&nbsp;&nbsp;</li>
                  <li> &nbsp;&nbsp;&nbsp;&nbsp;</li>
                        <!-- </li> -->
                <li><a href="{{route('mycontact.create')}}"><span class="fa fa-inbox"></span> Twandikire</a></li> 
                <li><a href="#"><span class="fa fa-gear"></span> Amategeko n'amabwirira</a></li> 
                <li><a href="#"><span class="fa fa-certificate"></span> Abo Turibo</a></li>

            </ul>
        </nav>
<!-- +++++++++++++++++++++Side bar End ++++++++++++++++ -->