<script>
export default {
    name: "ProductTableComponent",
    data() {
        return {
            products: [],
            isProductEditing: {}
        }
    },
    methods: {
        getProductList() {
            axios.get('/get-products', {
                withCredentials: true
            })
                .then(res => {
                    this.products = res.data
                    this.products.forEach(product => {
                        if (product.data) {
                            try {
                                product.data = JSON.parse(product.data)
                            } catch (e) {
                                console.log(e + 'ошибка анпарса')
                            }
                        }
                    })
                })
        },
        changeData(id) {
            Object.keys(this.isProductEditing).forEach(key => {
                if(+key===id)
                {
                    return
                }
                this.isProductEditing[key] = false;
            });
            if (!(id in this.isProductEditing)) {
                this.isProductEditing[id] = false;
            }
            this.isProductEditing[id] = !this.isProductEditing[id];
        }

    },
    mounted() {
        this.getProductList()
    }
}
</script>

<template>
    <div class="product-cards">
        <div class="product-card" v-for="product in products" :key="product.id">
            <img :src="product.url_image" alt="Product image" class="product-image">
            <div class="product-info">
                <h3>{{ product.name }}</h3>
                <p><strong>Категория:</strong>{{ product.article }}<input style="display: none"></p>
                <p><strong>Цвет:</strong> {{ product.data.color }}<input style="display: none"></p>
                <p><strong>Размер:</strong>
                    <span v-if="!isProductEditing[product.id]">{{ product.data.size }}</span>
                    <input v-if="isProductEditing[product.id]" v-model="product.data.size"
                           value="{{ product.data.size }}">
                </p>
            </div>
            <div class="button-group">
                <button v-if="isProductEditing[product.id]">
                    Применить изменения
                </button>
                <p v-if="isProductEditing[product.id]"><small>P.S. Если вы <b>уже нажали</b> <i>"Применить изменения"</i>, кнопка <i>"Вернуть как было"</i> <b>не сработает</b>.</small></p>
                <button @click.prevent="this.changeData(product.id)" type="button" class="product-card-button-1">
                    Изменить
                </button>
                <button @click.prevent="getProductList" type="button" class="product-card-button-3">
                    Вернуть как было
                </button>
            </div>
        </div>
    </div>
</template>

<style scoped>

.button-group {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.product-cards {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 16px;
    padding: 20px;
}

.product-card {
    border: 1px solid #ccc;
    padding: 16px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.product-image {
    width: 100%;
    height: auto;
    border-radius: 8px;
}

.product-info h3 {
    margin: 10px 0;
}

.product-info p {
    margin: 5px 0;
    color: #555;
}
</style>
