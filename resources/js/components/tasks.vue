<template>
    <div>
              

        <div class="alert alert-danger text-center" v-show="false">
            {{statusApproveFilter}}
        </div>

          <div class="row">
            <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                      <div class="row">
                        <div class="col-md-3">
                            All :  {{filter.length}}
                        </div>
                        <div class="col-md-3">
                            Done : {{doneFilter.length}}
                        </div>
                        <div class="col-md-3">
                            Delay : {{delayFilter.length}}
                        </div>
                        <div class="col-md-3">
                            Canceled : {{cancelFilter.length}}
                        </div>
                        
                      </div>
                    
                  </div>
                </div>
            </div>
          </div>

        <!-- status approval filter  -->
        <div class="row">
            <div class="col-md-11 ml-1">
                <div class="row">
                    <div class="col-md-4 mt-4 ">
                        <label>Approved/Pending : </label>
                        <div class="btn-group" data-toggle="buttons">
                            <select class="form-control" v-model="statusApproveFilter">
                                <option value="all">All</option>
                                <option value="1">Done</option>
                                <option value="0">pending</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4 ">
                        <label>Urgency: </label>
                        <div class="btn-group" data-toggle="buttons">
                            <select class="form-control" v-model="urgencyFilter">
                                <option value="all">All</option>
                                <option value="2">important</option>
                                <option value="1">less important</option>
                                <option value="0">normal</option>
                            </select>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
        <!-- end status approval filter -->
        <!-- search -->
        <div class="row">
            <div class="col-md-11 ml-1">
                <div class="row">
                    <div class="col-md-4 mt-4">
                        <label>status</label>
                        <select class="form-control" id="statusFilterSelect" v-model="statusFilter">
                            <option value="">All</option>
                            <option value="done">Done</option>
                            <option value="transfer">transfer</option>
                            <option value="late">Late</option>
                            <option value="delayed">Delayed</option>
                            <option value="canceled">canceled</option>

                        </select>
                    </div>
                    
                    <div class="col-md-4 mt-4">
                        <label>From:</label>
                        <input class="form-control" id="myInput" type="date" v-model="fromDate" @change ="fetchtasks()">
                    </div>
                    <div class="col-md-4 mt-4">
                        <label>To</label>
                        <input class="form-control" id="myInput" type="date"  v-model="toDate"  @change ="fetchtasks()">
                    </div>
                </div>
            </div>
        </div>
         <div class="row">
            <div class="col-md-11 ml-1">
                <div class="row">
                    <div class="col-md-3 mt-4">
                        <label>Branch</label>
                        <select class="form-control" id="statusFilterSelect" v-model="branchFilter">
                            <option value="all">All</option>
                            <option v-for="branch in branches.data" v-bind:key="branch.id" >{{branch.name}}</option>
                          

                        </select>
                    </div>
                      <div class="col-md-3 mt-4">
                        <label>Projects</label>
                        <select class="form-control" id="statusFilterSelect" v-model="projectFilter">
                            <option value="all">All</option>
                            <option v-for="project in projects.data" v-bind:key="project.id" >{{project.name}}</option>
                          

                        </select>
                    </div>
                    
                   
                    
                    <div class="col-md-6 mt-4">
                        <label>User</label>
                        <select class="form-control" id="statusFilterSelect" v-model="userFilter">
                            <option value="all">All</option>
                            <option v-for="user in users.data" v-bind:key="user.id" >{{user.name}}</option>
                          

                        </select>
                    </div>
                    
                   
                </div>
            </div>
        </div>



        <!-- end search -->
       
        <!--  Table of tasks -->
        <div class="row mt-4 mb-4">
            <div class="col-md-12">
                <div style="overflow-x:auto; overflow-y: auto;
    height:500px;">
                    <table class="table table-bordered table-fixed"
                           style="width:1500px;
            padding:2px;">
                        <tr>
                            <th>id</th>
                             <th>Description</th>
                            <th>project</th>
                            <th>Brnach</th>
                            <th>Responsibilty</th>
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
                            <tr v-for="task in filter" v-bind:key="task.id" @dblclick="whichFunction(task)">

                                <td>{{task.id}}</td>
                                 <td>{{task.description}}</td>
                                <td>{{task.project}}</td>
                                <td>{{task.branch}}</td>
                                <td>{{task.reponsibilty}}</td>                               
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
        <!-- end Table of tasks -->
      
        <!-- edit tasks moda -->
        <div class="modal" tabindex="-1" role="dialog" id="modaaal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="updatetask" class="mb-3">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Description" v-model="task.description">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="Quantity" v-model="task.quantity">
                            </div>


                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="Done Quantity" v-model="task.doneQuantity">
                            </div>

                            <div class="form-group">

                                <select class="form-control" v-model="task.urgency">

                                    <option value="2">important</option>
                                    <option value="1">less important</option>
                                    <option value="0">normal</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="Date" class="form-control" placeholder="Due Date" v-model="task.dueDate">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Is Approved" v-model="task.isApproved">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="status Approved" v-model="task.statusApproved">
                            </div>


                            <button type="submit" class="btn btn-light btn-block">Save</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!--  end edit tasks moal -->
        <!-- end modal for add new task-->
        <!-- modal for add new task-->
        <!-- Modal -->
        <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="myModal">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">

                    <button class="btn  btn-success" @click="edittask()">Update</button>
                    <button class="btn  btn-danger" @click="deletetask(task.id)">Delete</button>
                </div>
            </div>
        </div>
        <!-- end modal for add new task-->
    </div> 
</template>

<script>
   
    export default {

        data() {
              const pie = {
    labels: [
      'Red',
      'Green',
      'Yellow',
    ],
    datasets: [
      {
        data: [300, 50, 100],
        backgroundColor: [
          '#FF6384',
          '#36A2EB',
          '#FFCE56',
        ],
        hoverBackgroundColor: [
          '#FF6384',
          '#36A2EB',
          '#FFCE56',
        ],
      }],
  };

          
            return {
                tasks: [],
                task: {
                    id: '',
                    description :'' ,
                    quantity : '' ,
                    doneQuantity : '' ,
                    urgency : '' , 
                    dueDate : '' ,
                    status : '' ,
                    isApproved : '' , 
                    statusApproved:'' , 
       
                },

                branches:[],
                branchFilter: 'all',
                projects:[],
                projectFilter : 'all',
                users:[],
                userFilter : 'all',
                fromDate:'2019-12-31',
                toDate:'2021-12-31',

                statusFilter :'',
                statusApproveFilter : 'all' ,
                searchText :'',
                urgencyFilter : 'all',
                jops : [],
                id: '',
                filterText: '',
                filterJop: 'all',
                removelines: 'all',
                warningModal: false,
                editModal : false,
                msgShow: false,
                deletedMsg: '',
                sortNameFlag: false,
                sortJopFlag:false ,
                pagination: {},
                edit: false
            };
        },
        computed: {

            filter() {
               
                return this.filterByStatus(
                    this.filterBystatusApproved(
                        this.filterBystatusApproved(
                            this.filterByBranch(
                               this.filterByProject(
                                 this.filterByUser(
                                    this.filterByUrgency(
                                        this.tasks
                                    )))))));
            },
            doneFilter(){
               
                return this.filterByStatus(
                    this.filterBystatusApproved(
                        this.filterBystatusApproved(
                            this.filterByBranch(
                               this.filterByProject(
                                 this.filterByUser(
                                    this.filterTasksByDone(
                                        this.filterByUrgency(
                                            this.tasks
                                        ))))))));
            },
            cancelFilter(){
               
                return this.filterByStatus(
                    this.filterBystatusApproved(
                        this.filterBystatusApproved(
                            this.filterByBranch(
                               this.filterByProject(
                                 this.filterByUser(
                                    this.filterTasksBycancel(
                                        this.filterByUrgency(
                                            this.tasks
                                        ))))))));
            },
            delayFilter(){
               
                return this.filterByStatus(
                    this.filterBystatusApproved(
                        this.filterBystatusApproved(
                            this.filterByBranch(
                               this.filterByProject(
                                 this.filterByUser(
                                    this.filterTasksBydelay(
                                        this.filterByUrgency(
                                            this.tasks
                                        ))))))));
            },

             defaultDatasets () {
               return [
                 {
                   label: 'Data One',
                   backgroundColor: 'rgb(228,102,81,0.9)',
                   data: [30, 39, 10, 50, 30, 70, 35]
                 },
                 {
                   label: 'Data Two',
                   backgroundColor: 'rgb(0,216,255,0.9)',
                   data: [39, 80, 40, 35, 40, 20, 45]
                 }
               ]
             }
 
            
        },
        
        created() {
            this.fetchtasks();
            this.loadBranches();
            this.loadProjects();
            this.loadUsers();
        },
        mounted() {
            
        },
        methods: {
            whichFunction(task) {
                this.task = task;
                $("#myModal").modal();
            },
            sortNameFunction() {
                this.sortJopFlag = false;
                this.sortNameFlag = !this.sortNameFlag;
                
            },
            sortJopFunction() {
                this.sortNameFlag = false;
                this.sortJopFlag = ! this.sortJopFlag
            },

            filterByStatus(tasks) {
                // return the whole list if there is no filter value
                if (this.statusFilter == "") return tasks
                // otherwise return the list filtered by gender
                return tasks.filter(el => el.status == this.statusFilter)
            },
           filterBystatusApproved(tasks){
                if (this.statusApproveFilter == "all") return tasks

                return tasks.filter(el => el.isApproved == this.statusApproveFilter )
            },
            filterByText(tasks) {
                if(this.searchText == "") return tasks 
                return tasks.filter(el => el == this.searchText)
            },
            filterByUrgency(tasks) {
                if(this.urgencyFilter == "all") return tasks 
                return tasks.filter(el => el.urgency == this.urgencyFilter)
            },
             filterByBranch(tasks) {
                if(this.branchFilter == "all") return tasks 
                return tasks.filter(el => el.branch == this.branchFilter)
            },
             filterByProject(tasks) {
                if(this.projectFilter == "all") return tasks 
                return tasks.filter(el => el.project == this.projectFilter)
            },
              filterByUser(tasks) {
                if(this.userFilter == "all") return tasks 
                return tasks.filter(el => el.reponsibilty == this.userFilter)
            },
            //filter by done , late , delay , clancel to show statistics 
            filterTasksByDone(tasks) {
                return tasks.filter(el => el.status == 'done')
            },

              filterTasksBydelay(tasks) {
                return tasks.filter(el => el.status == 'delayed')
            },

              filterTasksBycancel(tasks) {
                return tasks.filter(el => el.status == 'canceled')
            },           
            sortedArrayByName(tasks) {
                if (!this.sortNameFlag) return this.tasks
                return tasks.sort((a, b) => (a.name > b.name) ? 1 : -1)
            },
             sortedArrayByJop(tasks) {
                 if (!this.sortJopFlag) return this.tasks
                return tasks.sort((a, b) => (a.jop > b.jop) ? 1 : -1)
            },
            loadJops: function () {
                axios.get('/api/tasks/jops').then(res => {
                    if (res.status == 200) {
                        this.jops = res.data;
                    }
                }).catch(err => {
                    console.log(err)
                });
            },
            loadBranches(){
                 axios.get('/api/branches').then(res => {
                    if (res.status == 200) {
                        this.branches = res.data;
                    }
                }).catch(err => {
                    console.log(err)
                });
            },
            loadProjects(){
                 axios.get('/api/projects').then(res => {
                    if (res.status == 200) {
                        this.projects = res.data;
                    }
                }).catch(err => {
                    console.log(err)
                });
            },
            loadUsers(){
                 axios.get('/api/users').then(res => {
                    if (res.status == 200) {
                        this.users = res.data;
                    }
                }).catch(err => {
                    console.log(err)
                });
            },
            
            fetchtasks(page_url) {
                fetch(`/api/tasks/${this.fromDate}/${this.toDate}`)
                    .then(res => res.json())
                    .then(res => {
                        this.tasks = res;
                        
                    })
                    .catch(err => console.log(err));
            },
            makePagination(meta, links) {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };
                this.pagination = pagination;
            },
            deletetask(id) {
               if(confirm( "Are you sure to delete this Task ?"))                    
                {axios.delete(`/api/task/${id}`)
                .then(data => {
                           // alert('user Removed');
                           
                            this.fetchtasks();
                        }).catch(err => {
                    console.log(err)
                     
                });
                        
                }
                $('#myModal').modal('hide');
            },
           
            updatetask() {       
                    // Update
                    fetch(`/api/task`, {
                        method: 'put',
                        body: JSON.stringify(this.task),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    
                        .then(data => {
                            console.log(data);
                            this.clearForm();
                            this.fetchtasks();
                            
                        })
                        .catch(err => console.log(err));
                
            },
            edittask(task) {
              
                 $('#myModal').modal('hide');
                 $("#modaaal").modal();

            },
            clearForm() {
                    id = '';
                    description = '' ;
                    quantity  = '' ;
                    doneQuantity  = '' ;
                    urgency  = '' ; 
                    dueDate  = '' ;
                    status  = '' ;
                    isApproved  = '' ; 
                    statusApproved= '' ; 
            },


            //////
        }
    };
     
</script>

