<template>
    <div>
        <coupon v-model="coupon"></coupon>
    </div>
</template>
<script>
import Coupon from './Coupon';

export default {
    components: { Coupon },
    data(){
        return {
            coupon: 'Hello'
        }
    },
}
</script>