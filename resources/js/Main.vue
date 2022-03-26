<template>
  <main>
    <MainHeader style="grid-area: header;" />
    <MainTabs style="grid-area: tabs;" />
    <MainNavbar style="grid-area: navbar;" />
    <Content style="grid-area: content;" />
  </main>
</template>

<script>
import MainHeader from "./components/MainHeader";
import MainNavbar from "./components/MainNavbar";
import MainTabs from "./components/MainTabs";
import Content from "./Content"

export default {
    name: "Main",
    components: {
        MainHeader, MainNavbar, MainTabs, Content
    }
}
</script>

<style scoped lang="scss">
main {
    margin: 0 auto;
    max-width: 1440px;
    background-color: white;
    display: grid;
    grid-template-columns: 370px 1fr;
    grid-template-areas:
        "header header"
        "none tabs"
        "navbar content";
}
</style>
