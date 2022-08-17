<template>
<div class="container mt-5 d-flex justify-content-center">
    <form class="w-50 p-4">
        <h1 class="text-center p-1">Request to Trainer</h1><hr>
        <label class="mt-1">StartData</label>
        <div class=" w-100 d-flex">
            <div class="form-group w-100">
                <input type="date" placeholder="Input data" class="form-control">
            </div>
            <div class="form-group w-100 ml-2">
                <select class="form-control">
                    <option disabled value="">Choose</option>
                    <option value="">Morning</option>
                    <option>Afternoon</option>
                    <option>Evening</option>
                </select>
            </div>
        </div>
        <label>EndData</label>
        <div class=" w-100 d-flex">
            <div class="form-group w-100">
                <input type="date" placeholder="Input data" class="form-control">
            </div>
            <div class="form-group w-100 ml-2">
                <select class="form-control">
                    <option disabled value="">Choose</option>
                    <option value="">Morning</option>
                    <option>Afternoon</option>
                    <option>Evening</option>
                </select>
            </div>
        </div>
        <div class=" w-100 d-flex">
            <div class="form-group w-100">
                <label>Duration</label>
                <input type="text" placeholder="Input data" class="form-control">
            </div>
            <div class="form-group w-100 ml-2">
                <label>Leave type</label>
                <select class="form-control">
                    <option disabled value="">Choose</option>
                    <option value="">Sick</option>
                    <option>Go home</option>
                    <option>Busy</option>
                </select>
            </div>
        </div>
        <div class=" w-100 d-flex">
            <div class="form-group w-100">
                <label>Cause</label>
                <input type="text" placeholder="Input data" class="form-control">
            </div>
            <div class="form-group d-flex card-btn ml-2">
                <button class="btn btn-info">Submit</button>
                <button class="btn btn-danger ml-2">Cancel</button>
            </div>
        </div>
    </form>
</div>
</template>

<script>
export default {

}
</script>

<style scoped>
    form {
        border-top: 2px solid orange;
        border-radius: 5px;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
    }
    h1 {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 20px;
    }
    .card-btn {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin: 0 auto;
        margin-top: 15px;
    }
    input,select {
        border: none;
        background: rgb(210, 207, 207);
    }
</style>