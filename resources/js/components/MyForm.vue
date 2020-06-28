<template>
    <div class="container">
        <div class="row mb-4">
            <ul class="list-group" v-if="tasks">
                <li class="list-group-item" v-for="(task, index) in tasks" :key="index" v-text="task.name"></li>
            </ul>
            <h3 v-else>No tasks!</h3>
        </div>

        <div class="d-flex justify-content-center">
            <h3>Create a Task</h3>
        </div>

        <div>
            <form method="POST" @submit.prevent="createTask()" @keydown="form.errors.clear($event.target.name)">
                <div class="form-group">
                    <label for="name">name:</label>
                    <input type="text" v-model="form.name" name="name" id="name" :class="['form-control', {'is-invalid': form.errors.has('name')}]" placeholder="name">
                
                    <div class="invalid-feedback" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></div>
                </div>

                <div class="form-group">
                    <label for="description">description:</label>
                    <input type="text" v-model="form.description" name="description" id="description" :class="['form-control', {'is-invalid': form.errors.has('description')}]" placeholder="description">
                
                    <div class="invalid-feedback" v-if="form.errors.has('description')" v-text="form.errors.get('description')"></div>
                </div>
            
                <button type="submit" class="btn btn-primary" :disabled="form.errors.any()">Submit</button>
            </form>
        </div>
    </div>
</template>
<script>
import Form from './../form';

export default {
    data(){
        return {
            tasks: [],

            form: new Form({
                name: '',
                description: '',
            })
        }
    },

    methods:{
        createTask(){
            this.form.post('/tasks')
                .then((response)=>{
                    alert("Task has been created");
                    this.form.reset();
                    this.fetchTasks();
                })
                .catch((error)=>{
                    
                });
        },

        fetchTasks(){
            axios.get('/tasks')
                .then((response)=>{
                    this.tasks = response.data;
                });
        }
    },

    created(){
        this.fetchTasks();
    }
}
</script>