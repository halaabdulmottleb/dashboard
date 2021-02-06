<template>
    <div id="statisticsComponent">
        <!-- urgency -->        
        <div class="row" id="urgencyDiv">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-2">
                        <div class="square" style="background-color:#f2dede;"></div>
                    </div>
                    <div class="col-md-2">
                        IMPORTANT
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="square" style="background-color:#fcf8e3;"></div>
                    </div>
                    LESS IMPORTANT

                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="square" style="background-color: #dff0d8;"></div>
                    </div>
                    <div class="col-md-2">
                        NORMAL
                    </div>

                </div>

            </div>
        </div>
        <!-- end urgency -->

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-white p-4 mb-3" style="background-color:#343a40">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="p-card"><b>{{statisticsData.userCount}}</b></p>
                            <p class="p-card">Users </p>

                        </div>
                        <div class="col-md-4 p-4 pr-4">
                        </div>


                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white p-4 mb-3" style="background-color:#343a40">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="p-card"><b>{{statisticsData.brnachCount}}</b></p>
                            <p class="p-card">Branches </p>

                        </div>
                        <div class="col-md-4 p-4 pr-4">
                        </div>


                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white  p-4 mb-3" style="        background-color: #343a40">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="p-card"><b>{{statisticsData.tasksCount}}</b></p>
                            <p class="p-card">Tasks </p>

                        </div>
                        <div class="col-md-4 p-4 pr-4">
                        </div>


                    </div>
                </div>
            </div>




        </div>

        <!-- charts -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card text-center">
                    <div class="card-header" style="background-color: #343a40 ; border-color:#343a40">
                        <div class="row">
                            <div class="col-md-2 ">
                                <input class="form-control text-center" v-model="year" @change="fetch()" />
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <CChartLine :datasets="defaultDatasets"
                                            labels="months" />
                            </div>

                        </div>

                    </div>
                    <div class="card-footer " style="background-color: #343a40 ; border-color:#343a40">
                        <div class="row">

                            <div class="col-md-3">
                                <p>Done :</p>
                                <CProgress :value="statisticsData.dataUrgency.done2"
                                           color="#f2dede"
                                           show-value
                                           style="height:15px;"
                                           class="mt-1" />
                                <CProgress :value="statisticsData.dataUrgency.done1"
                                           color="#fcf8e3"
                                           show-value
                                           style="height:15px;"
                                           class="mt-1" />
                                <CProgress :value="statisticsData.dataUrgency.done0"
                                           color=" #dff0d8"
                                           show-value
                                           style="height:15px;"
                                           class="mt-1" />



                            </div>


                            <div class="col-md-3">
                                <p> Canceled :</p>
                                <CProgress :value="statisticsData.dataUrgency.cancel2"
                                           color="#f2dede"
                                           show-value
                                           style="height:15px;"
                                           class="mt-1" />
                                <CProgress :value="statisticsData.dataUrgency.cancel1"
                                           color="#fcf8e3"
                                           show-value
                                           style="height:15px;"
                                           class="mt-1" />
                                <CProgress :value="statisticsData.dataUrgency.cancel0"
                                           color=" #dff0d8"
                                           show-value
                                           style="height:15px;"
                                           class="mt-1" />



                            </div>


                            <div class="col-md-3">
                                <p>Late :</p>
                                <CProgress :value="statisticsData.dataUrgency.late2"
                                           color="#f2dede"
                                           show-value
                                           style="height:15px;"
                                           class="mt-1" />
                                <CProgress :value="statisticsData.dataUrgency.late1"
                                           color="#fcf8e3"
                                           show-value
                                           style="height:15px;"
                                           class="mt-1" />
                                <CProgress :value="statisticsData.dataUrgency.late0"
                                           color=" #dff0d8"
                                           show-value
                                           style="height:15px;"
                                           class="mt-1" />



                            </div>


                            <div class="col-md-3">
                                <p>Delayed :</p>
                                <CProgress :value="statisticsData.dataUrgency.delay2"
                                           color="#f2dede"
                                           show-value
                                           style="height: 15px;"
                                           class="mt-1" />
                                <CProgress :value="statisticsData.dataUrgency.delay1"
                                           color="warning"
                                           show-value
                                           style="height:15px;"
                                           class="mt-1" />
                                <CProgress :value="statisticsData.dataUrgency.delay0"
                                           color="primary"
                                           show-value
                                           style="height:15px;"
                                           class="mt-1" />



                            </div>






                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!--end cahrts-->
        <!-- paper report-->
        <!---->
    </div>
</template>
<script type="text/javascript">
    export default {
        data() {
            return {
                counter: 86,
                tasksJunu: 0,
                tasksfeb: 0,
                tasksMar: 0,
                tasksApr: 0,
                tasksMay: 0,
                tasksJun: 0,
                tasksJul: 0,
                tasksAug: 0,
                tasksSep: 0,
                tasksOct: 0,
                tasksNov: 0,
                tasksDec: 0,
                statisticsData: [],
                year: '2020',
                delayedTasks :[],
                canceledTasks :[],
                doneTasks :[],


                options:{
                    color: '#bffaf3',
                    failedColor: '#874b4b',
                    thickness: '5px',
                    transition: {
                        speed: '0.2s',
                        opacity: '0.6s',
                        termination: 300
                    },
                    autoRevert: true,
                    location: 'left',
                    inverse: false
                }

         
            }
        },
        methods: {

            fetchDate() {
                axios.get('/api/statistics/statisticsIndex').then(res => {
                    this.statisticsData = res.data;
                })
            },

           fetchTasks() {
              axios.get(`/api/statistics/tasks/${this.year}`).then(res => {
                if (1) {

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

        },
        created() {
            this.fetchTasks();
            this.fetchDate();
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
