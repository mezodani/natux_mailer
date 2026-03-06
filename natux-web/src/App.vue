<script>
export default {
  data() {
    return {
      newEmail: {
        email: ""
      },
      emailek: []
    }
  },
  methods: {
    kuld() {      fetch("http://127.0.0.1:8000/api/natux", {
        method: "POST",
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(this.newEmail)
      })
        .then(response => response.json())
        .then(data => {
          alert(data.message);
          this.kap()
        })
    },
    kap() {
      this.emailek = []
      fetch("http://127.0.0.1:8000/api/natux")
        .then(response => response.json())
        .then(data => {
          data.forEach(e => {
            this.emailek.push(e);
          });
        })
    }
  },
  mounted() {
    this.kap()
  }
}
</script>

<template>
  <div class="container">
    <div class="d-flex justify-content-center m-5">
      <strong><h1>Udvozlunk a natux mailerben!</h1></strong>
    </div>
    <div class="row">
      <div class="col-lg-6">

        <h3>Adjon meg egy emailt</h3>
        <div class="row">
          <div class="col-6">
            <input type="email" class="form-control" placeholder="Adjon meg egy emailt"
              v-model="newEmail.email">
          </div>
          <div class="col-6">
            <input type="button" class="mx-2 btn btn-success" @click="kuld" value="Natux kuldese">
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="list-group">
          <h1>Kuldott xXNatuXx: </h1>
          <div class="list-group-item" v-for="email in emailek">
            <strong>Email: </strong> {{ email.email }}
            <strong>Datum: </strong> {{ email.created_at }}
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped></style>
