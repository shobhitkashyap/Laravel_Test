<template>

      <div class="row">
        <div class="col-sm-12">
            <div class="p-2 text-2xl text-gray-800 font-semibold"><h1>Register an account</h1></div>
            <div class="form-group">
                <label class="w-full" for="name">Name</label>
                <span class="w-full text-red-500 text-danger" v-if="errors.name">{{errors.name[0]}}</span>
                <input class="form-control " placeholder="Name" type="text" v-model="form.name" >
            </div>
            <div class="form-group">
                <label for="email">Your e-mail</label>
                <span class="w-full text-red-500 text-danger" v-if="errors.email">{{errors.email[0]}}</span>
                <input class="form-control " placeholder="Email" type="email" v-model="form.email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <span class="w-full text-danger" v-if="errors.password">{{errors.password[0]}}</span>
                <input class="form-control " placeholder="Password" type="password" v-model="form.password" name="password">
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input class="form-control " placeholder="Confirm Password" type="password" v-model="form.password_confirmation" name="password_confirmation">
            </div>
            <div class="form-group mt-4">
                <button @click.prevent="saveForm" type="submit" class="flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg btn btn-primary">Register</button>
            </div>
        </div> 
    </div>
</template>
<script>
export default {
    data(){
        return{
            form:{
                name: '',
                email: '',
                password:'',
                password_confirmation:''
            },
            errors:[]
        }
    },
    methods:{
        saveForm(){
            axios.post('/api/register', this.form).then(() =>{
                this.$router.push({ name: "Login"});
            }).catch((error) =>{
                this.errors = error.response.data.errors;
            })
        }
    }
}
</script>