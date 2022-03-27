<template>
  <div class="ct-table">
    <table>
      <thead>
        <tr class="ct-header">
          <th
            class="ct-header__data"
          >
            Data
          </th>
          <template
            v-for="company in getHeaders.companies"
            class="ct-header__company"
          >
            <th
              :key="company + '_qOil_fact'"
              class="ct-header__values"
            >
              {{ company }} qOil fact
            </th>
            <th
              :key="company + '_qOil_forecast'"
              class="ct-header__values"
            >
              {{ company }} qOil forecast
            </th>
            <th
              :key="company + '_qLiq_fact'"
              class="ct-header__values"
            >
              {{ company }} qLiq fact
            </th>
            <th
              :key="company + '_qLiq_forecast'"
              class="ct-header__values"
            >
              {{ company }} qLiq forecast
            </th>
          </template>
        </tr>
      </thead>
      <tr v-if="!getData.length">
        <td>Данные не найдены</td>
      </tr>
      <tbody
        v-else
        class="ct-body"
      >
        <tr
          v-for="item in getData"
          :key="item.date"
        >
          <td class="ct-body__date">
            {{ item.date }}
          </td>
          <template v-for="company in item.companies">
            <td
              :key="company.name + '_qOil_fact'"
              class="ct-body__values"
            >
              {{ company.qOil.fact }}
            </td>
            <td
              :key="company.name + '_qOil_forecast'"
              class="ct-body__values"
            >
              {{ company.qOil.forecast }}
            </td>
            <td
              :key="company.name + '_qLiq_fact'"
              class="ct-body__values"
            >
              {{ company.qLiq.fact }}
            </td>
            <td
              :key="company.name + '_qLiq_forecast'"
              class="ct-body__values"
            >
              {{ company.qLiq.forecast }}
            </td>
          </template>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
    name: "ContentTable",
    computed: {
        ...mapGetters(['getData', 'getHeaders']),
    },
    created() {
        this.$store.dispatch('getContent')
    }
}
</script>

<style scoped>
.ct-table {
    padding: 0;
    max-width: 920px;
    overflow-x: scroll;
}
.ct-header {
    font-family: 'Quicksand', sans-serif;
    font-weight: 500;
    letter-spacing: 0.44px;
    color: #919699;
    border-bottom: 2px solid #E3E5E6;
}
.ct-header__data {
    text-align: left;
    min-width: 330px;
    border-bottom: 2px solid #E3E5E6;
}
.ct-header__values {
    min-width: 118px;
    padding: 5px;
    border-bottom: 2px solid #E3E5E6;
}
.ct-body {
    font-weight: 500;
    font-size: 18px;
    letter-spacing: 0.15px;
}
.ct-body__date {
    border-bottom: 1px solid #E3E5E6;
}
.ct-body__values {
    border-bottom: 1px solid #E3E5E6;
    padding: 18px 10px;
    text-align: right;
    color: #5E6366;
}
</style>

