<template>
<div class="container">

<div class="mb-5">
    <select id="seleccio" @change="get_data_concret()">
        <option value="tots">Tots</option>
        <option v-for="item5 in assesors" :key="item5.id" :value="item5.Nid_Asesor">{{item5.name}}</option>
    </select>
</div>
  <div>
      <div v-for="item in items" :key="item.id" class="row">
        <div class="d-inline shadow p-3 mb-2 bg-white rounded">{{ item.data }} - <a :href="'uploads/'+item.document">{{ item.document }}</a><i @click="borra(item.id,item.document)" class="red-text cursor-pointer fas fa-trash-alt fa-lg ml-3"></i></div>
      </div>
    <button type="button" class="mt-5 btn btn-outline-primary" @click="get_data">Actualitza</button>
  </div>
  </div>
</template>

<script>
export default {
    data() {
        return {
            items: {},
            assesors: [],
        }
    },
    methods: {
        get_data() {
            axios.get('/permisos_tots')
            .then(response => {
                this.items=response.data;
                console.log(this.items);
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        get_data_concret() {
            var id=document.getElementById("seleccio").value;

            if (id=="tots") {
                this.get_data();
            } else {
                axios.get('/permisos_tots_concret/'+id)
                .then(response => {
                    this.items=response.data;
                    console.log(this.items);
                })
                .catch(function (error) {
                    console.log(error);
                });
            }


        },
        borra(id,files) {
            axios.post('/permisos_borrar', {
                    id: id,
                    file: files
                })
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
            });
            this.get_data();
        },
        async agafa_datos_assesors() {
      //alert(this.primer_dia);

        await axios
          .get(
            "./assesors_tots"
          )
          .then(response => (this.assesors = response.data))
          .catch(function(error) {
            console.log(error);
        });
        console.log(this.assesors);
        }
    },
    mounted () {
        this.get_data();
        this.agafa_datos_assesors();
    }
}
</script>

<style>
.cursor-pointer{
  cursor: pointer;
  color: red;
}
</style>
