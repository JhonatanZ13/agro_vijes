const CACHE_NAME = "v1_cache_contador_vueJS";
const urlsToCache = [
    "./",
    "../view/",
    "../model/",
    "../controller/",
    "../view/home.php",
    "./img/no_image.jpg",
    "./img/mision.png",
    "./img/profile.jpg",
    "./img/fotos/",
    "./img/icons/",
    "./index.php",
    "./ajax.php",
    "./load.js",
    "./main.js",
    "./manifest.json",
    "./sw.js",
];

self.addEventListener("install", e =>{
    e.waitUntil(
        caches.open(CACHE_NAME).then(
            cache => cache.addAll(urlsToCache).then(
                () => self.skipWaiting()
            ).catch(
                err => console.log(err)
            )
        )
    )
})

self.addEventListener("activate", e => {
    const cacheWhiteList = [CACHE_NAME]
    e.waitUntil(
        caches.keys().then(
            cacheNames => {
                return Promise.all(
                    cacheNames.map(
                        cacheName => {
                            if(cacheWhiteList.indexOf(cacheName) == -1){
                                return caches.delete(cacheName)
                            }
                        }
                    )
                )
            }
        ).then(
            () => self.clients.claim()
        )
    )
})

self.addEventListener("fetch", e => {
    e.respondWith(
        caches.match(e.request).then(
            res => {
                if (res) {
                    return res 
                }
                return fetch(e.request)
            }
        )
    )
})