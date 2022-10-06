var app = new Vue({
    el: '#app',
    data:{
        errorMessage: "",
		isSuccess: false,
		isError: false,
        successMessage: "",
        showAddModal: false,
        showEditModal: false,
        showDeleteModal: false,
        isOpen: false,
        tasks: [],
        newTasks: {taskaname: '', name: '', description: '', datetime: '', checked: ''},
        clickMember: {},
        active: false,
        disabled: false,
        pageNumber: 2
    },
    mounted: function(){
        this.getAllTasks();
    },
    methods:{

		keymonitor: function(event) {
       		if(event.key == "Enter"){
         		app.saveMember();
                app.updateMember();
        	}
       	},
        toggleCollapse: function(event) {
            e = event || window.event;
            e.target.parentElement.querySelector(".collapseDiv").classList.toggle("hidden");
        },
       

       getAllTasks: function(){
            axios.get('api.php?crud=read' )
                .then(function(response){
                    if(response.data.error){
                        app.errorMessage = response.data.message;
                    }
                    else{
                        app.tasks.push(...response.data.tasks);
                        app.rows = app.rows + response.data.length;
                    }
                });
        },
        loadNewTasks: function(){
            axios.get('api.php?crud=read', { params: { pageNumber: app.pageNumber } })
                .then(function(response){
                    if(response.data.error){
                        app.errorMessage = response.data.message;
                    }
                    else{
                        app.tasks.push(...response.data.tasks);
                        app.rows = app.rows + response.data.tasks.length;
                    }
                });
                app.pageNumber=app.pageNumber+1;
                axios.get('api.php?crud=read', { params: { pageNumber: app.pageNumber } })
                .then(function(response){
                    if(response.data.error){
                        app.errorMessage = response.data.message;
                    }
                    else{
                        if(response.data.tasks.length == 0) {
                             app.disabled=true;
                        }
                    }
                });
        },
     
        saveMember: function(){
            var memForm = app.toFormData(app.newTasks);
            axios.post('api.php?crud=create', memForm)
                .then(function(response){
                    if(response.data.error){
                        app.errorMessage = response.data.message;
						app.isError = true;
						app.isSuccess = false;
						app.successMessage = '';
						setTimeout(function(){
							app.clearMessage();
						},3000);
                    }
                    else{
                        app.isSuccess = true;
						app.isError = false;
						app.errorMessage = '';
						app.successMessage = response.data.message;
						app.newTasks = {taskname: '', name:'', description:''};
						//app.getAllTasks();
						setTimeout(function(){
							app.clearMessage();
                            window.location.reload();
						},3000);
                    }
                });
        },
 
        updateMember(){
            var memForm = app.toFormData(app.clickMember);
            axios.post('api.php?crud=update', memForm)
                .then(function(response){
                    // app.clickMember = {};
                    if(response.data.error){
                        app.errorMessage = response.data.message;
						app.isError = true;
						app.isSuccess = false;
						app.successMessage = '';
						setTimeout(function(){
							app.clearMessage();
                            window.location.reload();
						},3000);
                    }
                    else{
                        app.isSuccess = true;
						app.isError = false;
						app.errorMessage = '';
						app.successMessage = response.data.message;
						app.clickMember = {};
						// app.getAllTasks();
						setTimeout(function(){
							app.clearMessage();
                            
						},3000);
                    }
                });
        },
 
        deleteMember(){
            var memForm = app.toFormData(app.clickMember);
            axios.post('api.php?crud=delete', memForm)
                .then(function(response){
                    app.clickMember = {};
                    if(response.data.error){
                        app.errorMessage = response.data.message;
                    }
                    else{
                        app.successMessage = response.data.message
                        // app.getAllTasks();
                        setTimeout(function(){
							app.clearMessage();
                            window.location.reload();
						},3000);
                    }
                });
        },
 
        selectMember(tasks){
            app.clickMember = tasks;
        },
        selectTask(tasks){
            app.clickMember = tasks.taskname;
        },
        selectId(tasks){
            app.clickMember = tasks.id;
            app.active = true;
        },
 
        toFormData: function(obj){
            var form_data = new FormData();
            for(var key in obj){
                form_data.append(key, obj[key]);
            }
            return form_data;
        },
        clearMessage: function(){
			app.isError = false;
			app.isSuccess = false;
            app.errorMessage = '';
            app.successMessage = '';
		},

		clearForm: function(){
			app.newTasks=app.newTasks = {taskname: '', name:'', description:''};
		},
        collapse: function(obj) {
            
        }
        
    
    }
});