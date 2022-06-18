
<template>
    <section class="filter">
        <div class="container">
            <h1 class="text title black">Find a professional:</h1>
            <div class="filter-content row flex-column flex-md-row justify-content-center align-items-center">
                <div class="col-12">
                    <div class="filter-content-input">
                        <form action="javascript: void(0)" @keyup.prevent="doSearch()">
                            <input type="text" placeholder="Type a professional" v-model="search">                    
                        </form>
                    </div>
                </div>

                <!-- <div class="col-12 col-md-4 col-lg-4">
                    <div class="filter-content-select">
                        <select name="Select Speciality" id="">
                            <option value="1">Speciality 01</option>
                            <option value="2">Speciality 02</option>
                            <option value="3">Speciality 03</option>
                            <option value="4">Speciality 04</option>
                        </select>
                    </div>
                </div> -->

                <!-- <div class="col-1">
                    <div class="filter-content-icon d-flex justify-content-center align-items-center">
                        <img  src="@/assets/images/search/loupe.png" alt="">
                    </div>
                </div> -->
            </div>
        </div>     
    </section>
</template>

<script>


export default {
    name: 'AppFilter',
    data() {
        return {
            search: null
        }
    },
    methods: {
        doSearch() {
            this.$emit('searched', this.search);

            return false;
        }
    }
}
</script>