<script setup>
import { Head } from '@inertiajs/vue3';
import axios from 'axios';
import { onBeforeMount, onMounted, ref } from 'vue';
import moment from 'moment';
import { getCurrentInstance } from "vue";

const conversation = ref([])
const participants = ref([])
const messages = ref([])
const authUser = ref([])
const user = ''
const newMessage = ref([])

onMounted(() => {
    axios.get(route('conversation.show', getCurrentInstance().vnode.key)).then(response => {
        conversation.value = response.data.conversation;
        participants.value = response.data.participant;
        messages.value = response.data.message;
        authUser.value = response.data.authUser;
    });
})
function sendMessage() {
    const message = { user_id: 1, conversation_id: this.conversation.id, message: newMessage.value }
    axios.post("/api/v1/conversation/" + this.conversation.channel_id + "/message", message)
        .then(response => this.refresh++);
}
</script>

<template>
    <Head title="test" />
    <div class="flex flex-col flex-auto h-screen p-0 m-0">
        <div class="flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-gray-100 h-full">
            <div class="flex justify-start items-center w-full p-4">
                <div class="mr-10">
                    <!-- Back Button -->
                    <svg width="20px" height="20px" viewBox="0 0 20 20" version="1.1" fill="#000000"
                        transform="rotate(0)matrix(-1, 0, 0, 1, 0, 0)">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <title>arrow_right [#363]</title>
                            <desc>Created with Sketch.</desc>
                            <defs> </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Dribbble-Light-Preview" transform="translate(-420.000000, -6559.000000)"
                                    fill="#000000">
                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                        <path
                                            d="M375.127681,6399.29274 C374.737008,6398.90242 374.104537,6398.90242 373.714864,6399.29274 C373.324191,6399.68307 373.324191,6400.31497 373.714864,6400.7043 L380.149475,6407.14215 C380.464211,6407.45661 380.241398,6408.00167 379.79677,6408.00167 L365.016149,6408.00167 C364.464611,6408.00167 364,6408.44091 364,6408.99195 L364,6408.99594 C364,6409.54699 364.464611,6409.99821 365.016149,6409.99821 L379.79677,6409.99821 C380.241398,6409.99821 380.464211,6410.52829 380.149475,6410.84275 L373.68389,6417.29957 C373.293217,6417.68889 373.293217,6418.3188 373.68389,6418.70913 L373.68389,6418.70813 C374.073563,6419.09746 374.706034,6419.09746 375.096707,6418.70713 L383.41474,6410.39652 L383.41474,6410.39652 C384.195087,6409.61687 384.195087,6408.35206 383.41474,6407.57241 C383.233892,6407.39272 374.946832,6399.11206 375.127681,6399.29274"
                                            id="arrow_right-[#363]"> </path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="flex flex-shrink-0 items-center col-span-10">
                    <!-- Conversation Image -->
                    <img class="block h-14 my-2 shrink rounded-full mr-5"
                        src="https://avatars3.githubusercontent.com/u/13764067?s=128" alt="Conversation Profile">
                    <!-- Conversation Details -->
                    <div class="flex flex-col">
                        <div class="font-bold"> {{ conversation.title }} </div>
                        <div class="text-sm text-gray-700"> {{ participants.length }} Member </div>
                    </div>

                </div>
            </div>
            <div class="flex flex-col h-full overflow-x-auto mb-4 p-4">
                <div class="flex flex-col h-full">
                    <div class="grid grid-cols-12 gap-y-2">
                        <div v-for="message in messages" class="col-start-1 col-end-13 p-3 rounded-lg">
                            <div v-if="message.user_id.id == authUser"
                                class="flex items-center justify-start flex-row-reverse">
                                <div
                                    class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0">
                                    S
                                </div>
                                <div class="relative mr-3 text-md bg-indigo-100 py-2 px-4 shadow rounded-xl">
                                    <div class="text-right pb-2 font-bold text-cyan-700">{{ message.user_id.name }}
                                    </div>
                                    <div style="white-space: pre-wrap;">{{ message.message }}</div>
                                    <div class="text-left pt-2 text-sm text-gray-500">
                                        {{ moment(message.created_at).startOf('second').fromNow() }}</div>
                                </div>
                            </div>
                            <div v-else class="flex flex-row items-center">
                                <div
                                    class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0">
                                    R
                                </div>
                                <div class="relative ml-3 text-md bg-white py-2 px-4 shadow rounded-xl">
                                    <div class="text-left pb-2 font-bold text-cyan-700">{{ message.user_id.name }}
                                    </div>
                                    <div style="white-space: pre-wrap;">{{ message.message }}</div>
                                    <div class="text-right pt-2 text-sm text-gray-500">
                                        {{ moment(message.created_at).startOf('second').fromNow() }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-row items-center h-16 rounded-xl bg-white w-full px-4">
                <div>
                    <button class="flex items-center justify-center text-gray-400 hover:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                            </path>
                        </svg>
                    </button>
                </div>
                <div class="flex-grow ml-4">
                    <div class="relative w-full">
                        <textarea name="message" v-model="newMessage"
                            class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10" />
                        <button
                            class="absolute flex items-center justify-center h-full w-12 right-0 top-0 text-gray-400 hover:text-gray-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="ml-4">
                    <button @click="sendMessage()"
                        class="flex items-center justify-center bg-indigo-500 hover:bg-indigo-600 rounded-xl text-white px-4 py-1 flex-shrink-0">
                        <span>Send</span>
                        <span class="ml-2">
                            <svg class="w-4 h-4 transform rotate-45 -mt-px" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
