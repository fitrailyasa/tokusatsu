const CACHE_NAME = "playsatsu-cache-v1";
const PRECACHE_URLS = [
    "/",
    "/offline",
    "/manifest.json",
    "/assets/favicon/favicon-96x96.png",
    "/assets/favicon/ms-icon-310x310.png",
];

self.addEventListener("install", (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            return cache.addAll(PRECACHE_URLS);
        })
    );
    self.skipWaiting();
});

self.addEventListener("activate", (event) => {
    event.waitUntil(
        caches.keys().then((keys) => {
            return Promise.all(
                keys.map((key) => {
                    if (key !== CACHE_NAME) {
                        return caches.delete(key);
                    }
                })
            );
        })
    );
    self.clients.claim();
});

self.addEventListener("fetch", (event) => {
    const req = event.request;

    if (req.method !== "GET") return;

    if (req.mode === "navigate") {
        event.respondWith(
            fetch(req)
                .then((res) => {
                    const clone = res.clone();
                    caches
                        .open(CACHE_NAME)
                        .then((cache) => cache.put(req, clone));
                    return res;
                })
                .catch(() => {
                    return caches
                        .match(req)
                        .then((cached) => cached || caches.match("/offline"));
                })
        );
        return;
    }

    event.respondWith(
        caches.match(req).then((cached) => {
            if (cached) return cached;

            return fetch(req)
                .then((res) => {
                    const clone = res.clone();
                    caches
                        .open(CACHE_NAME)
                        .then((cache) => cache.put(req, clone));
                    return res;
                })
                .catch(() => {
                    return caches.match(req);
                });
        })
    );
});
