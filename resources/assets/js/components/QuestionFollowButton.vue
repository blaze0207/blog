<template>
  <button class="btn btn-default" v-text="text" @click="follow" :class="{ 'btn-success': followed}"></button>
</template>

<script>
export default {
  props:['question'],
  mounted() {
    axios.post('/api/question/follower', { 'question': this.question }).then(res=> {
      console.log(res.data);
      this.followed = res.data.followed
    })
  },
  data() {
    return {
      followed: false
    }
  },
  methods: {
    follow() {
      axios.post('/api/question/follow', { 'question': this.question }).then(res=> {
        console.log(res.data);
        this.followed = res.data.followed
      })
    }
  },
  computed: {
    text() {
      return this.followed ? '已關注' : '關注該問題'
    }
  }
};
</script>
