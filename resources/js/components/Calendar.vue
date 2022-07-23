<script>
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'
import interactionPlugin from '@fullcalendar/interaction'
import { INITIAL_EVENTS, createEventId } from './event-utils'
import Modal from './EventModal.vue'
import Modal2 from './EventModal2.vue'
import axios from 'axios'
//import EventArrayTest from './EventArrayTest'
//import DeleteEvent from 'DeleteEventModal.vue'

export default { 
  
  name : 'Calendar', 

  components: {
    FullCalendar, // make the <FullCalendar> tag available,
    Modal,
    Modal2
  },

  data: function() {
    return {
      events: "",
      
      //event_test: INITIAL_EVENTS,
      showModal: false,
      showModal2: false,
      
      calendarOptions: { 
               
        plugins: [
          dayGridPlugin,
          timeGridPlugin,
          interactionPlugin // needed for dateClick
        ],
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        initialView: 'dayGridMonth',
        //initialEvents: this.eventDBS, // alternatively, use the `events` setting to fetch from a feed
        editable: true,
        selectable: true,
        selectMirror: true,
        dayMaxEvents: true,
        weekends: true,
        select: this.handleDateSelect,
        eventClick: this.handleEventClick,
        eventsSet: this.handleEvents
        /* you can update a remote database when these fire:
        eventAdd:
        eventChange:
        eventRemove:
        */
      },
      currentEvents: [],
      
    }
  },

  created(){
            this.getEvents();
        },

  methods: {

    handleWeekendsToggle() {
      this.calendarOptions.weekends = !this.calendarOptions.weekends // update a property
    },

    async createEvent(e_title,e_start,e_end) {
                try {
                    this.error = null
                    const response = await axios.post('/events', {
                        title: e_title ,
                        start: e_start,
                        end: e_end         
                    })                  
                    // reset giá trị form về ban đầu
                    
                } catch (error) {
                    this.error = error.response.data
                }
            },
    async getListEvents() {
                try {
                    const response = await axios.get('/events')// neu khai bao route trong api route thi can axios.get('/api/events')
                    console.log('resdata event: ',response.data.events)
                    this.calendarOptions.eventDBS = response.data.events                                      
                } catch (error) {
                    //this.error = error.response.data
                    console.log('getListEventError')
                }
           },

    getEvents() {
      axios
        .get("/events")
        .then(
          res => {this.events = res.data.data
          console.log(' resp data data ',res.data.data)
          console.log(' this.events: ',this.events)
        })
        .catch(err => console.log(err.response.data));
    },

    handleDateSelect(selectInfo) {
      console.log('select info: ',selectInfo)
      let title = prompt('Please enter a new title for your event')
      let calendarApi = selectInfo.view.calendar

      calendarApi.unselect() // clear date selection

      if (title) {
        let startTime = selectInfo.startStr
        let endTime = selectInfo.endStr
        calendarApi.addEvent({
          id: createEventId(),
          title,
          start: startTime,
          end: endTime,
          allDay: selectInfo.allDay
        })
        //
        this.createEvent(title,startTime,endTime)
        
      }
    },

    handleEventClick(clickInfo) {
      // if (confirm(`Are you sure you want to delete the event '${clickInfo.event.title}'`)) {
      //   clickInfo.event.remove()
      console.log(clickInfo.event.title)
      
      // su dung slot de gan event name , hoac props truyen event name sang cho Delete modal
    },

    handleEvents(events) {
      this.currentEvents = events
    }
  }
}
</script>

<template>
  <div class='demo-app'>
    <div>
    <modal v-if="showModal" :show="showModal" @close="showModal=false" />   
    <modal2 v-if="showModal2" :show="showModal2" @close="showModal2=false" />   

    </div>
    <div class='demo-app-sidebar'>
      <div class='demo-app-sidebar-section'>
        <h2>Add new event</h2>
        <button type="button" @click="showModal=!showModal">Add</button>
        <button type="button" @click="showModal2=!showModal2">Edit</button>
      </div>
      <div class='demo-app-sidebar-section'>
        <label>
          <input
            type='checkbox'
            :checked='calendarOptions.weekends'
            @change='handleWeekendsToggle'
          />
          toggle weekends
        </label>
      </div>
      <div class='demo-app-sidebar-section'>
        <h2>All Events ({{ currentEvents.length }})</h2>
        <ul>
          <li v-for='event in currentEvents' :key='event.id'>
            <b>{{ event.startStr }}</b>
            <i>{{ event.title }}</i>
          </li>
        </ul>
      </div>
      
      <div class='demo-app-sidebar-section'>
        <h2>Event DB</h2>
        <!-- <ul>
          <li v-for='eventDB in eventDBS'>
            <b>{{eventDB.title}}</b>
            <i>{{eventDB.start}}</i>
            <i>{{eventDB.end}}</i>
          </li>
        </ul> -->
      </div>
    </div>
    <div class='demo-app-main'>
      <FullCalendar
        class='demo-app-calendar'
        :options='calendarOptions'
        :events="events"
      >

      </FullCalendar>
    </div>
  </div>
</template>

<style lang='css'>

h2 {
  margin: 0;
  font-size: 16px;
}

ul {
  margin: 0;
  padding: 0 0 0 1.5em;
}

li {
  margin: 1.5em 0;
  padding: 0;
}

b { /* used for event dates/times */
  margin-right: 3px;
}

.demo-app {
  display: flex;
  min-height: 100%;
  font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
  font-size: 14px;
}

.demo-app-sidebar {
  width: 300px;
  line-height: 1.5;
  background: #eaf9ff;
  border-right: 1px solid #d3e2e8;
}

.demo-app-sidebar-section {
  padding: 2em;
}

.demo-app-main {
  flex-grow: 1;
  padding: 3em;
}

.fc { /* the calendar root */
  max-width: 1100px;
  margin: 0 auto;
}

</style>
