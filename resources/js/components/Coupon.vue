<template>
    <input type="text" class="form-control" ref="input" :value="code" @input="changeValue($event.target.value)">
</template>
<script>
export default {
    props: ['code'],
    data(){
        return {
            coupons: [
                'AllFree',
                '20of',
                'shoesof'
            ]
        }
    },
    methods: {
        changeValue(value){
            if(this.coupons.includes(value)){
                alert("Coupon is used!");
                
                this.$refs.input.value = value = '';

            }

            this.$emit('input', value);
        }
    }
}
</script>