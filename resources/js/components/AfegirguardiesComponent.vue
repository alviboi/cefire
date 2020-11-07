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
              <template v-if="((item>=primer_dia) || item2>1) && ((item+(item2-1)*7)-primer_dia+1)<=dies_mes">
                <div>{{ (item+(item2-1)*7)-primer_dia+1 }}</div>
                <div class="form-group">
                    <label for="exampleSelect">MATÍ</label>
                    <select @change="onChange($event,'Manyana',((item+(item2-1)*7)-primer_dia+1))" class="custom-select" :id="'Mss'+item2+'d'+((item+(item2-1)*7)-primer_dia+1)">
                        <option>No hi ha cap escollit</option>
                        <option v-for="item5 in assesors" :key="item5.id" :value="item5.Nid_Asesor">{{item5.name}}</option>
                    </select>
                    <label for="exampleSelect">VESPRADA</label>
                    <select @change="onChange($event,'Tarde',((item+(item2-1)*7)-primer_dia+1))" class="custom-select" :id="'Vss'+item2+'d'+((item+(item2-1)*7)-primer_dia+1)">
                        <option>No hi ha cap escollit</option>
                        <option v-for="item5 in assesors" :key="item5.id" :value="item5.Nid_Asesor">{{item5.name}}</option>
                    </select>
                </div>
              </template>
                <template v-else>
                    <div></div>
                </template>
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
          <a class="menu__item" href="#" @click="posa_guardia(1,1,78)">
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
      <!-- <div>

      <button class="btn btn-primary" @click="posa_guardia(6, 31, 47, 'M');">Este</button>

      </div> -->
    </div>

  </div>
</template>

<script>
(function() {
    var days = ['D','L','M','X','J','V','S'];

    var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];

    Date.prototype.getMonthName = function() {
        return months[ this.getMonth() ];
    };
    Date.prototype.getDayName = function() {
        return days[ this.getDay() ];
    };
})();

//var now = new Date();

//var day = now.getDayName();
//var month = now.getMonthName();
export default {
  data() {
    return {

        select1: "",
        select2: "",
      assesors: [],
      avui: new Date(),
      guardies: null,
      arr: [7][7],
      guardia: [],
      eixides: [],
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
      this.primer_dia2 = new Date(this.any, this.mes, 1);
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
      this.avui.setMonth(this.mes + mes_sum);
      this.agafa_dia();
      var self = this;
      $('select option[selected="selected"]').each(
            function() {
                $(this).removeAttr('selected');
            }
        );
    this.agafa_datos_guardies();

    },

    onChange(event, mv, dia) {
        console.log(event);
        let dia_escollit = new Date(this.any, this.mes, dia);
        var camp = "Txt"+mv+dia_escollit.getDayName();
        var setmana = dia_escollit.getWeek();
        var Nid_Asesor = event.target.value;
        var params = {
            camp: camp,
            Assessor: Nid_Asesor,
            setmana: setmana,
            anyo: this.any
        };
        axios.post("./afg_guardia",params)
        .then(res => {
            console.log(res)
        })
        .catch(err => {
            console.error(err);
        })

            console.log(event.target.value + " " + event.target.id + " " + mv + " " + dia_escollit.getWeek() + " " + dia_escollit.getDayName())
        },
    posa_guardia(a, b, id, MatVes) {
      //alert(id);
      //FAlta posar M o V davant, caldrá vore el contain
      if (MatVes=="M"){
      $("#Mss" + a + "d" + b).find('option[value="'+id+'"]').attr("selected",true);
      } else {
            $("#Vss" + a + "d" + b).find('option[value="'+id+'"]').attr("selected",true);
      }
      //$("#ss" + a + "d" + b).value(id);
      //$('option:selected', '"#ss" + a + "d" + b').removeAttr('selected');
    //Using the value
    // $('"#ss" + a + "d" + b').find('option[value="'+id+'"]').attr("selected",true);
    // //Using the text
    // },
    // posa_eixida(a, b, nombre) {
    //   var str = "<div style='font-size:10px;' class='concepte eixida'>" + nombre + "</div>";
    //   $("#s" + a + "d" + b +' .eixida2').append(str);
    // },
    // posa_curs(a, b, nombre) {
    //   var str = "<div style='font-size:10px;' class='concepte curs'>" + nombre + "</div>";
    //   $("#s" + a + "d" + b +' .curs2').append(str);
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
    },




    async agafa_datos_guardies() {
      //alert(this.primer_dia2);
      for (let set = 0; set < this.setmanes; set++) {
        await axios
          .get(
            "/guardias/" +
              (this.primer_dia2.getWeek() + set) +
              "/" +
              this.avui.getFullYear()
          )
          .then(response => (this.guardies = response.data))
          .catch(function(error) {
            console.log(error);
          });

        console.log(this.guardies);
                    //console.log(this.guardies);
        for (var index = 0; index < this.guardies.length; index++) {
            var a=0;
            for (const [key, value] of Object.entries(this.guardies[index])) {
                switch (key.substr(-1)) {
                    case 'L':
                        a=1;
                        break;
                    case 'M':
                        a=2;
                        break;
                    case 'X':
                        a=3;
                        break;
                    case 'J':
                        a=4;
                        break;
                    case 'V':
                        a=5;
                        break;
                    case 'S':
                        a=6;
                        break;
                    case 'D':
                        a=7;
                        break;
                    default:
                        break;
                }
                if (typeof value === 'string' && value.includes("GUARDIA")){
                    if (typeof key === 'string' && key.includes('Manyana')){
                        this.posa_guardia(
                        set+1,
                        a +
                        (7 * (set) - this.primer_dia + 1),
                        this.guardies[index]['Nid_Asesor'],
                        'M'
                        );
                        console.log(this.guardies[index]);
                        console.log("#################################################################"+a+" setmana "+set+"    "+this.primer_dia);
                        console.log((set+1)+" "+ (Math.floor(a / 2 + 1) + (7 * (set) - this.primer_dia))  + " MATI "+this.guardies[index]['Nid_Asesor']);

                    } else if (typeof key === 'string' && key.includes('Tarde')){
                        this.posa_guardia(
                        set+1,
                        a +
                        (7 * (set) - this.primer_dia + 1),
                        this.guardies[index]['Nid_Asesor'],
                        'V'
                        );
                        console.log("#################################################################");
                        console.log((set+1)+" "+(Math.floor(a / 2 + 1) + (7 * (set) - this.primer_dia)) + " VESPRADA "+this.guardies[index]['Nid_Asesor']);


                    }
                }
                // console.log("#################################################################");
                // console.log((set+1)+" "+(Math.floor(index / 2 + 1) + (7 * (set) - this.primer_dia + 1)) + "aSSESSOR "+this.guardies[index]['Nid_Asesor']);

                //console.log(key, value);
            }

        }




        // this.guardies.forEach(element => {
        //   this.arr = Object.values(element);

        //   for (let index = 0; index < 14; index++) {

        //     // if (
        //     //   this.arr[index].includes("guardia") ||
        //     //   this.arr[index].includes("guàrdia") ||
        //     //   this.arr[index].includes("GUARDIA") ||
        //     //   this.arr[index].includes("Guardia") ||
        //     //   this.arr[index].includes("Guàrdia") ||
        //     //   this.arr[index].includes("gua")
        //     // ) {
        //     //   //console.log((set)+' '+(Math.floor((index/2)+1)+(this.primer_dia+(set-1)*7))+' '+this.arr[14]);
        //     //   this.posa_guardia(
        //     //     set+1,
        //     //     Math.floor(index / 2 + 1) +
        //     //       (7 * (set) - this.primer_dia + 1),
        //     //     this.arr[15]
        //     //   );
        //     // }
        //   }
        // });
      }
    }
  },
  watch: {
      avui(newValue, oldValue) {
          alert(newValue);
      }
  },
  mounted () {
    this.agafa_dia();

      this.agafa_datos_assesors();
      this.agafa_datos_guardies();
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
  height: 180px;
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
