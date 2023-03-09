<script>
            $(document).ready(function () {
//                for (var x=1;x<=4;x++){
<?php for ($i = 1; $i <= 4; $i++) { ?>
                    $('#productImage<?php echo $i; ?>').on('change', function () { //on file input change
                        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                        {
                            //                            $('#thumb-output<?php echo $i; ?>').html(''); //clear html of output element
                            var data = $(this)[0].files; //this file data

                            $.each(data, function (index, file) { //loop though each file
                                if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                                    var fRead = new FileReader(); //new filereader
                                    fRead.onload = (function (file) { //trigger function on successful read
                                        return function (e) {
                                            var img = $('#imageSet<?php echo $i; ?>').addClass('thumb center-box').attr('src', e.target.result).width(70).height(60); //create image element
                                            $('#thumb-output<?php echo $i; ?>').append(img); //append image to output element
                                        };
                                    })(file);
                                    fRead.readAsDataURL(file); //URL representing the file's data.
                                }
                            });

                        } else {
                            alert("Your browser doesn't support File API!"); //if File API is absent
                        }
                    });
<?php } ?>

            });
        </script>

        <!--<for full calendar- admin LTE->-->
        <script>
            $(function () {
                $.ajaxSetup({

                    headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                    }

                });

                /* initialize the external events
                 -----------------------------------------------------------------*/
                function init_events(ele) {
                    ele.each(function () {

                        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                        // it doesn't need to have a start or end
                        var eventObject = {
                            title: $.trim($(this).text()) // use the element's text as the event title
                        }

                        // store the Event Object in the DOM element so we can get to it later
                        $(this).data('eventObject', eventObject)

                        // make the event draggable using jQuery UI
                        $(this).draggable({
                            zIndex: 1070,
                            revert: true, // will cause the event to go back to its
                            revertDuration: 0  //  original position after the drag
                        })

                    })
                }

                init_events($('#external-events div.external-event'))

                /* initialize the calendar
                 -----------------------------------------------------------------*/
                //Date for the calendar events (dummy data)
                var date = new Date()
                var d = date.getDate(),
                        m = date.getMonth(),
                        y = date.getFullYear()
                var calendar = $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    buttonText: {
                        today: 'today',
                        month: 'month',
                        week: 'week',
                        day: 'day'
                    },
                    //Random default events
                    events: '/myCalendar/myEvents',
                    editable: true,
                    droppable: true, // this allows things to be dropped onto the calendar !!!
                    drop: function (date, allDay) { // this function is called when something is dropped

                        // retrieve the dropped element's stored Event Object
                        var originalEventObject = $(this).data('eventObject')
                        // we need to copy it, so that multiple events don't have a reference to the same object
                        var copiedEventObject = $.extend({}, originalEventObject);

                        // assign it the date that was reported
                        copiedEventObject.start = date
                        copiedEventObject.allDay = allDay
                        copiedEventObject.backgroundColor = $(this).css('background-color')
                        copiedEventObject.borderColor = $(this).css('border-color');

                        var title = copiedEventObject.title;
                        var color = copiedEventObject.backgroundColor;
                        var start = date.format();
                        
                        $.ajax({
                            url: '{{url("/myCalendar/myNewEvents")}}',
                            type: 'post',
                            datatype: 'JSON',
                            data: {'title': title, 'start': start, 'end': start, 'color': color, '_token': $('input[name="token"]').val()},
                            success: function (data)
                            {
                                calendar.fullCalendar('refetchEvents');
                                $('#eventMessage').html('Event Created Successfully!').prop('class', 'alert alert-success');
                            }
                        });
                        // is the "remove after drop" checkbox checked?
                        if ($('#drop-remove').is(':checked')) {
                            // if so, remove the element from the "Draggable Events" list
                            $(this).remove();
                        }

                    },
                    eventResize: function (event)
                    {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                        var title = event.title;
                        var id = event.id;
                        $.ajax({
                            url: '{{url("/myCalendar/updateEvents")}}',
                            type: 'post',
                            datatype: 'JSON',
                            data: {'title': title, 'start': start, 'end': end, 'id': id, '_token': $('input[name="token"]').val()},
                            success: function (data) {
                                calendar.fullCalendar('refetchEvents');
                                $('#eventMessage').html('Event Update Successfully!').prop('class', 'alert alert-info');
                            }
                        });
                    },

                    eventDrop: function (event)
                    {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                        var title = event.title;
                        var id = event.id;
                        $.ajax({
                            url: '{{url("/myCalendar/updateEvents")}}',
                            type: 'post',
                            datatype: 'JSON',
                            data: {'title': title, 'start': start, 'end': end, 'id': id, '_token': $('input[name="token"]').val()},
                            success: function (data) {
                                calendar.fullCalendar('refetchEvents');
                                $('#eventMessage').html('Event Updte(DROP) Successfully !!').prop('class', 'alert alert-warning');
                            }
                        });
                    },

                    eventClick: function (event)
                    {
                        if (confirm("Are you sure you want to remove it?"))
                        {
                            var id = event.id;
                            $.ajax({
                                url: '{{url("/myCalendar/deleteEvents")}}',
                                type: "POST",
                                data: {'id': id, '_token': $('input[name="token"]').val()},
                                success: function ()
                                {
                                    calendar.fullCalendar('refetchEvents');
                                    $('#eventMessage').html('Event DELETE Successfully !!').prop('class', 'alert alert-error');
                                }
                            })
                        }
                    },

                });

                function load_myevents() {
                    $.ajax({
                        url: '{{url("/myCalendar/myEventName")}}',
                        type: 'get',
                        datatype: 'JSON',
//                        data: {'title': title,'color':currColor ,'_token': $('input[name="token"]').val()},
                        success: function (data)
                        {
                            $.each(data, function (i, item) {
                                var a = item.color;
                                var event = $('<div>')
                                event.css({
                                    'background-color': item.color,
                                    'border-color': a,
                                    'color': '#fff'
                                }).addClass('external-event').prop('id', item.id);
                                event.html(item.title);
                                $('#external-events').prepend(event);

                                //Add draggable funtionality
                                init_events(event);
                            });
                        }
                    });
                }

                load_myevents();

                /* ADDING EVENTS */
                var currColor = '#3c8dbc'; //Red by default
                //Color chooser button
                var colorChooser = $('#color-chooser-btn');
                $('#color-chooser > li > a').click(function (e) {
                    e.preventDefault();
                    //Save color
                    currColor = $(this).css('color');
                    //Add color effect to button
                    $('#add-new-event').css({'background-color': currColor, 'border-color': currColor});
                });
                $('#add-new-event').click(function (e) {
                    e.preventDefault();
                    //Get value and make sure it is not null
                    var title = $('#new-event').val();
                    if (title.length == 0) {
                        return;
                    }
                    $.ajax({
                        url: '{{url("/myCalendar/newEventName")}}',
                        type: 'post',
                        datatype: 'JSON',
                        data: {'title': title, 'color': currColor, '_token': $('input[name="token"]').val()},
                        success: function (data)
                        {
                            $('#external-events').empty();
                            load_myevents();
//                            calendar.fullCalendar('refetchEvents');
                            $('#eventMessage').html('Event Created Successfully!').prop('class', 'alert alert-success');
                        }
                    });
                    $('#new-event').val('');
                });
                $('#delete').droppable({
                    drop: function (event, ui) {
                        var myEventId = $(ui.draggable).attr("id");
                        if (confirm('Are you sure to DELETE this?')) {
                            $.ajax({
                                url: '{{url("/myCalendar/deleteMyEventName")}}',
                                type: 'post',
                                datatype: 'JSON',
                                data: {'id': myEventId, '_token': $('input[name="token"]').val()},
                                success: function ()
                                {
                                    $('#external-events').empty();
                                    load_myevents();
//                            calendar.fullCalendar('refetchEvents');
                                    $('#eventMessage').html('Event DELETE From List Successfully!').prop('class', 'alert alert-danger');
                                }
                            });
                        } else {
                            return false;
                        }
                    }
                });
            });
        </script>