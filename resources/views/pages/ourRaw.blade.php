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
.well_top > h3 ,p ,h4{
  margin-left: 10px;
  margin-right: 10px;
}
/*+++++++++++++++++++ 2 ++++++++++++++++++++++*/
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
/*++++++++++++++ 3 ++++++++++++++++++++*/

#circle_three {
   background:#be1622;
   border-radius: 50%;
   height: 70px;
   width: 70px;
   margin-left: 40%;
   position: absolute;
   font-family: cursive;

 }
.well_three{
  margin-top: 80px;
  background-color: #f5f5f5;
  border: 2px solid brown;
  font-weight: bold;
  margin-bottom: 40px;
   border-radius: 6px;
}
.well_three > h3 ,p{
  margin-left: 10px;
  margin-right: 10px;
}

</style>      


 <body>
<div class="container">

<div id="about" class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading" style=" background-color:black; height:50px; text-align:center; border-radius:0px; "><font style=" font-size:20px; color:white; ">Amategeko n'Amabwiriza</font>
                </div>
<a href="/" class="btn btn-primary btn-sm pull-left"><span class="fa fa-home" style="font-size: 45px;"></span></a>
                <div class="panel-body">
                    <div class="col-md-10 col-md-offset-1">
                      <center>
                      <img src="/images/logo.png"height="120" width="160" />
                  </center>
<!-- ++++++++++++++++++++++++++++++++++++++++ -->
 
<div id="circle"> 
<h1 style="text-align: center; color: white; font-weight: bold;">1</h1>
 </div>

<div class="well_top"  >               
                    <h3 >Uko uru rubuga rukoreshwa</h3>
                      <p>
                      	Mugukoresha uru rubuga ni ngombwa kwiyandikisha kugirango uge ubasha gusangiza ibitekerezo abandi, kandi nabo babashe kubigusangiza,iyo utariyandikisha biciye kuri uru rubuga hari byinshyi utabona kandi bifite umumaro umunsi kumunsi, iyo umaze kwiyandikisha amakuru utanze aba ari ayawe, ntawundi ugomba kuyamenya cyangwa ngo ayahindure utamuhaye uburenganzira. 
                      </p>
                      <p>
                      	Amakuru wujuje wiyandikisha ushobora kuyahindura uko ubishaka, bitewe naho usigaye usengera cg aho mbese bitewe nuko ubyifuza.
                      </p>
                      <h4>
                      	<b>a. Ibijyanye no kwiyandikisha n'uko bikorwa </b>
                     </h4>
                     <p>Ukanda Iburyo ahanditse <b>Login/Register</b>, uhita ubona aho wuzuza habugenewe amakuru atandukanye, iyo umaze kuzuza amakru usabwa, ukanda ahanditse <b>Ohereza wiyandikishe/Register</b> ako kanya uhitira kuri paji itangira y'urubuga.</p>

                     <img src="/registration/register.png" alt="no image" class="img-responsive" style="border: 3px solid blue; height: 410px; margin-left: 2px; margin-bottom: 5px;">
                     <br>

                     <h4> <b>b. Ibijyanye no kwinjira/Login nuburyo bikorwa kuri rubuga </b> </h4>
                     <p>Ukanda Iburyo ahanditse <b>Login/Register</b> ugahita ubona umwanya wo kuzuzamo Email na Password wakoresheje mugihe wiyandikishaga niba utarahindura amakuru, iyo wahinduye umwirondoro wuzuzamo amakuru uheruka guhindura, uyi umaze kwandikamo Email yawe n'ijambo ry'ibanga, uhita ukanda ahanditse <b>Injira hano/Login</b>.</p>
                     <img src="/registration/login.png" alt="no image" class="img-responsive" style="border: 3px solid blue; height: 360px; margin-left: 2px; margin-bottom: 5px;">
                     <br>
                     <p> Iyo umaze gukanda ahanditse <b>Injira hano/Login</b> iyo ntakosa ryabaye wuzuza ibisabwa uhitira ahakurikira.</p>
                     <img src="/registration/afterLogin.png" alt="no image" class="img-responsive" style="border: 3px solid green; height: 400px; margin-left: 2px; margin-bottom: 5px;">
                     <br>
                     <p> Amahitamo aba ari ayawe mugukanda <b>1(Ahabanza)</b> uhitira ahabanza (Homepage) <b>,2 (Umwirondoro wawe)</b> uba ugiye kureba umwirondoro wawe( Your Profile) <b>,3 (Logout)</b> uba ugiye gusohoka.</p>

</div>


<div id="circle_more"> 
<h1 style="text-align: center; color: white; font-weight: bold;">2</h1>
 </div>

        <div class="well_bottom"  >               
                    <h3 >Ibyo Ndumukristu Igusaba</h3>
                      <p><span class="fa fa-check-circle"></span> Mugihe wuzuza ahabugenewe irinde kuzuzamo amakuru atariyo.</p>
                      <p><span class="fa fa-check-circle"></span> Mugihe usangiza abandi bavandimwe ibitekerezo irinde gutandukira no kurengera kungingo irimo iganirwaho.</p>
                      <p><span class="fa fa-check-circle"></span> Irinde gusebanya no gutera ibiganiro bisebya kandi bisebetse.</p>
                      <p><span class="fa fa-check-circle"></span> Koresha uru rubuga muburyo bukwiye, ubanze utekereze neza kubyo ugiye gusangiza abavandimwe.</p>
                      <p><span class="fa fa-check-circle"></span> Mugihe ufite igitekerezo ushaka ko twaganiraho,urakitwandikira twabona bikwiye tukakigeza kubandi.</p>
                      <p><span class="fa fa-check-circle"></span> Biremewe gutanga itangazo twakugereza kubandi bavabdimwe.</p>

                      <p style="color: red; font-size: 15px;"><span class="fa fa-warning"></span> Iyo ukoresheje nabi uru rubuga(Utanga ibitekrezo bidahwitse, usebanya,utukana,urengeera,...),<br>turakwandikira tugusaba kwikosora, iyo byanze tukubuza kongera kudusangiza ibitekrezo, byaba nangombwa tukaguhagarika gukoresha serivise zacu!!</p>
        </div>
        <div id="circle_three"> 
<h1 style="text-align: center; color: white; font-weight: bold;">3</h1>
 </div>

        <div class="well_three"  >               
                    <h3 >Gukemura Imbogamizi </h3>
                    <p>Mugihe ufite ikibazo, kuri uru rubuga ndetse no mubuzima bwawe bwaburi munsi twandikire aha tukugire inama,<br> ndetse tunagufashe kubona inzira yo kugikemuramo,no kugufasha gusenga <a href="{{ url('/mycontact/create')}}" class="btn-primary" style="font-size: 15px;">Twandikire aha</a>.</p>
                    <p>Iyo hagize ipagi iza uko bidakwiye mugihe uyisuye cyangwa itagaragaza neza ibyo ushaka, ushobora kongera kuyigerageza indi nshuro ihita yemera.</p>
                      
        </div>
        <h3 style="text-align: center;">Imana Ikomeze Iduhane Imigisha.</h3>
                <hr>
                <p></p>
                <center> <a href="/" class="btn btn-primary btn-sm" style="font-size: 30px;"><span class="fa fa-arrow-circle-left" ></span> Back</a></center>
                
                 <p style="font-weight: bold; text-align: center; font-style: italic; color: gray; margin-top: 50px;">  Copyright © 2018. All right reserved by Ndumukristu </p>
                    </div>
                </div>
            </div>
        </div>
 </div>
@include('subPages.javaScript.js')
</body>
</html>

