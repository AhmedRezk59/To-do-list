<template>
    <div>
        <input
            type="checkbox"
            @change="updateCheck()"
            v-model="item.completed"
        />
        <span :class="[item.completed ? 'completed' : '', 'itemText']">{{
            item.name
        }}</span>

        <button @click="removeItem()" class="trash">
            <font-awesome-icon icon="trash" />
        </button>
    </div>
</template>

<script>
export default {
    props: ["item"],

    methods:{
        updateCheck(){
            axios
                .put('api/item/' + this.item.id ,{
                    item :this.item
                })
                .then(res => {
                    if(res.data.status == 200){
                        this.$emit('itemChanged')
                    }
                })
                .catch(err=>console.error(err))
                
        },

        removeItem(){
            axios
                .delete('api/item/' + this.item.id )
                .then(res => {
                     if(res.data.status == 200){
                        this.$emit('itemDeleted')
                    }
                })
                 .catch(err=>console.error(err))
        }
    }
};
</script>

<style scoped>
.completed {
    text-decoration: line-through;
    color: #999;
}

.itemText {
    width: 100%;
    margin-left: 20px;
}

.item {
    display: flex;
    justify-content: center;
    align-items: center;
}

.trash {
    background: #e6e6e6;
    outline:none;
    border: none;
    color:red;
    cursor: pointer;
}
</style>
