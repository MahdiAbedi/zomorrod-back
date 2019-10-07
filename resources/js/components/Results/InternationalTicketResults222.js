import React from 'react';
import ReactDOM from 'react-dom';
import moment from 'moment-jalaali';

import TwoWayInternationalTicket from './TwoWayInternationalTicket';
// import OneWayInternationalTicket from './OneWayInternationalTicket';
import myTickets from './RoundTripTicket.json';
import myTickets2 from './TicketResults.json';
import axios from 'axios';

class InternationalTicketResults extends React.Component{

    constructor(props){
        super(props);
        this.state = {tickets:[]};
    }

    componentDidMount(){
        axios.post('/checkTicket1',{
            // PricingSourceType    :localStorage.getItem(''),
            // RequestOption        :localStorage.getItem(''),

            AdultCount              :localStorage.getItem('international_adult'),
            ChildCount              :localStorage.getItem('international_child'),
            InfantCount             :localStorage.getItem('international_infant'),

            // CabinType            :localStorage.getItem(''),
            // MaxStopsQuantity     :localStorage.getItem(''),
            // AirTripType          :localStorage.getItem(''),

            DepartureDateTime       :localStorage.getItem('international_departureTime'),
            DestinationLocationCode :localStorage.getItem('international_destination'),
            // DestinationType      :localStorage.getItem(''),
            OriginLocationCode      :localStorage.getItem('international_origin'),
            // OriginType           :localStorage.getItem(''),
            IsRoundTrip             :localStorage.getItem('international_IsRoundTrip'),
            ReturnTime              :localStorage.getItem('international_returnTime'),
        })
        .then(response => {
            //  this.setState({tickets:response.data})
             this.setState({tickets:myTickets.PricedItineraries})
            // console.log(myTickets.PricedItineraries)
        })
       .catch((error)=>{
          console.log(error);
       });
    }

    render(){
            if(this.state.tickets.length==0){
                return(
                
                    <section className="result-panel container">
                        <img src="images/loader.gif" />
                        سیستم در حال جستجوی بلیط میباشد.
                    </section>
                
                    );
            }else{

            
            return (  
                <section className="result-panel container">                    
                    <aside className="filters">
                        <section className="flex">
                            <button className="reset">لغو فیلترها</button>
                            
                            <p>نتایج جستجو <span>16</span></p>
                        </section>
                        {/*
                        <!-- ساعت حرکت --> */}
                        <section className="panel">
                            <header className="panel-title flex-between">
                                <span>زمان پرواز</span>
                                <a href="#"><i className="fas fa-chevron-down"></i></a>
                            </header>
                            <div className="panel-body">
                                <div>
                                    <input type="checkbox" name="check1" id="check1"/>
                                    <label htmlFor="check1">از ساعت 6:00 تا 10:00</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="check1" id="check1"/>
                                    <label htmlFor="check1">از ساعت 6:00 تا 10:00</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="check1" id="check1"/>
                                    <label htmlFor="check1">از ساعت 6:00 تا 10:00</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="check1" id="check1"/>
                                    <label htmlFor="check1">از ساعت 6:00 تا 10:00</label>
                                </div>
                            </div>
        
                        </section>
        
                        {/*<!-- نوع فروش --> */}
                        <section className="panel">
                            <header className="panel-title flex-between">
                                <span>نوع فروش</span>
                                <a href="#"><i className="fas fa-chevron-down"></i></a>
                            </header>
                            <div className="panel-body">
                                <div>
                                    <input type="checkbox" name="check1" id="systemi" onClick={()=>this.checkCharter(false)}/>
                                    <label htmlFor="systemi">سیستمی</label>
                                    <span className="checkbox-spanner selected"></span>
                                </div>
                                <div>
                                    <input type="checkbox" name="check1" id="charter" onClick={()=>this.checkCharter(true)}/>
                                    <label htmlFor="charter">چارتر</label>
                                    <span className="checkbox-spanner"></span>
                                </div>
                            </div>
        
                        </section>
                        {/*
                        <!-- تعداد توقف --> */}
                        <section className="panel">
                            <header className="panel-title flex-between">
                                <span>تعداد توقف</span>
                                <a href="#"><i className="fas fa-chevron-down"></i></a>
                            </header>
                            <div className="panel-body">
                                <div>
                                    <input type="radio" name="check1" id="radio1"/>
                                    <label htmlFor="radio1">مستقیم</label>
                                </div>
                                <div>
                                    <input type="radio" name="check1" id="radio2" checked/>
                                    <label htmlFor="radio2">یک توقف</label>
                                </div>
                                <div>
                                    <input type="radio" name="check1" id="radio3"/>
                                    <label htmlFor="radio3">دو توقف و بیشتر</label>
                                </div>
        
                            </div>
        
                        </section>
                        {/*
                        <!-- کلاس پروازی --> */}
                        <section className="panel">
                            <header className="panel-title flex-between">
                                <span>کلاس پروازی</span>
                                <a href="#"><i className="fas fa-chevron-down"></i></a>
                            </header>
                            <div className="panel-body">
                                <div>
                                    <input type="checkbox" name="check1" id="Economy" checked/>
                                    <label htmlFor="Economy">Economy</label>
                                    <span className="checkbox-spanner selected"></span>
                                </div>
                                <div>
                                    <input type="checkbox" name="check1" id="Bussiness"/>
                                    <label htmlFor="Bussiness">Bussiness</label>
                                    <span className="checkbox-spanner"></span>
                                </div>
        
                            </div>
        
                        </section>
                        {/*
                        <!-- شرکتهای هواپیمایی --> */}
                        <section className="panel">
                            <header className="panel-title flex-between">
                                <span>شرکتهای هواپیمایی</span>
                                <a href="#"><i className="fas fa-chevron-down"></i></a>
                            </header>
                            <div className="panel-body">
                                {/*<!-- شرکت هواپیما --> */}
                                <div className="airline-filter flex-between">
                                    <input type="checkbox" name="check1" id="pooya"/>
                                    <label htmlFor="pooya" className="flex">
                                        <img src="img/airlines-logo/pooya.png" alt=""/>
                                        <p>pooya</p>
                                        <p className="price"><span>200,000,000</span>تومان</p>
                                    </label>
                                </div>
                                {/*
                                <!-- شرکت هواپیما --> */}
                                <div className="airline-filter flex-between">
                                    <input type="checkbox" name="check1" id="pooya"/>
                                    <label htmlFor="pooya" className="flex">
                                        <img src="img/airlines-logo/meraj.png" alt=""/>
                                        <p>معراج</p>
                                        <p className="price"><span>200,000,000</span>تومان</p>
                                    </label>
                                </div>
                                {/*
                                <!-- شرکت هواپیما --> */}
                                <div className="airline-filter flex-between">
                                    <input type="checkbox" name="check1" id="pooya" />
                                    <label htmlFor="pooya" className="flex">
                                        <img src="img/airlines-logo/mahan.png" alt=""/>
                                        <p>ماهان</p>
                                        <p className="price"><span>200,000,000</span>تومان</p>
                                    </label>
                                </div>
                                {/*
                                <!-- شرکت هواپیما --> */}
                                <div className="airline-filter flex-between">
                                    <input type="checkbox" name="check1" id="pooya" />
                                    <label htmlFor="pooya" className="flex">
                                        <img src="img/airlines-logo/kish.png" alt=""/>
                                        <p>کیش</p>
                                        <p className="price"><span>200,000,000</span>تومان</p>
                                    </label>
                                </div>
                                {/*
                                <!-- شرکت هواپیما --> */}
                                <div className="airline-filter flex-between">
                                    <input type="checkbox" name="check1" id="pooya" />
                                    <label htmlFor="pooya" className="flex">
                                        <img src="img/airlines-logo/kaspian.png" alt=""/>
                                        <p>کاسپین</p>
                                        <p className="price"><span>200,000,000</span>تومان</p>
                                    </label>
                                </div>
                                {/*
                                <!-- شرکت هواپیما --> */}
                                <div className="airline-filter flex-between">
                                    <input type="checkbox" name="check1" id="pooya" />
                                    <label htmlFor="pooya" className="flex">
                                        <img src="img/airlines-logo/iran-air.png" alt=""/>
                                        <p>ایران ایر</p>
                                        <p className="price"><span>200,000,000</span>تومان</p>
                                    </label>
                                </div>
                                {/*<!-- شرکت هواپیما --> */}
                                <div className="airline-filter flex-between">
                                    <input type="checkbox" name="check1" id="pooya"/>
                                    <label htmlFor="pooya" className="flex">
                                        <img src="img/airlines-logo/iran-air-tour.png" alt=""/>
                                        <p>ایران ایرتور</p>
                                        <p className="price"><span>200,000,000</span>تومان</p>
                                    </label>
                                </div>
                                {/*<!-- شرکت هواپیما --> */}
                                <div className="airline-filter flex-between">
                                    <input type="checkbox" name="check1" id="pooya"/>
                                    <label htmlFor="pooya" className="flex">
                                        <img src="img/airlines-logo/ata.png" alt=""/>
                                        <p>آتا</p>
                                        <p className="price"><span>200,000,000</span>تومان</p>
                                    </label>
                                </div>
                                {/*
                                <!-- شرکت هواپیما --> */}
                                <div className="airline-filter flex-between">
                                    <input type="checkbox" name="check1" id="pooya"/>
                                    <label htmlFor="pooya" className="flex">
                                        <img src="img/airlines-logo/aseman.png" alt=""/>
                                        <p>آسمان</p>
                                        <p className="price"><span>200,000,000</span>تومان</p>
                                    </label>
                                </div>
        
                            </div>
        
                        </section>
                </aside>
                    
        
        
                {/*<!-- نتایج --> */}
                <section className="results ">
                {/*<!-- قسمت مرتبط سازی نتایج بر اساس قیمت و.. و نمایش تاریخ --> */}
                <section className="sorting flex">
                    <section className="sort">
                        <ul className="flex">
                            <li><a href="#"><i className="fas fa-sort-amount-up-alt"></i>ساعت پرواز</a></li>
                            <li><a href="#"><i className="fas fa-sort-amount-up-alt"></i>ظرفیت</a></li>
                            <li><a href="#"><i className="fas fa-sort-amount-down-alt"></i>قیمت</a></li>
                            <li><a href="#"><i className="fas fa-sort-amount-down-alt"></i>ارزانترین نرخ های بلیط در بازه 7
                                    روزه</a></li>
                        </ul>
                    </section>
                    <section className="date">
                        <ul className="flex">
                            <li><a href="#"><i className="fas fa-angle-right"></i>روز قبل</a></li>
                            <li className="current-date"><a href="#">{moment(localStorage.getItem('international_departureTime')).format('jYYYY/jMM/jDD')}</a></li>
                            <li><a href="#">روز بعد<i className="fas fa-angle-left"></i></a></li>
                        </ul>
                    </section>
                </section>
                {/*
                <!-- بخش نمایش تیکت ها --> */}
                <section className="tickets">
        
                {this.state.tickets.map((ticket,index)=>{
                        return <TwoWayInternationalTicket index={index} ticket={ticket}/>
                        // return <TwoWayInternationalTicket index={index} AirItineraryPricingInfo={ticket.AirItineraryPricingInfo} OriginDestinationOptions={ticket.OriginDestinationOptions}/>
                    })}
                    {/*<!-- یک تیکت تک --> */}
                        
                </section>
            </section>
            
            
                </section>     
            );

        }//else
    }

    checkCharter=(charter)=>{
        this.setState({
            tickets:this.state.tickets.filter((ticket)=>{
                return ticket.OriginDestinationOptions[0].FlightSegments[0].IsCharter ==false ? ticket : null;
            })
        });
    }
}

if(document.querySelector('#InternationalTicketResults')){

    ReactDOM.render(<InternationalTicketResults/> , document.querySelector('#InternationalTicketResults'));
}

// export default InternationalTicketResults;