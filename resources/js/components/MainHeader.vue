<template>
  <div>
    <div class="m-header">
      <div class="m-header__logo">
        <img
          src="@/assets/images/logo.png"
          alt="Логотип"
        >
        <span>D</span>
      </div>
      <h1 class="m-header__title">
        Dashboard
      </h1>
      <div class="m-header__help">
        <span>Help</span>
        <img
          src="@/assets/icons/help.svg"
          alt="Help icon"
        >
      </div>
      <div class="m-header__upgrade">
        Upgrade
      </div>
      <div class="m-header__profile">
        <img
          src="@/assets/images/photo-men.png"
          alt=""
        >
      </div>
    </div>
  </div>
</template>

<script>
export default {
    name: "Header"
}
</script>

<style scoped lang="scss">
.m-header {
    display: flex;
    column-gap: 16px;
    height: 64px;
    align-items: center;
}
.m-header>*:nth-child(3) {
    margin-left: auto;
}
.m-header__logo {
    margin-left: 16px;
    display: flex;
    align-items: center;
    position: relative;
}
.m-header__logo span {
    left: 19px;
    top: 9px;
    position: absolute;
    font-family: 'Racing Sans One', sans-serif;
    color: #367BF5;
    font-size: 24px;
    letter-spacing: 0.15px;
    font-weight: 400;
}
.m-header__title {
    margin: 0 -6px;
    font-family: 'Racing Sans One', sans-serif;
    line-height: 28px;
    font-size: 24px;
    color: rgba(94, 99, 102, 1);
}
.m-header__help {
    margin: 0 8px;
    display: flex;
    align-items: center;
    border-radius: 10px;
    background-color: #F7F9FA;
    padding: 10px;
    span {
        color: #5E6366;
        margin-right: 25px;
    }
}
.m-header__upgrade {
    text-transform: uppercase;
    font-weight: 500;
    letter-spacing: 0.75px;
    color: #367BF5;
    box-shadow: 0px 4px 8px rgba(54, 123, 245, 0.16), 0px 2px 4px rgba(54, 123, 245, 0.24);
    padding: 10px 14px;
    border-radius: 10px;
}
.m-header__profile {
    margin-right: 16px;
}

</style>
