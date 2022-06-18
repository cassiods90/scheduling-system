export default {
	// Global page headers: https://go.nuxtjs.dev/config-head
	head: {
		title: 'scheduling',
		htmlAttrs: {
		lang: 'en'
		},
		meta: [
		{ charset: 'utf-8' },
		{ name: 'viewport', content: 'width=device-width, initial-scale=1' },
		{ hid: 'description', name: 'description', content: '' },
		{ name: 'format-detection', content: 'telephone=no' }
		],
		link: [
		{ rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
		]
	},

	// Global CSS: https://go.nuxtjs.dev/config-css
	css: [
		'~/assets/scss/style.scss'
	],

	// Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
	plugins: [
		{src: '~/plugins/calendarJs', ssr: false},
    '@/plugins/mixins/Api',
	],

	// Auto import components: https://go.nuxtjs.dev/config-components
	components: true,

	// Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
	buildModules: [
		['@braid/vue-formulate/nuxt', {
		configPath: '~/plugins/formulate.config.js'
		}],
	],

	// Modules: https://go.nuxtjs.dev/config-modules
	modules: [
		// https://go.nuxtjs.dev/bootstrap
		'bootstrap-vue/nuxt',
		'@nuxtjs/axios',
		'@nuxtjs/auth',
		
	],
	
	axios: {
		baseURL: 'http://api.scheduling.com/api' 
	},
	
	auth: {
		strategies: {
			local: {
				endpoints: {
					login: { url: '/login', method: 'post', propertyName: 'accessToken' },
					logout: { url: '/logout', method: 'get'},
					user: { url: '/users/me', method: 'get', propertyName: false},
				},
				// tokenRequired: false,
        		// tokenType: false
			},
		},
	},
	

	// Build Configuration: https://go.nuxtjs.dev/config-build
	build: {
	}
}
