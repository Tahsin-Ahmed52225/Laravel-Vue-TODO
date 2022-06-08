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
        <tr v-for="(todo,index) in allTodo" :key=index>
            <th scope="row">{{index+1}}</th>
            <td>{{todo.task}}</td>
            <td>
                <button class="btn btn-danger" @click="deleteTask(todo.id)">Delete</button>
            </td>

        </tr>

    </tbody>
    </table>

</template>

<script>
export default{
    props:['allTodo'],
    data(){
        return{
            deleteApi: "http://localhost:8000/api/todo/delete"
        }
    },
    methods: {
        deleteTask(e){
            this.axios.delete(this.deleteApi+"/"+e,{
            }).then(response => {
                console.log("Successfully deleted from DB");
                //emiting the event to the parent component
                this.$emit('deleteTask',e);
            })
        }
    }
}

</script>
