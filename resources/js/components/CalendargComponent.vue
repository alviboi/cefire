<template>
  <div>
    <div class="wrapper">
      <main>
        <div class="toolbar">
          <div class="btn-group" role="group" aria-label="button group">
            <button @click="canvia_mes(-1)" type="button" class="btn btn-secondary btn-lg">
              <i class="fas fa-arrow-circle-left"></i>
            </button>
            <button @click="canvia_mes(1)" type="button" class="btn btn-secondary btn-lg">
              <i class="fas fa-arrow-circle-right"></i>
            </button>
          </div>
          <div>
            <div>
              <input type="checkbox" id="guardia" v-model="check_guardia"><label class='guardia2' for="guardia">Guàrdia</label>
              <input type="checkbox" id="eixida" v-model="check_eixida"><label class='eixida2' for="eixida">Eixida</label>
              <input type="checkbox" id="curs" v-model="check_curs"><label  class='curs2' for="curs">Curs</label>
            </div>
          </div>
          <div class="current-month">
            <h2>{{meses_del_anyo[mes]}} {{any}}</h2>
          </div>
        </div>
        <div class="calendar">
          <div class="calendar__header">
            <div>dilluns</div>
            <div>dimarts</div>
            <div>dimecres</div>
            <div>dijous</div>
            <div>divendres</div>
            <div>dissabte</div>
            <div>diumenge</div>
          </div>
          <div v-for="item2 in this.setmanes" :key="item2.id">
            <div class="calendar__week">
              <div
                style="overflow-y:auto;"
                v-for="item in 7"
                :key="item.id"
                class="calendar__day"
                :id="'s'+item2+'d'+((item+(item2-1)*7)-primer_dia+1)"
              >
                <div
                  v-if="((item>=primer_dia) || item2>1) && ((item+(item2-1)*7)-primer_dia+1)<=dies_mes"
                >{{ (item+(item2-1)*7)-primer_dia+1 }}</div>
                <div v-else></div>
                <div class="guardia2"></div>
                <div class="eixida2"></div>
                <div class="curs2"></div>
              </div>
            </div>
          </div>
        </div>
      </main>
      <!-- <sidebar>
        <div class="logo">logo</div>
        <div class="avatar">
          <div class="avatar__img">
            <img src="https://picsum.photos/70" alt="avatar" />
          </div>
          <div class="avatar__name">John Smith</div>
        </div>
        <nav class="menu">
          <a class="menu__item" href="#" @click="agafa_dia">
            <i class="menu__icon fa fa-home"></i>
            <span class="menu__text">overview</span>
          </a>
          <a class="menu__item" href="#" @click="posa_guardia(2,9,'aaa')">
            <i class="menu__icon fa fa-envelope"></i>
            <span class="menu__text">Posa guardia</span>
          </a>
          <a class="menu__item" href="#" @click="agafa_datos_guardies">
            <i class="menu__icon fa fa-list"></i>
            <span class="menu__text">Agafa guardies</span>
          </a>
          <a class="menu__item menu__item--active" href="#">
            <i class="menu__icon fa fa-calendar"></i>
            <span class="menu__text">calendar</span>
          </a>
          <a class="menu__item" href="#">
            <i class="menu__icon fa fa-bar-chart"></i>
            <span class="menu__text">goals</span>
          </a>
          <a class="menu__item" href="#">
            <i class="menu__icon fa fa-trophy"></i>
            <span class="menu__text">achivements</span>
          </a>
          <a class="menu__item" href="#">
            <i class="menu__icon fa fa-sliders"></i>
            <span class="menu__text">measurements</span>
          </a>
        </nav>
        <div class="copyright">copyright &copy; 2018</div>
      </sidebar> -->
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      avui: new Date(),
      guardies: null,
      arr: [7][7],
      guardia: [],
      eixides: [],
      check_eixida: false,
      check_guardia: false,
      check_curs: false,
      dia: null,
      mes: null,
      any: null,
      primer_dia: null,
      mesos: [1, 3, 5, 7, 9, 11],
      setmanes: null,
      dies_mes: null,
      dies_mes2: null,
      meses_del_anyo: new Array(
        "gener",
        "febrer",
        "març",
        "abril",
        "maig",
        "juny",
        "juliol",
        "agost",
        "setembre",
        "octubre",
        "novembre",
        "desembre"
      )
    };
  },
  methods: {
    agafa_dia() {
      this.mes = this.avui.getMonth();
      this.any = this.avui.getFullYear();
      this.primer_dia = new Date(this.any, this.mes, 1).getDay();
      this.dies_mes = new Date(this.any, this.mes + 1, 1);
      this.dies_mes2 = new Date(this.dies_mes - 1);
      this.dies_mes = this.dies_mes2.getDate(); //traure últim dia del mes
      //alert(this.dies_mes);
      if (this.primer_dia == 0) {
        this.primer_dia = 7;
      }
      // console.log(this.primer_dia+' '+this.mes);
      if (this.primer_dia >= 6 && this.dies_mes == 31) {
        this.setmanes = 6;
      } else {
        this.setmanes = 5;
      }
      console.log(this.setmanes);
    },
    canvia_mes(mes_sum) {
        this.check_eixida=false;
        this.check_curs=false;
        this.check_guardia=false;
      $(".concepte").remove();
      this.avui.setMonth(this.mes + mes_sum);
      this.agafa_dia();
    },
    posa_guardia(a, b, nombre) {
      var str = "<div style='font-size:10px;' class='concepte guardia'>" + nombre + "</div>";
      $("#s" + a + "d" + b +' .guardia2').append(str);
    },
    posa_eixida(a, b, nombre) {
      var str = "<div style='font-size:10px;' class='concepte eixida'>" + nombre + "</div>";
      $("#s" + a + "d" + b +' .eixida2').append(str);
    },
    posa_curs(a, b, nombre) {
      var str = "<div style='font-size:10px;' class='concepte curs'>" + nombre + "</div>";
      $("#s" + a + "d" + b +' .curs2').append(str);
    },
    //////////////////EIXIDES///////////////////////////////////
    async agafa_datos_eixides() {
      //alert(this.primer_dia);
      for (let set = 0; set < this.setmanes + 1; set++) {
        await axios
          .get(
            "/guardias/" +
              (this.avui.getWeek() + set - 1) +
              "/" +
              this.avui.getFullYear()
          )
          .then(response => (this.eixides = response.data))
          .catch(function(error) {
            console.log(error);
          });
        this.eixides.forEach(element => {
          this.arr = Object.values(element);
            console.log(this.arr);
          for (let index = 0; index < 14; index++) {
            if (
              this.arr[index].includes("eixida") ||
              this.arr[index].includes("Sali") ||
              this.arr[index].includes("EIXIDA") ||
              this.arr[index].includes("SALIDA") ||
              this.arr[index].includes("Salida") ||
              this.arr[index].includes("Eix")
            ) {
              this.posa_eixida(
                set+1,
                Math.floor(index / 2 + 1) +
                  (7 * (set) - this.primer_dia + 1),
                this.arr[14]
              );
            }
          }
        });
      }
    },
    //////////////////curs///////////////////////////////////
    async agafa_datos_curs() {
      //alert(this.primer_dia);
      for (let set = 0; set < this.setmanes + 1; set++) {
        await axios
          .get(
            "/guardias/" +
              (this.avui.getWeek() + set - 1) +
              "/" +
              this.avui.getFullYear()
          )
          .then(response => (this.eixides = response.data))
          .catch(function(error) {
            console.log(error);
          });
        this.eixides.forEach(element => {
          this.arr = Object.values(element);
            console.log(this.arr);
          for (let index = 0; index < 14; index++) {
            if (
              this.arr[index].includes("curs") ||
              this.arr[index].includes("CURS") ||
              this.arr[index].includes("curs") ||
              this.arr[index].includes("Ponen") ||
              this.arr[index].includes("ponen") ||
              this.arr[index].includes("PONEN")
            ) {
              this.posa_curs(
                set+1,
                Math.floor(index / 2 + 1) +
                  (7 * (set) - this.primer_dia + 1),
                this.arr[14]
              );
            }
          }
        });
      }
    },
    ///////////////guardies////////////////////////////77
    async agafa_datos_guardies() {
      //alert(this.primer_dia);
      for (let set = 0; set < this.setmanes + 1; set++) {
        await axios
          .get(
            "/guardias/" +
              (this.avui.getWeek() + set - 1) +
              "/" +
              this.avui.getFullYear()
          )
          .then(response => (this.guardies = response.data))
          .catch(function(error) {
            console.log(error);
          });

        //console.log(this.guardies);
        this.guardies.forEach(element => {
          this.arr = Object.values(element);
            console.log(this.arr);
          for (let index = 0; index < 14; index++) {
            if (
              this.arr[index].includes("guardia") ||
              this.arr[index].includes("guàrdia") ||
              this.arr[index].includes("GUARDIA") ||
              this.arr[index].includes("Guardia") ||
              this.arr[index].includes("Guàrdia") ||
              this.arr[index].includes("gua")
            ) {
              //console.log((set)+' '+(Math.floor((index/2)+1)+(this.primer_dia+(set-1)*7))+' '+this.arr[14]);
              this.posa_guardia(
                set+1,
                Math.floor(index / 2 + 1) +
                  (7 * (set) - this.primer_dia + 1),
                this.arr[14]
              );
            }
            //this.posa_guardia(1,1,'aaa');
          }
        });
      }
    }
  },
  watch: {
      check_eixida(newValue, oldValue) {

          if (this.check_eixida){
              this.agafa_datos_eixides();
          } else {
              $(".eixida").remove();
          }
      },
      check_guardia(newValue, oldValue) {

          if (this.check_guardia){
              this.agafa_datos_guardies();
          } else {
              $(".guardia").remove();
          }
      },
      check_curs(newValue, oldValue) {

          if (this.check_curs){
              this.agafa_datos_curs();
          } else {
              $(".curs").remove();
          }
      }
  },
  mounted () {
      this.agafa_dia();
  },
};
</script>

<style lang="scss" scoped>
.eixida {
    border: solid 1px blue;
}
.guardia {
    border: solid 1px red;
}
.curs {
    border: solid 1px green;
}

.wrapper {
  display: grid;
  grid-template-rows: 70px 1fr 70px;
  grid-template-columns: 1fr;
  grid-template-areas:
    "content";
  width: 100vw;
  height: 100vh;
}

@media screen and (min-width: 850px) {
  .wrapper {
    grid-template-columns: 5fr;
    grid-template-rows: 1fr;
    grid-template-areas: "content";
  }
}

main {
  grid-area: content;
  padding: 80px;
}

sidebar {
  grid-area: sidebar;
  display: grid;
  grid-template-columns: 1fr 3fr 1fr;
  grid-template-rows: 3fr 1fr;
  grid-template-areas:
    "logo menu avatar"
    "copyright menu avatar";
}
.logo {
  display: flex;
  align-items: center;
  justify-content: center;
}
.copyright {
  text-align: center;
}
.avatar {
  grid-area: avatar;
  display: flex;
  align-items: center;
  flex-direction: row-reverse;
}
.avatar__name {
  flex: 1;
  text-align: right;
  margin-right: 1em;
}
.avatar__img > img {
  display: block;
}

.copyright {
  grid-area: copyright;
}
.menu {
  grid-area: menu;
  display: flex;
  align-items: center;
  justify-content: space-evenly;
}
.logo {
  grid-area: logo;
}
.menu__text {
  display: none;
}


@media screen and (min-width: 850px) {
  sidebar {
    grid-template-areas:
      "logo"
      "avatar"
      "menu"
      "copyright";
    grid-template-columns: 1fr;
    grid-template-rows: 50px auto 1fr 50px;
  }

  .menu {
    flex-direction: column;
    align-items: normal;
    justify-content: flex-start;
  }
  .menu__text {
    display: inline-block;
  }
  .avatar {
    flex-direction: column;
  }
  .avatar__name {
    margin: 1em 0;
  }
  .avatar__img > img {
    border-radius: 50%;
  }
}

.toolbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 24px;
}

.calendar__week,
.calendar__header {
  display: grid;
  grid-template-columns: repeat(7, 1fr);
}
.calendar__week {
  grid-auto-rows: 170px;
  text-align: right;
}

.calendar__header {
  grid-auto-rows: 50px;
  align-items: center;
  text-align: center;
}

// .calendar__day {
// //padding: 16px;
// border-right: 1px solid #e1e1e1;
// }



/* COSMETIC STYLING */

// :root {
//   --red: #ed5454;
// }

// body {
//   font-family: Montserrat;
//   font-weight: 100;
//   color: #a8b2b9;
// }

// sidebar {
//   background-color: white;
//   box-shadow: 5px 0px 20px rgba(0, 0, 0, 0.2);
// }

// main {
//   background-color: #fcfbfc;
// }

// .avatar__name {
//   font-size: 0.8rem;
// }

// .menu__item {
//   text-transform: uppercase;
//   font-size: 0.7rem;
//   font-weight: 500;
//   padding: 16px 16px 16px 14px;
//   border-left: 4px solid transparent;
//   color: inherit;
//   text-decoration: none;
//   transition: color ease 0.3s;
// }

// .menu__item--active .menu__icon {
//   color: var(--red);
// }
// .menu__item--active .menu__text {
//   color: black;
// }

// .menu__item:hover {
//   color: black;
// }

// .menu__icon {
//   font-size: 1.3rem;
// }

// @media screen and (min-width: 850px) {
//   .menu__icon {
//     font-size: 0.9rem;
//     padding-right: 16px;
//   }
//   .menu__item--active {
//     border-left: 4px solid var(--red);
//     box-shadow: inset 10px 0px 17px -13px var(--red);
//   }
// }

.copyright {
  font-size: 0.7rem;
  font-weight: 400;
}

.calendar {
  background-color: white;
  border: 1px solid #e1e1e1;
}

.calendar__header > div {
  text-transform: uppercase;
  font-size: 0.8em;
  font-weight: bold;
}

.calendar__day {
  border-right: 1px solid #e1e1e1;
  border-top: 1px solid #e1e1e1;
  height: 150px;
  .guardia2 {
    padding: 1px;
    align-content: left;
    color: red;
  }
  .eixida2 {
    padding: 1px;
    align-content: left;
    color: blue;
  }
  .curs2 {
    padding: 1px;
    align-content: left;
    color: green;
  }
}

// .calendar__day:last-child {
// border-right: 0;
// }
.guardia2 {
    padding: 1px;
    align-content: left;
    color: red;
  }
  .eixida2 {
    padding: 1px;
    align-content: left;
    color: blue;
  }
  .curs2 {
    padding: 1px;
    align-content: left;
    color: green;
  }




// .toggle {
//   display: grid;
//   grid-template-columns: 1fr 1fr;

//   text-align: center;
//   font-size: 0.9em;
// }
// .toggle__option {
//   padding: 16px;
//   border: 1px solid #e1e1e1;
//   border-radius: 8px;
//   text-transform: capitalize;
//   cursor: pointer;
// }
// .toggle__option:first-child {
//   border-top-right-radius: 0;
//   border-bottom-right-radius: 0;
// }
// .toggle__option:last-child {
//   border-left: 0;
//   border-top-left-radius: 0;
//   border-bottom-left-radius: 0;
// }
// .toggle__option--selected {
//   border-color: white;
//   background-color: white;
//   color: var(--red);
//   font-weight: 500;
//   box-shadow: 1px 2px 30px -5px var(--red);
// }
</style>
