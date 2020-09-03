<template>
<div class="container">





  <h2>Distribució de centres:</h2>
  <p>Busca en tota la taula:</p>
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
<div style="height:800px; overflow-y:scroll;">
<table id="tablacentres" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>nom</th>
        <th>codi</th>
        <th>sit.</th>
        <th>CP</th>
        <th>ciutat</th>
        <th>Assessoria</th>
        <th>contacte</th>
        <th>mail</th>
        <th>tlf</th>
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edita centres</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="alert alert-danger" role="alert">
Aquesta part encara no està feta. Per tant no és funcional.</div>
        <form v-if="tots_centres[editant]">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Centre:</label>
            <input type="text" class="form-control" id="recipient-name" :value="tots_centres[editant]['nom']">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Codi:</label>
            <input type="text" class="form-control" id="recipient-name" :value="tots_centres[editant]['codi']">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Situació:</label>
            <input type="text" class="form-control" id="recipient-name" :value="tots_centres[editant]['situacio']">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">CP:</label>
            <input type="text" class="form-control" id="recipient-name" :value="tots_centres[editant]['CP']">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Ciutat:</label>
            <input type="text" class="form-control" id="recipient-name" :value="tots_centres[editant]['ciutat']">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Assessoria:</label>
            <input type="text" class="form-control" id="recipient-name" :value="tots_centres[editant]['assesor']">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Contacte:</label>
            <input type="text" class="form-control" id="recipient-name" :value="tots_centres[editant]['contacte']">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Mail contacte:</label>
            <input type="text" class="form-control" id="recipient-name" :value="tots_centres[editant]['mail_contacte']">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tlf contacte:</label>
            <input type="text" class="form-control" id="recipient-name" :value="tots_centres[editant]['tlf_contacte']">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Guarda(no funcional)</button>      </div>
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
        edita(id) {
            $("#exampleModal").modal("show");
            this.editant=id;
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
