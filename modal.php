<!-- Add Modal -->
<div id="overlay" v-if="showAddModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title">Add New Task</span>
                <button class="close" type="button" @click="showAddModal=false">
                <span aria-hidden="true">&times;</span>
                </button>
            </div> 
            <div class="modal-body p-4">
                <div class="form-group">
                    <input type="text" name="task" class="form-control form-control-lg" placeholder="Task Name" v-model="newTasks.taskname" v-on:keyup="keymonitor">
                </div>
                <div class="form-group">
                    <input type="text" name="name" class="form-control form-control-lg" placeholder="Person" v-model="newTasks.name" v-on:keyup="keymonitor">
                </div>
                <div class="form-group">
                    <input type="text" name="description" class="form-control form-control-lg" placeholder="Desription" v-model="newTasks.description" v-on:keyup="keymonitor">
                </div>
                <div class="form-group">
                    <button class="c-btn float-right" @click="showAddModal = false; saveMember();">Save</button>
                </div>
            </div>
        </div>
    </div>
</div> 
<!-- Edit Modal -->
<div id="overlay" v-if="showEditModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title">Edit task</span>
                <button class="close " type="button" @click="showEditModal=false">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="form-group">
                    <input type="text" name="task" class="form-control form-control-lg" placeholder="Task Name" v-model="clickMember.taskname" v-on:keyup="keymonitor">
                </div>
                <div class="form-group">
                    <input type="text" name="name" class="form-control form-control-lg" placeholder="Person" v-model="clickMember.name" v-on:keyup="keymonitor">
                </div>
                <div class="form-group">
                    <input type="text" name="description" class="form-control form-control-lg" placeholder="Desription"  v-model="clickMember.description" v-on:keyup="keymonitor">
                </div>
                <div class="form-group">
                    <button class="c-btn float-right" @click="showEditModal=false; updateMember();">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Delete Modal -->
<div id="overlay" v-if="showDeleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-4">
                <h4 class="text-danger">Are you sure you want to delete the task?</h4>
                <h2 class="text-center">{{clickMember.name}}'s task: {{clickMember.taskname}} </h2>
                <hr>
                <button class="btn-delete btn-danger " @click="showDeleteModal=false; deleteMember(); ">Yes</button> &nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn-delete btn-success " @click="showDeleteModal=false">No</button>
            </div>
            </div>
        </div>
    </div>
</div>