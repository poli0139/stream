<style>
form > * {
    margin: 1rem;
}
.form-container {
    height: fit-content;
    background-color: #f5f5f5;
    border-radius: 4px;
}
</style>

<template>
    <div class="form-container">
        <div class="message-header">Push to stream</div>
        <div class="message-body">
            <form @submit.prevent="onSubmit" @keydown="form.errors.clear()">
                <p class="control">
                    <textarea
                        class="textarea"
                        placeholder="say something I'm giving up on you"
                        v-model="form.body"
                        style="resize: none"
                    ></textarea>
                    <span
                        class="is-danger help"
                        v-if="form.errors.errors.message"
                        v-text="form.errors.errors.message"
                    ></span>
                </p>

                <p class="control">
                    <button
                        class="button is-pimary"
                        :disabled="form.errors.any()"
                    >
                        Submit
                    </button>
                </p>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: new Form({ body: "" }),
        };
    },

    methods: {
        onSubmit() {
            // submit an ajax request
            this.form
                .post("/statuses")
                .then((status) => this.$emit("completed", status));
        },
    },
};
</script>
