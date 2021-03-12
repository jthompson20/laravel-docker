
// Change to v2, etc. when you update any of the local resources, which will in turn trigger the install event again.
const PRECACHE 		= "freshtrak-focus-v1";
const RUNTIME 		= "runtime";
const PRECACHE_URLS = [	// list of URLs we always want to be cached
	'/css/app.css',
	'/css/freshtrak.css',
	'/js/app.js',
	'/js/freshtrak.js'
];

// the 'install' handler takes care of precaching the resources we always need
self.addEventListener('install', event => {

	event.waitUntil(

		caches.open(PRECACHE)
			.then(cache => cache.addAll(PRECACHE_URLS))	// add precache URLs to cache
			.then(self.skipWaiting())

	);

});

// the 'activate' handler takes care of cleaning up old caches
self.addEventListener('activate', event => {

	const active_caches 	= [PRECACHE,RUNTIME];

	event.waitUntil(

		caches.keys().then(cacheNames => {
			return cacheNames.filter(name => !active_caches.includes(name));
		})
		.then(cachesToDelete => {
			return Promise.all(cachesToDelete.map(cacheToDelete => {
				return caches.delete(cacheToDelete);
			}));
		})
		.then(() => self.clients.claim())

	);

});

/*
// the fetch handler serves responses for same-origin resources from a cache
// network falling back to cache method
self.addEventListener('fetch', event => {

	// skip cross-origin requests (like Google Analytics)
	if (event.request.url.startsWith(self.location.origin)){

		event.respondWith(async function(){

			try {
				
				// attempt to grab from network
				return await fetch(event.reqeust);
			
			} catch(error) {

				// failed to grab from network, lets attempt to grab from cache
				var response 	= await caches.match(event.request);

				// if we received response from cache, use it
				if (response) {

					return response;

				} else {

					// we did not receive a response from cache, what should we response with?
					//return caches.match('/offline');

				}

			}

		});

	}

});
*/

// prompt to add app to home screen (mobile)
self.addEventListener('beforeinstallprompt',event => {

	event.prompt();

});




