import DateSelector from '../DateSelector';
import HotelPassengerCount from './HotelPassengerCount';

class HotelTicket extends React.Component{
    render(){
        return (
        <div className="form" id="HotelTicket" style={{display:'none'}}>
            {/* <!-- فیلترهای پروازها --> */}
            <div className="filters" >
                <input type="radio" value="0" id="iranHotels" name="hotels" checked/>
                <label for="iranHotels">داخلی</label>
                <input type="radio" value="1" id="Hotels" name="hotels" checked/>
                <label for="Hotels">خارجی</label>
                
            </div>
            {/* <!-- فیلدهای جستجو --> */}
            <form  className="search">
               
                <div className="group">
                    <select className="left-border right-border hotelCity">
                        <option value="" disabled selected>شهر مقصد</option>

                    </select>
                </div>
                <div className="group margin-right">
                    
                    <DateSelector name="checkIn" prefix="hotel" title="تاریخ ورود"/>
                </div>
                <div className="group">
                <DateSelector name="checkOut" prefix="hotel" title="تاریخ خروج"/>
                </div>
                <div className="group">
                    <HotelPassengerCount prefix="hotel"/>
                </div>
                <div className="group">
                    <input type="button" className="btn btn-zgreen" value="جستجو"/>
                    <i className="icon-search"></i>
                </div>

            </form>
        </div>
        );
    }

}

$(document).ready(function () {
    $('.hotelCity').select2({
        // placeholder: "Choose tags...",
        // language: "fa",
        language: {
            // You can find all of the options in the language files provided in the
            // build. They all must be functions that return the string that should be
            // displayed.
                inputTooShort: function () {
                    return "حداقل سه کاراکتر از نام شهر مقصد را وارد نمایید.";
                }
            },

        minimumInputLength: 3,
        ajax: {
            url: '/cityHotel',
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
export default HotelTicket;