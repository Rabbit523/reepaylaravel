<template>
  <input
    type="checkbox"
    class="checkbox"
    :disabled="disabled"
    :checked="checked"
    @input="$emit('input', $event)"
  />
</template>

<script>
export default {
  props: {
    disabled: {
      type: Boolean,
      default: false,
    },

    checked: {
      default: false,
    },
  },
}
</script>
