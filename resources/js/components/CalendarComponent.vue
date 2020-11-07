<template>
  <div class="row">
    <notifications
      @click.native="llegit"
      classes="my-style"
      position="bottom center"
      width="80%"
      group="foo"
    />

    <div class="col-lg-3 col-md-3">
      <datepicker
        :bootstrap-styling="true"
        :language="es"
        :monday-first="true"
        :inline="true"
        v-model="fecha"
      ></datepicker>
      <!-- {{fechas}} -->
      <estadisticas-component
        :setmana="sem"
        :any="any"
      ></estadisticas-component>
    </div>
    <div class="col-lg-9 col-md-9">
      <div class="row">
        <div class="col-lg-6 col-md-6 pb-2">
          <label for="TxtManyanaL"
            ><h4>Dilluns Matí {{ dies[0] }}</h4></label
          >
          <diacamp-component
            id="TxtManyanaL"
            :prova2.sync="fechas['TxtManyanaL']"
            :setmana="sem"
            :any="any"
            dia="TxtManyanaL"
          ></diacamp-component>
        </div>
        <div class="col-lg-6 col-md-6 pb-2">
          <label for="TxtTardeL"
            ><h4>Dilluns Vesprada {{ dies[0] }}</h4></label
          >
          <diacamp-component
            :prova2.sync="fechas['TxtTardeL']"
            :setmana="sem"
            :any="any"
            dia="TxtTardeL"
          ></diacamp-component>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 pb-2">
          <label for="TxtManyanaM"
            ><h4>Dimarts Matí {{ dies[1] }}</h4></label
          >
          <diacamp-component
            id="TxtManyanaM"
            :prova2.sync="fechas['TxtManyanaM']"
            :setmana="sem"
            :any="any"
            dia="TxtManyanaM"
          ></diacamp-component>
        </div>
        <div class="col-lg-6 col-md-6 pb-2">
          <label for="TxtTardeM"
            ><h4>Dimarts Vesprada {{ dies[1] }}</h4></label
          >
          <diacamp-component
            :prova2.sync="fechas['TxtTardeM']"
            :setmana="sem"
            :any="any"
            dia="TxtTardeM"
          ></diacamp-component>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 pb-2">
          <label for="TxtManyanaX"
            ><h4>Dimecres Matí {{ dies[2] }}</h4></label
          >
          <diacamp-component
            id="TxtManyanaX"
            :prova2.sync="fechas['TxtManyanaX']"
            :setmana="sem"
            :any="any"
            dia="TxtManyanaX"
          ></diacamp-component>
        </div>
        <div class="col-lg-6 col-md-6 pb-2">
          <label for="TxtTardeX"
            ><h4>Dimecres Vesprada {{ dies[2] }}</h4></label
          >
          <diacamp-component
            :prova2.sync="fechas['TxtTardeX']"
            :setmana="sem"
            :any="any"
            dia="TxtTardeX"
          ></diacamp-component>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 pb-2">
          <label for="TxtManyanaJ"
            ><h4>Dijous Matí {{ dies[3] }}</h4></label
          >
          <diacamp-component
            id="TxtManyanaJ"
            :prova2.sync="fechas['TxtManyanaJ']"
            :setmana="sem"
            :any="any"
            dia="TxtManyanaJ"
          ></diacamp-component>
        </div>
        <div class="col-lg-6 col-md-6 pb-2">
          <label for="TxtTardeJ"
            ><h4>Dijous Vesprada {{ dies[3] }}</h4></label
          >
          <diacamp-component
            :prova2.sync="fechas['TxtTardeJ']"
            :setmana="sem"
            :any="any"
            dia="TxtTardeJ"
          ></diacamp-component>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 pb-2">
          <label for="TxtManyanaV"
            ><h4>Divendres Matí {{ dies[4] }}</h4></label
          >
          <diacamp-component
            id="TxtManyanaV"
            :prova2.sync="fechas['TxtManyanaV']"
            :setmana="sem"
            :any="any"
            dia="TxtManyanaV"
          ></diacamp-component>
        </div>
        <div class="col-lg-6 col-md-6 pb-2">
          <label for="TxtTardeV"
            ><h4>Divendres Vesprada {{ dies[4] }}</h4></label
          >
          <diacamp-component
            :prova2.sync="fechas['TxtTardeV']"
            :setmana="sem"
            :any="any"
            dia="TxtTardeV"
          ></diacamp-component>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 pb-2">
          <label for="TxtManyanaS"
            ><h4>Dissabte Matí {{ dies[5] }}</h4></label
          >
          <diacamp-component
            id="TxtManyanaS"
            :prova2.sync="fechas['TxtManyanaS']"
            :setmana="sem"
            :any="any"
            dia="TxtManyanaS"
          ></diacamp-component>
        </div>
        <div class="col-lg-6 col-md-6 pb-2">
          <label for="TxtTardeS"
            ><h4>Dissabte Vesprada {{ dies[5] }}</h4></label
          >
          <diacamp-component
            :prova2.sync="fechas['TxtTardeS']"
            :setmana="sem"
            :any="any"
            dia="TxtTardeS"
          ></diacamp-component>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 pb-2">
          <label for="TxtManyanaS"
            ><h4>Diumenge Matí {{ dies[6] }}</h4></label
          >
          <diacamp-component
            id="TxtManyanaS"
            :prova2.sync="fechas['TxtManyanaD']"
            :setmana="sem"
            :any="any"
            dia="TxtManyanaD"
          ></diacamp-component>
        </div>
        <div class="col-lg-6 col-md-6 pb-2">
          <label for="TxtTardeD"
            ><h4>Diumenge Vesprada {{ dies[6] }}</h4></label
          >
          <diacamp-component
            :prova2.sync="fechas['TxtTardeD']"
            :setmana="sem"
            :any="any"
            dia="TxtTardeD"
          ></diacamp-component>
        </div>
        <div class="col-lg-10 mt-5 text-right">
          <button
            type="button"
            class="btn btn-primary btn-lg"
            @click="generatePdf"
          >
            PDF
          </button>

          <button
            type="button"
            class="btn btn-primary btn-lg"
            @click="escribir_datos"
          >
            Actualitza
          </button>

          <!-- <button type="button" class="btn btn-primary btn-lg" @click="este">Notifica</button> -->
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
import Datepicker from "vuejs-datepicker";
import { es, en, ca } from "vuejs-datepicker/dist/locale";
import VueAxios from "vue-axios";
import jsPDF from "jspdf";
import "jspdf-autotable";

export default {
  data() {
    return {
      fecha: new Date(),
      fecha2: "",
      info: "",
      en: en,
      es: es,
      any: "",
      sem: "",
      TxtManyanaL: "",
      TxtTardeL: "",
      TxtManyanaM: "",
      TxtTardeM: "",
      TxtManyanaX: "",
      TxtTardeX: "",
      TxtManyanaJ: "",
      TxtTardeJ: "",
      TxtManyanaV: "",
      TxtTardeV: "",
      TxtManyanaS: "",
      TxtTardeS: "",
      TxtManyanaD: "",
      TxtTardeD: "",
      rebut: {},
      dies: [],
      a: new Date(),
      fech_set_cal: new Date(),
      fechas: {
        TxtManyanaL: "",
        TxtTardeL: "",
        TxtManyanaM: "",
        TxtTardeM: "",
        TxtManyanaX: "",
        TxtTardeX: "",
        TxtManyanaJ: "",
        TxtTardeJ: "",
        TxtManyanaV: "",
        TxtTardeV: "",
        TxtManyanaS: "",
        TxtTardeS: "",
        TxtManyanaD: "",
        TxtTardeD: "",
        NidAnyo: 0,
        NidSemana: 0,
        TxtObservaciones: "",
      },
    };
  },
  methods: {
    async llegit() {
      self = this;
      await axios
        .post("/notificacions")
        .then((res) => {
          console.log(res);
          self.notifica(res.data);
        })
        .catch((err) => {
          console.error(err);
          self.notifica(element[err.data]);
        });
    },
    aviso(missatge) {
      this.$notify({
        group: "foo",
        type: "warn",
        title: "Avisos de la directora",
        text: missatge,
        duration: 10000,
      });
    },
    async llig_avisos() {
      await axios
        .get("/notificacions")
        .then((res) => {
          console.log(res.data);
          this.rebut = res.data;
        })
        .catch((err) => {
          console.error(err);
        });



      for (const [key, value] of Object.entries(this.rebut)) {
            this.aviso(value['missatge']);
      }

      // this.aviso(this.rebut[16]['missatge']);
      // this.rebut.forEach(element => {
      //     this.aviso(element['missatge']);
      // });
    },
    getfecha_setmana(w, y) {
      var simple = new Date(y, 0, 1 + (w - 1) * 7);
      var dow = simple.getDay();
      var ISOweekStart = simple;
      if (dow <= 4)
        ISOweekStart.setDate(simple.getDate() - simple.getDay() + 1);
      else ISOweekStart.setDate(simple.getDate() + 8 - simple.getDay());
      return ISOweekStart;
    },

    generatePdf() {
      var doc = new jsPDF("p", "pt", "A4");
      //var doc = new jsPDF()
      doc.addImage("/img/cefire-valencia-color.png", "PNG", 400, 30, 130, 50);
      var nom = $("#navbarDropdown").text().trim();
      doc.setFontSize(20);
      doc.text(200, 140, "HORARI DEL CEFIRE");
      doc.setFontSize(15);
      doc.text(35, 170, "ANY: " + this.any);
      this.fech_set = this.getfecha_setmana(this.sem, this.any);
      var fech_set2 = new Date();
      fech_set2.setDate(this.fech_set.getDate() + 7);
      doc.text(
        35,
        190,
        "SETMANA DE L'ANY: " +
          this.fech_set.getDate() +
          " de/d' " +
          this.fech_set.toLocaleString("ca-es", { month: "long" }) +
          " al " +
          fech_set2.getDate() +
          " de/d' " +
          fech_set2.toLocaleString("ca-es", { month: "long" })
      );
      doc.text(35, 210, "ASSESOR: " + nom);
      doc.setFontSize(20);

      var number;
      doc.autoTable({
        startY: 250,
        head: [["Dia", "Matí", "Vesprada"]],
        cellWidth: (number = 50),
        columnStyles: {
          0: {
            cellWidth: (number = 100),
            valign: "middle",
            fontStyle: "bold",
            lineWidth: (number = 1),
          },
          1: {
            cellWidth: (number = 200),
            minCellHeight: (number = 30),
            fontStyle: "bold",
            lineWidth: (number = 1),
          },
          2: {
            cellWidth: (number = 200),
            minCellHeight: (number = 30),
            fontStyle: "bold",
            lineWidth: (number = 1),
          },
        },
        body: [
          ["Dilluns", this.fechas["TxtManyanaL"], this.fechas["TxtTardeL"]],
          ["Dimarts", this.fechas["TxtManyanaM"], this.fechas["TxtTardeM"]],
          ["Dimecres", this.fechas["TxtManyanaX"], this.fechas["TxtTardeX"]],
          ["Dijous", this.fechas["TxtManyanaJ"], this.fechas["TxtTardeJ"]],
          ["Divendres", this.fechas["TxtManyanaV"], this.fechas["TxtTardeV"]],
          ["Dissabte", this.fechas["TxtManyanaS"], this.fechas["TxtTardeS"]],
          ["Diumenge", this.fechas["TxtManyanaD"], this.fechas["TxtTardeD"]],
          // ...
        ],
      });
      doc.setFontSize(15);
      var f = new Date();
      var locale = "ca-es";
      doc.text(
        300,
        530,
        "En València a " +
          f.getDate() +
          " de " +
          f.toLocaleString(locale, { month: "long" }) +
          " de " +
          f.getFullYear()
      );

      //doc.text(35, 25, 'Paranyan loves jsPDF')
      //doc.addImage(imgData, 'JPEG', 15, 40, 180, 160);

      doc.save("horari_de_" + nom + ".pdf");
    },
    //
    notifica(missatge) {
      this.$toast.success(missatge, {
        position: "top-right",
        timeout: 4000,
        closeOnClick: true,
        pauseOnFocusLoss: true,
        pauseOnHover: true,
        draggable: true,
        draggablePercent: 0.6,
        showCloseButtonOnHover: false,
        closeButton: "button",
        icon: true,
        rtl: false,
        hideProgressBar: false,
      });
    },
    leer_datos(any, sem) {
      this.fechas["NidSemana"] = this.sem;
      this.fechas["NidAnyo"] = this.any;

      axios
        .get("/horario/" + sem + "/" + any)
        .then((response) => (this.fechas = response.data[0]))
        .catch(function (error) {
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
    dates_cal() {
      for (let index = 0; index < 7; index++) {
        let a = new Date();

        a.setDate(this.fech_set_cal.getDate() + index);

        this.dies[index] = a.getDate();
      }
    },
    escribir_datos() {
      self = this;
      this.fechas["NidSemana"] = this.sem;
      this.fechas["NidAnyo"] = this.any;
      axios
        .post("/horario/", this.fechas)
        .then((response) => self.notifica(response.data))
        .catch(function (error) {
          console.log(error);
        });
    },
  },
  mounted() {
    console.log("Component mounted2.");
    this.any = this.fecha.getFullYear();
    this.sem = this.fecha.getWeek();
    this.fechas["NidSemana"] = this.sem;
    this.fechas["NidAnyo"] = this.any;
    this.leer_datos(this.any, this.sem);
    this.llig_avisos();

    this.fech_set_cal = this.getfecha_setmana(
      this.fecha.getWeek(),
      this.fecha.getFullYear()
    );
    this.dates_cal();
  },
  components: {
    Datepicker,
  },
  watch: {
    fecha(newValue, oldValue) {
      this.any = this.fecha.getFullYear();
      this.sem = this.fecha.getWeek();
      this.fechas["NidSemana"] = this.sem;
      this.fechas["NidAnyo"] = this.any;
      this.leer_datos(this.any, this.sem);
      this.fech_set_cal = this.getfecha_setmana(
        this.fecha.getWeek(),
        this.fecha.getFullYear()
      );
      this.dates_cal();
    },

    // fechas: {
    //     handler: function() {
    //         this.escribir_datos();
    //     },
    //     deep: true
    // }
  },
};
</script>
<style lang="scss">
.my-style {
  padding: 10px;
  margin: 0 5px 5px;

  font-size: 18px;

  color: #ffffff;
  background: #44a4fc;
  border-left: 5px solid #187fe7;

  &.warn {
    background: #ffb648;
    border-left-color: #f48a06;
  }

  &.error {
    background: #e54d42;
    border-left-color: #b82e24;
  }

  &.success {
    background: #68cd86;
    border-left-color: #42a85f;
  }
}
</style>
