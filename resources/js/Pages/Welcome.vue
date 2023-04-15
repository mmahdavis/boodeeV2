<script setup>
import { Head } from '@inertiajs/vue3';
import SideBar from '@/Components/SideBar.vue';
import ConversationBody from '@/Components/ConversationBody.vue';
import { ref } from 'vue';

defineProps({
    conversations: Object,
});

const actvieConversation = ref({ id: 'GP1' })

</script>
<template>
    <Head title="Index" />
    <div class="overflow-hidden flex items-center justify-center">
        <div class="flex flex-row overflow-x-hidden w-full md:w-5/6">
            <SideBar :conversations=conversations @change-conversation="(param) => actvieConversation.id = param "/>
            <ConversationBody :key="actvieConversation.id" />
        </div>
    </div>
</template>


