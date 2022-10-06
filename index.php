<!DOCTYPE html>
<html>
   <head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="refresh" content="0"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap-vue/dist/bootstrap-vue.css" />

    <link rel="stylesheet" type="text/css" href="style.css">
   </head>
   <body>
      <div class="container" id="app">
         <div class="panel panel-default">
            <div class="panel-heading">
               <div class="block-title">
                  <h3 class="page-header text-center">TODO LIST</h3>
                  <button class="cnew float-right" @click="showAddModal=true">
                  <i class="fa-solid fa-file-circle-plus"></i>&nbsp;New Task </button>
               </div>
            </div>
            <div class="alert alert-danger text-center" v-if="errorMessage">
               <button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">×</span></button>
               {{ errorMessage }}
            </div>
            <div class="alert alert-success text-center" v-if="successMessage">
               <button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">×</span></button>
               {{ successMessage }}
            </div>
            <div id="product_list"  >
                    <div  v-for="member in tasks" class="product_item">
                        <div class="thumbnail">
                            <button @click="toggleCollapse( $event)">
                            {{member.taskname}}
                            </button>
                            <div class="caption">
                                <h5 class="card-subject">{{member.name}}</h5>
                                <div class="body"> 
                                    <a href="#" class="text-success" @click="showEditModal=true; selectMember(member);">
                                    <i class="fas fa-edit"></i></a>
                                    <a href="#" class="text-danger" @click="showDeleteModal=true; selectMember(member);">
                                    <i class="fas fa-trash-alt"></i></a>
                                    
                                </div>
                            </div>
                            
                           
                            <div class="hidden collapseDiv">
                            <p> {{member.description}}</p>
                            <br>
                            <p> {{member.datetime}}</p>
                            <br>
                            </div>
                        </div>
                </div>  
            </div>
            <div  v-if="!disabled">
            <button @click="loadNewTasks();" class="btn load" style="float:right;">Load more</button>
           </div>
           <div  v-if="disabled">
            <button @click="loadNewTasks(); " disabled class="disabled btn" style="float:right; ">Load more</button>
           </div>


            
        </div>
        <?php include('modal.php'); ?>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
      <script src="https://unpkg.com/@ivanv/vue-collapse-transition"></script>
      <script src="https://kit.fontawesome.com/53ac94783b.js" crossorigin="anonymous"></script>
      <script src="app.js"></script>
    </body>
</html>