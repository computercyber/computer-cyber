<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">

        <a class="navbar-brand" href="<?= base_url(); ?>">Computer Cyber</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto">

                <!-- mobile navbar -->
                <div class="row mt-2 d-lg-none text-center">
                    <div class="col-6">
                        <li class="nav-item">
                            <a class="nav-link <?= (uri_string() == '/') ? 'active' : '' ?>" href="<?= base_url(); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= (url_title('Devision') == $title) ? 'active' : '' ?>" href="<?= base_url('devisi'); ?>">Divisi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                    </div>
                    <div class="col-6">
                        <li class="nav-item">
                            <a class="nav-link <?= (url_title('Karya') == $title) ? 'active' : '' ?>" href="<?= base_url('karya'); ?>">Karya</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Info
                            </a>
                            <ul class="dropdown-menu" style="border-left: 5px solid #5E31C2" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Artikel</a></li>
                                <li><a class="dropdown-item" href="#">Event dan Agenda</a></li>
                                <li><a class="dropdown-item" href="#">News</a></li>
                                <li><a class="dropdown-item" href="#">Kepengurusan</a></li>
                            </ul>
                        </li>
                    </div>
                </div>
                <!-- end mobile navbar -->

                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link <?= (uri_string() == '/') ? 'active' : '' ?>" href="<?= base_url(); ?>">Home</a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link <?= (url_title('Devision') == $title) ? 'active' : '' ?>" href="<?= base_url('devisi'); ?>">Divisi</a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link <?= (url_title('Karya') == $title) ? 'active' : '' ?>" href="<?= base_url('karya'); ?>">Karya</a>
                </li>
                <li class="nav-item dropdown d-none d-lg-block">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Info
                    </a>
                    <ul class="dropdown-menu" style="border-left: 5px solid #5E31C2" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Artikel</a></li>
                        <li><a class="dropdown-item" href="#">Event dan Agenda</a></li>
                        <li><a class="dropdown-item" href="#">News</a></li>
                        <li><a class="dropdown-item" href="#">Kepengurusan</a></li>
                    </ul>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="#">About Us</a>
                </li>

            </ul>

            <hr class="d-lg-none">

            <ul class="navbar-nav mr-auto">
                <!-- mobile -->
                <div class="row d-lg-none text-center">
                    <div class="col-6">
                        <li class="nav-item">
                            <a class="nav-link" href="#">sing up</a>
                        </li>
                    </div>
                    <div class="col-6">
                        <li class="nav-item">
                            <a class="btn btn-primary" href="#">sing in</a>
                        </li>
                    </div>
                </div>
                <!-- end mobile  -->
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="#">sing up</a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="btn btn-primary" href="#">sing in</a>
                </li>
            </ul>

            <hr class="d-lg-none">

        </div>
    </div>
</nav>