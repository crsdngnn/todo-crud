<template>
	<div class="container m-5 p-2 rounded mx-auto bg-light shadow">
    	<!-- App title section -->
	    <div class="row m-1 p-4">
	        <div class="col">
	            <div class="p-1 h1 text-primary text-center mx-auto display-inline-block">
	                <u>My Todos</u>
	            </div>
	        </div>
	    </div>

	    <!-- Create todo section -->
	    <div class="row m-1 p-3">
	        <div class="col col-11 mx-auto">
	            <div class="row bg-white rounded shadow-sm p-2 add-todo-wrapper align-items-center justify-content-center">
	                <div class="col">
	                    <input class="form-control form-control-lg border-0 add-todo-input bg-transparent rounded" type="text" placeholder="Add new description"
                               v-model="description"
                        >
	                </div>
	                <div class="col-auto px-0 mx-0 mr-2">
	                    <button type="button" class="btn btn-primary" @click="save()">Add</button>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="p-2 mx-4 border-black-25 border-bottom"></div>
	    <div class="row m-1 p-3 px-5 justify-content-end"></div>

	    <!-- Todo list section -->
	    <div class="row mx-1 px-5 pb-3 w-80">
	        <div class="col mx-auto">
	            <!-- Todo Items -->
	            <div class="row px-3 align-items-center todo-item rounded" v-for="(value, index) in data">
	                <div class="col px-1 m-1 d-flex align-items-center">
	                    <input type="text" class="form-control form-control-lg edit-todo-input rounded px-3"
                               v-model="value.description"
                               :readonly="value.id != editable_id"
                               v-on:keyup.enter="update(value.description, value.id)"
                        />
	                </div>
	                <div class="col-auto m-1 p-0 todo-actions">
	                    <div class="row d-flex align-items-center justify-content-end">
	                        <h5 class="m-0 p-0 px-2">
	                            <i class="fa fa-pencil text-info btn m-0 p-0" data-placement="bottom" title="Edit todo"
                                   @click="edit(value.id)"
                                ></i>
	                        </h5>
	                        <h5 class="m-0 p-0 px-2">
	                            <i class="fa fa-trash-o text-danger btn m-0 p-0" data-placement="bottom" title="Delete todo"
                                   @click="remove(value.id)"
                                ></i>
	                        </h5>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</template>
<script src="./todo.js"></script>
