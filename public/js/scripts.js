$(document).ready(function(){
    function showClockMap(map_id, lt, lg)
    {
        const cords = { lat: Number(lt), lng: Number(lg) };

        // The map,
        const map = new google.maps.Map(document.getElementById(map_id), {
            zoom: 17,
            center: cords,
        });
        // The marker,
        const marker = new google.maps.Marker({
            position: cords,
            map: map,
            animation:google.maps.Animation.BOUNCE,
        });
    }

    $('.deleting_staff').on('click', function(e){
        e.preventDefault();
        var name = $(this).attr('data-staff_name');
        $('#name_of_deleting').text(name);
        $('#who_is_deleted').attr('action', $(this).attr('data-verify'));


        $('#delete_staff_modal_popup').addClass('show').css({
            'display': 'block'
        });
    });

    $('#closeDeleteForm').on('click', function(e){
        e.preventDefault();

        $('#delete_staff_modal_popup').removeClass('show').css({
            'display': 'none'
        });

        $('#editclock_modal_popup').removeClass('show').css({
            'display': 'none'
        });
    });

    $('.set_clock').on('click', function(){
        var schedule_id = $(this).attr('data-calendarid');
        $('#schedule_id').val(schedule_id);

        $('#editclock_modal_popup').addClass('show').css({
            'display': 'block'
        });
    });

    $('.schedule_appointment').on('click', function(e){
        e.preventDefault();
    
        var id = $(this).attr('data-calendarid');
        $.ajax({
        method: 'GET',
        url: '/staff-check-schedule-clock/'+id,
        async: false,
          }).done(function(msg){
            // console.log(msg);
            if(msg.clock_in == '' && msg.clock_out == '')
            {
              $('#clock_out').attr('disabled', 'disabled');
              $('#clock_out_btn').hide();
            }
            if(msg.clock_in != '')
            {
              $('#clock_in').attr('disabled', 'disabled').show();
              $('#clock_in_btn').hide();
              showClockMap('clock_in_map', msg.clock_in_lat, msg.clock_in_log);
              $('#clock_in_map').show();
            }
            if(msg.clock_in != '' && msg.clock_out != '')
            {
              $('#clock_in_btn').hide();
              $('#clock_out_btn').hide();
    
              $('#clock_out').attr('disabled', 'disabled').show();
              showClockMap('clock_out_map', msg.clock_out_lat, msg.clock_out_log);
              $('#clock_out_map').show();
              $('#schedule_btn_save').hide();
            }
            $('#schedule_id').val(msg.id);
            $('#clock_in').val(msg.clock_in);
            $('#clock_out').val(msg.clock_out);
          }).fail(function(msg){
          // console.log(msg);
          if(msg.clock_in == '' && msg.clock_out == '')
          {
            $('#clock_out').attr('disabled', 'disabled');
            $('#clock_out_btn').hide();
          }
          if(msg.clock_in != '')
          {
            $('#clock_in').attr('disabled', 'disabled').show();
            $('#clock_in_btn').hide();
            showClockMap('clock_in_map', msg.clock_in_lat, msg.clock_in_log);
          }
          if(msg.clock_in != '' && msg.clock_out != '')
          {
            $('#clock_in_btn').hide();
            $('#clock_out_btn').hide();
    
            $('#clock_out').attr('disabled', 'disabled').show();
            showClockMap('clock_out_map', msg.clock_out_lat, msg.clock_out_log);
            $('#schedule_btn_save').hide();
          }
          $('#schedule_id').val(msg.id);
          $('#clock_in').val(msg.clock_in);
          $('#clock_out').val(msg.clock_out);
        });
    });
    
    $('#closeClockForm').on('click', function(e){
        e.preventDefault();

        $('#editclock_modal_popup').removeClass('show').css({
            'display': 'none'
        });
    });  

    

});