<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ request()->route()->getName() === 'home' ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">
            <i class="fas fa-tasks"></i>&nbsp;&nbsp;&nbsp;
            Kegiatan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->route()->getName() === 'users.index' || request()->route()->getName() === 'users.edit' ? 'active' : '' }}" aria-current="page" href="{{ route('users.index') }}">
            <i class="fas fa-user"></i>&nbsp;&nbsp;&nbsp;
            Settings Profile
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-danger" aria-current="page" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp;
            Sign Out
          </a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </ul> 
    </div>
</nav>