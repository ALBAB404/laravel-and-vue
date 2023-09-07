<template>
    <div>
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-6 m-auto">
                    <div class="card">
                        <h5 class="card-header">
                            <router-link :to="{ name: 'Table' }" class="btn btn-sm btn-info">All Data</router-link>
                        </h5>
                        <div class="card-body">
                            <form @submit.prevent="storeData">
                                <div class="mb-3 form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="mb-3 form-control" v-model="form.email" id="email" aria-describedby="emailHelp" placeholder="Enter email"/>
                                    <span v-if="error.email" class="text-danger">{{ error.email[0] }}</span>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="mb-3 form-control" v-model="form.name" id="name" aria-describedby="emailHelp" placeholder="Enter Name"/>
                                    <span v-if="error.name" class="text-danger">{{ error.name[0] }}</span>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text"  class="mb-3 form-control" id="phone" v-model="form.phone" aria-describedby="emailHelp" placeholder="Enter Phone"/>
                                    <span v-if="error.phone" class="text-danger">{{ error.phone[0] }}</span>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="gender">Gender</label>
                                    <select  id="gender" class="mb-3 form-select" v-model="form.gender">
                                        <option value="male">Male</option>
                                        <option value="female">female</option>
                                    </select>
                                    <span v-if="error.gender" class="text-danger">{{ error.gender[0] }}</span>
                                </div>
                                <button type="submit" class="mb-3 btn btn-primary">
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {

    data(){
        return{
            form:{
                name:'',
                email:'',
                phone:'',
                gender:'',
            },

            error: {},
        }
    },

    mounted() {
        this.editData();
    },

    methods: {
        editData(){
            axios.get(`/api/students/${this.$route.params.id}`).then(res => {
                console.log(res.data.data);
                if(res.data.success == 200){
                    this.form = res.data.data
                }else{

                }
            }).catch(err => {
                this.error = err.response.data.error
            })
        }
    },

}
</script>
<style lang="">

</style>
