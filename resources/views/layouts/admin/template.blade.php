@include('blog::layouts.admin.partials.header')
@include('blog::layouts.admin.partials.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
    @include('blog::layouts.admin.partials.alert')
       @yield('content')

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include('blog::layouts.admin.partials.footer')
<!-- jQuery 2.2.3 -->
<script src="{{asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.js')}}"></script>

<script src="{{ asset('js/update.js') }}" type="text/javascript"></script>
@yield('scripts')
