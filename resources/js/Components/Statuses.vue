<template>
    <div class="row mt-5">
        <div class="offset-2 col-8">
            <ul class="progressbar">
                <li v-for="(status, key) in statuses"
                    :class="{'active': key <= statusId }"
                >
                    {{ translations[status] }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'statuses',
        props: ['statusId', 'statuses', 'translations']
    }
</script>

<style scoped>
    .progressbar {
        counter-reset: step;
    }
    .progressbar li {
        list-style-type: none;
        width: 15%;
        float: left;
        font-size: 12px;
        position: relative;
        text-align: center;
        text-transform: uppercase;
        color: #7d7d7d;
        z-index: 1;
    }
    .progressbar li:before {
        width: 30px;
        height: 30px;
        content: counter(step);
        counter-increment: step;
        line-height: 30px;
        border: 2px solid #7d7d7d;
        display: block;
        text-align: center;
        margin: 0 auto 10px auto;
        border-radius: 50%;
        background-color: white;
    }
    .progressbar li:after {
        width: 100%;
        height: 2px;
        content: '';
        position: absolute;
        background-color: #7d7d7d;
        top: 15px;
        left: -40%;
        z-index: -1;
    }
    .progressbar li:first-child:after {
        content: none;
    }
    .progressbar li.active {
        color: green;
    }
    .progressbar li.active:before {
        border-color: #55b776;
    }
    .progressbar li.active + li:after {
        background-color: #55b776;
    }
</style>
