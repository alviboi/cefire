<template>
    <div class="row">


        <div class="col-lg-3 col-md-3">
            <datepicker :language="es" :monday-first="true" :inline="true" v-model="fecha"></datepicker>
             {{fechas}}
             <estadisticas-component></estadisticas-component>
        </div>
        <div class="col-lg-9 col-md-9">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 pb-2">
                            <label for="TxtManyanaL"><h4>Lunes Mañana</h4></label>
                            <diacamp-component id="TxtManyanaL" :prova2.sync='fechas["TxtManyanaL"]' :setmana="sem" :any="any" dia="TxtManyanaL"></diacamp-component>
                        </div>
                        <div class="col-lg-6 col-md-6 pb-2">
                            <label for="TxtTardeL"><h4>Lunes Tarde</h4></label>
                            <diacamp-component :prova2.sync='fechas["TxtTardeL"]' :setmana="sem" :any="any" dia="TxtTardeL"></diacamp-component>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 pb-2">
                            <label for="TxtManyanaM"><h4>Martes Mañana</h4></label>
                            <diacamp-component id="TxtManyanaM" :prova2.sync='fechas["TxtManyanaM"]' :setmana="sem" :any="any" dia="TxtManyanaM"></diacamp-component>
                        </div>
                        <div class="col-lg-6 col-md-6 pb-2">
                            <label for="TxtTardeM"><h4>Martes Tarde</h4></label>
                            <diacamp-component :prova2.sync='fechas["TxtTardeM"]' :setmana="sem" :any="any" dia="TxtTardeM"></diacamp-component>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 pb-2">
                            <label for="TxtManyanaX"><h4>Miércoles Mañana</h4></label>
                            <diacamp-component id="TxtManyanaX" :prova2.sync='fechas["TxtManyanaX"]' :setmana="sem" :any="any" dia="TxtManyanaX"></diacamp-component>
                        </div>
                        <div class="col-lg-6 col-md-6 pb-2">
                            <label for="TxtTardeX"><h4>Miércoles Tarde</h4></label>
                            <diacamp-component :prova2.sync='fechas["TxtTardeX"]' :setmana="sem" :any="any" dia="TxtTardeX"></diacamp-component>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 pb-2">
                            <label for="TxtManyanaJ"><h4>Jueves Mañana</h4></label>
                            <diacamp-component id="TxtManyanaJ" :prova2.sync='fechas["TxtManyanaJ"]' :setmana="sem" :any="any" dia="TxtManyanaJ"></diacamp-component>
                        </div>
                        <div class="col-lg-6 col-md-6 pb-2">
                            <label for="TxtTardeJ"><h4>Jueves Tarde</h4></label>
                            <diacamp-component :prova2.sync='fechas["TxtTardeJ"]' :setmana="sem" :any="any" dia="TxtTardeJ"></diacamp-component>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 pb-2">
                            <label for="TxtManyanaV"><h4>Viernes Mañana</h4></label>
                            <diacamp-component id="TxtManyanaV" :prova2.sync='fechas["TxtManyanaV"]' :setmana="sem" :any="any" dia="TxtManyanaV"></diacamp-component>
                        </div>
                        <div class="col-lg-6 col-md-6 pb-2">
                            <label for="TxtTardeV"><h4>Viernes Tarde</h4></label>
                            <diacamp-component :prova2.sync='fechas["TxtTardeV"]' :setmana="sem" :any="any" dia="TxtTardeV"></diacamp-component>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 pb-2">
                            <label for="TxtManyanaS"><h4>Sábado Mañana</h4></label>
                            <diacamp-component id="TxtManyanaS" :prova2.sync='fechas["TxtManyanaS"]' :setmana="sem" :any="any" dia="TxtManyanaS"></diacamp-component>
                        </div>
                        <div class="col-lg-6 col-md-6 pb-2">
                            <label for="TxtTardeS"><h4>Sábado Tarde</h4></label>
                            <diacamp-component :prova2.sync='fechas["TxtTardeS"]' :setmana="sem" :any="any" dia="TxtTardeS"></diacamp-component>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 pb-2">
                            <label for="TxtManyanaS"><h4>Domingo Mañana</h4></label>
                            <diacamp-component id="TxtManyanaS" :prova2.sync='fechas["TxtManyanaD"]' :setmana="sem" :any="any" dia="TxtManyanaD"></diacamp-component>
                        </div>
                        <div class="col-lg-6 col-md-6 pb-2">
                            <label for="TxtTardeD"><h4>Domingo Tarde</h4></label>
                            <diacamp-component :prova2.sync='fechas["TxtTardeD"]' :setmana="sem" :any="any" dia="TxtTardeD"></diacamp-component>
                        </div>
                         <div class="col-lg-10 mt-5 text-right">
                        <button type="button" class="btn btn-primary btn-lg" @click="escribir_datos">Actualitza</button>

                    </div>

                    </div>


            </div>
        </div>



        <!-- <div class="row justify-content-center">
            <div class="col-lg-12 container">
                <div class="container row">
                    <div class="col-lg-12">

                        <textarea v-model="fechas"></textarea>
                        <input type="text" class="form-control mb-2" value="aaaaa">
                        <input type="text" class="form-control mb-2">
                        <input type="text" class="form-control mb-2">
                        <input type="text" class="form-control mb-2">
                        <input type="text" class="form-control mb-2">

                        <div class="col-lg-12">

                                <textarea class="form-control mb-2"></textarea>
                        </div>
                        <button @click="leer_datos" class="btn-primary">Enviar</button>

                        {{fechas.NidAsesor}}
                    </div>
                    <div>
                        <datepicker :language="es" :monday-first="true" :inline="true" v-model="fecha"></datepicker>

                    </div>
                    <div>
                        {{fecha}}

                        {{fecha2}}
                        <br>
                        <br>
                        {{any}}
                        <br>
                        {{sem}}
                    </div>
                    <div>
                        <diacamp-component :prova2.sync="exemple"]'></diacamp-component>{{exemple}}
                    </div>
                </div>


            </div>
        </div> -->

</template>

<script>


    import Datepicker from 'vuejs-datepicker';
    import {es, en} from 'vuejs-datepicker/dist/locale';
    import VueAxios from 'vue-axios'


    export default {
        data() {
            return {
                fecha: new Date(),
                fecha2: '',
                info: '',
                en: en,
                es: es,
                any: '',
                sem: '',
                TxtManyanaL: '',
                TxtTardeL: '',
                TxtManyanaM: '',
                TxtTardeM: '',
                TxtManyanaX: '',
                TxtTardeX: '',
                TxtManyanaJ: '',
                TxtTardeJ: '',
                TxtManyanaV: '',
                TxtTardeV: '',
                TxtManyanaS: '',
                TxtTardeS: '',
                TxtManyanaD: '',
                TxtTardeD: '',
                fechas: {
                    TxtManyanaL: '',
                    TxtTardeL: '',
                    TxtManyanaM: '',
                    TxtTardeM: '',
                    TxtManyanaX: '',
                    TxtTardeX: '',
                    TxtManyanaJ: '',
                    TxtTardeJ: '',
                    TxtManyanaV: '',
                    TxtTardeV: '',
                    TxtManyanaS: '',
                    TxtTardeS: '',
                    TxtManyanaD: '',
                    TxtTardeD: '',
                    NidAnyo: 0,
                    NidSemana: 0,
                    TxtObservaciones: ''
                }

            }
        },
        methods: {
            leer_datos(any,sem) {
                this.fechas['NidSemana']=this.sem;
                this.fechas['NidAnyo']=this.any;

                axios.get('/horario/'+sem+'/'+any).then(response => (this.fechas = response.data[0])).catch(function (error) {
                    console.log(error);
                });
                // Object.keys(this.fechas).forEach(function (key) {

                //     if(fechas_aux[key]===null){
                //         this.fechas.key='aa';
                //     }
                // })
                console.log(this.fechas);

                // Object.keys(this.fechas).forEach(function (key) {
                //     if (fechas_aux != 'No results') {
                //         self.fechas[key]=fechas_aux[key];
                //     } else {
                //         self.fechas[key]='';
                //     }
                // });
                // this.fechas=self.fechas;
                //console.log(this.fechas);
            },
            escribir_datos() {
                this.fechas['NidSemana']=this.sem;
                this.fechas['NidAnyo']=this.any;
                axios.post('/horario/',this.fechas).then(response => (this.info = response.data)).catch(function (error) {
                    console.log(error);
                });
                console.log(this.info);
            }
        },
        mounted() {
            console.log('Component mounted2.');
            this.any=this.fecha.getFullYear();
            this.sem=this.fecha.getWeek();
            this.fechas['NidSemana']=this.sem;
            this.fechas['NidAnyo']=this.any;
            this.leer_datos(this.any,this.sem);


        },
        components: {
            Datepicker
        },
        watch: {
            fecha(newValue, oldValue) {
                this.any=this.fecha.getFullYear();
                this.sem=this.fecha.getWeek();
                this.fechas['NidSemana']=this.sem;
                this.fechas['NidAnyo']=this.any;
                this.leer_datos(this.any,this.sem);
            }
        },

    }
</script>
