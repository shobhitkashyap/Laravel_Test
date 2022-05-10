<template>

      <div class="row">
        <div class="col-sm-12">
            <div class="p-2 text-2xl text-gray-800 font-semibold"><h1>User Edit</h1></div>
            <div class="form-group">
                <label class="w-full" for="name">Name</label>
                <input class="form-control " placeholder="Name" type="text" v-model="user.name" >
            </div>
            <div class="form-group">
                <label for="email">Your e-mail</label>
                <input class="form-control " placeholder="Email" type="email" v-model="user.email">
            </div>
            <div class="form-group mt-4">
                <button @click.prevent="userUpdate(user.id)" type="submit" class="flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg btn btn-primary">Update</button>
            </div>
        </div> 
    </div>
</template>
<script>
export default {
    data(){
        return{
            user: null,
        }
    },
    methods:{
        userUpdate(id){
            axios.post('/api/update/'+id, this.user).then((res) =>{
                this.$router.push({ name: "Dashboard"});
                alert("User Update Successfully");
            }).catch((error) =>{
                this.errors = error.response.data.errors;
            })

        }
    },
    mounted(){
        axios.get('/api/user-edit/'+this.$route.params.id).then((res)=>{
            this.user = res.data[0];
        })

    }
}
</script>