@include('admin.layout.head')

@include('admin.layout.navbar')

@include('admin.layout.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    @include('admin.layout.beadcome')
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

          <router-view></router-view>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@include('admin.layout.footer')