<!-- Not Used as an user profile  -->
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
</style>      

 <body>
<div class="container">

<div id="profile" class="col-md-10 col-md-offset-1 ">
            <div class="panel panel-default">
                <div class="panel-heading" style=" background-color:#222222; height:50px; text-align:center; border-radius:0px; "><font style=" font-size:20px; color:white; ">Profile Page </font>
                </div>
                <div class="panel-body">
                  <div class="col-md-8 col-md-offset-2">

                    <div class="profile-user-pic" style="margin-bottom: 5px;">

                    <img src="/userProfileImage/{{ $user->profile_image }}" height="150" width="150" class="img-responsive img-circle" alt="no Image" />
                    <!-- <img src="/images/profile.png" height="120" width="160" class="img-responsive img-circle" /> -->
                  </div>
                    <a href="{{route('userProfile.edit',$user->id)}}" class="btn btn-warning"> <span class="fa fa-edit"></span> Edit Profile</a> 

                    <table width=100% class="table">
                      <tbody>
                      <tr>
                       
                        <td width="30%">
                    <h4>First Name : </h4>
                        </td>
                        <td width="70%">
                    <h4><b style="color: black;">{{ $user->name }}</b> </h4>
                        </td>
                      </tr>
                      <tr>
                        <td width="30%">
                      <h4>Second Name : </h4>
                        </td>
                        <td width="70%">
                          <h4><b style="color: black;">{{ $user->sname }}</b> </h4>
                        </td>
                      </tr>
                      <tr>
                        <td width="30%">
                          <h4>User Name : </h4>
                        </td>
                       
                        <td width="70%">
                           <h4><b style="color: black;">{{ $user->username }}</b> </h4>
                        </td>
                      </tr>
                      <tr>
                        <td width="30%">
                          <h4>Gender : </h4>
                        </td>
                        <td width="70%">
                           @if ($user->gender == 1)
                              <h4>Male</h4>
                            @else
                              <h4>Female</h4>
                            @endif
                        </td>
                      </tr>
                      <tr>
                        <td width="30%">
                        <h4>Telephone : </h4>
                        </td>
                        <td width="70%">
                        <h4><b style="color: black;">{{ $user->tel }}</b> </h4>
                        </td>
                    </tr>

                  <tr>
                    <td width="30%">
                    <h4>Email : </h4>
                    </td>
                    <td width="70%">
                    <h4><b style="color: black;">{{ $user->email }}</b> </h4>
                    </td>
                  </tr>

                <tr>
                    <td width="30%">
                    <h4>Borning Parish : </h4>
                    </td>
                    <td width="70%">
                    <h4><b style="color: black;">{{ $user->paruwase }}</b> </h4>
                    </td>
                </tr>

              <tr>
                <td width="30%">
                <h4>Living Parish : </h4>
                </td>
                <td width="70%">
                <h4><b style="color: black;">{{ $user->uparuwase }}</b> </h4> 
                </td>
              </tr>
            </tbody>
                    </table> 
                    <hr>
                  
                    <a href="/" class="btn btn-info"> <span class="fa fa-home"></span> Homepage</a>
                    <center> <h4>Be Blessed</h4>
                    </center> 
                  </div>
                </div>
                <p></p>
             <p style="font-weight: bold; text-align: center; font-style: italic; color: gray;">  Copyright © 2018. All right reserved by Ndumukristu </p>
            </div>
        </div>

 </div>

</body>
</html>

