<template>
    <div>
        <h3>Bilet Seçimi</h3>
        <div class="row" v-for="rate in rates" style="border-bottom: 1px solid #ddd; padding-top: 10px; padding-bottom: 10px;">
            <div class="col-md-5">
                <p style="margin-bottom: 0;"><strong>{{ rate.name }}</strong></p>
                <small>{{ rate.description }}</small>
            </div>
            <div class="col-md-4">
                <p><strong>{{ rate.price }} TL</strong></p>
            </div>
            <div class="col-md-3">
                <select :name="rate.id" :id="rate.id" class="form-control" v-on:change="updateCart(rate)">
                    <option v-for="n in rate.max_allowed_per_purchase" :value="n">{{ n }}</option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                event: [],
                rates: [],
                selected: [],
                key: '',
            }
        },

        mounted() {
            this.getEventInformation();
            this.getRates();
        },

        methods: {
            getEventInformation() {
                let eventID = $('meta[name=eventID]').attr("content");

                axios.get('/e/' + eventID)
                    .then(response => {
                        this.event = response.data;
                    });
            },

            getRates() {
                let eventID = $('meta[name=eventID]').attr("content");

                axios.get('/tickets/' + eventID)
                    .then(response => {
                        this.rates = response.data;
                    });
            },

            updateCart(rate) {
                let qty = $('#' + rate.id).val();

                this.selected.push({
                        id: rate.id,
                        event: rate.event_id,
                        name: rate.name,
                        description: rate.description,
                        qty: parseInt(qty)
                });

                let cart = this.selected;

                axios.post('/cart', {
                    cart
                })
                    .then(() => {
                        Event.$emit('cart-updated');
                    });

                this.selected = [];
            }
        }
    }
</script>