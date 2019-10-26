<template>
  <div class="layout">
    <myHeader></myHeader>
    <AppMain></AppMain>
    <myFooter></myFooter>
  </div>
</template>

<script>
//引入基础组件
import { myHeader, myFooter, AppMain} from './components'

export default {
  name: "layout",
  components: {
    myHeader,
    myFooter,
    AppMain
  },
  data() {
    return {};
  }
};
</script>

<style>
</style>