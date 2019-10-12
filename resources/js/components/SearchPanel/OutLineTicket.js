import React from 'react';
import DateSelector from '../DateSelector';
import PassengerCount from './PassengerCount';
import InternationalAirlines from './InternationalAirlines';

import MultiSelect from '../../Modules/MultiSelect'


class OutLineTicket extends React.Component{

    constructor(props){
        super(props);
        this.state={toWay:true}
    }

    showReturnDate = ()=>{
        this.setState({toWay:true});
    }

    //هنگام ارسال فرم
    submitForm=(event)=>{
        // alert(this.state.toWay)
        event.preventDefault();
        localStorage.setItem("international_origin"         , $('#international_origin').val());                                        //مسیر رفت
        localStorage.setItem("international_destination"    , $('#international_destination').val());                             //مسیر برگشت
        localStorage.setItem("international_departureTime"  , document.getElementById('international_departureTime').value);   //زمان رفت
        localStorage.setItem("international_returnTime"     , document.getElementById('international_returnTime').value);        //زمان برگشت
        localStorage.setItem("international_adult"          , document.getElementById('international_adult').value);                 //زمان برگشت
        localStorage.setItem("international_child"          , document.getElementById('international_child').value);                //زمان برگشت
        localStorage.setItem("international_infant"         , document.getElementById('international_infant').value);             //زمان برگشت
        localStorage.setItem("international_IsRoundTrip"    , !this.state.toWay);          //آیا دو مسیره است یا نه؟ 

        window.location.replace("/international");

    }

    hideReturnDate = ()=>{
        this.setState({toWay:false});
    }
    render(){
        return (
        <div className="form" id="OutLineTicket">
            {/* <!-- فیلترهای پروازها --> */}
            <div className="filters" >
                <input type="radio" value="oneWay" id="oneWay" name="outline-ticket" onClick={this.showReturnDate} checked={this.state.toWay}/>
                <label htmlFor="oneWay">یک طرفه</label>
                <input type="radio" value="toWay" id="toWay" name="outline-ticket"  onClick={this.hideReturnDate} checked={!this.state.toWay}/>
                <label htmlFor="toWay">رفت و برگشت</label>
                <input type="radio" value="value2" id="group3" name="outline-ticket"/>
                <label htmlFor="group3">چند مسیره</label>
            </div>
            
            {/* <!-- فیلدهای جستجو --> */}
            <form  className="search" onSubmit={this.submitForm} >
                <div className="group margin-right">
                    <input type="hidden" id="csrf" name="_token" />
                    <input type="hidden" name="toWay" value={!this.state.toWay}/>

                    {/* <InternationalAirlines className="right-border airports-select2" Placeholder="فرودگاه مبدا" name="origin" prefix="international" /> */}

                    <MultiSelect className="right-border airports-select2" Placeholder="فرودگاه مبدا">
                        {/* <li><a>تهران</a></li>
                        <li><a>تبریز</a></li> */}
                    </MultiSelect>
                    
                    <button className="round-btn"><i className="icon-transfer"><img src="img/change-way.png"
                                alt=""/></i></button>
                </div>
                <div className="group">

                <InternationalAirlines className="left-border airports-select2" Placeholder="فرودگاه مقصد" name="destination"  prefix="international"/>

                </div>
                <div className="group margin-right">
                    <DateSelector name="departureTime" prefix="international"/>
                </div>
                <div className="group">
                <DateSelector name="returnTime" disabled={this.state.toWay} prefix="international" />
                </div>
                
                <div className="group">
                    <PassengerCount prefix="international"/>
                   
                </div>
                <div className="group">
                    <input type="submit" className="btn btn-zgreen" value="جستجو"/>
                    <i className="icon-search"></i>
                </div>

            </form>
        </div>
        );
    }

}


export default OutLineTicket;