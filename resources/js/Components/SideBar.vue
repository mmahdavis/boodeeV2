<script setup>
import { ref } from 'vue'

defineProps({
    conversations: Object,
});
const state = ref({ conversationId: '' });

</script>

<template>
    <div class="flex flex-col py-8 pl-6 pr-2 w-64 bg-white flex-shrink-0 h-screen relative">
        <div class="flex flex-row items-center justify-center h-12 w-full">
            <img src="/img/logo.png" alt="Logo">
        </div>
        <div class="flex flex-col items-center bg-indigo-50 border border-gray-200 mt-4 w-full py-6 px-4 rounded-lg">
            <div class="h-20 w-20 rounded-full border overflow-hidden">
                <img src="https://avatars3.githubusercontent.com/u/13764067?s=128" alt="Avatar" class="h-full w-full" />
            </div>
            <div class="text-sm font-semibold mt-2">test</div>
        </div>
        <div class="flex flex-col mt-8">
            <div class="flex flex-row items-center justify-between text-xs">
                <span class="font-bold">Conversations</span>
                <span class="flex items-center justify-center bg-gray-300 h-5 w-5 rounded-full">{{ conversations.length
                }}</span>
            </div>
            <div class="flex flex-col space-y-1 mt-4 -mx-2 overflow-y-auto">
                <div v-for="(group, key) in conversations">
                    <div @click="$emit('changeConversation', group.conversation.channel_id)"
                        class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2 cursor-pointer">
                        <div class="flex items-center justify-center h-8 w-8 bg-indigo-200 rounded-full">
                            A
                        </div>
                        <div class="ml-2 text-sm font-semibold">{{ group.conversation.title }}</div>
                    </div>
                </div>
            </div>
        </div>
        <button onclick="" class="absolute right-0 bottom-0 m-5 rounded-full bg-indigo-100 p-2">
            <svg width="30px" height="30px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="none">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path fill="#000000" fill-rule="evenodd"
                        d="M9 17a1 1 0 102 0v-6h6a1 1 0 100-2h-6V3a1 1 0 10-2 0v6H3a1 1 0 000 2h6v6z"></path>
                </g>
            </svg>
        </button>
    </div>

    <div id="groupModal" aria-labelledby="modal-title" role="dialog" aria-modal="true" class='relative z-20 hidden'>

        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-20 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                </div>
            </div>
        </div>
    </div>
</template>
