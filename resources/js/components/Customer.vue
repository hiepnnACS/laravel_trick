<template>
  <tr>
      <td>
          <input type="text" v-model="editForm.name" class="form-control" v-if="edit">
          <span v-else> {{ customer.name }} </span>
      </td>

      <td>
          <input type="text" v-model="editForm.email" class="form-control" v-if="edit">
          <span v-else> {{ customer.email }} </span>
      </td>

      <td>
            <select v-model="editForm.sex_id" v-if="edit" class="form-control">
                <option v-for="sex in sexes" :value="sex.id" v-text="sex.sex" :key="sex.id"></option>
            </select>
            <span v-else>{{ customer.sex }}</span>
        </td>
    <td>
        <button @click="editCustomer" type="button" class="btn btn-info btn-xs" v-if="!edit">Edit</button>
        <button @click="cancelCustomer" type="button" class="btn btn-default btn-xs" v-if="edit">Cancel</button>

        <button type="button" class="btn btn-info" @click="updateCustomer(customer, editForm)" v-if="edit">Update</button>
        <button type="butotn" @click="$emit('delete-customer', customer)" class="btn btn-danger" v-if="!edit">Delete</button>
    </td>
  </tr>
</template>

<script>
export default {
    props : ['customer'],
    data() {
        return {
            edit: false,
            sexes: [],
            editForm: {
                name: '',
                sex_id: '',
                email: ''
            }
        }
    },
    methods: {
        editCustomer(){
                this.edit= true;
                this.editForm.name = this.customer.name;
                this.editForm.sex_id = this.customer.sex_id;
                this.editForm.email = this.customer.email;
                axios.get("sex").then(response => { this.sexes = response.data.sexes });
            },
        cancelCustomer() {
            this.edit = false
            this.editForm.name = ''
            this.editForm.sex_id = ''
            this.editForm.email = ''
        },
        updateCustomer(oldCustomer, newCustomer) {
            console.log(oldCustomer)
            axios.put('customer/' + oldCustomer.id, newCustomer)
            .then(res => {
                this.$emit('update-customer')
                this.cancelCustomer()
            })
            .catch(err => {
                console.log('err')
            })
        }
    }

}
</script>

<style>

</style>