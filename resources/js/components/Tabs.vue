<template>
  <ul class="tabs">
    <li
      v-for="tab in tabs"
      :key="tab"
      class="tabs__tab"
      :class="currentTab===tab?'tabs__tab_active':''"
      @click="currentTab = tab"
    >
      {{ tab }}
    </li>
  </ul>
</template>

<script>
export default {
    name: "Tabs",
    data() {
        return {
            tabs: ['Analyze','My campaigns', 'Configure'],
            currentTab: 'Analyze'
        }
    }
}
</script>

<style scoped lang="scss">
.tabs {
    padding: 0;
    margin-top: 5px;
    list-style: none;
    display: flex;
}
.tabs__tab {
    padding: 15px 20px;
    cursor: pointer;
    border: 1px solid white;
    color: #5E6366;
}
.tabs__tab_active {
    color: black;
    border-radius: 4px 4px 0 0;
    border-top: 1px solid #C6CACC;
    border-right: 1px solid #C6CACC;
    border-left: 1px solid #C6CACC;
}
</style>
