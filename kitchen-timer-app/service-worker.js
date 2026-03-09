// self.addEventListener("install", function(event) {
//   event.waitUntil(
//     caches.open("kitchen-timer-cache").then(function(cache) {
//       return cache.addAll([
//         "/",
//         "/index.html",
//         "/style.css",
//         "/script.js"
//       ]);
//     })
//   );
// });

const CACHE_NAME = "kitchen-timer-cache";
const urlsToCache = [
"/",
"/index.html",
"/style.css",
"/script.js",
"/manifest.json",
"/logo.png",
"/alarm.mp3"
];

self.addEventListener("install", event => {
  self.skipWaiting();
  event.waitUntil(
    caches.open(CACHE_NAME)
    .then(cache => cache.addAll(urlsToCache))
  );
});

self.addEventListener("activate", event => {
  event.waitUntil(
    caches.keys().then(keys => {
      return Promise.all(
      keys.filter(key => key !== CACHE_NAME)
      .map(key => caches.delete(key))
      );
    })
  );
});

self.addEventListener("fetch", event => {
  event.respondWith(
    caches.match(event.request).then(response => {
    if(response){
      return response;
    }
    return fetch(event.request);
    })
  );
});