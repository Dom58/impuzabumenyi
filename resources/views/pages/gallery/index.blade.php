@extends('submain')
@section('title' , '| Images Gallery')

@section('cssFiles')
<style type="text/css">

.fa-vertical-bar-light:after{
  content: "\2759";
  color: white;
}
h5{
  color: white;
  font-size: 20px;
  background-color: black;
    border-radius: 6px;
}
  .gallery{
    /*margin: 10px 50px;*/
  }
  .gallery img{
    width: 100%;
    height: 200px;
    /*background-color: #f5f5f5;*/
    /*padding: 2px;*/
    filter: grayscale(50%);
    transition: 1s;
  }
  .gallery p{
    /*background-color: white;*/
    color: black;
    font-size: 12px;
    text-align: center;
     /*margin-top: -50px; */
     position: relative;
  }
  .gallery a,p:hover{
    color: brown;
    text-decoration: none;
  }

  .gallery p,img:hover {
    cursor: zoom-in;
    filter: grayscale(0);
    transform: scale(1.2);
    /*transform: rotateY(15deg);*/
    transition: .8s;
    position: relative;
    z-index: 999 !important;  
  }
  .col-md-12,.col-lg-3,.col-md-4,.col-sm-6,.col-xs-12{
    background-color: white;
  }
  .btn-info{
    background-color: #101910;
    font-weight: bold;
  }
  .btn-primary{
    background-color: #933b28;
    font-weight: bold;
  }
  .category>ul{
    margin-left: 5%;
  }
  .category>ul>li{
    list-style: none;
    display: block;
    padding: 5px;
    font-size: 18px;
    font-weight: bold;
  }
  .category>ul>li:hover{
    display: block;
    background-color: #aad6fc;
    /*border-radius: 10px;*/
    border-left: 6px solid green !important;
    border-right: 4px solid gray;
    width: 50%;
    transition: .5s;
    color: white;
  }
  .category>ul>li>a{
    color: black;
    /*text-decoration: none;*/
    list-style: none;
  }
  .category >ul >li >a:hover{
    /*text-decoration: none;*/
  }


</style>
@endsection

@section('informationBody')
<div class="col-md-12" style="background-color: white; margin-bottom: 20px;">
  @if(Auth::check())
    <div class="pull-right" style="margin-top: 10px;">
<a href="{{ route('gallery.create')}}" class="btn btn-info btn-sm ">Kanda aha udusangize Amafoto</a>
</div>
@endif
<div class="pull-right" style="margin-top: 10px;">
@if(Auth::guest())
<p style="color: brown;"><span class="fa fa-warning"></span> Twakwibutsako iyo wiyandikishije ubona amahirwe yo kudusangiza amafoto nkaya akurikira,ndetse n'ibitekerezo ku ingingo zimwe na zimwe.</p>
@endif
</div>
    <h3 data-toggle="collapse" data-target="#category" data-parent="#accordion" class="btn btn-primary btn-lg" style="margin-bottom: 10px; margin-right: 40px;">Hitamo Ibyiciro by'Amafoto</h3> <br>
    <div class="category panel-collapse collapse" id="category"  style="border-radius: 8px; margin-top: 10px;">
      <ul>
  @foreach($categories as $category)
    <li><a href="#{{ $category->name}}"> {{ $category->name}} </a></li>
    @endforeach
  </ul>
</div>
</div>

<div class="col-md-12">
   <h4 style="font-weight: bold; font-size:20px; text-align: center;">Amafoto Yose: &nbsp; <span class="fa fa-camera"></span> <span class="badge" style="background-color: indigo; font-size:20px;"> {{ $photo_counts->count()}}</span></h4>
  @foreach($galleries as $gallery)
  
  @if($gallery->category->name ==='Andi mafoto atandukanye' || $gallery->category->name ==='Ihuriro'|| $gallery->category->name ==='Umwiherero' || $gallery->category->name ==='Inama'|| $gallery->category->name ==='Igitaramo'|| $gallery->category->name ==='Igiterane' || $gallery->category->name ==='Isengesho'|| $gallery->category->name ==='Chorale' )
  <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-12" style="margin-top: 10px;">
  <div class="gallery ">
    <!-- class column -->
    <a href="{{ route('gallery.show',$gallery->file_name)}}"  class="thumbnail">
      
  <!-- <a href="/historyImage/{{$gallery->file_name }}" target="_blank" >  -->
    <img src="/gallery_Image/{{$gallery->file_name }}" height="200px;" width="100%"/>
    <p>{{$gallery->title }}</p>
    <h5 style="margin-left: 13%; margin-top: -80px; position: absolute;"> <span class="fa fa-comments" style="font-size: 20px; margin-right:1px;"> <b>{{ $gallery-> gallerycomments->count() }}</b></span> <span class="fa fa-vertical-bar-light"></span>  </h5>
    <!-- height="200px;" width="100%" class="img-responsive -->
    </a>
    
    <!-- <small><span class="fa fa-user-circle"></span><i>{{$gallery->user->email }}</i></small> -->
  </div>
</div>
@endif
  @endforeach
</div>
</div>
<br>
  <center> {!! $galleries->links() !!}</center>
@endsection