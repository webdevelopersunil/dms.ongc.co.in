<template>
    
    <div class="d-flex">
        <div> {{ mode }} </div> <div :class="mode" class="mx-2" ></div>
    </div>
    

</template>

<script>
    export default {
        props: ['mode']
    }
</script>

<style>

    .online {
        background: linear-gradient(60deg, rgb(55, 111, 10) 0%, rgb(22, 234, 103) 100%);
        width: 20px;
        height: 20px;
        border-radius: 50%;
    }

    .offline {
        background: linear-gradient(60deg, rgb(109, 16, 6) 0%, rgb(232, 84, 84) 100%);
        width: 20px;
        height: 20px;
        border-radius: 50%;
    }

    .idle {
        background: linear-gradient(60deg, rgba(193,186,12,1) 0%, rgba(250,253,45,1) 100%);;
        width: 20px;
        height: 20px;
        border-radius: 50%;
    }

</style>

