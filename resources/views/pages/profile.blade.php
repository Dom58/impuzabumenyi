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
  border: 5px solid #222222;
  margin-top: 20px;
 }
 .panel-body{
  background-color: #e7f1e3;
}

</style>      


 <body>
<div class="container">

<div id="profile" class="col-md-10 col-md-offset-1 ">
            <div class="panel panel-default">
                <div class="panel-heading" style=" background-color:#222222; height:50px; text-align:center; border-radius:0px; "><font style=" font-size:20px; color:white; ">Umwirondoro wa <b> {{ Auth::user()->username }} </b></font>
                </div>
                <a href="/" class="btn btn-success pull-left btn-lg btn-lg"  style="margin-left: 30px; margin-top: 10px;"><span class="fa fa-home" style="font-size: 30px;"></span></a>
    
                <div class="panel-body">
                  <div class="col-md-8 col-md-offset-2">
                    <h3 style="">Umwirondoro Wawe</h3>
                    <hr>
                    <div class="profile-user-pic" style="margin-bottom: 5px;">

                    <img src="{{ asset('userProfileImage/'.Auth::user()->profile_image)}}" height="150" width="150" class="img-responsive img-circle" alt="No Profile Image" />
                    <!-- <img src="/images/profile.png" height="120" width="160" class="img-responsive img-circle" /> -->
                  </div>
                    <a href="{{ url('userProfile/'.Auth::user()->name.Auth::user()->username) }}" class="btn btn-default"> <span class="fa fa-edit" style="color: green; font-size: 20px; margin-bottom: 5px;"></span> <b style="color: green;">Hindura Umwirondoro</b></a><br>

                     <p style="border: 1px solid brown;"> Wujuje Umwirondoro kukigero cya : 

                      @if(!empty(Auth::user()->username ) && !empty(Auth::user()->email ) && !empty(Auth::user()->name ) && !empty(Auth::user()->sname ) && !empty(Auth::user()->sector ) && !empty(Auth::user()->district ) && !empty(Auth::user()->tel ) )
                      <b> 100%</b>

                      @elseif(empty(Auth::user()->sname ) && empty(Auth::user()->tel ) && empty(Auth::user()->gender ) && empty(Auth::user()->sector ) && empty(Auth::user()->district ) )
                      <b>60%</b>

                      @elseif(!empty(Auth::user()->username ) && !empty(Auth::user()->email ) && !empty(Auth::user()->name ) && !empty(Auth::user()->sname ) && !empty(Auth::user()->tel )  && !empty(Auth::user()->sector ) && empty(Auth::user()->district ) )
                      <b> 80%</b>

                      @elseif(!empty(Auth::user()->username ) && !empty(Auth::user()->email ) && !empty(Auth::user()->name ) && !empty(Auth::user()->sname ) && !empty(Auth::user()->tel )  && empty(Auth::user()->sector ) && !empty(Auth::user()->district ) )
                      <b> 80%</b>

                      @elseif(!empty(Auth::user()->username ) && !empty(Auth::user()->email ) && !empty(Auth::user()->name ) && !empty(Auth::user()->sname ) && !empty(Auth::user()->tel ) && empty(Auth::user()->sector ) && !empty(Auth::user()->district ) )
                      <b> 90%</b>

                      @else
                      <b> 70%</b>
                      @endif
                    </p>


                    <table width=100% class="table">
                      <tbody>
                      <tr>
                       
                        <td width="30%">
                    <h4>Izina Ribanza : </h4>
                        </td>
                        <td width="70%">
                    <h4><b style="color: black;">{{ Auth::user()->name }}</b> </h4>
                        </td>
                      </tr>
                      <tr>
                        <td width="30%">
                      <h4>Irindi Zina : </h4>
                        </td>
                        <td width="70%">
                          <h4><b style="color: black;">{{ Auth::user()->sname }}</b> </h4>
                        </td>
                      </tr>
                      <tr>
                        <td width="30%">
                          <h4>User Name : </h4>
                        </td>
                       
                        <td width="70%">
                           <h4><b style="color: black;">{{ Auth::user()->username }}</b> </h4>
                        </td>
                      </tr>
                      <tr>
                        <td width="30%">
                          <h4>Igitsina : </h4>
                        </td>
                        <td width="70%">
                           @if (Auth::user()->gender == 1)
                              <h4>Gabo</h4>
                            @else
                              <h4>Gore</h4>
                            @endif
                        </td>
                      </tr>
                      <tr>
                        <td width="30%">
                        <h4>Telefone : </h4>
                        </td>
                        <td width="70%">
                        <h4><b style="color: black;">{{ Auth::user()->tel }}</b> </h4>
                        </td>
                    </tr>

                  <tr>
                    <td width="30%">
                    <h4>Imeli : </h4>
                    </td>
                    <td width="70%">
                    <h4><b style="color: black;">{{ Auth::user()->email }}</b> </h4>
                    </td>
                  </tr>

                <tr>
                    <td width="30%">
                    <h4>Akarere utuyemo : </h4>
                    </td>
                    <td width="70%">
                    <h4><b style="color: black;">{{ Auth::user()->district }}</b> </h4>
                    </td>
                </tr>

              <tr>
                <td width="30%">
                <h4>Umurenge utuyemo : </h4>
                </td>
                <td width="70%">
                <h4><b style="color: black;">{{ Auth::user()->sector }}</b> </h4> 
                </td>
              </tr>
            </tbody>
                    </table> 
                    <hr> 
                  </div>
                </div>
                <p></p>
             <p style="font-weight: bold; text-align: center; font-style: italic; color: gray;">  Copyright © 2018. All right reserved by Impuzabumenyi </p>
            </div>
        </div>

 </div>
@include('subPages.javaScript.js')
</body>
</html>

