<template>
    <div>
        Dashboard <br>
        <div v-if="user">
        Name: {{user.name}} <br>
        Email: {{user.email}}<br><br>
        <button @click.prevent="logout" class="btn btn-sm btn-info">Logout</button>
        </div>


        <table class="table">
        <thead class="thead-light">
            <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            <tr v-for='(u, index) in users'>
                <td>{{ ++index }}</td>
                <td>{{ u.name }}</td>
                <td>{{ u.email }}</td>
                <td>
                <router-link :to="{name: 'edit', params: { id: u.id }}" class="btn btn-sm btn-primary">Edit
                        </router-link>
                    <button @click.prevent="userDelete(u.id)" type="submit" class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>

        </tbody>
        </table>



    </div>
</template>
<script>
export default {
    data(){
        return{
            user: null,
            users:null
        }
    },
    methods:{
        logout(){
            axios.post('/api/logout').then(()=>{
                this.$router.push({ name: "Home"})
            })
        },

        userDelete(id) {
            axios.get('/api/delete/'+id).then((res)=>{

                let i = this.users.map(item => item.id).indexOf(id); // find index of your object
                        this.users.splice(i, 1);

                alert("User Delete Successfully");
        })
        }
    },
    mounted(){
        axios.get('/api/user').then((res)=>{
            this.user = res.data
        })

        axios.get('/api/user/all').then((res)=>{
            this.users = res.data
        })

    }
}
</script>