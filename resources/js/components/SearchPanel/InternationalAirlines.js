const InternationalAirlines = props =>(
    <select className={props.className} title="فرودگاه مبدا" name={props.name} id={props.prefix +'_'+props.name}>
    
    <option value="" disabled selected>{props.Placeholder}</option>

</select>
);

$(document).ready(function () {
    $('.airports-select2').select2({
        // placeholder: "Choose tags...",
        language: {
            // You can find all of the options in the language files provided in the
            // build. They all must be functions that return the string that should be
            // displayed.
                inputTooShort: function () {
                    return "حداقل سه کاراکتر از نام فرودگاه را وارد نمایید.";
                }
            },

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
                console.log(data)
                return {
                    results: data
                };
            },
            cache: true
        }
    });
})

export default InternationalAirlines;