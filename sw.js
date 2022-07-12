self.addEventListener("install", (e) => {
  console.log("Install!");
  e.waitUntil();
});

self.addEventListener("fetch", (e) => {
  e.respondWith(
    caches.match(e.request).then((response) => {
      return response || fetch(e.request);
    })
  );
});

self.addEventListener("activate", (e) => {
  self.clients.claim();
});
