<template>
    <div>
        <button class="btn btn-primary" @click="$modal.show('contact-support-modal')">Support</button>

        <v-dialog/>

        <button class="btn btn-dark" @click="showDialog()">Show Dialog</button>

        <modal name="contact-support-modal"
            height="auto"
            width="100%">

            <div class="columns p-8">
                <div class="column"></div>
                <div class="column">
                    <h1 class="text-center">Have a Question?</h1>

                    <form autocomplete="off"
                        @submit.prevent="contactSupport"
                        style="padding:8px;">

                        <div class="control field">
                            <input type="text" 
                                name="name" 
                                id="name"
                                class="input form-control"
                                placeholder="Name"
                                v-model="message.name"
                                @keydown="delete errors.name">

                                <span class="text-danger" v-text='errors.name[0]' v-if="errors.name"></span>
                        </div>
                        <div class="control field">
                            <input type="text" 
                                name="email" 
                                id="email"
                                class="input form-control"
                                placeholder="Email"
                                v-model="message.email"
                                @keydown="delete errors.email">

                                <span class="text-danger" v-text='errors.email[0]' v-if="errors.email"></span>
                        </div>
                        <div class="control field">
                            <textarea name="message" id="message" rows="5" class="form-control w-100"
                                placeholder="Your message" 
                                v-model="message.message"
                                @keydown="delete errors.message"></textarea>

                                <span class="text-danger" v-text='errors.message[0]' v-if="errors.message"></span>
                        </div>
                        <div class="field flex justify-content-end">
                            <button class="button is-warning mr-2" type="button"
                                @click="hideForm()">
                                Cancel
                            </button>
                            <button :class="this.submited ? 'button is-primary is-loading':'button is-primary'" type="submit">Send</button>
                        </div>
                    </form>
                </div>
                <div class="column"></div>
            </div>
        </modal>
    </div>
</template>

<script>
// ES6 Modules or TypeScript
import Swal from 'sweetalert2';

export default {
    data(){
        return {
            message: {},
            errors: {},
            submited: false,
        }
    },
    methods:{
        contactSupport(){
            this.submited = true;
            
            axios.post('/support', this.message)
                .then(response => {
                    this.hideForm();

                    Swal.fire(
                        'Succesfuly',
                        'Message sent!',
                        'success'
                    );
                })
                .catch(errors => {
                    this.errors = errors.response.data.errors;
                    this.submited = false;
                });
        },

        resetForm(){
            this.message = {};
            this.errors = {};
            this.submited = false;
        },
        hideForm(){
            this.$modal.hide('contact-support-modal');
            this.resetForm();
        },

        showDialog(){
            this.$modal.show('dialog', {
                title: 'Alert!',
                text: 'You are too awesome',
                buttons: [
                    {
                        title: 'Deal with it',
                        handler: () => { alert('Woot!') }
                    },
                    {
                        title: '',       // Button title
                        default: true,    // Will be triggered by default if 'Enter' pressed.
                        handler: () => {} // Button click handler
                    },
                    {
                        title: 'Close'
                    }
                ]
            });
        }
    }
}
</script>