<template>
    <div>
        <form class="form-inline">
            <div class="form-group  mb-2">
                <label for="inputPassword2" class="sr-only">Password</label>
                <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
        </form>

    </div>
</template>
export default{
    mounted(){
        console.log('Component mounted.Input');
    }

}
