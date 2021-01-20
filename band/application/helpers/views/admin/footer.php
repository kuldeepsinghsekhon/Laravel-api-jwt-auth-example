</section>

<script type="text/javascript">
        $(document).ready(function() {


            $('#example2').DataTable({

                select: {
                    style: 'multi'
                },
                "buttons": [{
                    extend: 'collection',
                    text: 'Export',
                    buttons: [
                        'excel',
                        'csv',
                        'pdf'
                    ]
                }]

            });
            $('#example').DataTable({

                select: {
                    style: 'multi'
                },
                "buttons": [{
                    extend: 'collection',
                    text: 'Export',
                    buttons: [
                        'excel',
                        'csv',
                        'pdf'
                    ]
                }]

            });

            // table.buttons().container()
                // .appendTo('#datatable-buttons_wrapper .col-md-8:eq(0)');
        });

    </script>



 
</body>

</html>