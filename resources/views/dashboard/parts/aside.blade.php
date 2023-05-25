<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        {{-- @if (auth()->user()->type != 'famous' || auth()->user()->famous == null) --}}
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                
            <li class="nav-item  ">
                <a href="">
                    <i class="fa fa-list"></i>
                    <span class="menu-title"> مجالات المستخدمين </span></a>
            </li>



            {{-- <li class="nav-item  ">
            <a href="{{ route('users.index') }}">
                <i class="fa fa-pencil"></i>
                <span class="menu-title">المستخدمين </span></a>
        </li>         --}}


        </ul>
    </div>
</div>
