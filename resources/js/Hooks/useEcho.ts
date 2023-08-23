import Echo from "laravel-echo";
import Pusher from "pusher-js";

export function useEcho() {
    // @ts-ignore
    window.Pusher = Pusher;

    return new Echo({
        broadcaster: "pusher",
        key: import.meta.env.VITE_PUSHER_APP_KEY,
        wsHost: import.meta.env.VITE_PUSHER_HOST,
        wsPort: import.meta.env.VITE_PUSHER_PORT,
        wssPort: import.meta.env.VITE_PUSHER_PORT,
        forceTLS: false,
        encrypted: true,
        enableLogging: true,
        disableStats: true,
        enabledTransports: ["ws", "wss"],
        cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    });
}
