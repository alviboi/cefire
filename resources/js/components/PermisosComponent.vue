<template>
<div class="container">
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
            items: {}
        }
    },
    methods: {
        get_data() {
            axios.get('/permisos')
            .then(response => {
                this.items=response.data;
                console.log(this.items);
            })
            .catch(function (error) {
                console.log(error);
            });
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
        }
    },
    mounted () {
        this.get_data();
    }
}
</script>

<style>
.cursor-pointer{
  cursor: pointer;
  color: red;
}
</style>
