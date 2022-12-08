@include('layouts.dashup')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-title">
                <h2 style="color: #e2970d">Your Booked Trips</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    @if (!$tripdatafront == null)
                        <div class="col-lg-3">
                            <h4>Booked Trips</h4>
                            <div class="m-t-20">
                                <br>
                                @foreach ($tripdatafront as $trip)
                                    <div class="external-event bg-primary" data-class="bg-primary">
                                        <i class="fa fa-move"></i>{{ $trip->name }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="col-lg-12 text-center">
                            <h1 style="color: #8c5eb2">You Haven't Booked Any Trips Yet !</h1>
                            <a href="alltrips" style="font-size: 30px; color: #8c5eb2!important">Book It Now !!</a>
                        </div>
                    @endif
                    <div class="col-md-9">
                        <div class="card-box">
                            <div id="calendar"></div>
                        </div>
                    </div>
                    <!-- end col -->
                    <!-- BEGIN MODAL -->
                    <div class="modal fade none-border" id="event-modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">

                                    <div class="modal-title">
                                        <h4>
                                            <strong>Add New Event</strong>
                                        </h4>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect"
                                        data-dismiss="modal">Close</button>
                                    <button type="button"
                                        class="btn btn-success save-event waves-effect waves-light">Create
                                        event</button>
                                    <button type="button" class="btn btn-danger delete-event waves-effect waves-light"
                                        data-dismiss="modal">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Add Category -->
                    <div class="modal fade none-border" id="add-category">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">
                                        <strong>Add a category </strong>
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="control-label">Category Name</label>
                                                <input class="form-control form-white" placeholder="Enter name"
                                                    type="text" name="category-name" />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Choose Category Color</label>
                                                <select class="form-control form-white"
                                                    data-placeholder="Choose a color..." name="category-color">
                                                    <option value="success">Success</option>
                                                    <option value="danger">Danger</option>
                                                    <option value="info">Info</option>
                                                    <option value="pink">Pink</option>
                                                    <option value="primary">Primary</option>
                                                    <option value="warning">Warning</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect"
                                        data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light save-category"
                                        data-dismiss="modal">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END MODAL -->
                </div>
            </div>
        </div>
        <!-- /# card -->
    </div>
    <!-- /# column -->
</div>
<!-- /# row -->
@include('layouts.dashdown')
<script>
    ! function($) {
        "use strict";

        var CalendarApp = function() {
            this.$body = $("body")
            this.$modal = $('#event-modal'),
                this.$event = ('#external-events div.external-event'),
                this.$calendar = $('#calendar'),
                this.$saveCategoryBtn = $('.save-category'),
                this.$categoryForm = $('#add-category form'),
                this.$extEvents = $('#external-events'),
                this.$calendarObj = null
        };


        /* on drop */
        CalendarApp.prototype.onDrop = function(eventObj, date) {
                var $this = this;
                // retrieve the dropped element's stored Event Object
                var originalEventObject = eventObj.data('eventObject');
                var $categoryClass = eventObj.attr('data-class');
                // we need to copy it, so that multiple events don't have a reference to the same object
                var copiedEventObject = $.extend({}, originalEventObject);
                // assign it the date that was reported
                copiedEventObject.start = date;
                if ($categoryClass)
                    copiedEventObject['className'] = [$categoryClass];
                // render the event on the calendar
                $this.$calendar.fullCalendar('renderEvent', copiedEventObject, true);
                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    eventObj.remove();
                }
            },
            /* on click on event */
            CalendarApp.prototype.onEventClick = function(calEvent, jsEvent, view) {
                var $this = this;
                var form = $("<form></form>");
                form.append("<label>Change event name</label>");
                form.append("<div class='input-group'><input class='form-control' type=text value='" + calEvent.title +
                    "' /><span class='input-group-btn'><button type='submit' class='btn btn-success waves-effect waves-light'><i class='fa fa-check'></i> Save</button></span></div>"
                );
                $this.$modal.modal({
                    backdrop: 'static'
                });
                $this.$modal.find('.delete-event').show().end().find('.save-event').hide().end().find('.modal-body')
                    .empty().prepend(form).end().find('.delete-event').unbind('click').on("click", function() {
                        $this.$calendarObj.fullCalendar('removeEvents', function(ev) {
                            return (ev._id == calEvent._id);
                        });
                        $this.$modal.modal('hide');
                    });
                $this.$modal.find('form').on('submit', function() {
                    calEvent.title = form.find("input[type=text]").val();
                    $this.$calendarObj.fullCalendar('updateEvent', calEvent);
                    $this.$modal.modal('hide');
                    return false;
                });
            },
            /* on select */
            // CalendarApp.prototype.onSelect = function(start, end, allDay) {
            //     var $this = this;
            //     $this.$modal.modal({
            //         backdrop: 'static'
            //     });
            //     var form = $("<form></form>");
            //     form.append("<div class='row'></div>");
            //     form.find(".row")
            //         .append(
            //             "<div class='col-md-6'><div class='form-group'><label class='control-label'>Event Name</label><input class='form-control' placeholder='Insert Event Name' type='text' name='title'/></div></div>"
            //         )
            //         .append(
            //             "<div class='col-md-6'><div class='form-group'><label class='control-label'>Category</label><select class='form-control' name='category'></select></div></div>"
            //         )
            //         .find("select[name='category']")
            //         .append("<option value='bg-danger'>Danger</option>")
            //         .append("<option value='bg-success'>Success</option>")
            //         .append("<option value='bg-dark'>Dark</option>")
            //         .append("<option value='bg-primary'>Primary</option>")
            //         .append("<option value='bg-pink'>Pink</option>")
            //         .append("<option value='bg-info'>Info</option>")
            //         .append("<option value='bg-warning'>Warning</option></div></div>");
            //     $this.$modal.find('.delete-event').hide().end().find('.save-event').show().end().find('.modal-body')
            //         .empty().prepend(form).end().find('.save-event').unbind('click').on("click", function() {
            //             form.submit();
            //         });
            //     $this.$modal.find('form').on('submit', function() {
            //         var title = form.find("input[name='title']").val();
            //         var beginning = form.find("input[name='beginning']").val();
            //         var ending = form.find("input[name='ending']").val();
            //         var categoryClass = form.find("select[name='category'] option:checked").val();
            //         if (title !== null && title.length != 0) {
            //             $this.$calendarObj.fullCalendar('renderEvent', {
            //                 title: title,
            //                 start: start,
            //                 end: end,
            //                 allDay: false,
            //                 className: categoryClass
            //             }, true);
            //             $this.$modal.modal('hide');
            //         } else {
            //             alert('You have to give a title to your event');
            //         }
            //         return false;

            //     });
            //     $this.$calendarObj.fullCalendar('unselect');
            // },
            CalendarApp.prototype.enableDrag = function() {
                //init events
                $(this.$event).each(function() {
                    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()) // use the element's text as the event title
                    };
                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data('eventObject', eventObject);
                    // make the event draggable using jQuery UI
                    $(this).draggable({
                        zIndex: 999,
                        revert: true, // will cause the event to go back to its
                        revertDuration: 0 //  original position after the drag
                    });
                });
            }
        /* Initializing */
        CalendarApp.prototype.init = function() {

                this.enableDrag();
                /*  Initialize the calendar  */
                var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
                var form = '';
                var today = new Date($.now());
                var defaultEvents = [];
                var defaulteventdata = $(this).serializeArray();
                var $this = this;
                $.ajax({
                    url: "/bookedtripdata",
                    dataType: "json",
                    success: function(data) {

                        if (!$.trim(data)) {
                            alert("No Booked Trips: ");
                        } else {
                            // alert("What follows is not blank: " + data);
                            var obj = data.result;

                        // $.each(obj, function(index, value) {
                        //     defaulteventdata = [{
                        //         title: obj[index].title,
                        //         start: obj[index].start,
                        //         className: 'bg-dark'
                        //     }, ];
                        //     // console.log('The value at arr[' + index + '] is: ' + value);
                        // });

                        for (var i = 0; i < obj.length; i++) {

                            defaulteventdata.push({
                                title: obj[i].title,
                                start: obj[i].start,
                                className: obj[i].className
                            });

                        }
                        console.log(defaulteventdata);

                        $this.$calendarObj = $this.$calendar.fullCalendar({
                            slotDuration: '00:15:00',
                            /* If we want to split day time each 15minutes */
                            minTime: '08:00:00',
                            maxTime: '19:00:00',
                            defaultView: 'month',
                            handleWindowResize: true,
                            height: $(window).height() - 200,
                            header: {
                                left: 'prev,next today',
                                center: 'title',
                                right: 'month,agendaWeek,agendaDay'
                            },
                            events: defaulteventdata,
                            editable: true,
                            droppable: true, // this allows things to be dropped onto the calendar !!!
                            eventLimit: true, // allow "more" link when too many events
                            selectable: true,
                            drop: function(date) {
                                $this.onDrop($(this), date);
                            },
                            select: function(start, end, allDay) {
                                $this.onSelect(start, end, allDay);
                            },
                            eventClick: function(calEvent, jsEvent, view) {
                                $this.onEventClick(calEvent, jsEvent, view);
                            }

                        });
                        }



                    }
                });


                // console.log(defaultEvents);





                //on new event
                this.$saveCategoryBtn.on('click', function() {
                    var categoryName = $this.$categoryForm.find("input[name='category-name']").val();
                    var categoryColor = $this.$categoryForm.find("select[name='category-color']").val();
                    if (categoryName !== null && categoryName.length != 0) {
                        $this.$extEvents.append('<div class="external-event bg-' + categoryColor +
                            '" data-class="bg-' + categoryColor +
                            '" style="position: relative;"><i class="fa fa-move"></i>' + categoryName +
                            '</div>')
                        $this.enableDrag();
                    }

                });
            },

            //init CalendarApp
            $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp

    }(window.jQuery),

    //initializing CalendarApp
    function($) {
        "use strict";
        $.CalendarApp.init()
    }(window.jQuery);
</script>
