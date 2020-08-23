<template>
<div class="row">
      <div class="roig col-lg-9 col-md-9 mt-5 ml-3 shadow p-3 mb-5 bg-white rounded">
          <div class="ml-3 m-2"><i class="fas fa-dog"></i> GUARDIA: <b>{{ estadistica_conta.guardia }}</b></div>
          <div class="ml-3 m-2"><i class="fas fa-chalkboard-teacher"></i> CURS: <b>{{ estadistica_conta.curs }}</b></div>
          <div class="ml-3 m-2"><i class="fas fa-umbrella-beach"></i> COMPENSA: <b>{{ estadistica_conta.compensa }}</b></div>
          <div class="ml-3 m-2"><i class="fas fa-check"></i> CEFIRE: <b>{{ estadistica_conta.cefire }}</b></div>
          <div class="ml-3 m-2"><i class="fas fa-school"></i> VISITA: <b>{{ estadistica_conta.visita }}</b></div>
          <div class="ml-3 m-2"><i class="fas fa-procedures"></i> PERMÍS: <b>{{ estadistica_conta.permis }}</b></div>
          <!-- <button class="btn btn-sm btn-primary px-3 m-2 float-right" @click="estadistica()">Actualitza</button> -->
      </div>
</div>
</template>

<script>
export default {
    data () {
        return {
            estadistica_conta: {}
            }
    },
    props: ['setmana','any'],
    methods:{
        async estadistica() {
            let self = this;
            var url = './estadistica/'+self.any+'/'+self.setmana;
            await axios.get(url)
            .then(res => {
                this.estadistica_conta = res.data;
                console.log(this.estadistica_conta);
            })
            .catch(err => {
                console.error(err);
            })
        },
        actualitza() {
            setInterval(() => {
                this.estadistica();
            }, 2000);
        }
    },
    mounted() {
        this.actualitza();
    }
}
</script>

<style>
.roig {
    background: rgb(223, 216, 216);
    border: 1px solid black;
    border-radius: 10px;

}
</style>
