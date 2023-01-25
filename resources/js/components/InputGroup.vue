<template>
  <div class="input-group" :class="{ error: props.errorMessage }">
    <label :for="props.id">
      {{ props.label }}
    </label>
    <input @input="inputUpdate"
           :id="props.id"
           :type="props.type"
           :placeholder="props.placeholder"
           :disabled="props.disabled"
           :value="props.modelValue"
           v-maska
           :data-maska="props.maska"
    />


    <p v-if="props.errorMessage" class="error">{{ props.errorMessage }}</p>
  </div>
</template>

<script setup>
import { defineProps, defineEmits } from "vue";
import { vMaska } from "maska";

const props = defineProps({
  id: String,
  type: String,
  label: String,
  placeholder: String,
  disabled: Boolean,
  modelValue: String,
  maska: String,
  errorMessage: String,
});

const emit = defineEmits(["update:modelValue"]);

const inputUpdate = (e) => {
  emit("update:modelValue", e.target.value);
};
</script>

