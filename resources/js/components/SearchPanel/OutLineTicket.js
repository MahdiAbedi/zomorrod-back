import React from 'react';
import DateSelector from '../DateSelector';
import PassengerCount from './PassengerCount';
import IranAirlines from './InternationalAirlines';
import InternationalAirlines from './InternationalAirlines';


class OutLineTicket extends React.Component{

    constructor(props){
        super(props);
        this.state={toWay:true}
    }

    showReturnDate = ()=>{
        this.setState({toWay:true});
    }

    checkTicket(){
        
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
                <label for="oneWay">یک طرفه</label>
                <input type="radio" value="toWay" id="toWay" name="outline-ticket"  onClick={this.hideReturnDate} checked={!this.state.toWay}/>
                <label for="toWay">رفت و برگشت</label>
                <input type="radio" value="value2" id="group3" name="outline-ticket"/>
                <label for="group3">چند مسیره</label>
            </div>
            {/* <!-- فیلدهای جستجو --> */}
            <form  className="search" action="/international" method="post">
                <div className="group margin-right">
                    <InternationalAirlines className="right-border select2" Placeholder="فرودگاه مبدا" />
                    
                    <button className="round-btn"><i className="icon-transfer"><img src="img/change-way.png"
                                alt=""/></i></button>
                </div>
                <div className="group">

                <InternationalAirlines className="left-border select2" Placeholder="فرودگاه مقصد" />

                </div>
                <div className="group margin-right">
                    <DateSelector />
                </div>
                <div className="group">
                <DateSelector disabled={this.state.toWay} />
                </div>
                
                <div className="group">
                    <PassengerCount />
                   
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