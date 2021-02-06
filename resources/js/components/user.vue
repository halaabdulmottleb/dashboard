<template>
    <div class="userCpmonent">
        {{year}}
        <!-- select user -->
        <div class="row">
            <div class="col-md-5">
                select User
                <select class="form-control" v-model="userSelect" @change="fetch()">
                    <option v-for="user in users.data" :value="user"> {{user.name}} - {{user.email}}</option>
                </select>
            </div>
            <div class="col-md-4">
                select Year
                <input class="form-control" type="number" placeholder="enter year" v-model="year" @change="fetch()" />
                <small>Please enter a year like 2020</small>
            </div>
        </div>

        <hr />


        <!-- end sekect user-->
        <!-- first row -->
        <div class="row">
            <!-- basic information coloumn-->
            <div class="col-md-4">
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title mb-4">Basic Information <button class="btn btn-primary float-right" @click="editUser(userSelect)">Edit</button></h5>
                        <hr>
                        <p>Name:    {{userSelect.name}}</p>
                        <p>Email:   {{userSelect.email}}</p>
                        <p>Branch:  {{branch}}</p>
                        <p>Address: {{userSelect.address}}</p>
                        <p>Mobile:  {{userSelect.mobile}}</p>


                    </div>
                </div>
            </div>
            <!-- statistics and papers -->
            <div class="col-md-6 ">
                <div class="row">
                    <div class="col-md-12">
                        <CChartLine :datasets="defaultDatasets"
                                    labels="months" />
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Papers
                            </div>
                            <div class="card-body">
                                <ul>

                                    <li v-for="paper in papers">
                                        <a :href="'/dashboard/structure/downloadPaper/' + paper.destination">

                                            <i>{{paper.paper}} </i>
                                        </a>
                                        <small style="color: grey">{{paper.created_at}}</small>
                                    </li>


                                </ul>



                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- end basic information coulmn -->

        </div>

        <!-- end first row -->
        <!-- second row tables-->
        <div class="row">
            <div class="col-md-10 offset-md-1 mt-4">
                <div style="overflow-x:auto; overflow-y: auto;
                      height:500px;">
                    <table class="table table-bordered table-fixed"
                           style="width:1500px;
                         padding:2px;">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>project</th>
                                <th>branch</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Done Quantity</th>
                                <th>Urgency</th>
                                <th>Due Date</th>
                                <th>Late Date</th>
                                <th>Status</th>
                                <th>Task Approved</th>
                                <th>Status Approved</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="task in tasks" v-bind:key="task.id">

                                <td>{{task.id}}</td>
                                <td>{{task.project}}</td>
                                <td>{{task.branch}}</td>
                                <td>{{task.description}}</td>
                                <td>{{task.quantity}}</td>
                                <td>{{task.doneQuantity}}</td>
                                <td v-if=" task.urgency == 1">less important</td>
                                <td v-else-if=" task.urgency ==  2">important</td>
                                <td v-else>normal</td>
                                <td> {{task.dueDate}} </td>
                                <td> {{task.lateDate}}</td>
                                <td> {{task.status}}</td>
                                <td v-if=" task.isApproved == 1"> Approved  </td>
                                <td v-else> Not Approved  </td>
                                <td v-if="task.statusApproved ==1 ">Approved </td>
                                <td v-else>Not Approved </td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <!-- end second row -->
        <!--Edit Modal -->
        <div class="modal" tabindex="-1" role="dialog" id="modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> {{userSelect.name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="updateUser">                        
                               <div class="form-group">
                                    <label for="userNameInput">Name</label>
                                    <input type="text" class="form-control" id="userNameInput" v-model ="userSelect.name">
                                </div>
                               <div class="form-group">
                                    <label for="userEmailInput">Email</label>
                                    <input type="email" class="form-control" id="userEmailInput" v-model ="userSelect.email">
                                </div>
                               <div class="form-group">
                                    <label for="userNameInput">Address</label>
                                    <input type="text" class="form-control" id="userNameInput" v-model ="userSelect.address">
                                </div>
                               <div class="form-group">
                                    <label for="userMobileInput">Mobile</label>
                                    <input type="number" class="form-control" id="userNameInput" v-model ="userSelect.mobile">
                                </div>
                                <div class="form-group">
                                    <label for="userMobileInput">Branch</label>
                                   <select v-model="userSelect.branch" class="form-control">
                                       <option v-for="branch in branches.data" v-bind:key="branch.id" :value="branch.id">{{branch.name}}</option>
                                   </select>
                                </div>
                               
                                <button type="submit" class="btn btn-primary float-right">Submit</button>                           
                        </form>
                        
                    </div>
                    <div class="modal-footer">
                       
                       
                    </div>
                </div>
            </div>
        </div>

        <!-- end edit modal -->

    </div>

</template>
<script type="text/javascript">
    export default {
        data() {
            return {
                users: [],
                branches:[],
                userSelect: '',
                year:2020,
                tasks: [],
                papers: [],
                branch: '',
                tasksJunu: 0,
                tasksfeb:0 , 
                tasksMar: 0 , 
                tasksApr: 0 , 
                tasksMay: 0 , 
                tasksJun: 0 , 
                tasksJul: 0 , 
                tasksAug: 0 , 
                tasksSep: 0 , 
                tasksOct: 0 , 
                tasksNov: 0 , 
                tasksDec: 0,
                userAddress: '',
                user: {
                    name: '',
                    email: '',

                },
                delayedTasks :[],
                canceledTasks :[],
                doneTasks :[],
            }
        },

        methods: {
            fetchUsers() {
                axios.get('/api/users').then(res => {
                    if (res.status == 200) {
                        this.users = res.data;
                    }
                }).catch(err => {
                    console.log(err)
                });
            },
            fetchBranches() {
                axios.get('/api/branches').then(res => {
                    if (res.status == 200) {
                        this.branches = res.data;
                    }
                }).catch(err => {
                    console.log(err)
                });
            },
            fetchTasks() {
                axios.get(`/api/user/tasks/${this.userSelect.id}/${this.year}`).then(res => {
                    if (1) {
                        this.tasks = res.data.tasks;
                        this.papers = res.data.papers;
                        this.branch = res.data.branch;
                        this.userAddress = res.data.userAddress;
                        this.tasksJunu = res.data.tasksJunu;
                        this.tasksfeb = res.data.tasksfeb;
                        this.tasksMar = res.data.tasksMar;
                        this.tasksApr = res.data.tasksApr;
                        this.tasksMay = res.data.tasksMay;
                        this.tasksJun = res.data.tasksJun;
                        this.tasksJul = res.data.tasksJul;
                        this.tasksAug = res.data.tasksAug;
                        this.tasksSep = res.data.tasksSep;
                        this.tasksOct = res.data.tasksOct;
                        this.tasksNov = res.data.tasksNov;
                        this.tasksDec = res.data.tasksDec;
                        this.doneTasks = res.data.done;
                        this.delayedTasks = res.data.delayed;
                        this.canceledTasks = res.data.canceled;


                    }
                }).catch(err => {
                    console.log(err)
                });
            },


            fetch() {
                this.fetchTasks();
            },
            editUser(user) {
                $('#modal').modal()
            },
         
            updateUser() {
                fetch(`/api/editUser`, {
                    method: 'put',
                    body: JSON.stringify(this.userSelect),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                    .then(res => res.json())
                    .then(data => {
                      
                        $('#modal').modal('hide')
                    })
                    .catch(err => console.log(err));
            }
        },

        created() {
            this.fetchUsers();
            this.fetchBranches();
           
        },
            
        computed: {
          
            defaultDatasets() {
               
               return [
                 {
                   label: 'All',
                   backgroundColor: 'grey',
                       data: [this.tasksJunu, this.tasksfeb, this.tasksMar, this.tasksApr, this.tasksMay, this.tasksJun, this.tasksJul, this.tasksAug, this.tasksSep, this.tasksOct, this.tasksNov, this.tasksDec]
                 } , 
                 {
                   label: 'Done',
                   backgroundColor: 'green',
                       data: [this.doneTasks.tasksJunu, this.doneTasks.tasksfeb, this.doneTasks.tasksMar, this.doneTasks.tasksApr, this.doneTasks.tasksMay, this.doneTasks.tasksJun, this.doneTasks.tasksJul, this.doneTasks.tasksAug, this.doneTasks.tasksSep, this.doneTasks.tasksOct, this.doneTasks.tasksNov, this.doneTasks.tasksDec]
                 } , 
                 
                   {
                   label: 'Delayed',
                   backgroundColor: 'orange',
                       data: [this.delayedTasks.tasksJunu, this.delayedTasks.tasksfeb, this.delayedTasks.tasksMar, this.delayedTasks.tasksApr, this.delayedTasks.tasksMay, this.delayedTasks.tasksJun, this.delayedTasks.tasksJul, this.delayedTasks.tasksAug, this.delayedTasks.tasksSep, this.delayedTasks.tasksOct, this.delayedTasks.tasksNov, this.delayedTasks.tasksDec]
                 } , 
                 
                 {
                   label: 'cancled',
                   backgroundColor: 'red',
                       data: [this.canceledTasks.tasksJunu, this.canceledTasks.tasksfeb, this.canceledTasks.tasksMar, this.canceledTasks.tasksApr, this.canceledTasks.tasksMay, this.canceledTasks.tasksJun, this.canceledTasks.tasksJul, this.canceledTasks.tasksAug, this.canceledTasks.tasksSep, this.canceledTasks.tasksOct, this.canceledTasks.tasksNov, this.canceledTasks.tasksDec]
                 } , 
                 
                
               ]
             }
 
	 	 }

	 }

</script>
