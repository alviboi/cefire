<template>
  <div class="container">

    <ul class="list-group">
      <li v-for="(item,index) in assesors" :key="item.id" class="list-group-item">
          <div class="row">
            <div class="h4 col-lg-8">
              {{ item.name }}
            </div>
            <div class="d-block col-lg-3">
                <select class="w-100" name="rol" id="rol" v-model="item.Perfil" @change="actualitza_perfil(item.id,item.Perfil)">
                    <option disabled value="" selected></option>
                    <option value="1">Director/a</option>
                    <option value="2">Guardies</option>
                    <option value="0">Assessor/a</option>
                </select>
            </div>
            <div class="col-lg-1">
                <i @click="borrar(index,item.id)" class="fas fa-trash-alt fa-lg"></i>
            </div>
          </div>

      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      assesors: []
    };
  },
  methods: {
    agafa_users() {
      axios
        .get("./assesors_tots")
        .then(res => {
          console.log(res);
          this.assesors = res.data;
        })
        .catch(err => {
          console.error(err);
        });
    },
    actualitza_perfil(id,perfil) {
        axios.post("./actualitza_perfil", {
            id: id,
            perfil: perfil,
        }
        )
        .then(res => {
          console.log(res)
        })
        .catch(err => {
          console.error(err);
        });
        // this.agafa_users();
    },
    borrar(index,id){
        //alert(index);
        var conf = confirm("Segur que vols esborrar?");
        if (conf) {
                    axios.post("./borra_perfil", {
            id: id,
            }
            )
            .then(res => {
            console.log(res);
            this.assesors.splice(index, 1);
            })
            .catch(err => {
            console.error(err);
            });
        } else {
            alert ("Tranquilitat, no he esborrat a ningú!");
        }

    }
  },
  mounted() {
    this.agafa_users();
  }
};
</script>

<style lang="scss" scoped>
</style>
