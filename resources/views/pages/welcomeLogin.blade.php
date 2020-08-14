
@include('subPages.header.header')

<style>
 body {
 /* background-color: #686565;*/
 background-image: url('/carouselimages/imageBackdrnd.png');
 background-size: cover;
  background-repeat:no-repeat;
  position: relative;
 } 
 .panel{
  border: 5px solid #244630;
  margin-top: 20px;
 }

</style>      


 <body>
<div class="container">

<div id="welcomeLogin" class="col-md-10 col-md-offset-1 ">
            <div class="panel panel-default">
                <div class="panel-heading" style=" background-color:#244630; height:50px; text-align:center; border-radius:0px; "><font style=" font-size:20px; color:white; ">IPAJI Y'IKAZE</font>
                </div>

                <div class="panel-body">
                    <div class="col-md-10 col-md-offset-1">
                      <center>
                      <p style="background-color:#cecece; width: 170px;"><img src="/images/logo.png"height="120" width="160" /> </p>
                      </center>
                      <h3>Ikaze : &nbsp;<b style="color: brown;">{{ Auth::user()->name }} {{ Auth::user()->sname }}</b> </h3>
                      <p> Dukomeje kugushimira umurava,ubwitange n'ubufatanye ukomeje kutugaragariza,ufata umwanya wawe usoma amateka y'u Rwanda na Serevise Impuzabumenyi igenda ikugezaho umunsi ku munsi. </p> 

                      <div class="line"></div>
                      <p> Mugihe ufite ingingo ushaka ko twazaganiraho cyangwa ubonye ibitagenda neza ku Impuzabumenyi <b><a href="{{ route('mycontact.create') }}" class="btn-success"> kanda hano </a> </b>&nbsp; uduhe igitekerezo, ushobora kandi kuduhamagara aha <span class="fa fa-phone"></span><b style="color: blue"> +250788863488 </b>,&nbsp; cyangwa utwandikire aha &nbsp; <span class="fa fa-envelope"></span> <b style="color: blue">dndahimana58@gmail.com</b>.</p>
                      <center>
                      <br>

                      <a href="{{ url('/') }}" class=" btn btn-success" style="margin-right:20px;margin-bottom:5px; font-size: 16px;  "> <span class=" fa fa-home" style="color: black;  "></span> <b>Ahabanza </b></a>
                    <a href="{{ url('profile/myProfile')}}" class=" btn btn-info" style="margin-bottom:5px;font-size: 16px;  "> <span class=" fa fa-user-circle" style=" color: black; "></span><b> Umwirondoro Wawe </b></a> 
                    </center>
                    <hr>
                   <h4> <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="pull-right" style="color: blue;">
            Sohokamo
                </a> 
                @role('superadmin|admin|editor')
              <a href="{{ url('/mastrAdmin/admin/dashboard')}}" class=" btn btn-warning btn-sm pull-left" style="opacity: .9;">
            Dashboard
                </a>
                @endrole
              </h4>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form> 
                <p></p>
                 <p style="font-weight: bold; text-align: center; font-style: italic; color: gray; margin-top: 50px;">  Copyright © 2018. All right reserved by Impuzabumenyi </p>
                    </div>
                   
                    
                   
                </div>
            </div>
        </div>
 </div>
@include('subPages.javaScript.js')
</body>
</html>
