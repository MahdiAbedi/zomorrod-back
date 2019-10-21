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
                    <select className="left-border right-border select2">
                        <option>مقصد</option>
                        <option value="">تهران</option>
                        <option value="">شیراز</option>
                        <option value="">تهران</option>
                        <option value="">شیراز</option>
                        <option value="">تهران</option>
                        <option value="">شیراز</option>
                        <option value="">تهران</option>
                        <option value="">شیراز</option>
                        <option value="">تهران</option>
                        <option value="">شیراز</option>

                    </select>
                </div>
                <div className="group margin-right">
                    
                    <DateSelector name="checkIn" prefix="hotel" title="تاریخ ورود"/>
                </div>
                <div className="group">
                <DateSelector name="checkOut" prefix="hotel" title="تاریخ خروج"/>
                </div>
                <div className="group">
                    <HotelPassengerCount />
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


export default HotelTicket;