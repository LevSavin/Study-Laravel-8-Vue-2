<template>
    <!-- <div class="row mt-5">
        <div class="offset-2 col-8">
            <ul class="progressbar">
                <li v-for="(status, key) in statuses"
                    :class="{'active': key <= statusId }"
                >
                    {{ translations[status] }}
                </li>
            </ul>
        </div>
    </div> -->
    <div class="test">
        <img class="img" src="@/assets/BookingPlaceholder.png" alt="111">
    </div>
</template>

<script>
    export default {
        name: 'BookingTable',
    }
</script>

<style scoped>
.test {
    height: 100%;
}
.img {
    width: 100%;
}
</style>
