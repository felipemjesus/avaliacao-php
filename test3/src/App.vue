<template>
  <div class="d-flex flex-column h-100" id="app-wrapper">
    <div id="nav">
      <router-link to="/">Home</router-link>
      |
      <router-link to="/about">About</router-link>
    </div>
    <main role="main" class="flex-shrink-0 mb-3">
      <div class="container">
        <router-view/>
      </div>
    </main>
  </div>
</template>

<style lang="scss">
  @import '~bootstrap/scss/bootstrap.scss';
  @import '~bootstrap-vue/src/index.scss';
</style>
