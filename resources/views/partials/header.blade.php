<div class="container-xl">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
      <a href=".">
    <img src="{{ asset('tabler/static/dQurban-logo.png') }}" width="110" height="32" alt="dQurban" class="navbar-brand-image">
      </a>
    </h1>
    <div class="navbar-nav flex-row order-md-last">
      <div class="nav-item dropdown">
        <a href="{{ route('login') }}" class="nav-link d-flex lh-1 text-reset p-0" aria-label="Masuk ke website">
          <span class="avatar avatar-sm" style="background-image: url({{ asset('tabler/static/avatar.png') }})"></span>
          <div class="d-none d-xl-block ps-2">
            <div>Masuk</div>
          </div>
        </a>
      </div>
    </div>
</div>
