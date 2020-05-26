export default{
    state: {
        count: 100,
    },

    mutations: {
        increment(state){
            state.count++;
        },
        decrement(state){
            state.count--;
        },
    }
}