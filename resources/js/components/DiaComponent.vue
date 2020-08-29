<template>
    <div>
        <div class="wrapper shadow-lg rounded">
                    <textarea name="este" :id="_uid+1" cols="30" rows="2" :value="this.prova2" @input="$emit('update:prova2', $event.target.value)"></textarea>
            <div class="controls">

                <button data-toggle="tooltip" data-placement="bottom" title="CEFIRE" @click="cefire('CEFIRE')" class="btn btn-primary btn-sm"><i class="fas fa-check"></i></button>
                <button data-toggle="tooltip" data-placement="bottom" title="CURS" @click="cefire('CURS')" class="btn btn-primary btn-sm"><i class="fas fa-chalkboard-teacher"></i></button>
                <button data-toggle="tooltip" data-placement="bottom" title="GUARDIA" @click="cefire('GUARDIA')" class="btn btn-primary btn-sm"><i class="fas fa-dog"></i></button>

                <div class="dropdown d-inline">
                    <button data-toggle-second="tooltip" title="COMPENSA" class="btn btn-primary dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-umbrella-beach"></i>
                    </button>
                    <div class="dropdown-menu">
                        <div class="px-2 py-2">
                                <label for="exampleDropdownFormEmail1">Quin dia compenses?</label>
                                <input @keyup.enter.prevent="cefire('COMPENSA('+fecha_in+')')" class="form-control d-inline" id="exampleDropdownFormEmail1" type="date" v-model="fecha_in">
                        </div>
                    </div>
                </div>
                <div class="dropdown d-inline">
                    <button data-toggle-second="tooltip" title="VISITA" class="btn btn-primary dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-school"></i>
                    </button>
                    <div class="dropdown-menu">
                        <div class="px-2 py-2">

                                <label for="exampleDropdownFormEmail1">Quin centre?</label>
                                <input @keyup.enter.prevent="cefire('VISITA '+centre_in)" class="form-control d-inline" id="exampleDropdownFormEmail1" placeholder="Centre" v-model="centre_in">
                        </div>
                    </div>
                </div>
                <input name="arxiu_pujar" @change="este()" :id="fileUpload" type="file" ref="arxiu" hidden>
                <button data-toggle="tooltip" data-placement="bottom" title="PERMÍS" class="btn btn-primary btn-sm" @click="chooseFiles($event)"><i class="fas fa-procedures"></i></button>
                <button data-toggle="tooltip" data-placement="bottom" title="BORRA" @click="borra()" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
            </div>

        </div>
    </div>
</template>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
    export default {
        data() {
            return {
                prova: '',
                centre_in: '',
                fecha_in: '',
                file: null,
                link_dia: null,
                titul: '',
                fileUpload: 0,
                uuid: null
            }
        },
        props: ['prova2','setmana','any','dia'],
        methods: {
            edita_a_ma () {
                this.$emit('update:prova2', this.prova2);
            },
            cefire(sel) {
                if (this.prova2===undefined){
                    this.prova2='';
                }
                if (this.prova2==''){
                    this.prova2=sel;
                } else {
                    this.prova2=this.prova2+' '+sel;
                }

                //this.$emit('update:prova2',this.prova2);
            },
            chooseFiles() {
                //alert(this.fileUpload);
                console.log('entra');
                this.$refs.arxiu.click();
                //document.getElementById(this.fileUpload).click();
            },
            borra() {
                this.prova2='';
                this.$emit('update:prova2',this.prova2);
                document.getElementById(this.uuid).value='';
                $(this.uuid).prop("disabled", false);
            },
            este() {
                this.file = event.target.files || event.dataTransfer.files;
                console.log(this.file);
                console.log(event.target.files);
                this.envia();

            },
            lletra_dia(lletra) {
                switch (lletra) {
                    case 'L':
                        return 0;
                        break;
                    case 'M':
                        return 1;
                        break;
                    case 'X':
                        return 2;
                        break;
                    case 'J':
                        return 3;
                        break;
                    case 'V':
                        return 4;
                        break;
                    case 'S':
                        return 5;
                        break;
                    case 'D':
                        return 6;
                        break;
                    default:
                        break;
                }
            },
            weekDateToDate (year, week, day) {
                const firstDayOfYear = new Date(year, 0, 1)
                const days = 2 + day + (week - 1) * 7 - firstDayOfYear.getDay()
                return new Date(year, 0, days)
            },
            async envia(){
                let formData = new FormData();
                formData.append('arxiu', this.file[0]);
                formData.append('setmana', this.setmana);
                formData.append('any', this.any);
                formData.append('dia', this.dia);
                await axios.post( '/arxiu_permis',
                formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
                ).then(response => {
                    this.cefire("PERMÍS("+response.data+")");
                    this.titul=response.data;

                })
                .catch(function(){
                    alert('Ha hagut un error, dis-li-ho a Alfred');
                });
                var dia2=this.lletra_dia(this.dia.slice(-1));
                let data_var=this.weekDateToDate(this.any,this.setmana,dia2);
                var formatted_date = data_var.getFullYear() + "-" + (data_var.getMonth() + 1) + "-" + data_var.getDate();
                console.log("La data es: "+formatted_date);
                await axios.post('/permisos', {
                    document: this.titul,
                    data: formatted_date
                })
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
        },
        mounted () {
            $("#costat").hide();
            this.fileUpload = this._uid;
        },
        watch: {
            prova2(newValue ,oldValue){
                this.$emit('update:prova2', this.prova2);
            }
            // prova2(newValue, oldValue) {
            //     if (newValue.includes('PERMÍS(')) {
            //         let file = mySubString = str.substring(str.lastIndexOf("PERMÍS(") + 1,str.lastIndexOf(")"));
            //         let link="./uploads/"+file;
            //         $("#costat").show();
            //         $("#costat a").attr("href", "./uploads/"+this.link_dia);
            //     }
            // }
        },
        beforeCreate() {
            this.uuid = this._uid;
        }

    }
</script>

<style lang="scss" scoped>
*{
    padding: 0;
    margin:0;
}
.wrapper{
    background: #eee;
    border: 1px solid #999;
    width: 450px;
    float:left;
    //display: flexbox;
}
.wrapper textarea{
    background: linear-gradient(to bottom, #e5e5e5 0%,#f2f2f2 100%);
    border:none;
    width:100%;
    height: 150px;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    //border-bottom: 1px dotted #999;
    resize: none;
}
.wrapper textarea:focus{
    outline: none;
}
.controls{
    text-align: right;
    margin-top: -6px;
}
.costat {
    display: inline-block;
    //float:left;
     //display: flex;
     //flex-direction: row;
}
button{
    // background: linear-gradient(to bottom, #ffffff 0%,#e5e5e5 100%);
    // border: 1px solid #999;
    padding: 5px 12px;
    font-weight: bold;
    color: rgb(77,77,77);
    border-width: 1px 0 0 1px;
}
textarea {
     font-size: 18px;
}
.permis {
    display: block;
    margin-left: auto;
    margin-right: auto;
    position:absolute;
    top:40%;
    padding: 10px;
}
</style>
