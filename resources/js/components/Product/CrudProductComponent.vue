<script>
export default {
    name: "CrudProductComponent",
    data() {
        return {
            crudData: [],
            showInputs: false,
        }
    },
    methods: {
        getDataInInputFields() {
            this.showInputs = !this.showInputs;
        },
        createProduct() {
            axios.post('/products', { withCredentials: true,
                name: this.crudData.name,
                article: this.crudData.category,
                data: {
                    size: this.crudData.size,
                    color: this.crudData.color,
                }
            })
                .then(this.$parent.getProductList())
                .catch(err=>
                console.log(err.response.data.message))
        }
    }

}
</script>

<template>
    <div id="main">
        <h4><i>Также вы можете создать собственный товар:</i></h4>
        <div>
            <button @click.prevent="getDataInInputFields">Создание товара</button>
        </div>
        <div v-if="showInputs" id="crud-content">
            <input placeholder="Введите категорию товара" v-model="crudData.category">
            <input placeholder="Название товара" v-model="crudData.name">
            <input placeholder="Цвет" v-model="crudData.color">
            <input placeholder="Размер" v-model="crudData.size">
            <div id="button-create">
                <button @click.prevent="createProduct">Создать</button>
            </div>
        </div>
    </div>
</template>

<style scoped>
#main {
    margin: 5% 0 5% 0;
}

#crud-content {
    margin: 2% 0 2% 0;
}

#button-create {
    margin: 1% 0 1% 0;
}
</style>
