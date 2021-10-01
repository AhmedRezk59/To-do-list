<template>
    <div class="items-container">
        <div class="heading">
            <h2 class="title">Todo list</h2>
            <add-item @reloadItems="getItems()"/>
        </div>
        <show-items :items="items" @reloadItems="getItems()"/>
    </div>
</template>

<script>
import AddItem from "./addItemForm";
import ShowItems from "./showItems";
export default {
    components: {
        AddItem,
        ShowItems
    },
    data() {
        return {
            items: []
        };
    },

    methods: {
        getItems() {
            axios
                .get("api/items")
                .then(res => {
                    this.items = res.data.data;
                })
                .catch(err => console.error(err));
        }
    },

    created() {
        this.getItems();
    }
};
</script>

<style scoped>
.items-container {
    width: 350px;
    margin: auto;
}

.heading {
    background: #e6e6e6;
    padding: 10px;
}

.title {
    text-align: center;
}
</style>
