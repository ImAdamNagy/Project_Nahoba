<template>
    <NavBar />
    <Header><h1 class="headertitle">User Messages</h1></Header>
    <div class="container">
        <div class="row">
            <Chat />
        </div>
    </div>
</template>

<script>
import Header from '@/components/Header.vue'
import NavBar from '@/components/NavBar.vue'
import Messages from '@/components/Messages.vue'
import Chat from '@/components/Chat.vue'
export default {
    components: {
        Header,
        NavBar,
        Messages,
        Chat
    }
}
</script>