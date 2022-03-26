<template>
    <div class="form-body mb-5">
        <div class="row">
            <div class="form-holder ">
                <div class="card">
                    <div class="form-items card-body">
                        <form class="needs-validation" @submit.prevent="save()">

                            <div class="row mt-3">
                                <div class="col-md-6 d-flex align-items-center">
                                    Общая накладная
                                </div>
                                <div class="col-md-6">
                                    <input
                                        v-model="form.master.number"
                                        class="form-control mt-0"
                                        type="text"
                                        name="form.master[number]"
                                        required
                                        placeholder="Номер накладной"
                                    >
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6 d-flex align-items-center">
                                    Отправитель
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select
                                                v-model="form.sender.id"
                                                class="form-control form-select"
                                                @change="setSender"
                                            >
                                                <option value="0">Наименование</option>
                                                <option
                                                    v-for="sender in senders"
                                                    :key="sender.id"
                                                    :value="sender.id"
                                                    :selected="form.sender.id === sender.id"
                                                >
                                                    {{ sender.name }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <button @click="addSender" type="button" class="btn btn-primary container-fluid">Добавить</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3" v-if="isShowSenderInput">
                                <div class="col-md-6 offset-6">
                                    <input
                                        v-model="form.sender.name"
                                        class="form-control"
                                        type="text"
                                        name="form.sender[name]"
                                        required
                                        placeholder="Наименование компании"
                                    >
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6 d-flex align-items-center">
                                    Получатель (наименование)
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select
                                                v-model="form.receiver.id"
                                                class="form-control form-select"
                                                @change="setReceiver"
                                            >
                                                <option value="0">Наименование</option>
                                                <option
                                                    v-for="receiver in receivers"
                                                    :key="receiver.id"
                                                    :value="receiver.id"
                                                    :selected="form.receiver.id === receiver.id"
                                                >
                                                    {{ receiver.name }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <button @click="addReceiver" type="button" class="btn btn-primary container-fluid">Добавить</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3" v-if="isShowReceiverInput">
                                <div class="col-md-6 offset-6">
                                    <input
                                        v-model="form.receiver.name"
                                        class="form-control"
                                        type="text"
                                        name="form.receiver[name]"
                                        required
                                        placeholder="Наименование компании"
                                    >
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6 d-flex align-items-center">
                                    Получатель (ИНН / КПП)
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input
                                                v-model="form.receiver.inn"
                                                class="form-control mt-0"
                                                type="text"
                                                name="form.receiver[inn]"
                                                required
                                                placeholder="ИНН"
                                            >
                                        </div>
                                        <div class="col-md-6">
                                            <input
                                                v-model="form.receiver.kpp"
                                                class="form-control mt-0"
                                                type="text"
                                                name="form.receiver[kpp]"
                                                required
                                                placeholder="КПП"
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h3 class="text-center mt-3">Статусы</h3>

                            <div class="mt-3">
                                <div class="row">
                                    <div class="col-md-6 d-flex align-items-center">
                                        Новая накладная
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input
                                                    v-model="form.statuses['1'].date"
                                                    class="form-control mt-0"
                                                    type="date"
                                                    name="form.statuses['1'][date]"
                                                    required
                                                >
                                            </div>
                                            <div class="col-md-6">
                                                <input
                                                    v-model="form.statuses['1'].time"
                                                    class="form-control mt-0"
                                                    type="text"
                                                    name="form.statuses['1'][time]"
                                                    placeholder="12:00"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                master: { 'number': '' },
                waybill: { 'number': '' },
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
            isShowSenderInput: false,
            isShowReceiverInput: false,
            senders: {},
            receivers: {},
        }
    },
    methods: {
        ...mapActions({
            setLogin: 'Common/setLogin',
        }),
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
                    this.receivers = data.receivers;
                    this.senders = data.senders;
                })
                .catch();
        },
        save() {
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
            login: 'Common/login',
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
