const InternationalAirlines = props =>(
    <select className={props.className} title="فرودگاه مبدا" name={props.name} id={props.prefix +'_'+props.name}>
    
    <option value="" disabled selected>{props.Placeholder}</option>

</select>
);

$(document).ready(function () {
    $('.airports-select2').select2({
        // placeholder: "Choose tags...",
        language: "fa",
        minimumInputLength: 3,
        ajax: {
            url: '/airports',
            dataType: 'json',
            data: function (params) {
                return {
                    q: $.trim(params.term)
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
})

export default InternationalAirlines;