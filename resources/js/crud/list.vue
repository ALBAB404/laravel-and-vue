<template>
    <div>
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <h5 class="card-header">
                            <router-link :to="{ name: 'Add' }" class="btn btn-sm btn-info" >Add New</router-link>
                        </h5>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(student,index) in students" :key="index">
                                        <th scope="row">{{ ++index }}</th>
                                        <td>{{ student.name }}</td>
                                        <td>{{ student.email }}</td>
                                        <td>{{ student.phone }}</td>
                                        <td>{{ student.gender }}</td>
                                        <td>
                                            <router-link :to="{name:'student.edit', params: {id: student.id}}" href=""  class="btn btn-success btn-sm me-2">Edit</router-link>
                                            <a href="" @click.prevent="destroy(student.id)" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
        students : [],
    }
},

mounted() {
    this.fetchData();
},

methods: {
    fetchData(){
        axios.get('/api/students').then(res => {
            this.students = res.data.data
        }).catch(res =>{

        })
    },

    destroy(id){

    if(!window.confirm('Are You Sure To Delete This Data ?')){
        return;
    }

    axios.delete(`/api/students/${id}`).then(res =>{
        this.fetchData();
    })
    },
},

}
</script>
<style lang="">

</style>
