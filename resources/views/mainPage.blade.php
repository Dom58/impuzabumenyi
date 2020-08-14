@include('subPages.header.header')  
@yield('cssFiles')

<style>
.col-md-6 > ul >a:hover{
  border: 2px solid red;
  margin-top: 10px;
  background-color: whitesmoke;
 /* font-weight: bold;*/
}
.modal-body ul li{
  list-style: none;
  font-weight: normal;
}
.fa-cc-visa,.fa-cc-mastercard,.fa-cc-discover,.fa-cc-paypal,.fa-credit-card,.fa-google-wallet{
  font-size: 40px;
}
.fa-cc-visa,.fa-cc-mastercard,.fa-cc-discover,.fa-cc-paypal,.fa-credit-card,.fa-google-wallet:hover{
 cursor: pointer;
}
.tuganire  {
      top: 70%;
      height: 10px;
      width: 150px;
      z-index: 9999!important;
      text-align: center;
  }

  .tuganire {
  /*display: none;*/
  position: fixed;
/*  bottom: 500px;*/
   right: 10px;
  background-color:transparent;
  padding: 5px;
  text-align: center;
  color: white;
  font-size: 20px;
  z-index: 9999 !important;
}
.tuganire:hover {
  text-decoration: none;
  }
#isoko{
    background-color: ;
    transition: .5s; 
    box-shadow: 3px 5px 6px 5px #4d4f4f;
  }
 #isoko:hover{
  box-shadow: 3px 5px 6px #4d4f4f;
    transition:all .3s ease 0s;
    transform: scaleY(1.3);
    font-family: 'Roboto',sans-serif;  
}
  #profile a:hover{
    background-color: #398439;
    border-left: 4px solid black; 

  }

</style>


    <body>
      <div class="wrapper">

        <!-- <div class="row" style="margin-right: 15px; margin-left: 0px;"> -->
  <div data-spy="affix" data-offset-top="197">
      <a href="#" class="back-to-top"><span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span></a> 
    </div>
        @include('subPages.navigation.navigation')
  <!--- ................Messages will be displayed in this area  ...below top navigation........................ -->

        <div id="content">
        @include('subPages.notificationMessage.message')
         <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" data-spy="affix" data-offset-top="197" style="background-image: url('/carouselimages/caption.png'); box-shadow: -3px 5px 3px 5px #dadada;" role="navigation">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info btn-lg">
                        <i class="fa fa-align-left" style="font-size: 18px;"></i>
                        <span> IBIRIMO</span>
                    </button>
                    <button class="btn btn-dark  d-lg-none ml-auto pull-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-align-justify"></i>
                    </button>

                    <a class="nav-link btn btn-success btn-lg" href="#" id="isoko" title="GURA IBICURUZWA UCIYE AHA" data-toggle="popover"  data-placement="bottom" data-trigger="focus" data-content=" 
              <p>Iyo winjiye muri iki gice '<b>KU ISOKO</b>',ubona ibicuruzwa byinshi
              bikorerwa mu Rwanda(<b>Made in Rwanda </b>),aho wabitumiza bikakugeraho ku buryo bworoshye,kandi buhendutse.</p>
              <p><b>[ <span class='fa fa-warning' style='color:brown;'></span> Mutwihanganire iki gice kiracyanozwa neza !!]</b></p>" data-html="true" style="font-size: 18px; margin-left:15%;"><span class="fa fa-shopping-cart"></span> KU ISOKO</a>

                    <div class="collapse navbar-collapse pull-right" id="navbarSupportedContent" style="margin-top: 15px;">
                        <ul class="nav navbar-nav ml-auto">
                            <li>
                             <form class="navbar-form" role="search" action="{{ route('searchResult.index') }}" method="get">
                             <div class="input-group">
                               <input type="text" name="search" class="form-control" id="srch-term" placeholder="Andika ushakishe..." value="">
                               <div class="input-group-btn">
                                 <button class="btn btn-default" type="submit" style="background-color: #c9eab3;"><i class="fa fa-search"></i> Shakisha</button>
                               </div>
                             </div>
                            </form>
                        </li>
                            @if(Auth::guest())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" style="font-size: 18px;"><span class="fa fa-sign-in"></span> INJIRA</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}" style="font-size: 17px;"><span class="fa fa-user-plus"></span> IYANDIKISHE</a>
                            </li>
                        </ul>
                        @else
                        <ul class="nav navbar-nav nav-pills navbar-right" id="profile">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"aria-expanded="false"> Ikaze: &nbsp;
                           {{ Auth::user()->username }} <span class="caret">  </span></a> 
                            
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('profile/myProfile')}}"> <span class="fa fa-user-circle-o"></span> Umwirindoro wange</a></li>

                                @role('superadmin|admin|editor|author')
                                 <li role="separator" class="divider"></li>
                                <li><a href="{{ url('/mastrAdmin/admin/dashboard')}}"> <span class="fa fa-file-zip-o"></span> Dashboard</a></li>
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

                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('posts.create') }}"><span class="fa fa-edit"></span> Create a Post</a></li>
                                <li role="separator" class="divider"></li>
                          @endrole

                                 @role('superadmin|admin')
                                 <li><a href="{{ route('pubs.create') }}"><span class="fa fa-edit"></span> Create a Publicity</a></li>
                                <li role="separator" class="divider"></li>
                                 <li><a href="{{ route('news.create') }}"><span class="fa fa-edit"></span> Create a Web Announcement</a></li>
                                <li role="separator" class="divider"></li>
                                <br>
                                @endrole

                                <li role="separator" class="divider"></li>
                                
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                         <span class="fa fa-sign-out"></span>   Sohokamo
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                           </ul>
                        </li>        
                    </ul>
                    @endif
                        <!-- ++++++++++++++++++++++++ -->
                    </div>
                </div>
            </nav>
        </div>


        @if( Auth::check())
        <a href="{{ url('/chat/forum/tuganire')}}" class="tuganire" target="_blank">
<div class="panel panel-default" style=" background-image: url('/carouselimages/caption.png'); background-color: transparent; height: 90px; text-align: center; border-radius: 13px; border:3px solid green;">
  <!-- <div class="panel-body"> -->
    <h3><span class="fa fa-handshake-o" style="font-size: 30px;"></span> <br><b>Tuganire </b></h3>
  <!-- </div> -->
</div>
</a>
@endif
          <div class="row">
             @yield('rowhead')
           </div>
           <br>

      <div class="row">

          @yield('informationBody')

          @yield('rightPublicity')

    </div>
    <div class="row">
      @yield('bottom')
    </div>
    <!-- ++++++++++++++++++++++++++++Footer -->
         @include('subPages.footer.footer')

      @include('subPages.javaScript.js')
<!-- </div> -->
            </div>
             
</div>

<!-- Up and down display of font awesome -->
<script type="text/javascript">
  $(document).ready(function (){
$('.collapse').on('shown.bs.collapse',function(){
$(this).parent().find('.fa-angle-double-down').removeClass('fa-angle-double-down').addClass('fa-angle-double-up');
}).on('hidden.bs.collapse',function(){
$(this).parent().find('.fa-angle-double-up').removeClass('fa-angle-double-up').addClass('fa-angle-double-down');
});

  });
</script>
<script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
<script type="text/javascript">
  $(document).ready(function(){
  $('#isoko').popover();
  });
</script>
        @yield('javaScriptFiles')
        
    </body>
