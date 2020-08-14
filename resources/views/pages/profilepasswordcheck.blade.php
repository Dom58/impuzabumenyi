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
                <div class="panel-heading" style=" background-color:#222222; height:50px; text-align:center; border-radius:0px; "><font style=" font-size:20px; color:white; ">Ijambo ry'ibanga </font>
                </div>
                <a href="/" class="btn btn-success pull-left btn-lg btn-lg"  style="margin-left: 30px; margin-top: 10px;"><span class="fa fa-home" style="font-size: 30px;"></span></a>
    
                <div class="panel-body">
                  <div class="col-md-8 col-md-offset-2">
                    <h3 style="">Uzuza ijambo ry'Ibanga</h3>
                    <hr>
                    <form action="{{ url('password_checked')}}" method="POST">
                      {{ csrf_field() }}
                      <input type="password" name="passcheck" class="form-control">
                      <br>
                      <input type="email" name="email" class="form-control">
                      <div class="col-md-4 col-md-offset-4">
                        <button type="submit" class="btn btn-info">Injira</button></div>
                      
                    </form>
                    
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

