<template>
    <section class="section card">
        <div class="card-header">Add New Item</div>
        <div class="card-body">
            <form v-on:submit="saveForm()">
                <div class="alert alert-warning" v-if="hasError" role="alert">
                    <span v-text="errorMessage"></span>
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" v-model="item.title" placeholder="Item Title">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" v-model="item.description" placeholder="Item Description">
                </div>
                <div class="form-group">
                    <label>Image URL</label>
                    <input type="text" class="form-control" v-model="item.image_url" placeholder="Item Image URL">
                </div>
                <button class="btn btn-primary">Add Item</button>
            </form>
        </div>
    </section>
</template>
<script>
export default {

    data() {
        return {
            hasError: false,
            errorMessage: '',

            item: {
                title: '',
                description: '',
                image_url: '',
            }
        }
    },

    methods: {
        saveForm() {
            event.preventDefault();
            var vm = this;
            var newItem = vm.item;

            axios.post('/items', newItem)
                .then(function(response) {
                    vm.hasError = false;
                    alert('Item added!')
                })
                .catch(function(error) {
                    if (error.response) {
                        // The request was made and the server responded with a status code

                        vm.hasError = true;
                        vm.errorMessage = error.response.data.message;

                    } else if (error.request) {
                        console.log(error.request);
                    } else {
                        console.log('Error', error.message);
                    }
                });
        }
    },
}

</script>
