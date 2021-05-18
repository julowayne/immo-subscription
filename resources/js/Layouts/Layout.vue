<template>
    <!-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <inertia-link v-if="$page.props.auth.user" href="/dashboard" class="text-sm text-gray-700 underline">
                Dashboard
            </inertia-link>

            <template v-else>
                <inertia-link :href="route('login')" class="text-sm text-gray-700 underline">
                    Log in
                </inertia-link>

                <inertia-link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
                    Register test
                </inertia-link>
            </template>
        </div>
    </div> -->
    <div class="nav">
      <inertia-link href="/">
        <img src="image/alfred-logo-teal-nav.png" alt="alfred logo">
      </inertia-link>
      <div id="categories">
        <span>        
          <inertia-link href="/services">
            Services
          </inertia-link>
        </span>
        <span>        
          <inertia-link href="/actualités">
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
        <input type="text" placeholder="Rechercher ...">
      </div>
      <div id="account">
        <img src="image/utilisateur.png" alt="account logo">
        <div>
          <inertia-link href="/signin">
            Inscription
          </inertia-link>
          <inertia-link href="/signup">
            Connexion
          </inertia-link>
        </div>
      </div>
    </div>
</template>

<script>

    export default {
        //     props: {
        //     auth: Object,
        //     canLogin: Boolean,
        //     canRegister: Boolean,
        //     errors: Object,
        //     laravelVersion: String,
        //     phpVersion: String,
        // }
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
  max-height: 80px;
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
  #account {
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