<template>
<div class="container text-center">
  <div class="col-md-12">
    <form @submit.prevent="login" method="POST">
        <h3>Iniciar Sesión</h3>

        <div class="form-group">
            <label>Correo</label>
            <input v-model="email" type="email" class="form-control form-control-lg" />
        </div>

        <div class="form-group">
            <label>Clave</label>
            <input v-model="password" type="password" class="form-control form-control-lg" />
        </div>
        <div class="form-group" style="padding-top: 20px;">
          <button type="submit" class="btn btn-dark btn-lg btn-block">Iniciar</button>
        </div>
    </form>
  </div>
</div>
</template>
<script>

import axios from "axios";
export default {
  name: 'Login',
  data() {
    return {
      email: '',
      password: '',
      showMessage: false,
      message: '',
    }
  },
  methods: {
    login() {
      let self = this;
      axios.post('/api/login', {
        email: self.email,
        password: self.password,
      }).then(function (response) {
        self.email = '';
        self.password = '';
        localStorage.setItem("api_token", response.data.token);
        self.$router.push({ path: 'about' });
      })
      .catch(function (error) {
        self.message = 'Incorrect E-mail or password';
        self.showMessage = true;
        console.log(error);
      });

    }
  }
}

</script>


<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
