<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title') | Cafe Bima</title>
  @include('layouts.sc_head')

</head>
<body class="hold-transition sidebar-mini ">
  <div class="wrapper">

      @include('layouts.navbar')
       @include('layouts.sidebar')

  {{-- {{-- <!-- Content Wrapper. Contains page content --> --}}
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('page-title')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard sdbys</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    {{-- <!-- /.content-header  --}}
         <div class="content">
           <div class="container-fluid">
              @yield('content')
           </div><!-- /.container-fluid -->
        </div>
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      sdbys
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy;{{ date("Y") }}.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
@include('layouts.sc_footer')

    </body>
</html>
