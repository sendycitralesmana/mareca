<div class="container-fluid bg-primary" style="position: sticky; top: 0; z-index: 9999;">
    <div class="container">
        <nav class="navbar navbar-dark navbar-expand-lg py-0">
            <a href="/" class="navbar-brand">
                <h1 class="text-white fw-bold d-block">Ma<span class="text-secondary">reca</span> </h1>
            </a>
            <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse bg-transparent" id="navbarCollapse">
                <div class="navbar-nav ms-auto mx-xl-auto p-0">
                    <a href="/" class="nav-item nav-link {{ request()->is('', '/*') ? 'active' : '' }}">Beranda</a>
                    <a href="/about" class="nav-item nav-link {{ request()->is('about', 'about/*') ? 'active' : '' }}">Tentang</a>
                    <a href="/service" class="nav-item nav-link {{ request()->is('service', 'service/*') ? 'active' : '' }}">Layanan</a>
                    <a href="/project" class="nav-item nav-link {{ request()->is('project', 'project/*') ? 'active' : '' }}">Proyek</a>
                    <a href="/blog" class="nav-item nav-link {{ request()->is('blog', 'blog/*') ? 'active' : '' }}">Blog</a>
                    <a href="/contact" class="nav-item nav-link {{ request()->is('contact', 'contact/*') ? 'active' : '' }}">Kontak</a>
                </div>
            </div>
            <div class="d-none d-xl-flex flex-shirink-0">
                <div id="phone-tada" class="d-flex align-items-center justify-content-center me-4">
                    <a href="" class="position-relative animated tada infinite">
                        <i class="fa fa-phone-alt text-white fa-2x"></i>
                        <div class="position-absolute" style="top: -7px; left: 20px;">
                            <span><i class="fa fa-comment-dots text-secondary"></i></span>
                        </div>
                    </a>
                </div>
                <div class="d-flex flex-column pe-4">
                    <span class="text-white-50">Ada pertanyaan?</span>
                    <span class="text-secondary">Hubungi:  +62 813-2032-4274</span>
                </div>
            </div>
        </nav>
    </div>
</div>