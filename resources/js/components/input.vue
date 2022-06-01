<template>
  <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Enter your task" v-model="InputTask">
    <div class="input-group-append">
      <span @click="addData" class="input-group-text">Add Task</span>
    </div>
  </div>
</template>
<script>
export default{
    data(){
        return{
            InputTask:'',
            api: "http://localhost:8000/api/todo/create"
        }
    },
    methods: {
        addData(){
            console.log(this.InputTask);
            this.axios.post(this.api,{
                todo:{
                  task:this.InputTask,
                  stage:0,
                  }
            }).then(response => {
                console.log("Success");
                this.InputTask = '';
            })
        }
    },
    mounted(){
        this.axios.get(this.api).then(response => {
            this.todos = response.data;
        })
    },

    }
</script>


