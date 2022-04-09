<template>
    <div class="container">
        <div class="header">{{monthName(date.getMonth())}}, {{date.getDate()}} </div>
        <div class="clients">
            <table class="clients-table">
                <thead>
                    <th class=time-cell>Время</th>
                    <th class="client-cell">Клиент</th>
                    <th class="action-cell">Действия</th>
                </thead>
                <tbody>
                    <tr v-for="row in rows" :key="row.time">
                        <td>{{row.time}}</td>
                        
                        <td v-if="row.client" class="client-cell">
                            {{row.client.service}}, {{row.client.name}}, {{row.client.phone}}
                        </td>
                        <td v-else class="client-cell"></td>

                        <td v-if="row.client">
                            delete
                        </td>
                        <td v-else>
                            edit
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'ClientList',
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
                            name: "Светлана",
                            phone: "+74950000000",
                            service: "Стрижка"
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
            monthName(month) {
                switch (month) {
                    case 0:
                        return "Январь";
                    case 1:
                        return "Февраль";
                    case 2:
                        return "Март";
                    case 3:
                        return "Апрель";
                    case 4:
                        return "Май";
                    case 5:
                        return "Июнь";
                    case 6:
                        return "Июль";
                    case 7:
                        return "Август";
                    case 8:
                        return "Сентябрь";
                    case 9:
                        return "Октябрь";
                    case 10:
                        return "Ноябрь";
                    case 11:
                        return "Декабрь";
                }
            }
        },
        mounted() {
            this.renderRows();
            this.date = new Date(this.$route.params.date);
        }
    }
</script>

<style lang="scss" scoped>
    .container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 24px;


        .header {
            caption-side: top;

            .arrows {
                display: flex;
                justify-content: right;
            }
        }

        .clients-table {
            font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
            font-size: 14px;
            background: white;
            max-width: 40%;
            width: 40%;
            border-collapse: collapse;
            text-align: center;
            border: solid 0.5px rgb(218, 214, 214);
            box-shadow: 0 0 10px rgba(0,0,0,0.2);

            th {
                font-weight: normal;
                color: black;
                border-bottom: 0.5px solid rgb(218, 214, 214);
                padding: 10px 8px;
            }

            td {
                color: grey;
                padding: 9px 8px;
                border: solid 0.5px rgb(218, 214, 214);
            }

            .client-cell {
                min-width: 400px;
                text-align: left;
            }
        }
        
    }
</style>