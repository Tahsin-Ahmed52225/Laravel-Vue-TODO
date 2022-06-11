<template>
  <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Enter your task" v-model="InputTask" @keyup.enter="addData">
    <div class="input-group-append">
      <span @click="addData" class="input-group-text">Add Task</span>
    </div>
  </div>
</template>
<style scoped>
.input-group-text{
    cursor: pointer;
}
</style>
<script>
export default{
    data(){
        return{
            InputTask:'',
            createApi: "http://localhost:8000/api/todo/create"
        }
    },
    methods: {
        addData(){
            this.axios.post(this.createApi,{
                todo:{
                  task:this.InputTask,
                  stage:0,
                  }
            }).then(response => {
                this.InputTask = '';
                //emiting the event to the parent component
                this.$emit('newTask',response.data);
            })
        }
    },
    }
</script>


