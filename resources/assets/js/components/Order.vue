<template>
    <div>
        <h3>Biletleriniz</h3>
        <p v-if="emptyCart">Devam Etmek İçin Lütfen Bilet Seçiniz!</p>
        <table class="table" v-if="!emptyCart">
            <thead>
            <tr>
                <th>Kategori</th>
                <th>Fiyat</th>
                <th>Adet</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in items">
                <td>{{ item.name }}</td>
                <td>{{ item.price }} TL</td>
                <td>{{ item.qty }}</td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="1"></td>
                <td>ARATOPLAM</td>
                <td>{{ subtotal }}</td>
            </tr>
            <tr>
                <td colspan="1"></td>
                <td>VERGİ</td>
                <td>{{ tax }}</td>
            </tr>
            <tr>
                <td colspan="1"></td>
                <td>TOPLAM</td>
                <td><strong>{{ total }}</strong></td>
            </tr>
            </tfoot>
        </table>
    </div>
</template>

<script>
    export default {
        created() {
            Event.$on('cart-updated', () =>
                this.getCartContent()
            )
        },

        computed: {
            emptyCart() {
                return this.items.length <= 0;
            }
        },

        data() {
            return {
                items: [],
                subtotal: '',
                tax: '',
                total: '',
            }
        },

        methods: {
            getCartContent() {
                axios.get('/cart')
                    .then(response => {
                        let cart = response.data;
                        this.resolveCartData(cart);
                    })
            },
            resolveCartData(cart) {
                this.items = cart[0];
                this.subtotal = cart[1];
                this.tax = cart[2];
                this.total = cart[3];
            }
        },

        mounted() {
            this.getCartContent();
        }
    }
</script>