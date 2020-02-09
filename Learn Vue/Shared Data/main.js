let source = {
    user: {
        name: "Burim",
        email: "burim@burim.com"
    }
};

new Vue({
    el: '#app',
    data: {
        shared: source,
        test: "Testing"
    }
});

new Vue({
    el: '#other',
    data: {
        shared: source
    }
});