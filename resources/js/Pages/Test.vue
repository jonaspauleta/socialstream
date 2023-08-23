<script lang="ts" setup>
import { useEcho } from "@/Hooks/useEcho";
import { ref } from "vue";

const echo = useEcho();
const messages = ref([]);

echo.channel("public")
    // @ts-ignore
    .listen("TestEvent", (e) => {
        // @ts-ignore
        messages.value.push(e.message);
        console.log(e);
    });
</script>

<template>
    <div>
        <h1>Test</h1>

        <ul>
            <li v-for="message in messages" :key="message">
                {{ message }}
            </li>
        </ul>
    </div>
</template>
