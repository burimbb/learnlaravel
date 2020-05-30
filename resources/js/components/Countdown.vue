<template>
    <div>
        <div class="alert">
            <div v-if="finished">
                <div class="alert-danger">
                    <span v-text="this.expiredTxt"></span>
                </div>
            </div>
            <div class="alert-success" v-else>
                <span v-text="remaining.days"></span> Days
                <span v-text="remaining.hours"></span> Hours
                <span v-text="remaining.minutes"></span> Minutes
                <span v-text="remaining.seconds"></span> Seconds Left...
            </div>
        </div>
    </div>
</template>
<script>
import moment from 'moment';

export default {
    props: {
        until: String,
        expiredTxt: {
            default: 'Coupon has expired!'
        }
    },

    data(){
        return {
            now: new Date(),
        }
    },

    created(){
        let interval = setInterval(()=>{
            this.now = new Date();
        }, 1000);

        this.$on('finished', ()=>{
            clearInterval(interval);
        });
    },

    computed:{
        finished(){
            return this.remaining.total <= 0;
        },

        remaining(){
            let remaining = moment.duration(Date.parse(this.until) - this.now);

            if(remaining <= 0){
                this.$emit('finished');
            }

            console.log('remaining called!');

            return {
                total: remaining, 
                days: remaining.days(), 
                hours: remaining.hours(), 
                minutes: remaining.minutes(), 
                seconds: remaining.seconds(), 
            };
        }
    }
}
</script>