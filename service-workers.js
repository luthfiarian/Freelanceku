importScripts('https://storage.googleapis.com/workbox-cdn/releases/6.2.0/workbox-sw.js');

const CACHE_NAME = 'Freelanceku';

workbox.routing.registerRoute(
  /\.(?:js|css|png|jpg|jpeg|svg|gif)$/,
  new workbox.strategies.CacheFirst({
    cacheName: CACHE_NAME,
    plugins: [
      new workbox.cacheableResponse.CacheableResponsePlugin({
        statuses: [0, 200],
      }),
    ],
  })
);

const OFFLINE_URL = 'Public/dist/pwa/offline.php';
const OFFLINE_IMAGE_URL = 'Public/dist/pwa/offline.png';

self.addEventListener('install', event => {
  const urlsToCache = [
    OFFLINE_URL,
    OFFLINE_IMAGE_URL
  ];
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        return cache.addAll(urlsToCache);
      })
      .then(() => {
        console.log('Cache berhasil ditambahkan');
      })
  );
});

self.addEventListener('activate', event => {
  event.waitUntil(
    caches.keys().then(keys => {
      return Promise.all(keys.map(key => {
        if (key !== CACHE_NAME) {
          return caches.delete(key);
        }
      }));
    })
    .then(() => self.clients.claim())
  );
});

self.addEventListener('fetch', event => {
  if (event.request.mode === 'navigate') {
    event.respondWith(
      fetch(event.request)
        .catch(() => caches.match(OFFLINE_URL))
        .then(response => response || caches.match(OFFLINE_URL))
    );
  } else if (event.request.destination === 'image') {
    event.respondWith(
      fetch(event.request)
        .catch(() => caches.match(OFFLINE_IMAGE_URL))
        .then(response => response || caches.match(OFFLINE_IMAGE_URL))
    );
  }
});
