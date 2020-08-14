@include('subPages.header.header')

<style>
 body {
 /* background-color: #686565;*/
 background-image: url('/background/bckgrnd.png');
 background-size: cover;
 background-attachment: fixed;
  background-repeat:no-repeat;
  position: relative;
 } 
 .panel{
  border: 5px solid black;
  margin-top: 20px;
 }
 /*++++++++++++++++++++*/

 #circle {
   background: #009640;
   border-radius: 50%;
   height: 70px;
   width: 70px;
   margin-left: 40%;
   position: absolute;
   margin-top: 38px;
   font-family: cursive;
 }

 .well_top{
  margin-top: 80px;
  background-color: #f5f5f5;
  border: 2px solid blue;
 /* font-weight: bold;*/
  margin-bottom: 20px;
  border-radius: 6px;
}
.well_top > h3 ,p{
  margin-left: 10px;
  margin-right: 10px;
}
#circle_more {
   background:#3b3c8b;
   border-radius: 50%;
   height: 70px;
   width: 70px;
   margin-left: 40%;
   position: absolute;
   font-family: cursive;

 }
.well_bottom{
  margin-top: 65px;
  background-color: #f5f5f5;
  border: 2px solid green;
  font-weight: bold;
  margin-bottom: 40px;
   border-radius: 6px;
}
.well_bottom > h3 ,p{
  margin-left: 10px;
  margin-right: 10px;
}
/*++++++++++++++++++++++++*/
  #gallery img:hover {
    /*crosshair*/
    /*zoom-in*/
    cursor:wait;
    filter: grayscale(0);
    transform: scale(1.6);
    /*transform: rotateY(15deg);*/
    transition: .8s;
    position: relative;
    z-index: 999 !important;
    display: block;
    border-radius: 3px solid black;  
  }
 

</style>      


 <body>
<div class="container">

<div id="about" class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading" style=" background-color:black; height:50px; text-align:center; border-radius:0px; "><font style=" font-size:20px; color:white; ">Abo turibo</font>
                </div>

                <div class="panel-body">
                    <div class="col-md-10 col-md-offset-1">
                      <center>
                      <img src="/images/logo.png"height="120" width="160" />
                  </center>
                      

 
<div id="circle"> 
<h1 style="text-align: center; color: white; font-weight: bold;">1</h1>
 </div>

 


<div class="well_top"  >               
                    <h3 >Ndumukristu ni iki?</h3>
                      <p>Ndumukristu ni urubuga rwashyizweho kugirango abakristu ndetse n'urubyiruko muri rusange babashe kumenya amasengesho ya kriziya Gatorika,kubagezaho umunsi ku munsi Ivanjiri ntagatifu ndetse na Amasomo matagatifu yaburi munsi, kugeza ku abakristu urutonde rw'abatagatifu ni imirimo bakoze hano ku isi umunsi ku umunsi,kugeza ku abakristu ba kriziya Gatorika amwe mumatangazo abagenewe ku uburyo bworoshye, kuborohereza mu ukumenya amakuru amwe namwe yabereye  muri paruwase zitandukanye zo mu u Rwanda ndetse no hirya no hino ku isi, kubagezaho amwe mu mateka yaranze abakurambere bintangarugero , kuborohereza mugusangizanya ibitekerezo kuburyo bworoshye, kubagira inama kubintu bitandukanye,kubafasha kwitagatifuza umunsi ku umunsi haba mugusangizanya inkuru nziza, amasengesho,...no kuborohereza kubona indirimbo zimwe na zimwe za Gikristu.
                      </p>
</div>


<div id="circle_more"> 
<h1 style="text-align: center; color: white; font-weight: bold;">2</h1>
 </div>

        <div class="well_bottom"  >               
                    <h3 >Ibindi bintu by'ingenzi Ndumukristu iteganya.</h3>
                      <p><span class="fa fa-circle-o"></span> Korohereza abakristu mu kubona bimwe mubitabo bitandukanye.</p>
                      <p><span class="fa fa-circle-o"></span> Gushyira Ndumukristu muri Tetefone ngendanwa.</p>
                      <p><span class="fa fa-circle-o"></span> Kwegera abakristu bo hirya no hino, tubasanga muri paruwase zabo ndetse no mumiryango Remezo batuyemo.</p>
                      <p><span class="fa fa-circle-o"></span> Gutanga inyigisho n'inama kubintu byingenzi umukristu yibaza cyangwa akwiye kumenya.</p>
                      <p><span class="fa fa-circle-o"></span> Korohereza abakristu mu kugeza amatangazo atandukanye kubandi bavandimwe.</p>
                      <p><span class="fa fa-circle-o"></span> Korohereza abakristu mu gusabirana no gusengerana.</p>
                      <p><span class="fa fa-circle-o"></span> Gushyiraho ikiciro cyubuzima, kizajya gitangirwamo inama z'ubuzima no kungurana ibitekrezo ku ndwara zimwe na zimwe nuburyo zakirindwa.</p>
        </div>
                      
                      
                      <h2  style="text-align: center;">Ubuyobozi bwa Ndumukristu </h2>
                   
                      <div class="row"  id="gallery" style="background-color: whitesmoke;">
                @foreach($staffs as $staff)
                    <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 5px;">
                    <!-- <div class="well"> -->
                      <center>
                    	<img src="/ndumukristuStaff/{{ $staff->file_name }}" class="img-circle" style="max-height: 180px;">
                      </center>
                    	<p> <b style="color: brown;">Title:</b> <b>{{ $staff->department->name}} </b></p>
                    	<p> <b style="color: brown;">Name:</b> <b>{{ $staff->fullname}} </b></p>
                    	<p> <b style="color: brown;">Background:</b> {!! $staff->background !!}</p>
                    </div>

                    <!-- </div> -->
 <!-- <br> -->
                @endforeach
                   </div>
                   <hr>
                <p></p>
                <center> <a href="/"><span class="fa fa-arrow-circle-left"></span> Ahabanza</a></center>
                
                 <p style="font-weight: bold; text-align: center; font-style: italic; color: gray; margin-top: 50px;">  Copyright © 2018. All right reserved by Ndumukristu </p>
                    </div>
                </div>
            </div>
        </div>
 </div>
@include('subPages.javaScript.js')
</body>
</html>

