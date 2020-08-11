<template>
    <div class="q-mx-md q-mt-md text-center">
      <div class="col ">
        <!-- .col -->
      </div>
      <div class="col-8 row">
      <q-card
      class="my-card text-white q-gutter-xs q-ma-sm"
      style="background: radial-gradient(circle, #35a2ff 0%, #014a88 100%)"
     v-for="user in users" :key="user.id">
      <q-card-section class="q-pa-md">
        {{ user.id }}
      </q-card-section>
      <q-card-section class="q-pa-md">
        {{ user.firstname }}
      </q-card-section>
      <q-card-section class="q-pa-md">
        {{ user.lastname}}
      </q-card-section>
      <q-card-section class="q-pa-md">
        {{ user.email }}
      </q-card-section>
    </q-card>
      </div>
      <div class="col">
        <!-- .col -->
        {{ paginationLinks.firstPage }}
      </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'PageIndex',
  data () {
    return {
      users: '',
      paginationLinks: {
        firstPage: '',
        lastPage: '',
        numberOfPages: '',
        pageOffset: ''
      }
    }
  },
  mounted () {
    axios
      .get('http://localhost:8085/users')
      .then(response => {
        this.users = response.data.data
        this.paginationLinks.firstPage = response.data.next_page_url
        console.log('pagination link =>> ' + this.paginationLinks.firstPage)
      })
  }
}
</script>
