import TodoService from "../../../service/public/todo/todo.service";
import swal from 'sweetalert';

const todoService = new TodoService();

export default {
    data: function () {
        return {
            data: {
                description: '',
            },
            description: '',
            editable_id: ''
        }
    },
    mounted() {
        this.initialize();
    },
    methods:{
        list: function() {
            todoService.list().then(response => {
                this.data = response.data.data;
            });
        },
        save: function() {
            todoService.store({'description': this.description}).then(response => {
                this.successSwal(response.data.message)
                this.list();
                this.description='';
            }, fail => {
                let errors = fail.response.data.errors;
                Object.entries(errors).forEach(([key, value]) => {
                    this.errorSwal(value)
                });
            });
        },
        remove: function(id) {
            todoService.delete(id).then(response => {
                this.successSwal(response.data.message)
                this.list();
            });
        },
        update: function(data,id){
            todoService.update(id, {'description': data}).then(response => {
                this.successSwal(response.data.message)
                this.editable_id = '';
                this.list();
            }, fail => {
                let errors = fail.response.data.errors;
                Object.entries(errors).forEach(([key, value]) => {
                    this.errorSwal(value)
                });
            });
        },
        edit: function(id){
            this.editable_id = id;
        },
        successSwal: function(message){
            swal({
                title: message,
                icon: "success",
            });
        },
        errorSwal: function(message){
            swal({
                title: message,
                icon: "warning",
                dangerMode: true,
            });
        },
        initialize: function() {
            this.list();
        }
    }
}
