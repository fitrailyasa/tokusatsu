<style>
    .scroll-to-top {
        position: fixed;
        bottom: 70px;
        right: 20px;
        z-index: 999;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
</style>

<footer class="footer px-3 d-block d-lg-none border-top text-white mt-3 fixed-bottom" style="background-color: #111111">
    <div class="container">
        <div class="d-flex">
            <ul class="nav col-12 align-items-center justify-content-between">
                <li><a href="{{ route('beranda') }}" class="nav-link p-3 text-white fw-bold @yield('textHome')"><i
                            class="fas fa-home fs-4"></i></a>
                </li>
                <li>
                    <a href="{{ route('era') }}" class="nav-link p-3 text-white fw-bold @yield('textEra')"><i
                            class="fas fa-crown fs-4"></i></a>
                </li>
                <li>
                    <a href="{{ route('franchise') }}" class="nav-link p-3 text-white fw-bold @yield('textFranchise')"><i
                            class="fas fa-tv fs-4"></i></a>
                </li>
                <li>
                    <a href="{{ route('category') }}" class="nav-link p-3 text-white fw-bold @yield('textCategory')"><i
                            class="fas fa-tag fs-4"></i></a>
                </li>
            </ul>
        </div>
    </div>
    <a href="#" class="scroll-to-top d-block aktif text-center text-white p-3" id="scrollToTopBtn">
        <i class="fas fa-chevron-up fs-4"></i>
    </a>
</footer>
<script>
    const scrollToTopBtn = document.getElementById('scrollToTopBtn');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            scrollToTopBtn.style.display = 'block';
        } else {
            scrollToTopBtn.style.display = 'none';
        }
    });

    scrollToTopBtn.addEventListener('click', (e) => {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>
