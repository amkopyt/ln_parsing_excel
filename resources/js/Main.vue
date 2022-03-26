<template>
  <main>
    <Header style="grid-area: header;" />
    <Tabs style="grid-area: tabs;" />
    <Navbar style="grid-area: navbar;" />
    <section style="grid-area: content;">
      content
    </section>
  </main>
</template>

<script>
import Header from "./components/Header";
import Navbar from "./components/Navbar";
import Tabs from "./components/Tabs";

export default {
    name: "Main",
    components: {
        Header, Navbar, Tabs
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
