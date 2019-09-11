import React from 'react';
import DateSelector from '../DateSelector';
import PassengerCount from './PassengerCount';

class TourTicket extends React.Component{
    render(){
        return (
        <div className="form" id="TourTicket"  style={{display:'none'}}>
            {/* <!-- فیلترهای پروازها --> */}
            <div className="filters" >
                <input type="radio" value="value1" id="group1" name="group1" checked/>
                <label for="group1">یک طرفه</label>
                <input type="radio" value="value2" id="group2" name="group1"/>
                <label for="group2">رفت و برگشت</label>
                <input type="radio" value="value2" id="group3" name="group1"/>
                <label for="group3">چند مسیره</label>
            </div>
            {/* <!-- فیلدهای جستجو --> */}
            <form  className="search">
                <div className="group margin-right">
                    <select className="right-border select2">
                        <option >مبداء</option>
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
                    <button className="round-btn"><i className="icon-transfer"><img src="img/change-way.png"
                                alt=""/></i></button>
                </div>
                <div className="group">
                <select className="left-border select2">
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
                    <DateSelector />
                </div>
                <div className="group">
                <DateSelector />
                </div>
                <div className="group">
                    <PassengerCount />
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


export default TourTicket;