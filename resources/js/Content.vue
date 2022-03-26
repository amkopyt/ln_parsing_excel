<template>
  <div class="content">
    <div class="content__header">
      <h2 class="content__title">
        Dashboard
      </h2>
      <div class="content__date-filter">
        <span>Aug 21, 2021 - Sep 21, 2021</span>
        <img
          src="@/assets/icons/fold.svg"
          alt="fold/unfold"
        >
      </div>
      <div class="content__print">
        <img
          src="@/assets/icons/print.svg"
          alt="Print"
        >
      </div>
      <div class="content__download">
        <img
          src="@/assets/icons/download.svg"
          alt="Download"
        >
      </div>
    </div>
    <ContentTable />
  </div>
</template>

<script>
import ContentTable from "@/components/ContentTable";
export default {
    name: "Content",
    components: {ContentTable}
}
</script>

<style scoped lang="scss">
.content {
    background-color: #E2F0F0;
}
.content__header {
    display: flex;
    max-width: 920px;
    align-items: center;
}
.content__header>*:nth-child(2) {
    margin-left: auto;
}
.content__title {
    font-family: 'Quicksand', sans-serif;
    font-size: 34px;
    margin: 12px 0;
}
.content__date-filter {
    font-weight: 400;
    font-size: 14px;
    border: 1px solid #C6CACC;
    border-radius: 10px;
    padding: 7px 12px;
    margin-top: 21px;

    display: flex;
    align-items: center;
    img {
        margin-left: 20px;
    }
}
.content__print, .content__download {
    margin-top: 21px;
    margin-left: 8px;
    background-color: #F7F9FA;
    padding: 6.5px 10px;
    border-radius: 4px;
}
</style>
