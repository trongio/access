window.sortTable = function (){
    $('#table').DataTable({
        'lengthMenu': [50, 100, 500, 1000],
        'stateSave': true,
        'stateDuration': 60 * 60 * 24 * 365,
        'language': {
            'searchPlaceholder': 'Search',
            'search': ''
        }
    });
    $('.dataTables_length').addClass('bs-select');
}
