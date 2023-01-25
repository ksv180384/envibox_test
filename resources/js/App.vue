<template>
  <div class="w-96 m-auto flex flex-col items-center">
    <h1 class="text-2xl font-bold my-2">Заявка</h1>
    <TheNotification :type="typeNotif" :message="messageNotif" :show="showNotif" @onShow="toggleNotification"/>
    <OrderForm @onSuccess="onSuccess" @onError="onError" />
  </div>
</template>

<script setup>
import { ref } from "vue";
import OrderForm from "./modules/OrderForm";
import TheNotification from "./components/TheNotification";

const showNotif = ref(false);
const typeNotif = ref('succees');
const messageNotif = ref('');

const onSuccess = (message) => {
  showNotif.value = true;
  typeNotif.value = 'success';
  messageNotif.value = message;
}

const onError = (message) => {
  showNotif.value = true;
  typeNotif.value = 'error';
  messageNotif.value = message;
}

const toggleNotification = (show) => {
  showNotif.value = show;
}
</script>

