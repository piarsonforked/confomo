<template>
    <div class="conference">
        <friends-list :list="onlineFriends" key="online-friends" :conference-id="conferenceId" descriptor="Online"></friends-list>

        <friends-list :list="newFriends" key="new-friends" :conference-id="conferenceId" descriptor="New"></friends-list>
    </div>
</template>

<script>
    import FriendsList from './FriendsList.vue';

    export default {
        data: function() {
            return {
                currentUserId: Confomo.userId,
                conferenceId: Confomo.conferenceId,

                newFriends: [],
                onlineFriends: []
            };
        },

        components: { FriendsList }
    }
</script>
