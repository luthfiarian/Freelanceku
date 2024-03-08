/**
 *  code service worker only cache first page offline
 */

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


// /**
//  *  code service worker only cache first page offline
//  */

// // Cache offline page and offline image 
// const CACHE_NAME = 'offline-cache';
// const OFFLINE_URL = 'Public/dist/pwa/offline.php';
// const OFFLINE_IMAGE_URL = 'Public/dist/pwa/offline.png';

// // Event listener for when the service worker is installed
// self.addEventListener('install', event => {
//   event.waitUntil(
//     // Opening the cache with the specified name
//     caches.open(CACHE_NAME)
//       .then(cache => {
//         // Adding the offline URL and offline image URL to the cache
//         return cache.addAll([OFFLINE_URL, OFFLINE_IMAGE_URL]);
//       })
//       .then(self.skipWaiting()) // Proceeding to the activation phase of the service worker
//   );
// });

// // Event listener for when the service worker is activated
// self.addEventListener('activate', event => {
//   event.waitUntil(
//     // Checking the existing caches
//     caches.keys().then(keys => {
//       return Promise.all(keys.map(key => {
//         // Deleting caches that do not match the CACHE_NAME
//         if (key !== CACHE_NAME) {
//           return caches.delete(key);
//         }
//       }));
//     })
//   );
// });

// // Event listener for when there is a fetch request
// self.addEventListener('fetch', event => {
//   // If the request is for navigation (mode 'navigate')
//   if (event.request.mode === 'navigate') {
//     event.respondWith(
//       // Trying to fetch content from the network
//       fetch(event.request)
//         // If unsuccessful, trying to find content in the cache
//         .catch(() => caches.match(OFFLINE_URL))
//         // Providing a response with offline content if there is no content from the network
//         .then(response => response || caches.match(OFFLINE_URL))
//     );
//   } else if (event.request.destination === 'image') {
//     event.respondWith(
//       // Trying to fetch the image from the network
//       fetch(event.request)
//         // If unsuccessful, trying to find the image in the cache
//         .catch(() => caches.match(OFFLINE_IMAGE_URL))
//         // Providing a response with the offline image if there is no image from the network
//         .then(response => response || caches.match(OFFLINE_IMAGE_URL))
//     );
//   }
// });
