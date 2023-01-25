<template>

  <div class="flex justify-center w-full">
    <form @submit.prevent="submitOrder" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full">

      <div class="mb-4">
        <InputGroup v-model="name"
                    id="inputName"
                    label="Имя"
                    type="text"
                    placeholder="Ведите ваше имя"
                    :error-message="errors.name"
                    :disabled="disabledForm"
        />
      </div>

      <div class="mb-4">
        <InputGroup v-model="phone"
                    id="inputPhone"
                    label="Телефон"
                    type="text"
                    placeholder="Ведите ваш телефон"
                    maska="+7 (###) ###-##-##"
                    :error-message="errors.phone"
                    :disabled="disabledForm"
        />
      </div>

      <div class="mb-4">
        <TextareaGroup v-model="message"
                       id="textareaMessage"
                       label="Сообщение"
                       placeholder="Ведите сообщение"
                       :error-message="errors.message"
                       :disabled="disabledForm"
        />
      </div>

      <div class="flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit"
                :disabled="disabledForm"
        >
          Отправить
        </button>
      </div>
    </form>
  </div>

</template>

<script setup>
import { ref, reactive, defineEmits } from "vue";
import { addOrder } from "../services/api/api";
import { formatErrors } from "../helpers";

import InputGroup from "../components/InputGroup";
import TextareaGroup from "../components/TextareaGroup";

const name = ref("");
const phone = ref("");
const message = ref("");
const disabledForm = ref(false);

const errors = reactive({
  name: '',
  phone: '',
  message: '',
});

const emit = defineEmits(["onSuccess", "onError"]);

const submitOrder = async () => {
  const order = {
    name: name.value,
    phone: phone.value,
    message: message.value
  };

  try{
    errors.value = formatErrors(errors, {});
    disabledForm.value = true;
    const resOrder = await addOrder(order);
    name.value = '';
    phone.value = '';
    message.value = '';

    emit("onSuccess", resOrder.message);
  }catch (e) {
    errors.value = formatErrors(errors, e?.response?.errors_messages);
    if(e.response.status === 404){
      emit("onError", e?.response?.data?.message);
    }
  } finally {
    disabledForm.value = false;
  }
}
</script>
