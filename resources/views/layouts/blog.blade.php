<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  @include('admin.partials._head')
  @yield('stylesheets')
</head>
<body>
  <!-- WRAPPER -->
  <div id="wrapper">
      @if (Auth::check())
        @include('admin.partials._header')
        @include('admin.partials._left-sidebar')
      @else
        @include('admin.partials._header')
      @endif
      <div class="col-md-9">
        <div class="main">
          @include('admin.partials._messages')
          <div class="main-content">
            <div class="container-fluid" id="myapp">
              @yield('content')
            </div> <!-- end of .flex-container -->
          </div>
          @include('admin.partials._footer')

        </div> <!-- end of .container -->
      </div>
  <!-- END WRAPPER -->
  </div>
  @include('admin.partials._javascript')
  @yield('scripts')
</body>
</html>
