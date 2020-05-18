$(function () {// document ready

    // grab focus so the binding below works
    $(window).focus();
  
    // used to track whether the user is holding the control key
    let ctrlIsPressed = false;
  
    function setEventsCopyable(isCopyable) {
      ctrlIsPressed = !ctrlIsPressed;
      $("#calendar").fullCalendar("option", "eventStartEditable", !isCopyable);
      $(".fc-event").draggable("option", "disabled", !isCopyable);
    }
  
    // set events copyable if the user is holding the control key
    $(document).keydown(function (e) {
      if (e.ctrlKey && !ctrlIsPressed) {
        setEventsCopyable(true);
      }
    });
  
    // if control has been released stop events being copyable
    $(document).keyup(function (e) {
      if (ctrlIsPressed) {
        setEventsCopyable(false);
      }
    });
  
  
    /* initialize the calendar
        -----------------------------------------------------------------*/
  
    $('#calendar').fullCalendar({
      now: '2018-04-07',
      editable: true, // enable draggable events
      droppable: true, // this allows things to be dropped onto the calendar
      aspectRatio: 1.8,
      scrollTime: '00:00', // undo default 6am scrollTime
      header: {
        left: 'today prev,next',
        center: 'title',
        right: 'timelineDay,timelineThreeDays,agendaWeek,month' },
  
      defaultView: 'month',
      views: {
        timelineThreeDays: {
          type: 'timeline',
          duration: { days: 3 } } },
  
  
      resourceLabelText: 'Rooms',
      resources: [
      { id: 'a', title: 'Auditorium A' },
      { id: 'b', title: 'Auditorium B', eventColor: 'green' },
      { id: 'c', title: 'Auditorium C', eventColor: 'orange' },
      { id: 'd', title: 'Auditorium D', children: [
        { id: 'd1', title: 'Room D1' },
        { id: 'd2', title: 'Room D2' }] },
  
      { id: 'e', title: 'Auditorium E' },
      { id: 'f', title: 'Auditorium F', eventColor: 'red' },
      { id: 'g', title: 'Auditorium G' },
      { id: 'h', title: 'Auditorium H' },
      { id: 'i', title: 'Auditorium I' },
      { id: 'j', title: 'Auditorium J' },
      { id: 'k', title: 'Auditorium K' },
      { id: 'l', title: 'Auditorium L' },
      { id: 'm', title: 'Auditorium M' },
      { id: 'n', title: 'Auditorium N' },
      { id: 'o', title: 'Auditorium O' },
      { id: 'p', title: 'Auditorium P' },
      { id: 'q', title: 'Auditorium Q' },
      { id: 'r', title: 'Auditorium R' },
      { id: 's', title: 'Auditorium S' },
      { id: 't', title: 'Auditorium T' },
      { id: 'u', title: 'Auditorium U' },
      { id: 'v', title: 'Auditorium V' },
      { id: 'w', title: 'Auditorium W' },
      { id: 'x', title: 'Auditorium X' },
      { id: 'y', title: 'Auditorium Y' },
      { id: 'z', title: 'Auditorium Z' }],
  
      events: [
      { id: '1', resourceId: 'b', start: '2018-04-07T02:00:00', end: '2018-04-07T07:00:00', title: 'event 1' },
      { id: '2', resourceId: 'c', start: '2018-04-07T05:00:00', end: '2018-04-07T22:00:00', title: 'event 2' },
      { id: '3', resourceId: 'd', start: '2018-04-06', end: '2018-04-08', title: 'event 3' },
      { id: '4', resourceId: 'e', start: '2018-04-07T03:00:00', end: '2018-04-07T08:00:00', title: 'event 4' },
      { id: '5', resourceId: 'f', start: '2018-04-07T00:30:00', end: '2018-04-07T02:30:00', title: 'event 5' }],
  
  
      eventAfterAllRender(event, element, view) {
        // make all events draggable but disable dragging
        $(".fc-event").each(function () {
          const $event = $(this);
  
          // store data so the calendar knows to render an event upon drop
          let event = $event.data("fcSeg").footprint.eventDef;
          $event.data("event", event);
  
          // make the event draggable using jQuery UI
          $event.draggable({
            disabled: true,
            helper: "clone",
            revert: true,
            revertDuration: 0,
            zIndex: 999,
            stop(event, ui) {
              // when dragging of a copied event stops we must set them
              // copyable again if the control key is still held down
              if (ctrlIsPressed) {
                setEventsCopyable(true);
              }
            } });
  
        });
      } });
  
  
  });