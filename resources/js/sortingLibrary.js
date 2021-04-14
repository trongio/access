window.sortTable = function (){
    $('#table').DataTable({
        'lengthMenu': [10, 50, 100, 1000],
        'stateSave': true,
        'stateDuration': 60 * 60 * 24 * 365,
        'language': {
            'searchPlaceholder': 'Search',
            'search': ''
        }
    });
    $('.dataTables_length').addClass('bs-select');
}
