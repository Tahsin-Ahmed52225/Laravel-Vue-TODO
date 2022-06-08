<template>

<div class="card-wrapper">
     <div class="card">
            <div class="card-header" >

                <TodoInput @newTask="addNewTask"/>
            </div>
            <div class="card-body">
                <TodoTable :allTodo=allTodo @deleteTask="deleteTask" />
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
                    console.log("before");
                    console.log(this.allTodo);
                })
            },
            addNewTask(e){
                this.allTodo.push(e);
                console.log("After Adding New Task");
                console.log(this.allTodo);
               // this.getAllTodo();
            },
            deleteTask(e){
                this.allTodo = this.allTodo.filter(todo => todo.id !== e);
                console.log("After Adding Deleting Task");
                console.log(this.allTodo);
               // this.getAllTodo();
            }

        },
        created(){
            this.getAllTodo();
        }

    }
</script>
