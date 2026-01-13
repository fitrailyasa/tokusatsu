<style>
    .pwa-modal {
        color: var(--text-main);
        padding: 30px 20px;
        background: var(--bg-color);
    }

    .pwa-title {
        color: var(--text-main);
    }

    .pwa-icon {
        width: 72px;
        height: 72px;
        border-radius: 16px;
        background: var(--bg-color);
    }

    #pwa-install-btn {
        color: #fff;
        background: #260751;
        border-radius: 12px;
    }

    .modal-backdrop.show {
        opacity: 0.75;
    }
</style>

<!-- PWA Install Modal -->
<div class="modal fade" id="pwaModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content pwa-modal">
            <div class="pwa-modal text-center">
                <img src="{{ asset('logo.png') }}" alt="App Icon" class="pwa-icon">
                <h4 class="pwa-title my-3">{{ config('app.name') }}</h4>
                <button id="pwa-install-btn" class="btn btn-md w-50 my-2">
                    <span class="d-inline-flex align-items-center gap-2">
                        Install <i data-feather="download"></i>
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    let deferredPrompt = null;

    const isInstalled = () =>
        window.matchMedia('(display-mode: standalone)').matches ||
        window.navigator.standalone === true;

    // Tangkap event install
    window.addEventListener('beforeinstallprompt', (e) => {
        e.preventDefault();
        deferredPrompt = e;
    });

    window.addEventListener('load', () => {

        if (isInstalled()) return;

        const lastShown = localStorage.getItem('pwa');
        const time = 7 * 24 * 60 * 60 * 1000;
        const now = new Date().getTime();
        if (lastShown && now - lastShown < time) return;

        const modalEl = document.getElementById('pwaModal');
        const modal = new bootstrap.Modal(modalEl);
        const installBtn = document.getElementById('pwa-install-btn');

        modal.show();

        installBtn.addEventListener('click', async () => {
            if (deferredPrompt) {
                deferredPrompt.prompt();
                await deferredPrompt.userChoice;
                deferredPrompt = null;
                modal.hide();
            }
        });

        modalEl.addEventListener('hidden.bs.modal', () => {
            localStorage.setItem('pwa', now);
        });
    });
</script>
