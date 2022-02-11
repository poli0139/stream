<template>
    <div>
        <div class="container">
            <div class="columns">
                <div class="column" style="padding-top: 0">
                    <div
                        class="message"
                        v-for="status in statuses"
                        :key="status.id"
                    >
                        <div class="message-header">
                            <p>{{ status.user.name }}</p>
                            <p>
                                {{ status.created_at | ago }}
                            </p>
                        </div>
                        <div class="message-body" v-text="status.body"></div>
                    </div>
                    <!-- add a form -->
                </div>
                <add-to-stream @completed="addStatus"></add-to-stream>
            </div>
        </div>
    </div>
</template>

<script>
import moment from "moment";
import Status from "../models/Status";
import AddToStream from "../components/AddToStream.vue";

export default {
    components: {
        AddToStream,
    },

    data() {
        return {
            statuses: [],
        };
    },

    filters: {
        ago(date) {
            return moment(date).fromNow();
        },
    },

    created() {
        //fire off an ajax request
        Status.all((statuses) => (this.statuses = statuses));
        // axios.get("statuses").then(({ data }) => (this.statuses = data));
    },
    methods: {
        addStatus(status) {
            this.statuses.unshift(status);
            window.scrollTo(0, 0);
        },
    },
};
</script>
