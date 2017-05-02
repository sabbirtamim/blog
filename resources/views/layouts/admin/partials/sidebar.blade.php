<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('img/default-avatar.png')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{auth()->user()->name}}</p>
                <!-- Status -->
                <a href="#">

                </a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!-- Optionally, you can add icons to the links -->


            <li class="{{(stripos(request()->path(),'roles')!==false)?'active':''}}">
                <a href="{{route('roles.index')}}">
                    <i class="fa fa-user-secret"></i>
                    <span>All Role</span></a>
            </li>
            <li class="{{(stripos(request()->path(),'roles')!==false)?'active':''}}">
                <a href="{{route('roles.create')}}">
                    <i class="fa fa-user-secret"></i>
                    <span>Add Role</span></a>
            </li>
            <li class="{{(stripos(request()->path(),'userroles')!==false)?'active':''}}">
                <a href="{{route('userroles.index')}}">
                    <i class="fa fa-user-secret"></i>
                    <span>User Role</span></a>
            </li>
            <li class="{{(stripos(request()->path(),'userroles')!==false)?'active':''}}">
                <a href="{{route('userroles.create')}}">
                    <i class="fa fa-user-secret"></i>
                    <span>Assign Role</span></a>
            </li>
            <li  class="{{(stripos(request()->path(),'posts')!==false)?'active':''}}">
                <a href="{{route('posts.index')}}">
                    <i class="fa fa-user-secret"></i>
                    <span>Posts</span></a>
            </li>
            <li  class="{{(stripos(request()->path(),'posts')!==false)?'active':''}}">
                <a href="{{route('posts.create')}}">
                    <i class="fa fa-user-secret"></i>
                    <span>Create Posts</span></a>
            </li>
            <li class="{{(stripos(request()->path(),'terms')!==false)?'active':''}}">
                <a href="{{route('terms.index')}}">
                    <i class="fa fa-user-secret"></i>
                    <span>AllCategories</span></a>
            </li>
            <li class="{{(stripos(request()->path(),'terms')!==false)?'active':''}}">
                <a href="{{route('terms.create')}}">
                    <i class="fa fa-user-secret"></i>
                    <span>Add Categories</span></a>
            </li>
            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                   class=""><i class="fa fa-sign-out"></i>
                    <span>Sign Out</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>