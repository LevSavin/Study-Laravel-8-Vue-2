<template>
    <div class="page_container">
        <div class="user_container">
            <div class="user">
                <div class="user_name">Иван Иванов</div>
                <div class="specialist">Tattoo artist</div>
            </div>
        </div>

        <div class="scheduler_container">
            <div class="scheduler">
                <div class="working_day">Рабочий день</div>
                <div class="change">Изменить</div>
            </div>
        </div>
        

        <div class="clients" v-for="row in rows" :key="row.time">
            <div class="time">{{row.time}}</div>
            <div v-if="row.client" class="client_cell">
                <div class="client_name">{{row.client.name}}
                    <!-- {{row.client.phone}} -->
                </div>
                <div class="service">{{row.client.service}}</div>
                <div class="description">Тату для девушки - дракон во всю спину. Взять обезбол, плохо терпит боль.</div>
            </div>
        </div>
    </div>
    
</template>

<script>
    export default {
        name: 'MainTable',
        data: () => ({
            date: new Date(),
            rows: []
        }),
        methods: {
            renderRows() {
                const rows = [];

                for (let i = 10; i <= 18; i++) {
                    let client = null;
                    if (i === 7 || i === 11) { // для примера
                        client = {
                            name: "Петров Иван",
                            service: "Сеанс Тату - Большой размер"
                        }
                    }

                    rows.push({
                        time: this.formatTime(i),
                        client // {name: "", phone: "", service: ""}
                    })
                }

                this.rows = rows;
            },
            formatTime(time) {
                return `${time < 10 ? "0" + time : time}:00`;
            },
            // monthName(month) {
            //     switch (month) {
            //         case 0:
            //             return "Январь";
            //         case 1:
            //             return "Февраль";
            //         case 2:
            //             return "Март";
            //         case 3:
            //             return "Апрель";
            //         case 4:
            //             return "Май";
            //         case 5:
            //             return "Июнь";
            //         case 6:
            //             return "Июль";
            //         case 7:
            //             return "Август";
            //         case 8:
            //             return "Сентябрь";
            //         case 9:
            //             return "Октябрь";
            //         case 10:
            //             return "Ноябрь";
            //         case 11:
            //             return "Декабрь";
            //     }
            // }
        },
        mounted() {
            this.renderRows();
            this.date = new Date(this.$route.params.date);
        }
    }
</script>

<style lang="scss" scoped>
    .page_container {

        .user_container {
            display: flex;
            justify-content: center;
            background: rgba(226, 216, 216, 0.69);
            margin-bottom: 8px;
            cursor: pointer;

            .user {
                padding: 16px;
                font-weight: 600;


                .specialist {
                    color: rgb(143, 140, 140);
                    line-height: 12px;
                    font-size: 10px;
                }
            }
        }

        .scheduler_container {
            display: flex;
            display: flex;
            justify-content: center;
            background: rgb(224, 224, 224);
            margin-bottom: 8px;
            cursor: pointer;

            .scheduler {
                padding: 16px;
                font-weight: 600;

                .change {
                    color: rgb(143, 140, 140);
                    line-height: 12px;
                    font-size: 10px;
                    cursor: pointer;

                }
            }
        }
        

                
        .clients{
            display: flex;
            border: 0.2px solid rgb(153, 145, 145, 0.55);
            background: #FFFFFF;
            cursor: pointer;
        
            .time{
                font-size: 10px;
                line-height: 13px;
                padding: 8px 8px 44px;
                
            }

            .client_cell{
                padding:  10px 46px 46px ;

                .client_name {
                    font-size: 16px;
                    line-height: 19px;
                    font-weight: 600;
                }

                .service {
                    font-size: 10px;
                    line-height: 13px;
                }

                .description {
                    padding-top: 24px;
                    color: #989494;
                    font-size: 10px;
                    line-height: 13px;

                }
            }
        }
        
    }

</style>