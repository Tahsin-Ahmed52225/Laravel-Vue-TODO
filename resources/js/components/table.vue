<template>
    <table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Task</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="(todo,index) in todos">
            <th scope="row">{{index+1}}</th>
            <td>{{todo.task}}</td>
            <td>
                <button class="btn btn-danger">Delete</button>
            </td>

        </tr>

    </tbody>
    </table>

</template>

<script>
export default{
    data(){
        return{
           todos:[],
           api: "http://localhost:8000/api/todos"
        }
    },
    mounted(){
        this.axios.get(this.api).then(response => {
            this.todos = response.data;
        })
    },



}

</script>
