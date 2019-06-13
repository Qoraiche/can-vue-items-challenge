<template>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1 class="heading-4 text-center my-3">I can Vue Items</h1>
                <div class="text-right" v-if="!userAuth">
                    <a href="/login" class="mr-3">Login</a>
                    <a href="/register">Register</a>
                </div>
                <new-item v-if="userAuth"></new-item>
                <section class="section card mt-2">
                    <!-- <transition name="slide-fade"> -->
                    <div class="content" v-if="show">
                        <div class="card-header is-1">
                            <span>Items List</span>
                            <div class="float-right">
                                <span class="mr-2">Fetched items: {{ items.length }}</span>
                                <span class="mr-2">Total items: {{ total }}</span>
                                <span>Total pages: {{ lastPage }}</span>
                                <!-- 
                                <button type="button" class="btn btn-primary btn-sm text-center ml-2">Add New item</button> -->
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-info" role="alert" v-if="total < 1">
                                There is no items.
                            </div>
                            <Item v-for="(item, index) in sliced" v-bind:item="item" v-bind:index="index" v-bind:key="item.id">
                            </Item>
                        </div>
                        <!-- <transition name="fade-slow"> -->
                        <div class="card-footer is-info" v-if="end && total > 1">
                            <p class="text-center font-bold">Outch! i hit my head with the bottom </p>
                        </div>
                        <!-- </transition> -->
                    </div>
                    <!-- </transition> -->
                </section>
                <div class="text-center text-muted font-italy font-size-small my-3">
                    by <a href="//github.com/qoraiche" target="_blank">Qoraiche</a>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {

    data() {
        return {
            show: false, // display content after API request
            offset: 10, // items to display after scroll
            display: 25, // initial items
            trigger: 300, // how far from the bottom to trigger infinite scroll
            items: [], // server response data
            total: 0,
            end: false, // no more resources
            page: 1,
            lastPage: 0,
            userAuth: App.user_auth,
            userData: App.user_data,
        };
    },

    computed: {
        // slice the array of data to display
        sliced() {
            return this.items.slice(0, this.display);
        },
    },

    methods: {
        // check to see if we're at the bottom of the page
        scrollTracker() {
            window.onscroll = ev => {
                if (
                    window.innerHeight + window.scrollY >=
                    (document.body.offsetHeight - this.trigger)
                ) {
                    if (this.page < this.lastPage) {
                        this.display = this.display + this.offset;
                        // fetchme bebe
                        this.fetchData()

                    } else {
                        // the bottom again
                        this.end = true;
                    }
                }
            };
        },
        // preform API request to the server
        fetchData() {

            let vm = this;

            // window.setTimeout(() => {

            axios.get('/items?page=' + this.page)

                .then(response => {

                    this.total = response.data.total;
                    this.lastPage = response.data.last_page;

                    $.each(response.data.data, function(key, value) {

                        vm.items.push(value)
                    });

                })

            this.show = true
            this.page = this.page + 1;

            // }, 2000);

        }
    },
    mounted() {
        // track scroll event
        this.scrollTracker();
    },
    created() {
        // get the data by performing API request
        this.fetchData();
    },

}

</script>
