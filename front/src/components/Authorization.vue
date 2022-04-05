<template>
     <div class="authorization">
        <button class="sign_out">SIGN OUT</button>
    </div>
</template>

<script>
export default {
    name: 'authorization',
}
</script>

<style lang="scss" scoped>
    .authorization{

        .sign_out{
            font-size: 14px;
            line-height: 17px;
            color: white;
            background: #75AEF1;
            border: 0;
            border-radius: 10px;
            box-sizing: border-box;
            padding: 12px 16px;
            position: absolute;
            bottom: 42px;
            left: 78px;
            right: 78px;
        }
    }
</style>