import Vue from 'vue';

const Api = {
  install(Vue, options) {
    Vue.mixin({
      data() {
        return {

        }
      },
      methods: {
        async getFromAPI(route, params = {}) {

          let apiResponse = await this.$axios.$get(route, {params: params});

          return apiResponse;
        },
      }
    })
  }
}

Vue.use(Api);