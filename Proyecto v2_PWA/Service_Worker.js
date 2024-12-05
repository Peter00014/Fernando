;
//asignar un nombre y versión al cache
const CACHE_NAME = 'WebControl',
  urlsToCache = [
    './',
    './index.php',
    './css/styles.css',
    './vendor/bootstrap.css',
    './vendor/bootstrap.min.css',
    './vendor/_variables.scss',
    './vendor/_bootswatch.scss',
    'https://use.fontawesome.com/releases/v5.15.3/js/all.js',
    'https://fonts.googleapis.com/css?family=Montserrat:400,700',
    'https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic',

    './js/scripts.js',
    './js/bootstrap.bundle.min.js',
    './js/jquery-3.6.0.js',
    

    './registrar_serviceWorker.js',
    './img2/icon-512x512.png',
    './img2/icon-256x256.png'
  ]

//durante la fase de instalación, generalmente se almacena en caché los activos estáticos
self.addEventListener('install', e => {
  e.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        return cache.addAll(urlsToCache)
          .then(() => self.skipWaiting())
      })
      .catch(err => console.log('Falló registro de cache', err))
  )
})

//una vez que se instala el SW, se activa y busca los recursos para hacer que funcione sin conexión
self.addEventListener('activate', e => {
  const cacheWhitelist = [CACHE_NAME]

  e.waitUntil(
    caches.keys()
      .then(cacheNames => {
        return Promise.all(
          cacheNames.map(cacheName => {
            //Eliminamos lo que ya no se necesita en cache
            if (cacheWhitelist.indexOf(cacheName) === -1) {
              return caches.delete(cacheName)
            }
          })
        )
      })
      // Le indica al SW activar el cache actual
      .then(() => self.clients.claim())
  )
})

//cuando el navegador recupera una url
self.addEventListener('fetch', e => {
  //Responder ya sea con el objeto en caché o continuar y buscar la url real
  e.respondWith(
    caches.match(e.request)
      .then(res => {
        if (res) {
          //recuperar del cache
          return res
        }
        //recuperar de la petición a la url
        return fetch(e.request)
      })
  )
})
