<nav class="navbar-dark p-3 navbar-expand-lg SrBlack ">
    <div class="container-fluid px-5">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto  mb-2 mb-lg-0 ">
          <li class="nav-item me-3">
            <a class="nav-link" aria-current="page" href="#">Portofolio</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link" href="#">About</a>
          </li>
          <li>
            <a class="nav-item me-3 " href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>

        </ul>
      </div>
    </div>
  </nav>
