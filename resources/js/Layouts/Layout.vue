<template>
    <div class="nav">
      <inertia-link href="/">
        <img src="/image/alfred-logo-teal-nav.png" alt="alfred logo">
      </inertia-link>
      <div id="categories">
        <span>        
          <inertia-link href="/services">
            Services
          </inertia-link>
        </span>
        <span>        
          <inertia-link href="/actualites">
            Actualités
          </inertia-link>
        </span>
        <span>        
          <inertia-link href="/contact">
            Contact
          </inertia-link>
        </span>
      </div>
      <div id="search">
        <form :action="route('search')" method="GET" @keyup.enter="newsFromQuery">
            <input type="text" name="search" placeholder="Rechercher ...">
            <!-- <button class type="submit">Search</button> -->
        </form>
      </div>
      <div id="userAccount">
        <div v-if="user">
          <inertia-link href="/profile">
            <img :src="user.avatar" alt="account logo">
          </inertia-link>
          <inertia-link href="/profile">
            {{ user.firstname }}
          </inertia-link>
          <inertia-link :href="route('logout')" method="post">
            déconnexion
          </inertia-link>
        </div>
        <div v-else>
          <inertia-link href="/register">
            <img src="/image/utilisateur.png" alt="account logo">
          </inertia-link>
          <inertia-link href="/register">
            Inscription
          </inertia-link>
          <inertia-link href="/login">
            Connexion
          </inertia-link>
        </div>
      </div>
    </div>
</template>
<script>
  import { computed } from 'vue'
  import { usePage } from '@inertiajs/inertia-vue3'

  export default {
    data(){
      return {
        allNewsFromQuery: []
      }
    },
    methods: {
      newsFromQuery(){
        console.log('ok')
        // this.$router.push({ path: "/search" });
        // axios.get("https://whoisalfred.herokuapp.com/search")
        axios.get("http://127.0.0.1:8000/search")
          .then((response)=> {
            this.newsFromQuery = response.data.allNewsFromQuery
            console.log(response)
          })
          .catch(error => {
            console.log(error);
        });
        this.errors = []
      }
    },
    setup() {
      const user = computed(() => usePage().props.value.auth.user)
      return { user }
    },
  }
</script>


<style lang="scss">
@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
.nav {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
  background-color: white;
  height: 10vh;
  padding: 0.75rem;
  box-shadow: 0 .125rem .25rem rgba(0,0,0,.075);
  img {
    border-radius: 50%;
    width: 60px;
  }
  #search {
    input {
      box-shadow: 0 .125rem .25rem rgba(0,0,0,.075);
      border-radius: 4px;
      border: none;
      outline: none;
    }
    ::placeholder{
      color: #20c997;
    }
    :focus {
      color: grey;
      outline: none !important;  
      border:1px solid #20c997;
    }
  }
  #categories {
    display: flex;
    width: 40%;
    justify-content: space-between;
    color: #20c997;
    span {
      font-size: 1.5rem;
      font-weight: 100;
      a:hover{
        border-bottom: 2px solid #20c997;
      }
    }
  }
  #userAccount {
    div {
      font-size: 15px;
      font-weight: 500;
      color: #20c997;
    }
    img {
      margin: auto;
      width: 40px;
      box-shadow: 0 .125rem .25rem rgba(0,0,0,.075);
    }
  }
}

</style>