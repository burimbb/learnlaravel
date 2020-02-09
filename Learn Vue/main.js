Vue.component('task-list', {
    template: '<div><task v-for="task in tasks">{{task.description}}</task>',

    
    data(){
        return {
            tasks: [
                {description: 'Teest', completed: false},
                {description: 'Teest1', completed: true},
                {description: 'Teest2', completed: false},
                {description: 'Teest3', completed: true},
                {description: 'Teest4', completed: true},
            ]
        }
    }
});

Vue.component('task', {
    template: "<div>Task: <slot></slot> !</div>",
});

var cp = new Vue({
    el: "#app"
});