import DateSelector from '../DateSelector';
import HotelPassengerCount from './HotelPassengerCount';
import HotelSelector from '../../Modules/HotelSelector';

class HotelTicket extends React.Component{

    submit=(e)=>{
        e.preventDefault();
        let checkInDate = new Date(document.getElementById('hotel_checkIn').value);
        let checkOutDate = new Date(document.getElementById('hotel_checkOut').value);
        localStorage.setItem("cityCode"       , document.getElementById('cityCode').value);         //کد شهر مقصد
        localStorage.setItem("hotel_checkIn"  , document.getElementById('hotel_checkIn').value);    //زمان ورود به هتل
        localStorage.setItem("hotel_checkOut" , document.getElementById('hotel_checkOut').value);   //زمان خروج از هتل
        localStorage.setItem('hotel_nights'   , (checkOutDate.getTime() - checkInDate.getTime())/ (1000 * 3600 * 24));//تعداد شبهای اقامت
        
        // localStorage.setItem("hotelPassengersList" , document.getElementById('hotelPassengersList').value);   //زمان خروج از هتل
        // hotelPassengersList sets in HotelPassengerCount Component
        window.location.replace("/hotels");
    }
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
            <form  className="search" onSubmit={(e)=>this.submit(e)}>
               
                <div className="group">
                    {/* <select name="hotelCity" className="left-border right-border hotelCity">
                        <option value="" disabled selected>شهر مقصد</option>

                    </select> */}
                    <HotelSelector Placeholder="شهر مقصد به فارسی"/>
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
                    <input type="submit" onClick={()=>this.submit} className="btn btn-zgreen" value="جستجو"/>
                    <i className="icon-search"></i>
                </div>

            </form>
        </div>
        );
    }

}

export default HotelTicket;