<template>
    <div class="user_info">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <circle cx="20" cy="20" r="20" fill="url(#pattern0)"/>
                <defs>
                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                <use xlink:href="#image0_7_193" transform="scale(0.00277778)"/>
                </pattern>
                <image id="image0_7_193" width="360" height="360" xlink:href="data:image/png;base64,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"/>
                </defs>
            </svg>
            <div class="name_user">
                <div class="name">Иван Иванов</div>
                <div class="specialist">Tattoo artist</div>
            </div>
        </div>
</template>

<script>
export default {
    name: 'UserInfo',
}
</script>

<style lang="scss" scoped>
    .user_info{
        display: flex;
        cursor: pointer;

        .name_user{
            padding-left: 14px;

            .name{
                font-size: 16px;
                line-height: 19px;
                padding-bottom: 8px;
                font-weight: 600;

            }

            .specialist{
                color: #8F8C8C;
                font-size: 10px;
                line-height: 12px;
            }
        }
    }
</style>
