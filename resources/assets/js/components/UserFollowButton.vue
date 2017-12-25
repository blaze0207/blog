<template>
  <button class="btn btn-default" v-text="text" @click="follow" :class="{ 'btn-success': followed }"></button>
</template>

<script>
export default {
  props: ['user'],
  mounted() {
    axios.get('/api/user/followers/' + this.user).then(res => {
      // console.log(res.dad);
      this.followed = res.data.followed;
    });
  },
  data() {
    return {
      followed: false
    };
  },
  methods: {
    follow() {
      axios.post('/api/user/follow', { user: this.user }).then(res => {
        // console.log(res.data);
        this.followed = res.data.followed;
      });
    }
  },
  computed: {
    text() {
      return this.followed ? "已關注" : "關注他";
    }
  }
};
</script>
