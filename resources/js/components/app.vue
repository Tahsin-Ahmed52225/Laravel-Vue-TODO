<template>

<div class="card-wrapper">
     <div class="card">
            <div class="card-header">
                <TodoInput/>
            </div>
            <div class="card-body">
                <TodoTable/>
            </div>
            <div class="card-footer"></div>
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
        mounted(){
            console.log('Component mounted.');
        }

    }
</script>
