<template>
  <div>
    <div class="register">
      <div class="row">
        <div class="col-md-3" style="margin-top:50px;">
          <img style="width: 200px" src="/img/cefire-valencia-color.png" alt />
          <h5 class="mt-5 text-center">En aquesta pantalla pots editar les teues dades. Has de tornar a introduïr totes les dades de nou. S'actualitzen les dades que estan en els camps tal com estan, per tant, assegura't que has introduït totes les dades correcrament</h5>
          <br />
        </div>
        <div class="col-md-9 register-right">
          <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
            <li class="nav-item">
              <a
                class="nav-link active"
                id="home-tab"
                data-toggle="tab"
                href="#home"
                role="tab"
                aria-controls="home"
                aria-selected="true"
              >Assessor</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                id="profile-tab"
                data-toggle="tab"
                href="#profile"
                role="tab"
                aria-controls="profile"
                aria-selected="false"
              >Crèdits</a>
            </li>
          </ul>

          <div class="tab-content" id="myTabContent">
            <div
              class="tab-pane fade show active"
              id="home"
              role="tabpanel"
              aria-labelledby="home-tab"
            >
              <h3 class="register-heading">Modifica les teues dades</h3>
              <div class="row register-form">
                <div class="col-md-12">
                  <div class="form-group">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Nom*"
                      v-model="emplena['name']"
                    />
                  </div>
                  <div class="form-group">
                    <input
                      autocomplete="off"
                      type="text"
                      class="form-control"
                      placeholder="Email"
                      v-model="emplena['email']"
                    />
                  </div>
                  <div class="form-group">
                    <input
                      autocomplete="false"
                      type="password"
                      class="form-control"
                      placeholder="Actualitza password"
                      v-model="emplena['password']"
                    />
                  </div>
                  <input type="submit" class="btnRegister" value="Actualitza password" @click="actualitza_dades"/>
                </div>
              </div>
            </div>

            <div
              class="tab-pane fade show"
              id="profile"
              role="tabpanel"
              aria-labelledby="profile-tab"
            >

            </div>
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
      emplena: [],
      info: null
    };
  },
  methods: {
    async emplenaf() {
      await axios
        .get("/userdatos")
        .then(response => (this.emplena = response.data[0]))
        .catch(function(error) {
          console.log(error);
        });
      console.log(this.emplena);
    },
    async actualitza_dades() {
        await axios
        .post("/updatedatos", this.emplena)
        .then(response => (this.info = response.data))
        .catch(function(error) {
          console.log(error);
        });
        console.log(this.info);
      alert(this.info);
    }
  },
  mounted() {
    this.emplenaf();
  }
};
</script>

<style lang="sass" scoped>
</style>
