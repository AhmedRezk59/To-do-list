<template>
    <div>
        <div v-for="(item, index) in items" :key="index">
            <show-item
                :item="item"
                class="item"
                @itemChanged="$emit('reloadItems')"
                @itemDeleted="$emit('reloadItems')"
            />
        </div>
    </div>
</template>

<script>
import showItem from "./showItem";

export default {
    props: ["items"],
    components: {
        showItem
    }
};
</script>

<style scoped>
.item {
    background: #e6e6e6;
    padding: 5px;
    margin-top: 5px;
}
</style>
