export default{
    state: {
        count: 100,
    },

    getters: {
        sqrt(state){
            return Math.sqrt(state.count);
        }
    },

    mutations: {//syncronise
        increment(state){
            state.count++;
        },
        decrement(state){
            state.count--;
        },
    },

    actions: {
        increment(context){
            setTimeout(()=> {
                context.commit('increment');
            }, 3000);
        },
    }
}