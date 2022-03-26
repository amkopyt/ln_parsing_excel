<template>
  <div class="navbar">
    <div class="navbar__create">
      <img
        src="@/assets/icons/plus.svg"
        alt="Create new"
      >
      <span>Create new</span>
    </div>
    <ul class="navbar__list">
      <li
        v-for="list in lists"
        :key="list.value"
        class="n-list"
        :class="currentList===list.value?'n-list_active':''"
        @click="currentList = list.value"
      >
        <div class="n-list__icon">
          <img
            :src="require('@/assets/icons/'+list.icon+'.svg')"
            :alt="list.title"
          >
        </div>
        <div class="n-list__info">
          <span class="n-list__title">{{ list.title }}</span>
          <span class="n-list__description">{{ list.description }}</span>
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
    name: "Navbar",
    data() {
        return {
            lists: [
                {
                    title: 'Metrics',
                    description: 'Track your apps across devices',
                    value: 'metrics',
                    icon: 'metrics'
                },
                {
                    title: 'Results',
                    description: 'View your results as Excel file',
                    value: 'results',
                    icon: 'results'
                },
                {
                    title: 'Reports',
                    description: 'Get insights into the big data',
                    value: 'reports',
                    icon: 'reports'
                },

            ],
            currentList: 'metrics'
        }
    }
}
</script>

<style scoped lang="scss">
.navbar {
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: #E2F0F0;
}
.navbar__create {
    width: 213px;
    font-family: 'Quicksand', sans-serif;
    font-size: 20px;
    color: #367BF5;
    padding: 15px 0px 15px 25px;
    cursor: pointer;
    background-color: white;
    border-radius: 99px;
    margin-top: 32px;
    box-shadow: 0px 16px 24px rgba(54, 123, 245, 0.16), 0px 6px 12px rgba(54, 123, 245, 0.16);

    span {
        margin-left: 16px;
    }
}
.navbar__list {
    list-style: none;
    padding: 0;
}
.n-list {
    padding: 10px 55px 10px 5px;
    cursor: pointer;
    display: flex;
    img {
        filter: invert(57%) sepia(13%) saturate(511%) hue-rotate(155deg) brightness(95%) contrast(92%);
    }
}
.n-list_active, .n-list:hover {
    background-color: #E5EFFF;
    img {
        filter: invert(39%) sepia(81%) saturate(947%) hue-rotate(193deg) brightness(96%) contrast(100%);
    }
}
.n-list__icon {
    width: 55px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.n-list__info {
    display: flex;
    flex-direction: column;
}
.n-list__title {
    font-size: 16px;
    line-height: 24px;
    letter-spacing: 0.44px;
    font-family: 'Quicksand', sans-serif;
}
.n-list__description {
    color: #5E6366;
    font-size: 12px;
}
</style>
