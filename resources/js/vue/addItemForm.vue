<template>
    <div class="add-item-form">
        <form action="" method="post">
            <label for="title"></label>
            <input type="text" name="title" id="title" v-model="item.name" />
            <font-awesome-icon
                icon="plus-square"
                :class="[item.name ? 'active' : 'inactive', 'plus']"
                @click="addIcon()"
            />
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            item: {
                name: ""
            }
        };
    },
    methods: {
        addIcon() {
            if (this.item.name == "") {
                return;
            }

            axios
                .post("api/item/store", {
                    item: this.item
                })
                .then(res => {
                    if (res.data.status == 201) {
                        this.item.name = "";
                        this.$emit('reloadItems')
                    }
                })
                .catch(err => console.error(err));
        }
    }
};
</script>

<style scoped>
.add-item-form {
    display: flex;
    align-items: center;
    justify-content: center;
}

#title {
    background: #f7f7f7;
    margin-right: 10px;
    padding: 5px;
    border: 0px;
    border-radius: 4px;
    outline: none;
    width: 260px;
}

.plus {
    font-size: 20px;
    cursor: pointer;
}

.active {
    color: #00ce25;
}

.inactive {
    color: #999;
}
</style>
