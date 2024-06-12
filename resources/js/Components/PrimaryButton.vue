<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="props.type" class="btn btn-sm btn-outline-primary">
        <slot />
    </button>
</template>
