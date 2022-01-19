<style>
  .bg{
    background: linear-gradient(160deg,#594785,rgb(14 17 58 / 80%),#5f1ab9);
  }
</style>
<nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top bg mb-5 ">
    <!-- Left navbar links -->
    <ul class="navbar-nav ">
      <li class="nav-item ">
        <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->firstname }}
        </a>
          <div class="dropdown-menu dropdown-menu-right bg text-white" aria-labelledby="navbarDropdown">
              <a class="dropdown-item text-white bg" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
