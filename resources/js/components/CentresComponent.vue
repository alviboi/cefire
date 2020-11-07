<template>
<div class="container">





  <h2>Distribució de centres:</h2>
  <p>Busca en tota la taula:</p>
  <input class="form-control col-lg-12 col-md-12" id="myInput" type="text" placeholder="Busca en qualsevol camp..">
  <br>
<div style="height:800px; overflow-y:scroll;">
<table id="tablacentres" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Codi</th>
        <th>Sit.</th>
        <th>CP</th>
        <th>Ciutat</th>
        <th>Assessoria</th>
        <th>Contacte</th>
        <th>Mail</th>
        <th>Tlf</th>
      </tr>
    </thead>

    <tbody id="myTable">

<tr v-for="(item2,index) in tots_centres" :key="item2.id">
    <!-- <td>{{item2['id']}}</td> -->
    <td>{{item2['nom']}}</td>
    <td>{{item2['codi']}}</td>
    <td>{{item2['situacio']}}</td>
    <td>{{item2['CP']}}</td>
    <td>{{item2['ciutat']}}</td>
    <td>{{item2['assesor']}}</td>
    <td>{{item2['contacte']}}</td>
    <td>{{item2['mail_contacte']}}</td>
    <td>{{item2['tlf_contacte']}}</td>
    <td><button @click="edita(index)" class="btn btn-info btn-sm rounded"><i class="far fa-edit"></i></button></td>
</tr>
    </tbody>
  </table>
</div>
        <!-- <div v-for="item2 in tots_centres" :key="item2.id">{{item2['id']}}</div> -->

      <!-- <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@mail.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@greatstuff.com</td>
      </tr>
      <tr>
        <td>Anja</td>
        <td>Ravendale</td>
        <td>a_r@test.com</td>
      </tr> -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edita centres</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="container" v-if="tots_centres[editant]">
          <div class="form-group row">
            <label for="recipient-name" class="col-form-label col-lg-2 col-md-2">Centre:</label>
            <input type="text" class="form-control col-lg-10" id="recipient-name" v-model="tots_centres[editant]['nom']">
          </div>
          <div class="form-group row">
            <label for="recipient-name" class="col-form-label col-lg-2 col-md-2">Codi:</label>
            <input type="number" class="form-control col-lg-10 col-md-10" id="recipient-name" v-model="tots_centres[editant]['codi']">
          </div>
          <div class="form-group row">
            <label for="recipient-name" class="col-form-label col-lg-2 col-md-2">Situació:</label>
            <select type="text" class="form-control col-lg-10 col-md-10" id="recipient-name" v-model="tots_centres[editant]['situacio']">
                <option>PUB.</option>
                <option>CON.</option>
            </select>
          </div>
          <div class="form-group row">
            <label for="recipient-name" class="col-form-label col-lg-2 col-md-2">CP:</label>
            <input type="number" class="form-control col-lg-10 col-md-10" id="recipient-name" v-model="tots_centres[editant]['CP']">
          </div>
          <div class="form-group row">
            <label for="recipient-name" class="col-form-label col-lg-2 col-md-2">Ciutat:</label>
            <input type="text" class="form-control col-lg-10 col-md-10" id="recipient-name" v-model="tots_centres[editant]['ciutat']">
          </div>
          <div class="form-group row">
            <label for="recipient-name" class="col-form-label col-lg-2 col-md-2">Assessoria:</label>
            <input type="text" class="form-control col-lg-10 col-md-10" id="recipient-name" v-model="tots_centres[editant]['assesor']">
          </div>
          <div class="form-group row">
            <label for="recipient-name" class="col-form-label col-lg-2 col-md-2">Contacte:</label>
            <input type="text" class="form-control col-lg-10 col-md-10" id="recipient-name" v-model="tots_centres[editant]['contacte']">
          </div>
          <div class="form-group row">
            <label for="recipient-name" class="col-form-label col-lg-2 col-md-2">Mail contacte:</label>
            <input type="text" class="form-control col-lg-10 col-md-10" id="recipient-name" v-model="tots_centres[editant]['mail_contacte']">
          </div>
          <div class="form-group row">
            <label for="recipient-name" class="col-form-label col-lg-2 col-md-2">Tlf contacte:</label>
            <input type="number" class="form-control col-lg-10 col-md-10" id="recipient-name" v-model="tots_centres[editant]['tlf_contacte']">
          </div>
          <div class="form-group row">
            <label for="recipient-name" class="col-form-label col-lg-2 col-md-2">Observacions:</label>
            <textarea type="text" class="form-control col-lg-10 col-md-10" rows="2" id="recipient-name" v-model="tots_centres[editant]['Observacions']">
            </textarea>
          </div>
        </form>
                 <div id="centre-referencia" class="mt-3 h4 text-center">
          </div>
      </div>
      <div class="modal-footer">
        <button @click="guarda_centre" type="button" class="btn btn-secondary">Guarda</button>

        <button @click="guarda_centre" type="button" class="btn btn-secondary" data-dismiss="modal">Guarda i tanca</button>
      </div>
    </div>
  </div>
</div>



</div>










</template>

<script>

export default {

    data() {
        return {
            tots_centres: {},
            editant: 1
        }
    },

    methods: {
        guarda_centre(){
          //alert(this.tots_centres[this.editant]['tlf_contacte']);
          let url="/centres/"+this.tots_centres[this.editant]['id'];
          let params = JSON.stringify(this.tots_centres[this.editant]);
          console.log(params);
          axios.put(url,params, {
                headers: {
                    'Content-Type': 'application/json'
                }
            })
          .then(res => {
            this.$alert(res.data);
          })
          .catch(err => {
            console.error(err);
          });
        //   $("#exampleModal").modal("close");

        },
        edita(id) {
            $("#exampleModal").modal("show");
            this.editant=id;
            let url="http://www.ceice.gva.es/abc/i_guiadecentros/es/centro.asp?codi="+this.tots_centres[this.editant]['codi'];
            $("#centre-referencia").html("<a href='"+url+"' target='_blank' title='Vés a la guia de centres'>Informació centre</a>");


        },
        agafa_centres() {
            var url="/centres";
            axios.get(url)
            .then(res => {
                this.tots_centres=res.data;
                console.log(this.tots_centres)
            })
            .catch(err => {
                console.error(err);
            })
        },
        habilita_tabla() {

              $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });

        }


    },
    beforeMount() {
        this.agafa_centres();
    },
    mounted() {
        this.habilita_tabla();
    }
}
</script>

<style>

</style>
