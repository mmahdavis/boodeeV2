<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';

defineProps({ conversation: Object, participants: Object, messages: Object })
</script>

<template>
    {{ conversation }}<br />
    {{ participants }}<br />
    {{ messages }}
</template>
