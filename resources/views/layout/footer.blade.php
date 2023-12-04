<script src="/js/jquery.min.js"></script>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="/js/perfect-scrollbar.min.js"></script>
<script src="/js/next-sidebar.js"></script>
<script src="/trumbowyg/dist/trumbowyg.min.js"></script>
<script>
    $('.trumbowyg').trumbowyg();
</script>
<script src="/js/scripts.js"></script>
<script>
    $('.sidebar').css({
        'left': '-280px',
    });
    $('#sidenav-menu').on('click', function(){
        $('.sidebar').css({
            'left': '0px',
        });
    });

    $('#close-sidenav-menu').on('click', function(){
        $('.sidebar').css({
            'left': '-280px',
        });
    });
</script>
