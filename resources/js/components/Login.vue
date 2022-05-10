<template>
     <div class="row">
        <div class="col-sm-12">
            <div class="p-2 text-2xl text-gray-800 font-semibold"><h1>Login to your account</h1></div>
            <div class="form-group">
                <label for="email">Your e-mail</label>
                <span class="w-full text-red-500 text-danger" v-if="errors.email">{{errors.email[0]}}</span>
                <input class="form-control" placeholder="Email" type="email" v-model="form.email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <span class="w-full text-red-500 text-danger" v-if="errors.password">{{errors.password[0]}}</span>
                <input class="form-control" placeholder="Password" type="password" v-model="form.password" name="password">
            </div>
            <div class="form-group mt-4">
                <button @click.prevent="loginUser" type="submit" class="flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg btn btn-primary">Login</button>
            </div>
        </div> 
    </div>
</template>
<script>
export default {
    data(){
        return{
            form:{
                email: '',
                password: ''
            },
            errors: []
        }
    },
    methods:{
         loginUser(){
             axios.post('/api/login', this.form).then(() =>{
                 this.$router.push({ name: "Dashboard"}); 
             }).catch((error) =>{
         this.errors = error.response.data.errors;
            })
         }
    }
}
</script>