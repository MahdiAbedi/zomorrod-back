import React from 'react';
import moment from 'moment-jalaali';


class OneWayInternationalTicket extends React.Component{

    
    constructor(props){
        super(props);
        this.state = {
            display: "none",
            displayTitle:"مشاهده جزییات",
            travelTime:''
        };

        this.OriginDestinationOptions=this.props.OriginDestinationOptions[0];
        // this.AirItineraryPricingInfo=this.props.AirItineraryPricingInfo;

    }



    formatCurrency(value){
        // alert(value);
        return value;
        // value = parseInt(value);
        // return parseInt(value).toFixed(0).Replace(/(\d)(?=(\d{3})+(?:\.\d)?$)/g,"$1,");
    }

    formatInsideTagMoney(tagName){
        var divs = document.getElementsByName(tagName);
        for (let index = 0; index < divs.length; index++) {
            divs[index].innerText = formatCurrency(divs[i].innerText);
            
        }
    }

    componentWillMount=() =>
    { 
        this.calcaulateTravelTime();
    } 

    calcaulateTravelTime=()=>{
        let time=this.OriginDestinationOptions.JourneyDurationPerMinute;
        let hour = parseInt(time/60);
        let min = time % 60;
        // this.travelTime="2 ساعت و 25 دقیقه";
        this.setState({travelTime: `${hour} ساعت و ${min} دقیقه`});
    }
    

    checkDisplay=()=>{
        if(this.state.display == "none"){
            this.setState({display:"block",displayTitle:"پنهان کردن جزییات"})
        }else{
            this.setState({display:"none",displayTitle:" مشاهده جزییات"})
        }
    }
    render(){
        return(

              <div className="ticket-container">
                  <section className="single-ticket flex-between">
                      
                      <div className="ticket_type">{this.OriginDestinationOptions.FlightSegments[0].IsCharter ? 'چارتر' :'سیستمی'}</div>
                      <div className="legs">
                          {/*
                          <!-- لگ رفت و برگشت -->
                          <!-- لگ رفت --> */}
                          <div className="first-leg leg flex-between">
                              <div className="logoes ">
                                  <img src="img/airlines-logo/aseman.png" alt=""/>
                                  <img src="img/airlines-logo/ata.png" alt=""/>
                              </div>
                              {/* مبدا */}
                              <p className="destination"> Tehran  
                              {/* زمان حرکت  */}
                              <span>{moment(this.OriginDestinationOptions.FlightSegments[0].DepartureDateTime).format('jYYYY/jM/jD HH:mm')}</span></p>

                              <div className="path">
                                  <span>طول سفر:{this.state.travelTime} </span>
                                  <ul className="path flex-between">
                                      <li>
                                          <i className="fa fa-plane rotate-right"></i>
                                      </li>
                                      <li>
                                          <i className="circle"></i>
                                      </li>
                                  </ul>
                                  <span>{this.OriginDestinationOptions.FlightSegments[0].StopQuantity} توقف:
                                  {this.OriginDestinationOptions.FlightSegments[1].ArrivalAirportLocationCode},{this.OriginDestinationOptions.FlightSegments[0].DepartureAirportLocationCode}
                                  </span>
                              </div>


                              <p className="destination"> Vancouver    
                              {/* زمان رسیدن */}
                              <span>{moment(this.OriginDestinationOptions.FlightSegments[0].ArrivalDateTime).format('jYYYY/jM/jD HH:mm')}</span></p>

                          </div>
                          {/*
                          <!-- لگ برگشت --> */}
                          <div className="second-leg leg flex-between" >
                              <div className="logoes">
                                  <img src="img/airlines-logo/aseman.png" alt=""/>
                                  <img src="img/airlines-logo/ata.png" alt=""/>
                              </div>
                              {/* زمان حرکت  */}
                              <p className="destination"> Tehran <span>{moment(this.OriginDestinationOptions.FlightSegments[1].DepartureDateTime).format('jYYYY/jM/jD HH:mm')}</span></p>

                              <div className="path">
                                  <span>طول سفر:{this.state.travelTime}</span>
                                  <ul className="path flex-between">
                                      <li>
                                          <i className="circle"></i>
                                      </li>
                                      <li>
                                          <i className="fa fa-plane"></i>
                                      </li>
                                  </ul>
                                  <span>{this.OriginDestinationOptions.FlightSegments[0].StopQuantity} توقف:{this.OriginDestinationOptions.FlightSegments[1].DepartureAirportLocationCode},{this.OriginDestinationOptions.FlightSegments[1].ArrivalAirportLocationCode}</span>
                              </div>

                                {/* زمان برگشت  */}
                              <p className="destination">Vancouver <span>{moment(this.OriginDestinationOptions.FlightSegments[1].ArrivalDateTime).format('jYYYY/jM/jD HH:mm')}</span></p>

                          </div>


                      </div>
                      <div className="ticket-choose">
                          <p>{this.OriginDestinationOptions.FlightSegments[0].SeatsRemaining == null ? 0 :this.OriginDestinationOptions.FlightSegments[0].SeatsRemaining } صندلی باقی مانده</p>
                          <p className="price">{this.formatCurrency(this.props.AirItineraryPricingInfo.ItinTotalFare.TotalFare)} <span>ریال</span></p>
                          <button className="btn btn-zgreen">انتخاب بلیط</button>
                      </div>
                  </section>


                {/* جزییات هر بلیط  */}
                  <section className="ticket-detail"  style={{display:this.state.display}}>
                      {/* <!-- عناوین  --> */}
                      <div className="detail-border"></div>
                      <div className="detail-titles flex">
                          <div className="buttons">
                              <button className="btn btn-zgray">قوانین استرداد</button>
                              <button className="btn btn-zgray">قوانین ویزا</button>
                          </div>


                          <ul className="flex">
                              <li>1 نفر بزرگسال :<small>5/200/000</small>ریال</li>
                              <li>1 نفر کودک :<small>5/200/000</small>ریال</li>
                              <li>1 نفر نوزاد :<small>5/200/000</small>ریال</li>
                              <li>جمع مبلغ:<small>13/200/000</small>ریال</li>

                          </ul>
                      </div>

                      {/*
                      <!-- جزییات بلیط رفت و برگشت --> */}

                      <div className="legs-detail flex">
                          {/*<!-- لگ رفت --> */}
                          <div className="leg-detail">
                              <h3>پرواز رفت</h3>
                              <p>طول سفر:<span>21h 55m</span></p>
                              <p className="green went-time"><i className="fas fa-calendar-day"></i> تاریخ حرکت:
                                  <small>شنبه،6مهر 1398(2019/09/28)</small></p>

                              {/*
                              <!-- جزییات هر مسیر --> */}
                              <div className="detail-card">
                                  <div className="row">
                                      <strong>06:30</strong>
                                      <strong>Tehran <small>(Imam Khomeini Intl)</small></strong>
                                  </div>
                                  <div className="row">
                                      <img src="img/airlines-logo/aseman.png" alt="" />
                                      <div className="description">
                                          <small>شماره پرواز:1185 / ظرفیت: 9 نفر</small>
                                          <small>کلاس:Economy-H</small>
                                          <small>طول پرواز:3h 25m</small>
                                          <small>هواپیما: Airbus Industrie A321</small>
                                      </div>
                                  </div>
                                  <div className="row">
                                      <strong>08:30</strong>
                                      <strong>Istanbul <small>(Istanbul Airport)</small></strong>
                                  </div>
                              </div>
                              <div className="stop-detail">
                                  <small>جابجایی در Istanbul / طول توقف: 2H 15m</small>
                              </div>
                              {/*
                              <!-- جزییات هر مسیر --> */}
                              <div className="detail-card">
                                  <div className="row">
                                      <strong>06:30</strong>
                                      <strong>Tehran <small>(Imam Khomeini Intl)</small></strong>
                                  </div>
                                  <div className="row">
                                      <img src="img/airlines-logo/aseman.png" alt="" />
                                      <div className="description">
                                          <small>شماره پرواز:1185 / ظرفیت: 9 نفر</small>
                                          <small>کلاس:Economy-H</small>
                                          <small>طول پرواز:3h 25m</small>
                                          <small>هواپیما: Airbus Industrie A321</small>
                                      </div>
                                  </div>
                                  <div className="row">
                                      <strong>08:30</strong>
                                      <strong>Istanbul <small>(Istanbul Airport)</small></strong>
                                  </div>
                              </div>
                              <div className="stop-detail">
                                  <small>جابجایی در Istanbul / طول توقف: 2H 15m</small>
                              </div>
                              {/*
                              <!-- جزییات هر مسیر --> */}
                              <div className="detail-card">
                                  <div className="row">
                                      <strong>06:30</strong>
                                      <strong>Tehran <small>(Imam Khomeini Intl)</small></strong>
                                  </div>
                                  <div className="row">
                                      <img src="img/airlines-logo/kaspian.png" alt="" />
                                      <div className="description">
                                          <small>شماره پرواز:1185 / ظرفیت: 9 نفر</small>
                                          <small>کلاس:Economy-H</small>
                                          <small>طول پرواز:3h 25m</small>
                                          <small>هواپیما: Airbus Industrie A321</small>
                                      </div>
                                  </div>
                                  <div className="row">
                                      <strong>08:30</strong>
                                      <strong>Istanbul <small>(Istanbul Airport)</small></strong>
                                  </div>
                              </div>
                          </div>

                          {/* <!-- لگ برگشت --> */}
                          <div className="leg-detail">
                              <h3>پرواز برگشت</h3>
                              <p>طول سفر:<span>21h 55m</span></p>
                              <p className="green went-time"><i className="fas fa-calendar-day"></i> تاریخ حرکت:
                                  <small>شنبه،6مهر 1398(2019/09/28)</small></p>

                              {/*
                              <!-- جزییات هر مسیر --> */}
                              <div className="detail-card">
                                  <div className="row">
                                      <strong>06:30</strong>
                                      <strong>Tehran <small>(Imam Khomeini Intl)</small></strong>
                                  </div>
                                  <div className="row">
                                      <img src="img/airlines-logo/aseman.png" alt="" />
                                      <div className="description">
                                          <small>شماره پرواز:1185 / ظرفیت: 9 نفر</small>
                                          <small>کلاس:Economy-H</small>
                                          <small>طول پرواز:3h 25m</small>
                                          <small>هواپیما: Airbus Industrie A321</small>
                                      </div>
                                  </div>
                                  <div className="row">
                                      <strong>08:30</strong>
                                      <strong>Istanbul <small>(Istanbul Airport)</small></strong>
                                  </div>
                              </div>
                              <div className="stop-detail">
                                  <small>جابجایی در Istanbul / طول توقف: 2H 15m</small>
                              </div>
                              {/*
                              <!-- جزییات هر مسیر --> */}
                              <div className="detail-card">
                                  <div className="row">
                                      <strong>06:30</strong>
                                      <strong>Tehran <small>(Imam Khomeini Intl)</small></strong>
                                  </div>
                                  <div className="row">
                                      <img src="img/airlines-logo/ata.png" alt="" />
                                      <div className="description">
                                          <small>شماره پرواز:1185 / ظرفیت: 9 نفر</small>
                                          <small>کلاس:Economy-H</small>
                                          <small>طول پرواز:3h 25m</small>
                                          <small>هواپیما: Airbus Industrie A321</small>
                                      </div>
                                  </div>
                                  <div className="row">
                                      <strong>08:30</strong>
                                      <strong>Istanbul <small>(Istanbul Airport)</small></strong>
                                  </div>
                              </div>
                              <div className="stop-detail">
                                  <small>جابجایی در Istanbul / طول توقف: 2H 15m</small>
                              </div>
                              {/*
                              <!-- جزییات هر مسیر --> */}
                              <div className="detail-card">
                                  <div className="row">
                                      <strong>06:30</strong>
                                      <strong>Tehran <small>(Imam Khomeini Intl)</small></strong>
                                  </div>
                                  <div className="row">
                                      <img src="img/airlines-logo/kaspian.png" alt="" />
                                      <div className="description">
                                          <small>شماره پرواز:1185 / ظرفیت: 9 نفر</small>
                                          <small>کلاس:Economy-H</small>
                                          <small>طول پرواز:3h 25m</small>
                                          <small>هواپیما: Airbus Industrie A321</small>
                                      </div>
                                  </div>
                                  <div className="row">
                                      <strong>08:30</strong>
                                      <strong>Istanbul <small>(Istanbul Airport)</small></strong>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </section>
                  <div className="more-info flex-between" onClick={this.checkDisplay}>
                      <span>Economy-H</span>
                      <span><i className="fas fa-arrow-circle-up"></i> {this.state.displayTitle} </span>
                      <span></span>
                  </div>

              </div>
              
        );
            
    }
}

export default OneWayInternationalTicket;