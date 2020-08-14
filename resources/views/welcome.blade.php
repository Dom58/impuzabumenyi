@extends('mainPage')
@section('cssFiles')

<style type="text/css">

.fa-vertical-bar-light:after{
  content: "\2759";
  font-size: 20px;
}
.btn-primary{
  background-color: #1c731c;
  transition: .6s;
}
#ourService{
background-color:#ebfbeb;
}
#terms{
  background-color:#ebfbeb;
}

</style>
@endsection

     @section('rowhead')
          
            @foreach($pubs as $pub)
                @if($pub->side ==1)
                <div class="col-md-12" style="margin-bottom: 10px; ">
           <a href="{{ $pub ->pub_link}}" target="_blank">     <img src="publicity/{{ $pub ->file_name }}" class="img-responsive" height="400px">
            <!-- <video src="publicity/{{ $pub ->file_name }}" width="100%" height="300px" class="video-responsive"></video> -->
           </a>
                </div>
                    <br>
                @endif
                  @endforeach
<!-- +++++++++++++++++++++++++++++++ Put Carousel code Logic +++++++++++++++++++++++++++ -->
  <div class="col-md-8"  style="margin-bottom: 10px;">
  <div id="myCarousel" class="carousel slide" style="border:2px solid black;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li class="item1 active"></li>
      <li class="item2"></li>
      <li class="item3"></li>
      <li class="item4"></li>
      <li class="item5"></li>
      <li class="item6"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      @foreach($actives as $active)
      <div class="item active">
        <img src="/carouselimages/{{ $active->file_name }}" alt="No active image" >
        <div class="carousel-caption">
          <h4> {{ $active ->body }} </h4>
        </div>
      </div>
     @endforeach
      
      @foreach($carousels as $carousel)
      <div class="item">
       <img src="/carouselimages/{{ $carousel ->file_name }}" alt="No image" >
        <div class="carousel-caption">
          <h4>{{ $carousel ->body }}</h4>
        </div>
      </div>
     @endforeach

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<div class="col-md-4">
   <img src="/Ntibavuga_bavuga/ntibavugaBavuga.gif" alt="No Image" width="100%" height="200px;" style="margin-bottom: 5px;">
   
   <!-- replace by ibihekane gif -->
   <img src="/Ntibavuga_bavuga/ibihekane.jpg" alt="No Image" width="100%" height="150px;">
</div>

<!-- ++++++++++++++++++++++++++++++++++++++++++++ -->
          @foreach($pubs as $pub)
                @if($pub->side ==5)
                <div class="col-md-12" style="margin-bottom: 10px; ">
           <a href="{{ $pub ->pub_link}}" target="_blank">     <img src="publicity/{{ $pub ->file_name }}" class="img-responsive" width="100%" height="400px" style="margin-top: 20px;">
           </a>
                </div>
                    <br>
                @endif
          @endforeach
@endsection


<!-- ++++++++++++++++++End of Carsoul Image +++++++++++++++++++++++++++++++++++++++++++++ -->
       @section('informationBody')
          <div class="col-md-9" style="">
            <div class="panel panel-default" id="right">
                <div class="panel-heading" style=" background-color:#2c6f2d; height:60px; text-align:center; border:none; "><font style=" font-size:20px; color:white; ">Amakuru atandukanye </font></div>

                <div class="panel-body">
<!-- ++++++++++++++Inkuru zitandukanye++++++++ -->
            <div class="row">
              @foreach($posts as $post)
              
              <div class="col-lg-6 col-md-6 col-sm-6" >
          <div class="panel panel-default" style="border-color: #fff; ">
              <div class="panel-body">
                <div class="content" >
<div class="media" style="margin-top: 20px;">
 <p class="title"> <b>{{ $post->title}} </b></p>
    <div class="media-left media-middle">
      <img src="/postsImage/{{ $post->file_name }}" style="width: 100px; height: 120px;" alt="No Image" >
    </div>

    <div class="media-body" style="margin-bottom: 10px;">
       <small><i> <span class="fa fa-user" style="font-size: 20px;"></span> {{ $post ->user->name }} <b><span class="fa fa-calendar" style="font-size: 15x;"></span></b><b >{{ date('d-m-Y',strtotime($post->created_at)) }}</b> saa <b>{{ date('g:ia',strtotime($post ->created_at)) }} </b></i></small>
       <p>{{ substr(strip_tags($post ->body),0,90) }} {{strlen(strip_tags($post ->body)) >90 ? "..." : "" }}<br> <a href="{{ url('posts',$post->slug) }}"  class="btn-success btn-sm "> soma inkuru yose...</a> </p>
    </div>  
    <h4 style="text-align: center;"><span class="fa fa-comments"> {{ $post-> postcomments->count() }}</span> <span class="fa fa-vertical-bar-light" style="margin-right: 3px;"></span> <span class="fa fa-eye"> {{$post->visit_post +200}}</span></h4>

  </div>
                </div>
              </div>
          </div>
        </div>
            @endforeach
            </div>
              <!-- +++++++Add the code +++++++++ -->
              <!-- ----------------------- -->
            <!-- ++++++++++++++End++++++++++++++ -->
                    
                  </div>
          </div>
        </div>
@endsection
@section('rightPublicity')
          <div class="col-md-3" >
              <div class="right">
                @foreach($pubs as $pub)
                @if($pub->side ==2)
                <div class="pub" style=" margin-bottom:10px; margin-left:10px; margin-right:5px;">
                      <center><a href="{{ $pub ->pub_link }}" target="_blank"> <img src="publicity/{{ $pub ->file_name }}" alt="pub" class="img-responsive" width="100%" height="400px"/ > </a></center>
                  </div>
                  @endif
                  @endforeach
               
                  <hr>
                  <div class="panel panel-default">
                <div class="panel-heading" style=" background-color:#2c6f2d; height:50px; text-align:center;"><font style=" font-size:20px; color:white; "><span class="fa fa-info-circle"></span> Amatangazo <span class="badge"> {{ $news->count() }}</span> </font></div>

                <div class="panel-body " >
                  <div class="amatangazo" style="background-color:#f4e566b; margin-bottom:10px;margin-left:5px; margin-right:5px;">
                    <!-- +++++++++++++amatangazo body+++++++++ -->
                   @foreach($news as $itangazo)
                   <p><b style="background-color: #fdff76;">{{ $itangazo->organisation }} :</b> <a href="{{ $itangazo->pub_link }}" target="_blank" style="text-decoration: none;">{!! $itangazo->description !!} </a></p>
                   
                   <div class="line"></div>
                   @endforeach
                  </div>
                    
                </div>
                  </div>      
    </div>
    <hr>
</div>
@endsection

@section('bottom')
<!-- <div class="col-md-12"> -->
          @foreach($pubs as $pub)
                @if($pub->side ==3)
                <div class="col-md-12" style="margin-bottom: 10px; ">
           <a href="{{ $pub ->pub_link}}" target="_blank">     <img src="publicity/{{ $pub ->file_name }}" class="img-responsive" width="100%" height="400px" style="margin-top: 20px;">
            <!-- <video src="publicity/{{ $pub ->file_name }}" width="100%" height="300px" class="video-responsive"></video> -->
           </a>
                </div>
                    <br>
                @endif
          @endforeach
<!-- </div> -->
      <div class="col-lg-4 col-md-6 col-sm-6" >
          <div class="panel panel-default" style="border: 1px solid gray;">
              <div class="panel-body">
                <div class="content">
                  <h3 data-target="#ourService" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" class="title" style="text-align: center;">Serivise Zacu
                </h3>
               
                <div class="collapse" id="ourService" >
                  <div class="line"></div>
              <p> <span class="fa fa-check"></span> Kwigisha urubyiruko bimwe mubigize umuco mu Rwanda.</p>
              <p> <span class="fa fa-check"></span> Gufasha abanyeshuri n'abaturage muri rusange kumenya ibidukikije muburyo bw'amafoto cyane cyane ibiri mugihugu cyacu.</p>
              <p> <span class="fa fa-check"></span> Guhuza abakoresha uru rubuga,bungurana ibitekerezo,guhugurana ku ngingo zatanzwe.</p>
              <p> <span class="fa fa-check"></span> Kugeza kubakoresha uru rubuga makuru mashya yo hirya no hino mu Rwanda.</p>
                </div>
                 </div>
              </div>
          </div>
        </div>
        <!-- ++++++++++++++++ -->
        <div class="col-lg-4 col-md-6 col-sm-6" >
          <div class="panel panel-default" style="border: 1px solid gray;">
              <div class="panel-body">
                <div class="content">
                  <h3 data-target="#aboutUs" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" class="title" style="text-align: center;">Abo turibo
                </h3>
               
                <div class="collapse" id="aboutUs" >
                  <div class="line"></div>
              <p> <span class="fa fa-check"></span> Impuzabumenyi ni urubuga rwakozwe kandi rutangizwa n'urubyiruko rw'abanyeshuri barangije muri kaminuza y'u Rwanda ishami rya Nyarugenge murwego rwo gufasha abanyeshuri bo mu amashuri mato n'amakuru kumenya u Rwanda mubumenyi butandukanye,harimo gusobanukirwa byimbitse amateka n'amazina y'abami bayoboye u Rwanda,kumenya ibidukikije(Inyamaswa n'ibimera),imigani migufi n'imiremire,...</p>
                </div>
                 </div>
              </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6" >
          <div class="panel panel-default" style="border: 1px solid gray;">
              <div class="panel-body">
                <div class="content">
                  <h3 data-target="#terms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" class="title" style="text-align: center;"> <span class="fa fa-gear"></span> Amategeko n'amabwiriza
                </h3>
               
                <div class="collapse" id="terms" >
                  <div class="line"></div>
              <p> <span class="fa fa-asterisk"></span> Gukoresha uru rubuga impuzabumenyi mumudendezo no kubona byishyi kuri uru rubuga birasaba kubanza kwiyandikisha kuri uru rubuga @if(Auth::guest()) <a href="{{route('register')}}" class="btn btn-primary btn-sm">Kanda hano wiyandikishe </a> @endif</p>
                      <p> <span class="fa fa-asterisk"></span> Kwitonda cyane mugusangiza ibitekerezo abakoresha uru rubuga, nko mugihe ugiye kubasangiza igitekerezo,wirinda gusebanya,gutukana,nibindi bihabanye n'indangagaciro z'abanyarwanda.</p>
                      <p> <span class="fa fa-asterisk"></span> Irinde gukoresha uru rubuga kuburyo butateganyijwe.</p>
                      <p> <span class="fa fa-asterisk"></span> Kurenga ku mategeko yashyizweho uba utandukiriye kuntego y'uru rubuga,bishobora gutuma uhagarikwa kurukoresha.</p>
                </div>
                 </div>
              </div>
          </div>
        </div>
<!-- +++++++++++++ -->
@endsection

@section('javaScriptFiles')
<script>
$(document).ready(function(){
  $("#mutagatifuInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#mutagatifuTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>



<script type="text/javascript">
  
  // Hover only display a title
  $(document).ready(function(){

  $('#isengesho').tooltip();
    $('#body').tooltip();
  });

</script>

@endsection