<template>
    <div class="calendar">
        <table>
            <caption>{{monthName}} {{year}}
                <div class="arrows">
                <a href="#" class="arrow_top" @click="nextMonth()">
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path fill="grey" d="M7.41,15.41L12,10.83L16.59,15.41L18,14L12,8L6,14L7.41,15.41Z" />
                    </svg>
                </a>
                <a href="#" class="arrow-bottom" @click="previousMonth()">
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path fill="grey" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                    </svg>
                </a>
                </div>
            </caption>
            <thead>
                <tr>
                    <th>ПН</th>
                    <th>ВТ</th>
                    <th>СР</th>
                    <th>ЧТ</th>
                    <th>ПТ</th>
                    <th>СБ</th>
                    <th>ВС</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="row in rows">
                    <td v-for="item in row" :class="{disabled: item.disabled, isToday: item.isToday}">
                        {{item.day}}
                    </td>
                </tr>
            </tbody>            
        </table>
    </div>
</template>

<script>
    export default {
        name: 'Scheduler',
        data: () => ({
            month: 0,
            year: 0,
            rows: []
        }),
        methods: {
            renderRows() {
                const date = new Date(this.year, this.month, 1);
                const lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();
                const now = new Date();

                // Если не понедельник, то находим ближайший понедельник слева                
                if (date.getDay() !== 1) {
                    date.setDate(date.getDate() - (date.getDay() - 1));
                }

                let stop = false;
                let counter = 0;
                const rows = [];

                // Формируем строки и ячейки календаря
                while (!stop) {
                    const row = [];

                    for (let i = 0; i < 7; i++) {
                        const cellDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() + counter);
                        row.push({
                            date: cellDate,
                            day: cellDate.getDate(),
                            disabled: cellDate.getMonth() !== this.month,
                            isToday: cellDate.getFullYear() == now.getFullYear() && cellDate.getMonth() == now.getMonth() && cellDate.getDate() == now.getDate()
                        });

                        if (cellDate.getMonth() === this.month && cellDate.getDate() === lastDay) {
                            stop = true;
                        }

                        counter++;
                    }

                    rows.push(row);
                }

                this.rows = rows;

            },
            nextMonth() {
                this.month++;

                if (this.month === 12) {
                    this.month = 0;
                    this.year++;
                }

                this.renderRows();
            },
            previousMonth() {
                this.month--;

                if (this.month < 0) {
                    this.month = 11;
                    this.year--;
                }

                this.renderRows();
            }
        },
        computed: {
            monthName() {
                switch (this.month) {
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
        mounted () {
            const now = new Date();
            this.month = now.getMonth();
            this.year = now.getFullYear();
            this.renderRows();
        }
    }
</script>

<style lang="scss" scoped>
    .calendar {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;

        caption {
            caption-side: top;

            .arrows {
                display: inline;
                justify-content: right;
            }
        }
        table {
            font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
            font-size: 14px;
            background: white;
            max-width: 40%;
            width: 40%;
            border-collapse: collapse;
            text-align: center;
            border: solid 0.5px rgb(218, 214, 214);
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
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

            &:not(.disabled) {
                transition: .3s linear;
                cursor: pointer;
                &:hover {
                    color: black;
                }
            }

            &.disabled {
                color: grey;
                opacity: 0.5;
            }

            &.isToday {
                color: rgb(199, 47, 47);
                opacity: 0.7;
                cursor: pointer;
            }
        }
    }
    .calendar table {
        width: 100%;
    }
    
</style>