<template>

    <div style="margin-bottom: 30px">

        <h1>{{ counter }}</h1>

        <h1 v-if="showMessage">WOOOO!</h1>

    </div>

</template>

<script>

    export default {
        model: {
            prop: "counter",
            event: "counter-updated"
        },
        props: {
            counter: Number,
            showMessage: Boolean,
        },
        methods: {
            updateCounter: function () {
                this.$emit("counter-updated", this.counter);
            }
        }
    }

</script>
