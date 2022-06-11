<template>

<div class="card-wrapper">
     <div class="card">
            <div class="card-header" >

                <TodoInput @newTask="addNewTask"/>
            </div>
            <div class="card-body">
                <TodoTable :allTodo=allTodo @deleteTask="deleteTask" @updateTask="updateTask" />
            </div>
    </div>

</div>

</template>
<style scoped>
.card-wrapper{
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.card{
    border: none;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    width:60%;
}
</style>
<script>

    export default{
        data(){
            return{
                newTask:'',
                allTodo:[],
            }
        },
        methods:{
            getAllTodo(){
                this.axios.get('http://localhost:8000/api/todos')
                .then(response => {
                    this.allTodo = response.data;
                })
            },
            addNewTask(e){
                this.allTodo.unshift(e);
            },
            deleteTask(e){
                this.allTodo = this.allTodo.filter(todo => todo.id !== e);
            },
            updateTask(e){
                this.allTodo = this.allTodo.map(todo => {
                    if(todo.id === e.id){
                        todo.stage = e.stage;
                    }
                    return todo;
                });
            }

        },
        created(){
            this.getAllTodo();
        }

    }
</script>
