<template>
    <table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th></th>
            <th scope="col">Task</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="(todo,index) in allTodo" :key=index>
            <th scope="row">{{index+1}}</th>
            <td><input type="checkbox" @change="updateTask(todo.id)" v-bind:checked="(todo.stage===0) ? false : true"></td>
            <td v-bind:style="(todo.stage===1) ? {'text-decoration': 'line-through'} : {'text-decoration': 'none'}">{{todo.task}}</td>
            <td>
                <button class="btn btn-danger" @click="deleteTask(todo.id)">Delete</button>
            </td>

        </tr>

    </tbody>
    </table>

</template>

<style scoped>
.table{
    align-items: center;
}
</style>

<script>
export default{
    props:['allTodo'],
    data(){
        return{
            deleteApi: "http://localhost:8000/api/todo/delete",
            updateApi: "http://localhost:8000/api/todo/update",
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
        },
        updateTask(e){
            this.axios.put(this.updateApi+"/"+e,{
            }).then(response => {
                console.log("Successfully updated in DB");
                console.log(response.data);
                //emiting the event to the parent component
                this.$emit('updateTask',response.data);
            })
        }
    }
}

</script>
