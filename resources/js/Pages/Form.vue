<template>
    <div class="form-body mb-5">
        <div class="row">
            <div class="form-holder ">
                <div class="card">

                    <div>
                        <template v-for="worktime in worktimes">
                            <button type="button" disabled="disabled" class="btn btn-outline-danger" v-if="occupiedtimes.find(el=>el.time_id === worktime.id)">
                                {{worktime.time}}
                            </button>
                            <button type="button" v-bind:id="worktime.id" @click="addAppointment(worktime.id)"  class="btn btn-outline-success" v-else>
                                {{worktime.time}}
                            </button>
                        </template>
                    </div>

                    <div class="form-items card-body">
                        <form class="needs-validation" @submit.prevent="save()" v-if="isShowForm">
                            <div class="row mt-3">
                                <div class="col-md-6 d-flex align-items-center">
                                    Ваше имя
                                </div>
                                <div class="col-md-6">
                                    <input
                                        v-model="form.customer.name"
                                        class="form-control mt-0"
                                        type="text"
                                        name="form.customer[name]"
                                        required
                                        placeholder="Ваше имя"
                                    >
                                </div>
                             </div>

                            <div class="row mt-3">
                                <div class="col-md-6 d-flex align-items-center">
                                    Услуга
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select
                                                v-model="form.service.id"
                                                class="form-control form-select"
                                            >
                                                <option value="0">Услуга</option>
                                                <option
                                                    v-for="service in services"
                                                    :key="service.id"
                                                    :value="service.id"
                                                    :selected="form.service.id === service.id"
                                                >
                                                    {{ service.title }} - {{service.price}}
                                                </option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6 d-flex align-items-center">
                                    Номер телефона
                                </div>
                                <div class="col-md-6">
                                    <input
                                        v-model="form.customer.phone"
                                        class="form-control mt-0"
                                        type="text"
                                        name="form.customer[phone]"
                                        required
                                        placeholder="Ваш номер"
                                    >
                                </div>
                            </div>





                            <h2 v-if="worktimes[this.timeId]">Выбрано время: {{(worktimes.find(n => n.id === this.timeId)).time}}</h2>

                             <div class="form-button mt-4 d-flex justify-content-center">

                                 <button id="submit" type="submit" class="btn btn-primary">Отправить</button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </template>

 <script>
 import { mapActions, mapGetters } from 'vuex';

 export default {
     name: 'new-form',
     data() {
         return {
             form: {
                 customer: {'name': '', 'phone': ''},
                 service: {'id': 0, 'title':''},
                 master: { 'number': '' },
                 waybill: { 'number': '' },
                 time: {'id': 0},
                 sender: { 'id': 0, 'name': '' },
                 receiver: { 'id': 0, 'name': '', 'inn': '', 'kpp': '' },
                 statuses: {
                     '1': { 'date': '', 'time': '' },
                     '2': { 'date': '', 'time': '' },
                     '3': { 'date': '', 'time': '' },
                     '4': { 'date': '', 'time': '' },
                     '5': { 'date': '', 'time': '' },
                     '6': { 'date': '', 'time': '' },
                 }
             },
             isShowForm: false,
             isShowSenderInput: false,
             isShowReceiverInput: false,
             occupiedtimes: {},
             worktimes: {},
             senders: {},
             receivers: {},
             services:{},
             timeId: null,
         }
     },
     methods: {
         ...mapActions({
             setLogin: 'setLogin',
         }),
         addAppointment(id){
             console.log('Выходит форма');
             console.log(id);
             this.timeId = id;
             this.isShowForm = true;
         },
         addSender() {
             this.form.sender.id = 0;
             this.form.sender.name = '';
             this.isShowSenderInput = true;
         },
         addReceiver() {
             this.form.receiver.id = 0;
             this.form.receiver.name = '';
             this.form.receiver.inn = '';
             this.form.receiver.kpp = '';
             this.isShowReceiverInput = true;
         },
         setSender() {
             if (this.form.sender.id > 0) {
                 this.form.sender.name = '';
                 this.isShowSenderInput = false;
             }
         },
         setReceiver() {
             if (this.form.receiver.id > 0) {
                 let receiver = this.receivers.find((receiver) => this.form.receiver.id === receiver.id);

                 this.form.receiver.name = '';
                 this.form.receiver.inn = receiver.inn;
                 this.form.receiver.kpp = receiver.kpp;
                 this.isShowReceiverInput = false;
             }
         },
         loadData() {
             axios.get('/api/waybills/create')
                 .then(({data}) => {
                     this.worktimes = data.worktimes;
                     this.occupiedtimes = data.occupiedtimes;
                     // this.receivers = data.receivers;
                     // this.senders = data.senders;
                     this.services = data.services;
                 })
                 .catch();
         },
         save() {
             this.form.time.id = this.timeId; //  помещаем в форму выбранное время.
             axios.post('/api/waybills', this.form)
                 .then(() => {
                     this.$router.push({
                         name: 'tracking',
                         params: {
                             number: this.form.waybill.number
                         }
                     });
                 })
                 .catch();
         }
     },
     computed: {
         ...mapGetters({
             login: 'login',
         }),
     },
     created() {
         this.loadData();
         this.setLogin('user');
     }
 }
 </script>

 <style scoped>
     .dropdown-menu.dropdown-menu > li > a {
         white-space: normal;
     }

     .card {
         min-width: 740px;
     }

     .form-holder {
         display: flex;
         flex-direction: column;
         justify-content: center;
         align-items: center;
         text-align: center;
         min-height: 100vh;
     }

     .form-content .form-items {
         border: 3px solid #8D8D8D;
         padding: 40px;
         display: inline-block;
         width: 100%;
         -webkit-border-radius: 10px;
         -moz-border-radius: 10px;
         border-radius: 10px;
         text-align: left;
         -webkit-transition: all 0.4s ease;
         transition: all 0.4s ease;
     }
 </style>
