<template>
  <div>
        <form action="" v-on:submit.prevent="createCustomer()" method="post">
            <div v-bind:class="{'form-group' : true, 'has-error' : 'errors.name'}">
                <label for="">Name</label>
                <input type="text" v-model="customer.name" class="form-control">
                <span class="help-block" v-for="error in errors.name" v-text="error" :key="error.id"> {{ error }} </span>
            </div>

            <div v-bind:class="{'form-group' : true, 'has-error' : 'errors.name'}">
                <label for="">Email</label>
                <input type="text" v-model="customer.email" class="form-control">
                <span class="help-block" v-for="error in errors.email" v-text="error" :key="error.id"> {{ error }} </span>
            </div>

            <div v-bind:class="{'form-group' : true, 'has-error' : 'errors.name'}">
                <label for="">Sex</label>
                <select name="" id="" v-model="customer.sex_id">
                    <option v-for="sex in sexes" v-bind:value="sex.id" v-text="sex.sex" :key="sex.id">
                    </option>
                </select>
                <span class="help-block" v-for="error in errors.name" v-text="error" :key="error.id"> {{ error }} </span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Create">
            </div>
        </form>

        <hr>

        <table class=" table table-striped table-bordered table-condensed">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Sex</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <customer v-for="customer in customers"
                v-bind:customer="customer"
                @update-customer="fetchCustomer"
                @delete-customer="deleteCustomer"
                :key="customer.id"
                >
                </customer>
            </tbody>

        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            customers: [],
            sexes: [],
            errors: [],
            customer: {
                name: '',
                email: '',
                sex_id: '',
                sex: ''
            }
        }
    },
    created() {
        this.fetchCustomer()
        this.fetchSex()
    },
    methods: {
        fetchCustomer() {
            axios.get('/customer')
            .then(response => {
                this.customers = response.data.customers
            })
            .catch(error => {
                console.log('loi')
            })
        },
        fetchSex() {
            axios.get('sex')
            .then(response => {
                this.sexes = response.data.sexes
            })
        },
        createCustomer() {
            axios.post('/customer', this.customer)
            .then(response => {
                this.fetchCustomer()
                // this.customers.push(response.data.customer)
                // this.customer = {name: '', email: '', sex_id: ''}
            })
            .catch(error => {
                console.log('loi')
            })
        },
        deleteCustomer(cus) {
            if(confirm('ban co muon xoa')) {
                let index = this.customers.indexOf(cus)
                axios.delete('customer/' + cus.id)
                .then(res => {
                    this.customers.splice(index, 1)
                })
                .catch(err => {

                })
            }

        }
    }
}
</script>

<style>

</style>