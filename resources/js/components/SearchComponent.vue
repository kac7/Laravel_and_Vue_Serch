<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" class="form-control" v-on:input="fetch" id="name" v-model="name"
                               placeholder="name">
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="number" class="form-control" v-on:input="fetch" id="price_from"
                               v-model="price_from"
                               placeholder="price from">
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="number" class="form-control" v-on:input="fetch" id="price_up" v-model="price_up"
                               placeholder="price up">
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="number" class="form-control" v-on:input="fetch" id="bedrooms" v-model="bedrooms"
                               placeholder="bedrooms">
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="number" class="form-control" v-on:input="fetch" id="bathrooms" v-model="bathrooms"
                               placeholder="bathrooms">
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="number" class="form-control" v-on:input="fetch" id="storeys" v-model="storeys"
                               placeholder="storeys">
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="number" class="form-control" v-on:input="fetch" id="garages" v-model="garages"
                               placeholder="garages">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <table class="table" v-if="!is_refresh && !is_null">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Bedrooms</th>
                        <th>Bathrooms</th>
                        <th>Storeys</th>
                        <th>Garages</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in search_houses">
                        <td>{{item.name}}</td>
                        <td>{{item.price}}</td>
                        <td>{{item.bedrooms}}</td>
                        <td>{{item.bathrooms}}</td>
                        <td>{{item.storeys}}</td>
                        <td>{{item.garages}}</td>
                    </tr>
                    </tbody>
                </table>
            <div v-if="is_refresh" class="text-center mt-5 mb-5">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <div class="text-center mt-5 mb-5" v-if="is_null">
                <h2>no data</h2>
            </div>
            </div>


        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                search_houses: [],
                name: null,
                price_from: null,
                price_up: null,
                bedrooms: null,
                bathrooms: null,
                storeys: null,
                garages: null,
                is_refresh: false,
                is_null:false
            }
        },
        mounted() {
            this.fetch();
        },
        methods: {
            fetch() {
                this.is_refresh = true;
                this.is_null = false;
                axios.get('/api/search', {
                    params: {
                        name: this.name,
                        price_from: this.price_from,
                        price_up: this.price_up,
                        bedrooms: this.bedrooms,
                        bathrooms: this.bathrooms,
                        storeys: this.storeys,
                        garages: this.garages
                    }
                })
                    .then((response) => {
                        console.log(response);
                        this.is_null = response.data.length <= 0;
                        this.search_houses = response.data;
                        this.is_refresh = false;
                    });
            }
        }
    }
</script>
