<template>
  <div class="textarea-group" :class="{ error: props.errorMessage }">
    <label v-if="props.label" :for="props.id">
      {{ props.label }}
    </label>
    <textarea @input="textareaUpdate"
              :id="props.id"
              cols="30"
              rows="10"
              :placeholder="props.placeholder"
              :disabled="props.disabled"
              :value="props.modelValue"
    ></textarea>
    <p v-if="props.errorMessage" class="error">{{ props.errorMessage }}</p>
  </div>
</template>

<script setup>
import { defineProps, defineEmits } from "vue";
const props = defineProps({
  id: String,
  type: String,
  label: String,
  placeholder: String,
  disabled: Boolean,
  modelValue: String,
  errorMessage: String,
});

const emit = defineEmits(["update:modelValue"]);

const textareaUpdate = (e) => {
  emit("update:modelValue", e.target.value);
};
</script>

